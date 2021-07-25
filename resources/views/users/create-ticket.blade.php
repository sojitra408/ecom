@extends('users.layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
.error {
    color:#CC0000;
  }
  label.error {font-size:100%;}
.profile-image {
  width: 50px;
  height: 50px;
  border-radius: 40px;
}

.settings-tray {
  background: #eee;
  padding: 10px 15px;
  border-radius: 7px;
  
  .no-gutters {
    padding: 0;
  }
  
  &--right {
    float: right;
    
    i {
      margin-top: 10px;
      font-size: 25px;
      color: grey;
      margin-left: 14px;
      transition: .3s;
      
      &:hover {
        color: $blue;
        cursor: pointer;
      }
    }
  }
}

.search-box {
  background: #fafafa;
  padding: 10px 13px;
  
  .input-wrapper {
    background: #fff;
    border-radius: 40px;
    
    i {
      color: grey;
      margin-left: 7px; 
      vertical-align: middle;
    }
  }
}

input {
  border: none;
  border-radius: 30px;
  width: 80%;

  &::placeholder {
    color: #e3e3e3;
    font-weight: 300;
    margin-left: 20px;
  }

  &:focus {
    outline: none;
  }
}

.friend-drawer {
  padding: 10px 15px;
  display: flex;
  vertical-align: baseline;
  background: #fff;
  transition: .3s ease;
  
  &--grey {
    background: #eee;
  }
  
  .text {
    margin-left: 12px;
    width: 70%;
    
    h6 {
      margin-top: 6px;
      margin-bottom: 0;
    }
    
    p {
      margin: 0;
    }
  }
  
  .time {
    color: grey;
  }
  
  &--onhover:hover {
    background: $blue;
    cursor: pointer;
    
    p,
    h6,
    .time {
      color: #fff !important;
    }
  }
}

hr {
  margin: 5px auto;
  width: 60%;
}

.chat-bubble {
  padding: 10px 14px;
  background: #eee;
  margin: 10px 30px;
  border-radius: 9px;
  position: relative;
  animation: fadeIn 1s ease-in;
  
  &:after {
    content: '';
    position: absolute;
    top: 50%;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
  }
  
  &--left {
     &:after {
      left: 0;
      border-right-color: #eee;
	    border-left: 0;
      margin-left: -20px;
    }
  }
  
  &--right {
    &:after {
      right: 0;
      border-left-color: $blue;
	    border-right: 0;
      margin-right: -20px;
    }
  }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}


.offset-md-9 {
  .chat-bubble {
    background: $blue;
    color: #fff;
  }
}
.chat-panel .offset-md-9 .chat-bubble {
    background: #74b9ff;
    color: #fff;
}
.friend-drawer--grey {
    background: #eee;
}
.chat-bubble--left {position:relative; font-size:small;}
.chat-bubble--left:after {
    left: -7px;
    border-right-color: #eee;
    border-left: 0;
    margin-left: -20px;
    position: absolute;
    top: -5px;
    /* width: 20px; */
    /* height: 20px; */
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
    font-weight: 900;
    content: '\f0d9';
    font-family: 'Font Awesome 5 Free';
    color: #eee;
    font-size: 30px;
}
.chat-bubble--right {position:relative; font-size:small;}
.chat-bubble--right:after {
    right: -7px;
    border-right-color: #74b9ff;
    border-left: 0;
    margin-right: -20px;
    position: absolute;
    top: -5px;
    /* width: 20px; */
    /* height: 20px; */
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
    font-weight: 900;
    content: '\f0da';
    font-family: 'Font Awesome 5 Free';
    color: #74b9ff;
    font-size: 30px;
}
.chat-box-tray {
  background: #eee;
  display: flex;
  align-items: baseline;
  padding: 10px 15px;
  align-items: center;
  margin-top: 19px;
  bottom: 0;
  
  input {
    margin: 0 10px;
    padding: 6px 2px;
  }
  
  i {
    color: grey;
    font-size: 30px;
    vertical-align: middle;
    
    &:last-of-type {
      margin-left: 25px;
    }
  }
}
.msent .alert-success { width:100%;}
</style>
<script>
  $(document).ready(function () {
  
   
 
  

    
	
	$('#formId').validate({ // initialize the plugin
	 
	 
        rules: {
            message_text: {
                required: true,
				 minlength: 10,
			 },
			  
			 
		 	 
		 	 
        },
		 messages: {
                
                message_text: "Please type message",
				 
                
                
            },
    });

});
 
  </script>
<meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">
<span><a href="{{route('page.messaging')}}">Message Board</span>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between msent mb-0">
           
          @include('includes.messages')
          </div>

          
		  <?php 
		  $document=0;
		  $sqldoc=DB::table('user_file_upload')->where('user_id',Auth::user()->id)->get();
		  if(count($sqldoc)>0)
		 $document= $sqldoc[0]->upload_status;
		 
		  $founder=0;
		  $sqlfounder=DB::table('founder')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlfounder)>0)
		  $founder= 1;
		  
		   $brand=0;
		  $sqlbrand=DB::table('brand_details')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlbrand)>0)
		  $brand= 1;
		  
		   $bank=0;
		  $sqlbank=DB::table('bank_details')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlbank)>0)
		  $bank= 1;
		  
		  
		  ?>
          <!-- Content Row -->

          <div class="row">



            <!-- Area Chart -->
             
                
                   <div class="card shadow mb-4">
                       
                       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create A Ticket</h6>
                 
                </div>
                
                 <div class="card-body">
                    
    
	 
	                 <div class="row no-gutters">
     <form method="post" action="{{ route('post.createTicket') }}"  enctype="multipart/form-data">
	  {{ csrf_field() }}
    <div class="col-md-12">
        <div class="form-row">
        <div class="form-group col-md-8 ">
    <label for="exampleFormControlSelect1"> <strong>Select Department</strong></label>
    <select class="form-control form-control-sm" id="department" name="department">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  
  
  <div class="form-group col-md-8">
    <label for="exampleFormControlInput1">Subject of Ticket</label>
    <input type="text" class="form-control form-control-sm" id="subject" name="subject" placeholder="Subject" required>
  </div> 
  
  
  <div class="form-group col-md-8">
    <label for="exampleFormControlTextarea1">Your Question</label>
    <textarea class="form-control form-control-sm" id="question" name="question" rows="3" required></textarea>
  </div>
  
   <div class="form-group col-md-8">
    <label for="exampleFormControlFile1">Upload File</label>
    <input type="file" class="form-control-file small" name="file" name="file">
  </div>
   <div class="form-group col-md-8"> <button type="submit" class="btn btn-primary">Submit</button></div>

  </div>
        </div>
		</form>
        </div></div>
                
                       
                       
                   </div>
                
                
                
               
            </div>
<div class="col-xl-2 col-lg-2 ">Ad Placeholder</div>
           
          </div>

         

        </div>
    
@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script>
 function submitDetailsForm() {
       $("#formId").submit();
    }

$(document).ready(function (e) {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		 

 
       
    });
	
	function uploadfile(fileid,filename)
{
    
	 
  var file_data = $('#'+filename).prop("files")[0]; // Getting the properties of file from file field
  var form_data = new FormData(); // Creating object of FormData class
  form_data.append(filename, file_data) // Appending parameter named file with properties of file_field to form_data
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
      
	  // $('.'+filename).hide();
	    $('.'+filename).html('Uploaded[file.pdf]');
		 $('#'+filename).val('');
    }
  });
  
  }

</script>
