<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/******* All the secure routes */
Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/addDoctor','HomeController@addDoctor');

Route::any('/listDoctors','HomeController@listDoctors');

Route::any('/editDoctor/{id}','HomeController@editDoctor');

Route::any('/deleteDoctor/{id}','HomeController@deleteDoctor');

Route::any('/listAppointments/{opd}','HomeController@listAppointments');

/********** OPD Registration related Routes************** */

Route::any('/app/new-appointment','OpdController@index');

Route::any('/get-patient','OpdController@getPatient');

Route::any('/get-doctor','OpdController@getDoctorData');

Route::any('/getEmployeeData','OpdController@getEmployeeData');

Route::any('/availabeOPDonDay','OpdController@availabeOPDonDay');

Route::any('/afterRegister','OpdController@afterRegister');

Route::any('/privacy',function(){
    return view('privacy');
});

/* Route::get('send-mail',function(){
    $details = [
        'title' => 'Mail from Ganesh',
        'body' => 'Mail Body',
    ];
    Mail::to('gpalve@gmail.com')->send(new \App\Mail\TestMail($details));
}); */

Route::get('/', function () {
    return view('welcome');
});





Route::any('{slug}',function(){
    return view('landing');
});



/*Route::get('/register','RegistrationController@index');

Route::get('/health_unit','HealthUnitController@index');

Route::get('/jrh_emergency','JRHEmergencyController@index');

Route::get('/opd','OpdController@index');


Route::get('/lab','LabController@index');

Route::get('/radiology','RadiologyController@index');

Route::get('/pharmacy','PharmacyController@index');

Route::get('/indooradmission','IndoorAdmissionController@index');

Route::get('/indooractivity','IndoorActivityController@index');

Route::get('/ot','OtController@index');

Route::get('/discharge','DischargeController@index'); */
