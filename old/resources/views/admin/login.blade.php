@extends('admin.layoutLlogin')
@section('content')
<style>
	.wrapper{
		display:  none !important;
	}
</style>
<div class="login-box">
  <div class="login-logo">

   
    	 
    

    <div style="
    font-size: 25px;
"><b> {{ trans('labels.welcome_message') }}</b>{{ trans('labels.welcome_message_to') }}</div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ trans('labels.login_text') }}</p>

    <!-- if email or password are not correct -->
   

     @include('includes.messages')
   <form method="POST" action="{{ route('adminlogin') }}" aria-label="{{ __('Login') }}">
 
	  {{ csrf_field() }}

       <div class="form-group has-feedback">
	   <input type="email" name="email" class="form-control email-validate"  id="email"/>
       
        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                     {{ trans('labels.AdminEmailText') }}</span>
       <span class="help-block hidden"> {{ trans('labels.AdminEmailText') }}</span>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" name='password' class='form-control field-validate' value="">
       <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   {{ trans('labels.AdminPasswordText') }}</span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>

      </div>
  	  <img src="">
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
         
		  <input type="submit" name="login" value="{{trans('labels.login')}}" id="login"  class="btn btn-primary btn-block btn-flat" />
        </div>
        <!-- /.col -->
      </div>
   </form>

  </div>

  <!-- /.login-box-body -->
</div>
