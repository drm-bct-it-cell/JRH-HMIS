<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndoorActivityController extends Controller
{
    public function index(){
        return view('IndoorActivity.index');
    }
}
