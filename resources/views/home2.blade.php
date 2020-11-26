@extends('layouts.admin')
@section('content')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
   <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" />
<div class="content"> 
    <div class="container-fluid">
        <div class="row">
         <div class="col-8"></div>
              <div class="col-1">
             @if(isset($countcasedaily))
             <h3>Daily</h3>
             @elseif(isset($countcaseweekly))
              <h3>Weekly</h3>    
             @elseif(isset($countcasemonthly))
               <h3>Monthly</h3>   
               @endif    
                  
            </div>
         <div class="col-3">
        
             <a href="/admin/cases/case-count"><button type="button" class="btn btn-info">Daily</button></a>
             
            <a href="/admin/cases/weeklyCase"><button type="button" class="btn btn-primary">Weekly</button></a>
             <a href="/admin/cases/monthlyCase"><button type="button" class="btn btn-success">Monthly</button></a>
            
          </div>
       
        </div>
        <br>
            <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  @if(isset($countcasedaily))
                <h3>{{$countcasedaily}} </h3>
                  @elseif(isset($countcaseweekly))
                  <h3>{{$countcaseweekly}} </h3>
                  @elseif(isset($countcasemonthly))
                  <h3>{{$countcasemonthly}} </h3>
                  @endif

                <p>Case Number</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @if(isset($countpaymentdaily))
                <h3>{{$countpaymentdaily}} </h3>
                  @elseif(isset($countPaymentweekly))
                  <h3>{{$countPaymentweekly}} </h3>
                  @elseif(isset($countpaymentmonthly))
                  <h3>{{$countpaymentmonthly}} </h3>
                  @endif

                <p>Payment Number</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
        
        
        
        
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
<!--              <div class="card-header">-->
<!--                <h3 class="card-title">Area Chart</h3>-->

<!--
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
-->
<!--              </div>-->
<!--              <div class="card-body">-->
<!--        <canvas id="areaChart" ></canvas>-->
<!--              </div>-->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
<!--            <div class="card card-danger">-->
<!--
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
-->
<!--              <div class="card-body">-->
<!--                <canvas id="pieChart"  ></canvas>-->
<!--              </div>-->
              
<!--            </div>-->
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
               
            </div>
        <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-success">
<!--
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
-->
<!--
              <div class="card-body">
                <div class="chart">
-->
                  
<!--
                </div>
              </div>
-->
               
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
<!--
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
               /.card-body 
            </div>
-->
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
        
        
      
        
           
        
        
<!--
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
               /.card-body 
            </div>
-->
    
</div>
</div>




@endsection
 
 <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
 <script src="{{ asset('dist/js/demo.js') }}"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
//    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

//    var areaChartData = {
//      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//      datasets: [
//        {
//          label               : 'Digital Goods',
//          backgroundColor     : 'rgba(60,141,188,0.9)',
//          borderColor         : 'rgba(60,141,188,0.8)',
//          pointRadius          : false,
//          pointColor          : '#3b8bba',
//          pointStrokeColor    : 'rgba(60,141,188,1)',
//          pointHighlightFill  : '#fff',
//          pointHighlightStroke: 'rgba(60,141,188,1)',
//          data                : [28, 48, 40, 19, 86, 27, 90]
//        },
//        {
//          label               : 'Electronics',
//          backgroundColor     : 'rgba(210, 214, 222, 1)',
//          borderColor         : 'rgba(210, 214, 222, 1)',
//          pointRadius         : false,
//          pointColor          : 'rgba(210, 214, 222, 1)',
//          pointStrokeColor    : '#c1c7d1',
//          pointHighlightFill  : '#fff',
//          pointHighlightStroke: 'rgba(220,220,220,1)',
//          data                : [65, 59, 80, 81, 56, 55, 40]
//        },
//      ]
//    }
//
//    var areaChartOptions = {
//      maintainAspectRatio : false,
//      responsive : true,
//      legend: {
//        display: false
//      },
//      scales: {
//        xAxes: [{
//          gridLines : {
//            display : false,
//          }
//        }],
//        yAxes: [{
//          gridLines : {
//            display : false,
//          }
//        }]
//      }
//    }

    // This will get the first returned node in the jQuery collection.
//    var areaChart       = new Chart(areaChartCanvas, {
//      type: 'line',
//      data: areaChartData,
//      options: areaChartOptions
//    })

    //-------------
    //- LINE CHART -
    //--------------
   // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
//     var pieData        = donutData;
//    var pieOptions     = {
//      maintainAspectRatio : false,
//      responsive : true,
//    }
//        var areaChartData = {
//      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//      datasets: [
//        {
//          label               : 'Digital Goods',
//          backgroundColor     : 'rgba(60,141,188,0.9)',
//          borderColor         : 'rgba(60,141,188,0.8)',
//          pointRadius          : false,
//          pointColor          : '#3b8bba',
//          pointStrokeColor    : 'rgba(60,141,188,1)',
//          pointHighlightFill  : '#fff',
//          pointHighlightStroke: 'rgba(60,141,188,1)',
//          data                : [28, 48, 40, 19, 86, 27, 90]
//        },
//        {
//          label               : 'Electronics',
//          backgroundColor     : 'rgba(210, 214, 222, 1)',
//          borderColor         : 'rgba(210, 214, 222, 1)',
//          pointRadius         : false,
//          pointColor          : 'rgba(210, 214, 222, 1)',
//          pointStrokeColor    : '#c1c7d1',
//          pointHighlightFill  : '#fff',
//          pointHighlightStroke: 'rgba(220,220,220,1)',
//          data                : [65, 59, 80, 81, 56, 55, 40]
//        },
//      ]
//    }
//
//    var areaChartOptions = {
//      maintainAspectRatio : false,
//      responsive : true,
//      legend: {
//        display: false
//      },
//      scales: {
//        xAxes: [{
//          gridLines : {
//            display : false,
//          }
//        }],
//        yAxes: [{
//          gridLines : {
//            display : false,
//          }
//        }]
//      }
//    }
//    
//    
//    
//    var lineChartOptions = $.extend(true, {}, areaChartOptions)
//    var lineChartData = $.extend(true, {}, areaChartData)
//    lineChartData.datasets[0].fill = false;
//    lineChartData.datasets[1].fill = false;
//    lineChartOptions.datasetFill = false

//    var lineChart = new Chart(lineChartCanvas, {
//      type: 'line',
//      data: lineChartData,
//      options: lineChartOptions
//    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas2, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    
       var donutChartCanvas2 = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas2, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    }) 
    
    
    
    
    
    
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
//    var pieChart = new Chart(pieChartCanvas, {
//      type: 'pie',
//      data: pieData,
//      options: pieOptions
//    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    
    
    
//         var pieData        = donutData;
//    var pieOptions     = {
//      maintainAspectRatio : false,
//      responsive : true,
//    }
        var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    
    
    
//    var lineChartOptions = $.extend(true, {}, areaChartOptions)
//    var lineChartData = $.extend(true, {}, areaChartData)
//    lineChartData.datasets[0].fill = false;
//    lineChartData.datasets[1].fill = false;
//    lineChartOptions.datasetFill = false
    
    
    
    
    
    
    
    
    
     var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    
    
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>