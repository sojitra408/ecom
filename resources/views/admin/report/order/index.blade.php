@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Order Report</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New Report</a> -->
              <!-- <h6 class="m-0 font-weight-bold text-primary">Settings</h6> -->

            <!-- <div> -->
            
            <div class="row">
                <div class="col-sm-6">
              <form role="form" action="{{ route('orderreport.export') }}" method="post">
                {{ csrf_field() }}
                 <!-- @include('includes.messages') -->
                <div class="row"> 
                      <div class="form-group">
                        <label for="form">From</label>
                        <input id="startDate" class="startDate" name="from"/>
                        <!--<input type="date" class="form-control form-control-sm" id="from" name="from"  value="{{old('from')}}" data-rule-required="true" data-msg-required="Please Select From date">-->
                        @if ($errors->has('from'))
                            <span class="help-block valid_error alert-danger">
                              <strong>{{ $errors->first('from') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="to">To</label>
                        <input id="endDate" name="to"/>
                        <!--<input type="date" class="form-control form-control-sm" id="to" name="to"  value="{{old('to')}}" data-rule-required="true" data-msg-required="Please Select To date">-->
                         @if ($errors->has('to'))
                            <span class="help-block valid_error alert-danger">
                              <strong>{{ $errors->first('to') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
              </form>
              
              <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap',
            // iconsLibrary: 'fontawesome',
            // minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap',
            // iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
              </div>
              <div class="col-sm-6">
              
              <form role="form" action="{{ route('admin.orderreport.status') }}" method="get">
                {{ csrf_field() }}
                 <!-- @include('includes.messages') -->
                <div class="row"> 
                      <div class="form-group">
                        <label for="form">Order Status</label>
                        <select name="order_status" class="form-control form-control-sm custom-select-sm">
						  <option value="no" >Select Status</option>
						  <option value="0">Pending</option>
						  <option value="1">Received</option>					
						  <option value="8">Completed </option>
						</select>
                    </div>

                  
                </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-sm">Filter</button>
              </form>
              </div>
              
              </div>
            <!-- </div> -->

            </div>
            
            <div class="card-body">
             
              <div class="table-responsive">

                <html>
                  <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['table']});
                        google.charts.setOnLoadCallback(drawTable);

                        function drawTable() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Name');
                          data.addColumn('string', 'Email');
                          data.addColumn('string', 'Mobile');
                          data.addColumn('string', 'Order Id');
                          data.addColumn('string', 'Order Date');
                          data.addColumn('string', 'Order Status');
                          data.addColumn('number', 'Grand Total');
                          data.addColumn('string', 'Payment Status');

                          data.addRows([

                              @php
                                foreach($result as $product) {
                                    
                                    switch($product->order_status)
                                    {
                                        case 0:
                                            $order_status1 = "Pending";
                                        break;
                                        
                                        case 1:
                                            $order_status1 = "Received";
                                        break;
                                        
                                        case 2:
                                            $order_status1 = "Cancle";
                                        break;
                                        
                                        case 7:
                                            $order_status1 = "In Progress";
                                        break;
                                        
                                        case 8:
                                            $order_status1 = "Completed";
                                        break;
                                        
                                        default:
                                            $order_status1 = "Ready to ship";
                                    }
                                    
                                    switch($product->payment_status)
                                    {
                                        
                                        // case 0:
                                        //     $payment_status1 = "Pending";
                                        // break;
                                        
                                        case 1:
                                            $payment_status1 = "Received";
                                        break;
                                        
                                        default:
                                            $payment_status1 = "Pending";
                                    }
                                    

                                  echo "['".$product->name."', '".$product->email."','".$product->mobile."','".$product->order_id."','".$product->order_date."','".$order_status1."',".$product->grand_total.",'".$payment_status1."',],";

                                }
                              @endphp


                          ]);

                          var table = new google.visualization.Table(document.getElementById('table_div'));

                          table.draw(data, {showRowNumber: true, width: '100%', height: '100%', page: 'enable', pageSize: '10'});
                        }
                    </script>
                    
                    
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                          
                            @php
                                
                                foreach($count_received_order_final as $received_order) {
                                    
                                    
                                    
                                    switch($received_order->order_status)
                                    {
                                        
                                        case 0:
                                            $order_status1 = "Pending";
                                        break;
                                        
                                        case 1:
                                            $order_status1 = "Received";
                                        break;
                                        
                                        case 2:
                                            $order_status1 = "Cancle";
                                        break;
                                        
                                        case 7:
                                            $order_status1 = "In Progress";
                                        break;
                                        
                                        case 8:
                                            $order_status1 = "Completed";
                                        break;
                                        
                                        default:
                                            $order_status1 = "Ready to ship";
                                    }
                                    
                                    
                                    
                                    echo "['".$order_status1."', ".$received_order->total_order."],";
                                }
                                
                                
                                
                            @endphp
                      
                          
                        ]);

                        var options = {
                          title: 'My Daily Orders'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                      }
                    </script>
                    
                    
                    
                    
                  </head>
                  <body>
                    <div id="table_div"></div>
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                  </body>
                </html>
                 
              </div>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
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