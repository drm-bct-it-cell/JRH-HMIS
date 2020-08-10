<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthUnitController extends Controller
{
    public function index(){
        return view('HealthUnit.index');
    }
}
