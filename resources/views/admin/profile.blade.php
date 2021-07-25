@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <?php $values=App\Models\admin\role::where('id',Auth::user()->role_id)->first(); ?>
          <h1 class="h3 mb-2 text-gray-800">{{$values->name}} Profile</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('admin.password.save',$users->id) }}" method="post">
                    <input type="hidden" name="id" id="id" value="{{$users->id}}">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages') 
                    <p id="success_msg" class=""></p>
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="first_name">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"  value="{{$users->name}}">
                                </div>
                                </div>
                                 
                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$users->email}}" readonly>
                                </div>
                                </div>
                                
                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" >
                                    <p id="password_message" style="color:red"></p>
                                </div> 
                                </div> 
                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="password_confirmation"> Confirm Password</label>
                                    <input type="password_confirmation" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" >
                                    <p id="password_confirmation_message" style="color:red"></p>
                                </div> 
                                </div> 
                                
                                
                                                        
                                

                                
                                
                            </div>
                            
                             <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
                                    
                                </div> 
                            </div>
                </form>
            </div>
        </div>

        <!-- otp Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form id="otpdata">
          
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Otp Verify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <input type="hidden" id="password" name="password" value="">
         <input type="text" name="otp" id="otp" value="" class="form-control">
         <p id="response_msg" style="color:red"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="otpVerify" class="btn btn-primary">Verify</button>
      </div>
    </div>
    </form>
  </div>
</div> 

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 


<script>
$(document).ready(function(e) {
    
$('body').on('click', '#submit', function (event) {

    event.preventDefault();
    var id = $("#id").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var name = $("#first_name").val();
    var email = $("#email").val();
    var message = 'Confirm Password is required';
    

    if(password  != "")
    {
        if(password_confirmation == '')
        {
            $('#password_confirmation_message').html(message);
        }
        else if(password != password_confirmation)
        {
            $('#password_message').html("Password and Confirm Password does not match");
        }
        else
        {
            $.get('change_password-otp', function () {
                 
                 $('#otpModal').modal('show');
                 
             })

        }


    }
    else
    {
        $.ajax({
      url: 'password-save/'+ id,
      type: "POST",
      data: {
        id: id,
        first_name: name,
        email:email,
        "_token": "{{ csrf_token() }}",
      },
      dataType: 'json',
      success: function (data) {
        $('#otpModal').modal('hide');
          if(data.success == true)
          {
            $('#success_msg').addClass('alert alert-success').text(data.message);
          }
         
          
      }
  });
    }

    
});

$('body').on('click', '#otpVerify', function (event) {
    
    event.preventDefault()
    var otp = $("#otp").val();
    var id = $("#id").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var name = $("#first_name").val();
    var email = $("#email").val();
   
    $.ajax({
      url: 'change_password-otp/verify',
      type: "POST",
      data: {
        otp:otp,
        id: id,
        first_name: name,
        email:email,
        password,password,
        "_token": "{{ csrf_token() }}",
      },
      dataType: 'json',
      success: function (data) {
        $('#otpModal').modal('hide');
          if(data.success == true)
          {
            $('#success_msg').addClass('alert alert-success').text(data.message);
          }else
          {
            $('#success_msg').addClass('alert alert-danger').text(data.message);
          }
          
      }
  });
});

});

</script>