@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Add new Doctor Record &nbsp;&nbsp;<a href="/home" class="btn btn-sm btn-primary">Bact to Home</a></h3>
    <hr>
    <form action="/addDoctor" method="POST" class="col-md-5">
        @csrf
        <div class="form-group">
            <label for="">Doctor Name</label>
            <input type="text" class="form-control" name="Name">
        </div>

        <div class="form-group">
            <label for="">Designation</label>
            <input type="text" class="form-control" name="Designation">
        </div>

        <div class="form-group">
            <label for="">Department</label>
            <select class="form-control" name="Department">
                <option value="">Select your Department</option>
                <option value="Obstetrics & Gynaecology">Obstetrics & Gynaecology</option>
                <option value="Cardiology">Cardiology</option>
                <option value="General Surgery">General Surgery</option>
                <option value="Ophthalmology">Ophthalmology</option>
                <option value="GI Surgery">GI Surgery</option>
                <option value="Gastroenterology">Gastroenterology</option>
                <option value="Orthopaedics">Orthopaedics</option>
                <option value="ENT">ENT</option>
                <option value="General Medicine">General Medicine</option>
                <option value="Paediatrics">Paediatrics</option>
                <option value="Radiology">Radiology</option>
                <option value="Neurology">Neurology</option>
                <option value="Rheumatology">Rheumatology</option>
                <option value="TB & Chest">TB & Chest</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Haemotology">Haemotology</option>
                <option value="Nephrology">Nephrology</option>
                <option value="HIV OPD">HIV OPD</option>
                <option value="Pain Clinic">Pain Clinic</option>
                <option value="Spine">Spine</option>
                <option value="OBGY">OBGY</option>
                <option value="OBGY/Infertility">OBGY/Infertility</option>
                <option value="Dental">Dental</option>
                <option value="RELHS OPD">RELHS OPD</option>
                <option value="Anaesthesiology">Anaesthesiology</option>


            </select>
        </div>

        <div class="form-group">
            <label for="">How many online Appointments?(Online)</label>
            <input type="number" class="form-control" placeholder="Enter number" name="count">
        </div>

        <div class="form-group">
            <label for="">Total Appointments per Day?(Online & Offline)</label>
            <input type="number" class="form-control" placeholder="Enter number" name="total_patient">
        </div>

        <div class="form-group">
            <label for="">Time Required per Patient?(Minutes)</label>
            <input type="number" class="form-control" placeholder="Enter number" name="time_per_patient">
        </div>

        <div class="form-group">
            <label for="">Email Address</label>
            <input type="email" class="form-control" placeholder="example@gmail.com" name="email">
        </div>

        <div class="form-group">
            <label for="">Timing of Availability</label>
            <input type="text" class="form-control" placeholder="Eg. 09:00 to 13:00" name="timing">
        </div>


        <div class="form-group">
            <label for="">Attending OPD on Monday?</label>
            <select class="form-control" name="Monday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Attending OPD on Tuesday?</label>
            <select class="form-control" name="Tuesday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Attending OPD on Wednesday?</label>
            <select class="form-control" name="Wednesday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Attending OPD on Thursday?</label>
            <select class="form-control" name="Thursday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Attending OPD on Friday?</label>
            <select class="form-control" name="Friday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Attending OPD on Saturday?</label>
            <select class="form-control" name="Saturday">
                <option value="Yes">Yes</option>
                <option value="No" selected>No</option>
            </select>
        </div>


        <div class="form-group">
            <input type="submit" name="submit" class="form-control btn btn-danger">
        </div>


    </form>
</div>
@endsection
