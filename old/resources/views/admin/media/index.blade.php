

@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> {{ trans('labels.MediaSetting') }}<small>{{ trans('labels.MediaTextSetting') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/home') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active">{{ trans('labels.ImageSize') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ trans('labels.ImageSize') }}</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">
                                        <!--<div class="box-header with-border">
                                          <h3 class="box-title">Setting</h3>
                                        </div>-->
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            @if (session('update'))
                                                <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong> {{ session('update') }} </strong>
                                                </div>
                                            @endif

                                        @if( count($errors) > 0)
                                                @foreach($errors->all() as $error)
                                                    <div class="alert alert-success" role="alert">
                                                        <span class="icon fa fa-check" aria-hidden="true"></span>
                                                        <span class="sr-only">{{ trans('labels.ImageSize') }}:</span>
                                                        {{ $error }}</div>
                                                @endforeach
                                            @endif

                                          
											
											 <form action="{{ url('admin/media/updatemediasetting') }}" method="post"  class="form-horizontal form-validate" enctype="multipart/form-data"
                         onsubmit="return ConfirmDelete()"     >

                                                <h4>{{ trans('labels.ThumbnailSetting') }}</h4>
                                                <hr>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Thumbnail_height') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    
													
													<input type="text" value="{{$web_setting[87]->value}}" name="ThumbnailHeight" class="form-control field-validate"  id="{{$web_setting[87]->value}}"/>
                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Thumbnail_height') }}</span>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Thumbnail_width') }}</label>
                                                    <div class="col-sm-10 col-md-4">
                                                        
														
														<input type="text" value="{{$web_setting[88]->value}}" name="ThumbnailWidth" class="form-control field-validate"  id="{{$web_setting[88]->value}}"/>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Thumbnail_width') }}</span>
                                                    </div>

                                              </div>

                                                <h4>{{ trans('labels.MediumSetting') }}</h4>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Medium_height') }}</label>
                                                    <div class="col-sm-10 col-md-4">
                                                       
														
														<input type="text" value="{{$web_setting[89]->value}}" name="MediumHeight" class="form-control field-validate"  id="{{$web_setting[89]->value}}"/>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Medium_height') }}</span>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Medium_width') }}</label>
                                                    <div class="col-sm-10 col-md-4">
                                                      
														<input type="text" value="{{$web_setting[90]->value}}" name="MediumWidth" class="form-control field-validate"  id="{{$web_setting[90]->value}}"/>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Medium_width') }}</span>
                                                    </div>

                                                </div>
                                                <h4>{{ trans('labels.LargeSetting') }}</h4>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Large_height') }}</label>
                                                    <div class="col-sm-10 col-md-4">
                                                      
														<input type="text" value="{{$web_setting[91]->value}}" name="LargeHeight" class="form-control field-validate"  id="{{$web_setting[91]->value}}"/>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Large_height') }}</span>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Large_width') }}</label>
                                                    <div class="col-sm-10 col-md-4">
                                                        
														
														<input type="text" value="{{$web_setting[92]->value}}" name="LargeWidth" class="form-control field-validate"  id="{{$web_setting[92]->value}}"/>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.Large_width') }}</span>
                                                    </div>

                                                </div>

                                        <!-- /.box-body -->
                                        <div class="box-footer text-center">
                                            <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                                            <a href="{{ URL::to('admin/dashboard/this_month')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                        </div>

                                        <!-- /.box-footer -->
                                       </form>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->

    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection
