<?php

namespace App\Http\Controllers;

use DateTime;
use App\doctor;
use App\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $OPDs =  doctor::select('Department')->distinct()->get();
        return view('home')->with('OPDs',$OPDs);
    }

    public function addDoctor(Request $request){
        if($request->has('submit')){
            $submit =  doctor::create($request->all());
            if($submit){
                return redirect('/listDoctors')->with('new-doctor','Your Data has been saved!');
            }
        }

        return view('DoctorsEra.addDoctor');
    }

    public function listDoctors(){
        $doctors = doctor::orderBy('doctor_id','asc')->get();
        return view('DoctorsEra.listDoctor')->with('doctors',$doctors);
    }

    public function editDoctor(Request $request, $id){
        $doctor = doctor::find($id);
        if($request->has('submit')){
            //$doctor->doctor_id = $request->input('doctor_id');
            $doctor->Name = $request->input('Name');
            $doctor->Designation = $request->input('Designation');
            $doctor->Department = $request->input('Department');
            $doctor->count = $request->input('count');
            $doctor->total_patient = $request->input('total_patient');
            $doctor->email = $request->input('email');
            $doctor->time_per_patient = $request->input('time_per_patient');
            $doctor->timing = $request->input('timing');
            $doctor->Monday = $request->input('Monday');
            $doctor->Tuesday = $request->input('Tuesday');
            $doctor->Wednesday = $request->input('Wednesday');
            $doctor->Thursday = $request->input('Thursday');
            $doctor->Friday = $request->input('Friday');
            $doctor->Saturday = $request->input('Saturday');
            if($doctor->save()){
                return redirect('/listDoctors')->with('edit-doctor','Data has been updated');
            }
        }
        return view('DoctorsEra.editDoctor')->with('doctorInfo',$doctor);
    }

    public function editDoctorSubmit(){

    }

    public function deleteDoctor($id){
        $doctor = doctor::find($id);
        if($doctor->delete()){
            return redirect('/listDoctors')->with('delete-doctor','Doctor Data has been deleted');
        }
    }

    public function listAppointments($opd,Request $request){
       if($request->has('submit')){

         $pateintsToday = patient::where('date',$request->selectDate)->where('opd',$opd)->get();
        return view('DoctorsEra.listAppointments')->with('opd',$opd)->with('patientsToday',$pateintsToday);
       }
        $pateintsToday = patient::where('date',Date('Y-m-d'))->where('opd',$opd)->get();
        return view('DoctorsEra.listAppointments')->with('opd',$opd)->with('patientsToday',$pateintsToday);
    }

}
