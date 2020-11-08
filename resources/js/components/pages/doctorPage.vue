<template>
  <div>
    <div class="card">
      <div class="card card-header">
        <h5>Details of Appointments &nbsp;&nbsp; <button onclick="window.print()" class="btn btn-danger">Print Details</button></h5>
      </div>

      <div class="card card-body">
          <div class="row">
              <div class="col-md-5">Name :<b> {{name}}</b> </div>
              <div class="col-md-5">PF :<b> {{pf}} </b> </div>
          </div> <br>
         <table class="table table-stripped table-responsive">
             <thead class="bg-light">
             <th>BOOKING ID</th>
             <th>Date</th>
             <th>OPD</th>
             <th>OPD Time</th>
             <th>Appointment</th>
             </thead>

             <tr v-for="item in opdRecd" :key="item.id">
                 <td>{{item.id}}</td>
                 <td>{{item.date.split('T')[0]}}</td>
                 <td>{{item.opd}}</td>
                 <td>{{item.timing}}</td>
                 <td>{{item.appoint_for}}</td>
             </tr>

         </table>
      </div>
    </div>
    <br />
    <div class="d-flex justify-content-center">
      <a href="/" class="btn btn-success">Get well Soon ! Click here for HOME Page</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "DoctorsPage",
  data() {
    return {
      opdRecd: [],
      name : '',
      pf : '',
    };
  },
   created() {
    this.opdRecd = this.$route.params.pdata;
    this.name = this.$route.params.name;
    this.pf = this.$route.params.pf;
  },
};
</script>

<style>
</style>
