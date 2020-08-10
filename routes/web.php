<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register','RegistrationController@index');

Route::get('/health_unit','HealthUnitController@index');

Route::get('/jrh_emergency','JRHEmergencyController@index');

Route::get('/opd','OpdController@index');


Route::get('/lab','LabController@index');

Route::get('/radiology','RadiologyController@index');

Route::get('/pharmacy','PharmacyController@index');

Route::get('/indooradmission','IndoorAdmissionController@index');

Route::get('/indooractivity','IndoorActivityController@index');

Route::get('/ot','OtController@index');

Route::get('/discharge','DischargeController@index');