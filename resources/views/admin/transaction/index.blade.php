@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Transaction</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaction Details</h6>
             <span class="small">Only Payments made via Online Mode shown here</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      
                      <th>#</th>
                      <th>Order Id</th>
                      <th>Transaction Id</th>
                      <th>Amount</th>
                      <th>User Name</th>
                      <th>Method Of Payment</th>
                      <th>Status</th>
                      <th>Date</th> 
                    </tr>
                  </thead>
                  <tbody> 
                    <?php if(count($transactions)>0){ 
                      $i =1;
                      foreach($transactions as $trans){ ?>             
                        <tr align="center">
                          <td>{{$i}}</td>
                          <td>{{$trans->order_id}}</td>
                          <td>{{$trans->transaction_id}}</td>
                          <td>{{$trans->amount}}</td>        
                          <td><?php $users=DB::table('users')->select('name')->where('id',$trans->user_id)->first();if(!empty($users)){?>{{$users->name}}<?php } ?></td>                  
                          <td>{{$trans->payment_mode}}</td> 
                          <td><?php if($trans->status == 1){?><span class="badge badge-success">Success</span><?php } else if($trans->status == 0){?><span class="badge badge-danger">Failed</span><?php } ?></td>
                          <td>{{date('Y, M d',strtotime($trans->created_at))}}</td>
                        </tr>
                      <?php $i++; } }else{?>
                        <tr align="center">
                          <td colspan=8>No Record Found</td>
                        </tr>
                      <?php } ?>
                      
                  
                    
                    
                  </tbody>
                  
                  
                </table>
                 
              </div>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
function showpass(id)
{
 var input = $("#pass_log_id"+id);
  
 if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
}
$(document).ready(function() {

 


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>