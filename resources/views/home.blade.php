@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="align-items-start col-md-12">
            <div style="background: #ffffff;padding:10px" class="shadow-lg p-3 mb-4 bg-white rounded">
                <h2>Doctor's Desk</h2>
                <hr>
                <div class="row">
                    <div class="card shadow-lg p-3 mb-2 col-md-3 m-3" style="background: orange">
                        <a href="/addDoctor" style="text-decoration: none;color:black">
                            <div class="card-body text-center">
                                <h5 class="card-text">Add New Doctor's Details</h5>

                            </div>
                        </a>
                    </div>
                    <div class="card bg-success shadow-lg p-3 mb-2 col-md-3 m-3">
                        <a href="/listDoctors" style="text-decoration: none;color:black">
                            <div class="card-body text-center">
                                <h5 class="card-text">List of Registered Doctors</h5>
                            </div>
                        </a>
                    </div>


                </div>

            </div>
        </div>




        <br>
        <div class="col-md-12">
            <div style="background: #ffffff;padding:10px" class="shadow-lg p-3 mb-4 bg-white rounded">
                <h2>Daily Appointments Details - OPD Wise</h2>
                <hr>

                <div class="row ">

                    @foreach ($OPDs as $item)

                    <div class="card shadow-lg  mb-2 col-md-3 m-3" style="background:purple">
                    <a href="/listAppointments/{{$item->Department}}" style="text-decoration: none;color:white">
                            <div class="card-body text-center">
                            <div class="card-text"><h5>{{$item->Department}}</h5></div>

                            </div>
                        </a>
                    </div>


                    @endforeach
                </div>


            </div>
        </div>








    </div>
@endsection
