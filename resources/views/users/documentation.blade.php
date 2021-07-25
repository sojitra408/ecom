@extends('users.layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
	.error {
    color:#CC0000;
  }
  label.error {font-size:100%;}
  .input-group .fa-spin {font-size:13px; margin-left:10px;}
	</style>
	 
  <script>
  $(document).ready(function () {
  
   $('#doc_form').validate({ // initialize the plugin
	 
	 
        rules: {
            gst_doc: {
                required: true
			 },
			  pan_doc: {
                required: true
			 },
			  tan_doc: {
                required: true
			 },
			  moa_doc: {
                required: true
			 },
			  certificate_inco: {
                required: true
			 },
			 
 		
			 
        }
    });
 
  

    
	
	});
function deleteDoc(fileid)
{
if(confirm('Are you sure to edit?'))
{
   $('#'+fileid).removeAttr('disabled') ;
	 $('#btn'+fileid).removeAttr('disabled') ;  					


}

}
 
  </script> 
<meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          

          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-10 ">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header  pb-0 pt-2 d-flex flex-row align-items-center justify-content-between">
                 
                 <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.myaccount')}}">Company Details
</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('page.documentation')}}">Documentation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.founder')}}">Founder Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.bank')}}">Banking Details</a>
  </li>
   
</ul>
                </div>
                	@include('includes.messages')            
                  
         <?php  
  $financialyeardate1 = 
  date('Y',strtotime('-3 year')).'-'.date('Y',strtotime('-2 year'));
  
     $financialyeardate2 = 
  date('Y',strtotime('-2 year')).'-'.date('Y',strtotime('-1 year'));
   $financialyeardate3 = 
  date('Y',strtotime('-1 year')).'-'.date('Y');
  
  
  ?>
                <!-- Card Body -->
				 <form method="POST" enctype="multipart/form-data" id="doc_form" action="{{ route('post.uploadStatus') }}" onsubmit="return confirm('One you submit the form ,can not modify?');"> 
				 <input  type="hidden" name="financialyeardate1" id="financialyeardate1" value="{{$financialyeardate1}}" /> 
				 <input  type="hidden" name="financialyeardate2" id="financialyeardate2" value="{{$financialyeardate2}}" /> 
				 <input  type="hidden" name="financialyeardate3"  id="financialyeardate3" value="{{$financialyeardate3}}" /> 
	 {{ csrf_field() }}
                <div class="card-body">
                 <div class="row">
     
    <!-- /.col-md-4 -->
        <div class="col-md-6 small">
      <div class="tab-content" id="myTabContent">
        
    <div class="tab-pane fade  <?php echo(session('step1')==1)?'':'active show'?>" id="home" role="tabpanel" aria-labelledby="home-tab">
 
                <div class="form-group">
    <label for="text6" class="col-12 col-form-label">GST Certificate* </label> 
    <div class="col-12">
        
       <div class="input-group ">
	    @if($fileupload_status==0)
  <div class="custom-file">
  
    <input type="file" class="custom-file-input"  <?php echo ($user_files->getUserFile('gst_doc')!='')?'disabled="disabled"':''?>  <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> id="gst_doc"  name="gst_doc" accept="application/pdf">
    <label class="custom-file-label" for="gst_doc">Choose file</label>
  </div>
  @endif
  <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikgst_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	            
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" <?php echo ($user_files->getUserFile('gst_doc')!='')?'disabled="disabled"':''?>  id="btngst_doc" onclick="uploadfile('gst_doc')" >Upload</button>
				  
				  @endif
				  
				 
  </div>
                @if($fileupload_status==0)
				<div class="gst_doc" style="display:none">
               <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>
			  
			  @endif
</div>
				  <?php if($user_files->getUserFile('gst_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidegst_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('gst_doc')[0]->image_path}}" target="_blank">Uploaded (gst.pdf)</a>
				 
				   @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('gst_doc')" style="cursor:pointer"></i>
				  
				  @endif
				  </div>
				
				 <?php  }  ?>
     
    </div>
  </div> 
  
  
                  <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Company PAN* </label> 
    <div class="col-12">
        
       <div class="input-group ">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="pan_doc" name="pan_doc" <?php echo ($user_files->getUserFile('pan_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
    <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikpan_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	         
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnpan_doc" <?php echo ($user_files->getUserFile('pan_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('pan_doc')" >Upload</button>
				    @endif
				  
				 
  </div>
                @if($fileupload_status==0)
				<div class="pan_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif
</div>
				   <?php if($user_files->getUserFile('pan_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidepan_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('pan_doc')[0]->image_path}}" target="_blank">Uploaded (pan_doc.pdf)</a> 
				   @if($fileupload_status==0)
				 <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('pan_doc')" style="cursor:pointer"></i>
				 @endif
				  </div>
				  
				 <?php  }  ?>
     
    </div>
  </div>
  
  
  <div class="form-group ">
    <label for="text6" class="col-12 col-form-label">Company TAN* </label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="tan_doc" name="tan_doc" <?php echo ($user_files->getUserFile('tan_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
    <div class="input-group-append">
                 <span class="small"><i class="fa fa-check-circle" id="tiktan_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	           
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btntan_doc" <?php echo ($user_files->getUserFile('tan_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('tan_doc')" >Upload</button>
				   @endif
				  
				 
  </div>
               @if($fileupload_status==0)  
				<div class="tan_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div> @endif
  
</div>
    
				  <?php if($user_files->getUserFile('tan_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidetan_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('tan_doc')[0]->image_path}}" target="_blank">Uploaded (tan_doc.pdf)</a>  
				   @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('tan_doc')" style="cursor:pointer"></i>
				  @endif
				  </div>
				
				 <?php  }  ?>
    </div>
  </div>
  
     <div class="form-group">
    <label for="text6" class="col-12 col-form-label">MOA / AOA* </label> 
    <div class="col-12">
        
       <div class="input-group mb-2">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="moa_doc" name="moa_doc" <?php echo ($user_files->getUserFile('moa_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
    <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikmoa_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	          
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnmoa_doc" <?php echo ($user_files->getUserFile('moa_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('moa_doc')" >Upload</button>
				  @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="moa_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif
</div>
				    <?php if($user_files->getUserFile('moa_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidemoa_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('moa_doc')[0]->image_path}}" target="_blank">Uploaded (moa_doc.pdf)</a>
				   @if($fileupload_status==0)
				    <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('moa_doc')" style="cursor:pointer"></i>
					@endif
					</div>
				  
				 <?php  }  ?>
     
    </div>
  </div> 
    
    <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Certificate of Incorporation*</label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="certificate_inco" name="certificate_inco"  <?php echo ($user_files->getUserFile('certificate_inco')!='')?'disabled="disabled"':''?><?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
   <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikcertificate_inco" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	          
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btncertificate_inco" <?php echo ($user_files->getUserFile('certificate_inco')!='')?'disabled="disabled"':''?> onclick="uploadfile('certificate_inco')" >Upload</button>
				  @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="certificate_inco" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif
</div>
				   <?php if($user_files->getUserFile('certificate_inco')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidecertificate_inco"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('certificate_inco')[0]->image_path}}" target="_blank">Uploaded  (certificate_inco.pdf)</a>
				   @if($fileupload_status==0)
				 <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('certificate_inco')" style="cursor:pointer"></i>
				 @endif
				 </div>
				 
				  
				 <?php  } ?>
     
    </div>
  </div> 
  
 
				
				
				
			 
    
  </div>
  
   </div>
    </div>  
	
	 <div class="col-md-6 small">
      <div class="tab-content" id="myTabContent">
	     <div class="form-group">
    <label for="text6" class="col-12 col-form-label">MSME Certificate</label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="msme_doc" name="msme_doc" <?php echo ($user_files->getUserFile('msme_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
   <div class="input-group-append">
    <span class="small">
	<i class="fa fa-check-circle" id="tikmsme_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i>
	 </span>
	           
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnmsme_doc" <?php echo ($user_files->getUserFile('msme_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('msme_doc')" >Upload</button>
				  @endif
				  
  </div>
                @if($fileupload_status==0) 
				<div class="msme_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif
</div>
				    <?php if($user_files->getUserFile('msme_doc')!=''){?>
				 
				 <div class="small"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidemsme_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('msme_doc')[0]->image_path}}" target="_blank">Uploaded (msme_doc.pdf)</a> 
				   @if($fileupload_status==0)
				 <i class="fas fa-pen-square fa-2x float-right" aria-hidden="true" onclick="deleteDoc('msme_doc')" style="cursor:pointer"></i>
				 @endif
				 </div>
				 
				 
				 <?php  } else{ ?>
				 
				 <?php echo 'Not Available';}?>
     
    </div>
  </div> 
  
    
  
  
    
    <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Start up India Certificate</label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="start_up_doc" name="start_up_doc" <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="start_up_doc"></label>
  </div>
  @endif
    <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikstart_up_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	             
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnstart_up_doc" <?php echo ($user_files->getUserFile('start_up_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('start_up_doc')" >Upload</button>
				 @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="start_up_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif

</div> 
				  <?php if($user_files->getUserFile('start_up_doc')!=''){?>
				 
				 <div class="small mt-2">
				 <i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidestart_up_doc"></i>
				  <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('start_up_doc')[0]->image_path}}" target="_blank">Uploaded (start_up_doc.pdf)</a>  
				   @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right"  aria-hidden="true" onclick="deleteDoc('start_up_doc')" style="cursor:pointer"></i>
				  @endif
				  </div>
				 
				 <?php  } else{ ?>
				 
				 <?php echo 'Not Available';}?>
     
    </div>
  </div> 
  
    
    <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Turnover Details FY {{$financialyeardate1}} </label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fy_1_amount_doc" name="fy_1_amount_doc"  <?php echo ($user_files->getUserFile('fy_1_amount_doc')!='')?'disabled="disabled"':''?><?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
   <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikfy_1_amount_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	           
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnfy_1_amount_doc" <?php echo ($user_files->getUserFile('fy_1_amount_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('fy_1_amount_doc')" >Upload</button>
				 @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="fy_1_amount_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div>@endif
</div> 
				   <?php if($user_files->getUserFile('fy_1_amount_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidefy_1_amount_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('fy_1_amount_doc')[0]->image_path}}" target="_blank">Uploaded (fy_1_amount_doc.pdf)</a>
				  @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right"  aria-hidden="true" onclick="deleteDoc('fy_1_amount_doc')" style="cursor:pointer"></i>
				  @endif
				 </div>
				  <?php  } else{ ?>
				 
				 <?php echo 'Not Available';}?>
     
    </div>
  </div> 
  
    <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Turnover Details FY {{$financialyeardate2}}</label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fy_2_amount_doc" name="fy_2_amount_doc" <?php echo ($user_files->getUserFile('fy_2_amount_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
   <div class="input-group-append">
    <span class="small"><i class="fa fa-check-circle" id="tikfy_2_amount_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	          
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnfy_2_amount_doc" <?php echo ($user_files->getUserFile('fy_2_amount_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('fy_2_amount_doc')" >Upload</button>
				   @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="fy_2_amount_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div> @endif
</div>
    
				   <?php if($user_files->getUserFile('fy_2_amount_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidefy_2_amount_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('fy_2_amount_doc')[0]->image_path}}" target="_blank">Uploaded (fy_2_amount_doc.pdf)</a>
				  @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right"  aria-hidden="true" onclick="deleteDoc('fy_2_amount_doc')" style="cursor:pointer"></i>
				  @endif
				 </div>
				  <?php  } else{ ?>
				 
				  <?php echo 'Not Available';}?>
    </div>
  </div> 
    
    <div class="form-group">
    <label for="text6" class="col-12 col-form-label">Turnover Details FY {{$financialyeardate3}}</label> 
    <div class="col-12">
        
       <div class="input-group">
	    @if($fileupload_status==0)
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fy_3_amount_doc" name="fy_3_amount_doc" <?php echo ($user_files->getUserFile('fy_3_amount_doc')!='')?'disabled="disabled"':''?> <?php echo ($fileupload_status==1)?'disabled="disabled"':''?> accept="application/pdf">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  @endif
   <div class="input-group-append">
                <span class="small"><i class="fa fa-check-circle" id="tikfy_3_amount_doc" style="color:green; margin-left:10px; font-size:18px; display:none"></i> </span>
	         
				 @if($fileupload_status==0)
				  <button class="btn btn-outline-secondary font-100" type="button" id="btnfy_3_amount_doc " <?php echo ($user_files->getUserFile('fy_3_amount_doc')!='')?'disabled="disabled"':''?> onclick="uploadfile('fy_3_amount_doc')" >Upload</button>
				 @endif
				 
  </div>
                 @if($fileupload_status==0)
				<div class="fy_3_amount_doc" style="display:none">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
     
              </div> @endif
</div>

				     <?php if($user_files->getUserFile('fy_3_amount_doc')!=''){?>
				 
				 <div class="small mt-2"><i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;" id="hidefy_3_amount_doc"></i> <a href="{{asset('/')}}/storage/app/{{$user_files->getUserFile('fy_3_amount_doc')[0]->image_path}}" target="_blank">Uploaded(fy_3_amount_doc.pdf)</a>
				  @if($fileupload_status==0)
				  <i class="fas fa-pen-square fa-2x float-right"  aria-hidden="true" onclick="deleteDoc('fy_3_amount_doc')" style="cursor:pointer"></i>
				  @endif
				 </div>
				 <?php  } else{ ?>
				 
				 <?php echo 'Not Available';}?>
    
    </div>
  </div> 
	  </div>
	  </div>
	
	<div class="form-group">
    <div class="offset-lg-5 col-6">
	 @if($fileupload_status==0)
      <button name="submit" type="submit" class="btn btn-primary p-2">Submit</button>
	  @endif
    </div>
  </div>
	
    <!-- /.col-md-8 -->
  </div>
                </div>
				</form>
              </div>
            </div>
            
<div class="col-xl-2 col-lg-2 ">Ad Placeholder</div>
           
          </div>

         

        </div>
    
@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  
  <script>
            $('#start_up_doc').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
 <script>
 

$(document).ready(function (e) {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		 

 
       
    });
	
	function uploadfile(filename)
{
    
	 
  var file_data = $('#'+filename).prop("files")[0]; // Getting the properties of file from file field
   var year1 = $('#financialyeardate1').val();
    var year2 = $('#financialyeardate2').val();
	 var year3 = $('#financialyeardate3').val();
  if($('#'+filename)[0].files.length==1)
  {
  var form_data = new FormData(); // Creating object of FormData class
  form_data.append(filename, file_data) // Appending parameter named file with properties of file_field to form_data
   form_data.append('financialyeardate1', year1)
    form_data.append('financialyeardate2', year2)
	 form_data.append('financialyeardate3', year3)
   // Adding extra parameters to form_data
   
  $.ajax({
    url: "{{ route('ajaxupload.action')}}", // Upload Script
    dataType: 'script',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data, // Setting the data attribute of ajax with file_data
    type: 'post',
	beforeSend: function() {
        $('.'+filename).show();
    },
    success: function(data) {
      
	     $('#tik'+filename).show();
		 $('#hide'+filename).hide();
	    $('.'+filename).html('<span class="small">Uploaded ('+filename+'.pdf)</small>');
		 $('#'+filename).val('');
		  $('#'+filename).attr('disabled',true);
		   $('#btn'+filename).hide();
		  location.reload();
    }

  });
  
  }else{
  
  alert('Choose file first!')
  }
  
  }
  
  $(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})

</script>
