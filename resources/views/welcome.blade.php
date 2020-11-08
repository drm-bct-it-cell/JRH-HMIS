@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div style="background: #ffffff;padding:10px" class="shadow-lg p-3 mb-4 bg-white rounded ">
            <h1 class="d-flex justify-content-center" style="font-family:Copperplate;"> OPD BOOKING - JRH MMCT </h1>
            <hr>
            <div class="row justify-content-center">
                <img src="/wr_logo.png" width="30%" alt="Logo">
            </div> <br>
            <div class="row justify-content-center">
                <div class="card shadow-lg p-2 mb-1 col-md-5 m-3" style="background:#e3e3e3">
                    <a href="/make-appointment" style="text-decoration: none;color:black">
                        <div class="card-body text-center">
                            <h5 class="card-text"><b>BOOK OPD ONLINE</b></h5>

                        </div>
                    </a>
                </div>
                <div class="card shadow-lg p-2 mb-1 col-md-5 m-3" style="background:#e3e3e3">
                    <a href="/home" style="text-decoration: none;color:black">
                        <div class="card-body text-center">
                            <h5 class="card-text"><b>ADMIN LOGIN</b></h5>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center" style="background:white ; margin:5px ; padding:5px; ">
                <b> Developed by IT Cell , DRM Office , MMCT Division</b> </div>


        </div>
    </div>
    <main-app></main-app>

</div>
@endsection
