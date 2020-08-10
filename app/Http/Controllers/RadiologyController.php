<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadiologyController extends Controller
{
    public function index(){
        return view('Radiology.index');
    }
}
