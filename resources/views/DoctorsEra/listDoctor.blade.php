@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    @if(session()->has('new-doctor'))
        <div class="alert alert-success">
            {{ session()->get('new-doctor') }}
        </div>
    @endif

    @if(session()->has('edit-doctor'))
        <div class="alert alert-success">
            {{ session()->get('edit-doctor') }}
        </div>
    @endif

    @if(session()->has('delete-doctor'))
        <div class="alert alert-success">
            {{ session()->get('delete-doctor') }}
        </div>
    @endif

      <h3>List of Doctors Registered &nbsp;&nbsp;<a href="/home" class="btn btn-sm btn-primary">Bact to Home</a></h3><hr>
      <table class="table table-striped table-responsive">
        <th>Dr.ID</th>
        <th>Doctor Name</th>
        <th>Department</th>
        <th>Online Slots</th>
        <th>Total Appointments</th>
        <!-- <th>Email</th> -->
        <th>Timing</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th colspan="2">Action</th>

        @foreach ($doctors as $item)
            <tr>
            <td>{{$item->doctor_id}}</td>
            <td>{{$item->Name}} <br> {{$item->Designation}} </td>
            <td>{{$item->Department}}</td>
            <td>{{$item->count}}</td>
            <td>{{$item->total_patient}}</td>
            <!-- <td>{{$item->email}}</td> -->
            <td>{{$item->timing}}</td>
            <td>{{$item->Monday}}</td>
            <td>{{$item->Tuesday}}</td>
            <td>{{$item->Wednesday}}</td>
            <td>{{$item->Thursday}}</td>
            <td>{{$item->Friday}}</td>
            <td>{{$item->Saturday}}</td>
            <td><a href="/editDoctor/{{$item->doctor_id}}" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="/deleteDoctor/{{$item->doctor_id}}" onclick="return confirm('Are you sure want to delete data?');" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach

      </table>
  </div>
@endsection
