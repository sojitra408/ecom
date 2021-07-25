@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Inventory Report</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New Report</a> -->
              <!-- <h6 class="m-0 font-weight-bold text-primary">Settings</h6> -->

            <!-- <div> -->
              <form role="form" action="{{ route('inventory.export') }}" method="post">
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
                        <!--<input type="date" class="form-control form-control-sm" id="to" name="to"  value="{{old('to')}}" data-rule-required="true" data-msg-required="Please Select To date">-->
                        <input id="endDate" name="to"/>
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
                        //   data.addColumn('string', 'User Name');
                        //   data.addColumn('string', 'Email');
                        //   data.addColumn('string', 'Mobile');
                        //   data.addColumn('string', 'City');
                        //   data.addColumn('string', 'Order Id');
                        //   data.addColumn('string', 'Order Date');
                        //   data.addColumn('number', 'Order Status');
                        //   data.addColumn('number', 'Total Price');
                        //   data.addColumn('number', 'Grand Total');
                        //   data.addColumn('number', 'Payment Status');
                        
                        
                        
                        
                        
                          data.addColumn('number', 'Stock');
                          data.addColumn('number', 'Mrp');
                          data.addColumn('number', 'Offer Price');
                          data.addColumn('string', 'Tsin');
                          data.addColumn('string', 'Manufacturing Date');
                          data.addColumn('string', 'Expiry Date');
                       
                          
                          
                          
                          data.addRows([

                              @php
                                foreach($result as $product) {

                                //   echo "['".$product->name."', '".$product->email."','".$product->mobile."', '".$product->city."','".$product->order_id."','".$product->order_date."',".$product->order_status.",".$product->total_price.",".$product->grand_total.",".$product->payment_status.",],";
                                
                                echo "[".$product->stock.",".$product->mrp.",".$product->offer_price.",'".$product->tsin."','".$product->manu_date."','".$product->expiry_date."',],";

                                
                                }
                              @endphp


                          
                          ]);

                          var table = new google.visualization.Table(document.getElementById('table_div'));

                          table.draw(data, {showRowNumber: true, width: '100%', height: '100%', page: 'enable', pageSize: '10'});
                        }
                    </script>
                  </head>
                  <body>
                    <div id="table_div"></div>
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