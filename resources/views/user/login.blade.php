@extends('layouts.appInner')

 
 



@section('content')
 <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
 	<style>
	.error {
    color:#CC0000;
  }
	</style>
    
  
<section class="mt-5" style="padding-top:120px">
     <div class="container" data-aos="fade-up">
           <div class="section-title">
          <h2>Login</h2>
        </div>
<div class="intro">User Login  </div></div>
</section>
<form method="post" action="{{route('post.login')}}"  name="frmmain" id="frmmain" enctype="multipart/form-data">
  
 
<section class="databinfo">
    <div class="container">
        <div class="row">
           
       @include('includes.messages')     
 
  {{ csrf_field() }}
  <div class="col-lg-6">
   <div class="form-group row" >
     <label class="col-4">Username*</label> 
    <div class="col-8">
      <input id="email" name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Username/Email">
    </div>
  </div>
  
      <div class="form-group row">
   <label class="col-4">Password*</label>
    <div class="col-8">
      <input id="password" name="password" type="password" value="{{old('password')}}" class="form-control"   aria-describedby="passwordHelpBlock" placeholder="Password"> 
  
    </div>
  </div>  
  <div class="form-group row">
    <div class=" col-12">
      <button name="submit" type="submit" class="btn btn-primary btn-sm">Login</button>
    </div>
  </div>  
</div>

  

 
 
 
  
   
  
  
    
  


    </div>
    </div>
</section>
 </form>
	  
	  

	  
	   @endsection
	  
	  @section('footer')
	   @include('layouts/footerInner')
      @endsection
	   