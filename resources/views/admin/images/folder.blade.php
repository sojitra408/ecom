@extends('admin.layout')
@section('content')
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">	
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          

                 
                
                <!-- Card Body -->
                <div class="card-body">
				<div class="row">
                 
			  

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Media Images</h6>
                 
                </div>
                 
                <!-- Card Body -->
                <div class="card-body">
              <div class="container">
				<div class="row">
            <div class="col-md-3">
               <a href="{{route('image.slider')}}"><div style="font-size:24px">
               <i class="fa fa-folder" aria-hidden="true"></i>
			   Slider</div></a>
            </div>
			<div class="col-md-3">
              <a href="{{route('image.category')}}"> <div style="font-size:24px">
               <i class="fa fa-folder" aria-hidden="true"></i>
			   Category</div></a>
            </div>
			 <div class="col-md-3">
             <a href="{{route('image.general')}}">  <div style="font-size:24px">
               <i class="fa fa-folder" aria-hidden="true"></i>
			   General</div></a>
            </div>
			<div class="col-md-3">
              <a href="{{route('image.brand',$brands[0]->id)}}"> <div style="font-size:24px">
               <i class="fa fa-folder" aria-hidden="true"></i>
			   Brand</div></a>
            </div>
		 
        </div>
    </div>
            </div>
              </div>
            </div>
			</div>

           
         
                </div>
              
       
         
</div>

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   