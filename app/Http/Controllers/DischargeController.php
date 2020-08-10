<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DischargeController extends Controller
{
    public function index(){
        return view('Discharge.index');
    }
}
