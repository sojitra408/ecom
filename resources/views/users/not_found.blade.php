@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>{{ trans('labels.title_dashboard') }}  </small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <h3>Welcome To Dashboard</h3>
		  <h3 class="alert alert-danger">You dont have permission to access this page!Please contact admin.</h3>
        </section>
        <!-- /.content -->
    </div>
    {{--<script src="{!! asset('publc/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>--}}

    {{--<script src="{!! asset('public/dist/js/pages/dashboard2.js') !!}"></script>--}}
@endsection
