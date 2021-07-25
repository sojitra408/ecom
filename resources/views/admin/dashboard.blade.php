@extends('admin.layout')

@section('content')

     <div class="container-fluid">



          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <a href="{{route('admin.seller')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

          </div>



          <!-- Content Row -->

          <div class="row">



            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total orders</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_order}}</div>

                    </div>

                    <div class="col-auto">

                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>

              </div>

            </div>



            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed orders</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_completed_order}}</div>

                    </div>

                    <div class="col-auto">

                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>

              </div>

            </div>



            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-info shadow h-100 py-2">

                <div class="card-body">

                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products</div>

                      <div class="row no-gutters align-items-center">

                        <div class="col-auto">

                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_product}}</div>

                        </div>

                        

                      </div>

                    </div>

                    <div class="col-auto">

                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>

              </div>

            </div>

			 <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-info shadow h-100 py-2">

                <div class="card-body">

                  <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registered Users</div>

                      <div class="row no-gutters align-items-center">

                        <div class="col-auto">

                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_user}}</div>

                        </div>

                        

                      </div>

                    </div>

                    <div class="col-auto">

                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>

                  </div>

                </div>

              </div>

            </div>



            

          </div>



          <!-- Content Row -->



          <div class="row">



            <!-- total order per month Area Chart -->

            <div class="col-12 col-xl-12 col-lg-12">

              <div class="card shadow mb-4">

                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="m-0 font-weight-bold text-primary">Total Orders last 30 Days</h6>

                 

                </div>

                <!-- Card Body -->

                <div class="card-body p-0 m-0">
   
                      <html>
                  <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                         
                            ['Date', 'Order'],
                            // [13-06-2021, 5],
                            // [18-06-2021, 18],
                            // [05-06-2021, 40],
                            // [25-06-2021, 50],
                            
                            
                            @php
                                
                                foreach($count_order_month as $order) {
                                    // echo $order->date;
                                    echo "['".$order->date."', ".$order->total_order."],";
                                }
                                
                                
                                
                            @endphp
                          
                          
                            
                      
                          
                        ]);

                        var options = {
                          title: 'My Orders'
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                      }
                    </script>




                  </head>
                  <body>
                    <div id="table_div"></div>

                    <div id="piechart"></div>
                  </body>
                </html>
                 

                </div>

              </div>

            </div>
            
            
            <!-- total cancle order per month  -->
            
            <div class="col-12 col-xl-12 col-lg-12">

              <div class="card shadow mb-4">

                <!-- Card Header - Dropdown -->

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="m-0 font-weight-bold text-primary">Cancelled Orders last 30 Days</h6>

                </div>

                <!-- Card Body -->

                <div class="card-body">
                    
                    
                      <html>
                  <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                         
                            ['Date', 'Cancle Order'],
                           
                            
                            @php
                                
                                foreach($count_cancle_order_month as $order) {
                                   
                                    echo "['".$order->date."', ".$order->total_order."],";
                                }
                                
                                
                                
                            @endphp
                          
                          
                            
                      
                          
                        ]);

                        var options = {
                          title: 'My Orders'
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById('piechartt'));

                        chart.draw(data, options);
                      }
                    </script>




                  </head>
                  <body>
                    <div id="table_div"></div>

                    <div id="piechartt"></div>
                  </body>
                </html>

                  

                </div>

              </div>

            </div>



           

          </div>



      



        </div>

    

@endsection

