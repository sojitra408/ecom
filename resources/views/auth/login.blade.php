@extends('auth.layouts.app')

@section('content')

<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Log in to Panel</h3>
		<div class="card-text">
		@include('includes.messages')
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			 <form role="form" action="{{route('login.process')}}"  class="form-control form-validate"method="post">
			  {{ csrf_field() }}
				<!-- to error: add class "has-danger" -->
				@include('includes.messages') 
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
				
					<input type="password" class="form-control form-control-sm" id="password" name="password">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Sign in</button>
				
				<div class="sign-up">
				Kindly Contact admin if password is not working!
				</div>
			</form>
		</div>
	</div>
</div>
</div>
 
	  
	  @endsection
	  
	  @section('footer')
	   @include('auth/layouts/footer')
@endsection