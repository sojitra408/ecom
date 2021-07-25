@extends('admin.layout')
@section('content')
     <div class="container-fluid">

          <!-- Page Heading -->
           

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registration Report Download</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('admin.registerReport')}}"><i class="fa fa-download "></i> Download</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Unverified Registration Report</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{route('admin.notregisterReport')}}"><i class="fa fa-download "></i> Download</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
             

            
          </div>

          
        </div>
    
@endsection
