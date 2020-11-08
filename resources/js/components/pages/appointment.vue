<template>
  <div v-if="loading">
    <center>
      <img src="/loader.gif" />
    </center>
  </div>
  <div v-else>
    <h3>Online Appointments For JRH,MMCT</h3>
    <hr />
    <div style="background-color:lightgray;padding:8px;" class="shadow-lg p-3 mb-4 rounded">
      <div class="row">
        <div class="col-md-3 form-group">
          <label for="Date"> <b> Date of Appointment*</b></label>
          <input
            type="date"
            id="datefield"
            v-model="data.date"
            @change="getOneDay"
            min="2020-01-01"
            max="2020-12-12"
            class="form-control"
            onkeydown="return false"
          />
        </div>

        <div class="col-md-3 form-group">
          <label for>Appointment For*</label>
          <select v-model="data.appoint_for" class="form-control" required>
            <option value>Appointment For</option>
            <option value="Self">Self</option>
            <option value="Dependent">Dependent</option>
          </select>
        </div>

        <div class="col-md-3 form-group">
          <label for>PF / PPO Number*</label>
          <input
            type="number"
            v-model="data.pf_ppo"
            placeholder="PF/PPO"
            class="form-control"
            @change="getEmployeeData"
            required
          />
        </div>

        <div class="col-md-3 form-group">
          <label for>UMID(Optional)</label>
          <input type="text" v-model="data.umid" placeholder="UMID" class="form-control" required />
        </div>
      </div>

      <div class="row" v-if="employee_flag">
        <div class="col-md-3 form-group">
          <label for>Designation</label>
          <input type="text" :value="employee_data['DESIGCODE']" class="form-control" readonly />
        </div>

        <div class="col-md-3 form-group">
          <label for>Department</label>
          <input type="text" :value="employee_data['DEPTCODE']" class="form-control" readonly />
        </div>

        <div class="col-md-3 form-group">
          <label for>Station</label>
          <input type="text" :value="employee_data['STATIONCODE']" class="form-control" readonly />
        </div>

        <div class="col-md-3 form-group">
          <label for>BirthDate</label>
          <input type="text" :value="employee_data['BIRTHDATE']" class="form-control" readonly />
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 form-group">
          <label for>Patient Name*</label>
          <input
            type="text"
            v-model="data.name"
            placeholder="Patient Name"
            class="form-control"
            required
            :readonly="self ? true : false"
          />
        </div>
        <div class="col-md-3 form-group">
          <label for>Mobile*</label>
          <input
            type="text"
            v-model="data.mobile"
            placeholder="Mobile No"
            class="form-control"
            required
          />
        </div>
        <div class="form-group col-md-3">
          <label for>Age*</label>
          <input type="number" v-model="data.age" placeholder="Age" class="form-control" required />
        </div>
        <div class="form-group col-md-3">
          <label for>Gender*</label>
          <select v-model="data.gender" class="form-control">
            <option value>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      </div>
      <div v-if="opdAvailabeFlag">
          <hr>
      <div class="form-group">
        <b>OPDs available on {{data.date}}  [ {{data.day}} ] [ Select maximum 3 ]</b>
        <button @click="emptyQ" class="btn btn-sm btn-primary">Change</button>
        <button type="button" v-if="opd1.length>=1" class="btn btn-success btn-sm">
          Slot Available
          <span class="badge badge-light">{{max_slots - slots_booked}}</span>
        </button>

        <div v-if="doctor_loader">
          <img width="15" src="/loader.gif" />
        </div>
        <div v-else>
          <div v-if="opd1.length>=1">
            <br />
            <table class="table table-responsive col-md-8">
              <div v-for="r in opd1" :key="r.doctor_id">
                <tr class="table-info">
                  <td>
                    <b>Dr.</b>
                  </td>
                  <td>
                    <b>{{r.Name}}</b>
                  </td>
                  <td>{{r.Department}}</td>
                  <td>{{r.Designation}}</td>
                  <td>{{r.timing}}</td>

                </tr>
              </div>
            </table>
          </div>
        </div>
        <div
          v-if="(isData && opd1.length==0 && !empty_request ) || (isData && max_slots==slots_booked)"
        >
          <span class="badge badge-warning">SORRY...SLOT IS NOT AVAILABLE!</span>
          <br />
        </div>

          <div v-for="onlyOpdAvailable in opdAvailabeData" :key="onlyOpdAvailable.Department">


            <input
            type="checkbox"
              v-model="data.opd"
              @change="fetchDoctor"
              :disabled="data.opd.length>2"
              :value="onlyOpdAvailable.Department"
            > {{onlyOpdAvailable.Department}}
        </div>
        </div>
      </div>

      <button @click="submit" class="btn btn-success btn-block" :loading="isAdding">
        <font color="black">{{isAdding ? "Submitting..." : "BOOK MY SLOT"}}</font>
      </button>
      <br />
      <div>
        <b>Note:</b>
        <br />1.Slot can be booked for 15 days in advance.
        <br />2.Time slots allocated may change as per the circumstances
      </div>
    </div>

    <hr />

    <!--  <div v-for="p in patient" :key="p.pf_ppo">
        <td>{{p.umid}}</td>
         <td>{{p.pf_ppo}}</td>
          <td>{{p.name}}</td>
           <td>{{p.age}}</td>

    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {
        day: "",
        date: "",
        umid: "",
        pf_ppo: "",
        appoint_for: "",
        name: "",
        age: "",
        gender: "",
        mobile:"",
        opd: [],
      },
      isAdding: false,
      patient: [],
      loading: false,
      opd1: [],
      isData: false,
      slots_booked: 0,
      max_slots: 0,
      empty_request: false,
      doctor_loader: false,
      employee_flag: false,
      employee_data: [],
      self: false,
      opdAvailabeFlag: false,
      opdAvailabeData: [],
    };
  },
  methods: {
    emptyQ() {
      this.data.opd = [];
      this.opd1 = [];
      this.empty_request = true;
    },
    async submit() {
      if (
        this.data.date == "" ||
        this.data.name == "" ||
        this.data.age == "" ||
        this.data.gender == "" ||
        this.data.pf_ppo == "" ||
        this.data.mobile == "" ||
        this.data.appoint_for == ""
      ) {
        alert("Field Marked with * are compulsory");
        return;
      }
      if (this.opd1.length == 0) {
        alert("Selected Opd Slot is not Available..!");
        return;
      } else {
        if(confirm('You have selected '+this.data.opd.length +' OPD on '+this.data.date.toLocaleString().split(',')[0]+'. Are You sure about it?'))
        {
        this.isAdding = true;
        this.loading = true;
        const res = await this.callApi(
          "post",
          "/app/new-appointment",
          this.data
        );
        this.loading = false;

        if (res.status === 200) {
          if (res.data["msg"] == "over") {
            alert("You have booked OPD for maximum time..!");
            this.loading = false;
          } else {
            this.loading = false;

            alert(
              "Hello " + this.data.name + ". Your appointment has been Fixed"
            );
            this.$router.push({
              name: "doctorDetailsPage",
              params: { pdata: res.data['pdata'] , name : this.data.name , pf : this.data.pf_ppo },
            });
            this.data = [];
          }
        } else alert("Something Went wrong");
      }
    }
    },
    //fetch the details doctors availability
    async fetchDoctor() {
      this.doctor_loader = true;
      const res = await this.callApi("post", "/get-doctor", {
        day: this.data.day,
        currentDate: this.data.date,
        opd: this.data.opd,
        lengthOpd: this.data.opd.length,
      });
      if (res.status == 200) {
        this.opd1 = res.data["doc_data"];
        this.slots_booked = res.data["slot_count"];
        this.max_slots = res.data["max_slots"];
        this.empty_request = res.data["empty"];
        this.isData = true;
        this.doctor_loader = false;
      } else alert("Something wrong");
    },
    async getOneDay() {
      var days = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ];

      var dateObject = new Date(this.data.date);
      var dayName = days[dateObject.getDay()];
      this.data.day = dayName;
      //alert(this.data.day);
      this.data.opd = [];
      this.opd1 = [];
      const res = await this.callApi("post", "/availabeOPDonDay", {
        day: dayName,
      });
      if (res.status == "200") {
        if (res.data["success"]) {
          this.opdAvailabeFlag = true;
          this.opdAvailabeData = res.data["opdAvailableData"];
        } else{
            alert('IT\'s Sunday ! No OPD ! In case of Emergency directly go to JRH.')
        }
      }
    },
    async getEmployeeData() {
      const res = await this.callApi("post", "/getEmployeeData", {
        pfNo: this.data.pf_ppo,
      });

      if (res.status === 200) {
        if (res.data["success"]) {
          this.employee_flag = true;
          this.employee_data = res.data["employeeData"];
          if (this.data.appoint_for == "Self") {
            this.data.name = this.employee_data["EMPNAME"];
            this.data.mobile = this.employee_data["MOBILE"];
            this.self = true;
          }
        } else {
          alert(
            "This PF number is not registered with Database.Contact Admin!"
          );
          this.data.pf_ppo = "";
        }
      }
    },
  },
  mounted: function () {
    var dtToday = new Date();
    dtToday.setDate(dtToday.getDate() + 1);
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10) month = "0" + month.toString();
    if (day < 10) day = "0" + day.toString();

    var minDate = year + "-" + month + "-" + day;

    var dtTodayMax = new Date();
    dtTodayMax.setDate(dtTodayMax.getDate() + 15);
    var month = dtTodayMax.getMonth() + 1;
    var day = dtTodayMax.getDate();
    var year = dtTodayMax.getFullYear();
    if (month < 10) month = "0" + month.toString();
    if (day < 10) day = "0" + day.toString();

    var maxDate = year + "-" + month + "-" + day;

    document.getElementById("datefield").setAttribute("max", maxDate);
    document.getElementById("datefield").setAttribute("min", minDate);
  },

  async created() {
    /* const res = await this.callApi('get','/get-patient');
      if(res.status==200){
          this.patient = res.data;
      }
      else
        alert('something went wrong'); */
  },
};
</script>
