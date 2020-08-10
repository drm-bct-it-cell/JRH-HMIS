<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JRHEmergencyController extends Controller
{
    public function index(){
        return view('JRHEmergency.index');
    }
}
