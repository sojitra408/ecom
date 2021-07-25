 	

@if (session()->has('message'))
	<p class="alert alert-success">{{ session('message') }}</p>
@endif

@if(session('success'))
	<div class="alert alert-success">
		{!!session('success')!!}
	</div>
@endif
@if(session('error_msg'))
	<div class="alert alert-danger">
		{{session('error_msg')}}
	</div>
@endif

@if(session('permission_message'))
	<div class="alert alert-danger">
		{{session('permission_message')}}
	</div>
@endif



 

 @if( count($errors) > 0)
    	@foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">{{ trans('labels.Error') }}:</span>
                  {{ $error }}
            </div>
         @endforeach
    @endif

    @if(Session::has('loginError'))
        <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">{{ trans('labels.Error') }}:</span>
              {!! session('loginError') !!}
        </div>
    @endif

