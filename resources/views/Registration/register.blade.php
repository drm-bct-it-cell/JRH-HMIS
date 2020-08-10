@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Register the patient for the first time</h1>
    <hr>
    <form action="">

    <div class="row">
        <div class="col-md-4">
            <label for="">Unique Patine ID</label>
            <input type="text" name="p_id" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Patine Name</label> 
            <input type="text" name="pname" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Age</label>
            <input type="number" name="age" class="form-control">
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-4">
            <label for="">PF Number</label>
            <input type="number" name="pf" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Mobile Number</label> 
            <input type="number" name="pname" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">DOB</label>
            <input type="date" name="age" class="form-control">
        </div>
    </div>

    
    </form>
</div>

@endsection