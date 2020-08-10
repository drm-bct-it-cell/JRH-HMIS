@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">

        <div class="col-sm-3 ">
            <a href="/register" style="text-decoration:none"> <div class="card-header mt-2 bg-primary" style="text-align: center"> <h5><font color="white">Registration Desk</font></h5> </div>
             <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-user-plus fa-3x" aria-hidden="true"></i></font></h2></div> </a>
             
             </div>
           
          
        <div class="col-sm-3 ">
                <a href="/health_unit" style="text-decoration:none;"><div class="card-header mt-2 bg-success" style="text-align: center"> <h5><font color="white">Health Unit</font></h5> </div>
            <div class="card-body" style="text-align:center;background:#E3E3E3   "><h2><font color="black"><i class="fas fa-first-aid fa-3x" aria-hidden="true"></i></font></h2></div>
                </a>
           </div>
         
        
          <div class="col-sm-3 ">
             <a href="/jrh_emergency" style="text-decoration:none"> <div class="card-header mt-2 bg-danger" style="text-align: center"> <h5><font color="white">JRH Emergency</font></h5> </div>
              <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-ambulance fa-3x" aria-hidden="true"></i></font></h2></div> </a>
              
              </div>

              

            <div class="col-sm-3 ">
             <a href="/opd" style="text-decoration:none"> <div class="card-header mt-2 bg-dark" style="text-align: center"> <h5><font color="white">OPD Assignment</font></h5> </div>
              <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-user-md fa-3x" aria-hidden="true"></i></font></h2></div> </a>
              
              </div>
           
            

              
            </div> 
            <br><br>

        <div class="row">

            <div class="col-sm-3 ">
                <a href="/lab" style="text-decoration:none"> <div class="card-header mt-2 bg-primary" style="text-align: center"> <h5><font color="white">Laboratory</font></h5> </div>
                 <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-vial fa-3x" aria-hidden="true"></i></font></h2></div> </a>
                 
                 </div>

                 <div class="col-sm-3 ">
                    <a href="/radiology" style="text-decoration:none"> <div class="card-header mt-2 bg-success" style="text-align: center"> <h5><font color="white">Radiology</font></h5> </div>
                     <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-x-ray fa-3x" aria-hidden="true"></i></font></h2></div> </a>
                     
                     </div>
                     <div class="col-sm-3 ">
                        <a href="/pharmacy" style="text-decoration:none"> <div class="card-header mt-2 bg-danger" style="text-align: center"> <h5><font color="white">Pharmacy</font></h5> </div>
                         <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-tablets fa-3x" aria-hidden="true"></i></font></h2></div> </a>
                         
                         </div>
                         <div class="col-sm-3 ">
                            <a href="/indooradmission" style="text-decoration:none"> <div class="card-header mt-2 bg-dark" style="text-align: center"> <h5><font color="white">Indoor Admission</font></h5> </div>
                             <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-list-ol fa-3x" aria-hidden="true"></i></font></h2></div> </a>
                             
                             </div>

        </div>
        <br><br>
        <div class="row">

            <div class="col-sm-3 ">
                <a href="/indooractivity" style="text-decoration:none"> <div class="card-header mt-2 bg-primary" style="text-align: center"> <h5><font color="white">Indoor Activities</font></h5> </div>
                 <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-running fa-3x" aria-hidden="true"></i></font></h2></div> </a>
                 
            </div>
            <div class="col-sm-3 ">
                <a href="/ot" style="text-decoration:none"> <div class="card-header mt-2 bg-success" style="text-align: center"> <h5><font color="white">Operation Theatres</font></h5> </div>
                 <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-cut fa-3x" aria-hidden="true"></i></font></h2></div> </a>

                </div>
                <div class="col-sm-3 ">
                    <a href="/discharge" style="text-decoration:none"> <div class="card-header mt-2 bg-danger" style="text-align: center"> <h5><font color="white">Discharge Summary</font></h5> </div>
                     <div class="card-body" style="text-align:center;background:#e3e3e3"><h2><font color="black"><i class="fa fa-clipboard-list fa-3x" aria-hidden="true"></i></font></h2></div> </a>
               
    
</div>
@endsection

