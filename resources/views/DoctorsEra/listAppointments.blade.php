@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>{{ $opd }} &nbsp;&nbsp;<a href="/home" class="btn btn-sm btn-primary">Back to Home</a></h3>
        <hr>
          <form action="/listAppointments/{{$opd}}" method="POST">
             @csrf
        <div class="row">
        <input type="date" name="selectDate" class="form-control col-md-3"> &nbsp;
        <input type="submit" name="submit" class="btn btn-success col-md-1">
        </div>
        </form>

        <br>
        <div>
            @if ($patientsToday == '[]')
                <h5 class="card card-body">No Appointments here yet !!</h5>
            @else
                <h6><b>Appointments For Selected Date</b></h6>
                <div class="table-responsive">
                <table class="table table-striped">
                    <th>Sr.No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>PF No.</th>
                    <th>Mobile</th>
                    <th>Relation</th>
                    <th>Age</th>
                    <th>Gender</th>
                    @foreach ($patientsToday as $patient)


                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->date->format('d-m-Y') }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->pf_ppo }}</td>
                            <td>{{ $patient->mobile }}</td>
                            <td>{{ $patient->appoint_for }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->gender }}</td>

                        </tr>
                    @endforeach
                </table>
                </div>
            @endif
        </div>


    </div>
@endsection
