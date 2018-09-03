@extends('adminlte::layouts.app')

@section('main-content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de Ventas 2018</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <p class="text-center">              
              <strong>{{ $mes }}</strong>
            </p>
            <div class="chart">
              <canvas id="barChart" style="height:380px"></canvas>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <a href="#" onclick="rangeDateDocs('{!! $mesx !!}', 1)">
              <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-tags"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Factura de Venta (FE)</span>
                  <span id="info_fact_venta_fe" class="info-box-number">0</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <!-- <span class="progress-description">Productos en stock: 9</span> -->
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box [Factura de Venta (FE)] -->
            </a>

            <a href="#" onclick="rangeDateDocs('{!! $mesx !!}', 2)">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Nota Credito Venta (FE)</span>
                  <span id="info_nc_venta_fe" class="info-box-number">0</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <!-- <span class="progress-description">Facturas emitidas: 0</span> -->
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box [Nota Credito Venta (FE)] -->
            </a>

            <a href="#" onclick="rangeDateDocs('{!! $mesx !!}', 3)">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Boleta Venta (FE)</span>
                  <span id="info_bta_venta_fe" class="info-box-number">0</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <!-- <span class="progress-description">Compras realizadas: 0</span> -->
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box [Boleta Venta (FE)] -->          
            </a>

            <a href="#" onclick="rangeDateDocs('{!! $mesx !!}', 4)">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-users "></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Factura Exportacion</span>
                  <span id="info_fact_export" class="info-box-number">0</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <!-- <span class="progress-description">Clientes nuevos: 16</span> -->
                </div><!-- /.info-box-content -->
              </div>
            </a><!-- /.info-box [Factura Exportacion] -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- ./box-body -->
      <div class="box-footer">
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <!-- Left col -->
  <div class="col-md-7">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Ranking de Ventas por Vendedor</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
        </div>
      </div>
      <div class="box-body no-padding">
        <table class="table table-hover">
            <tr>
              <th>Vendedor</th>
              <th>Total Neto</th>            
              <th>Cumplimiento</th>
              <th>Acciones</th>
            </tr>
            @foreach ($ventas1 as $venta)
            <?php $total = $total+round($venta->Total) ?>
            <tr>
              <td>{{ $venta->Vendedor }}</td>
              <td>{{ number_format(round($venta->Total), 0,",",".") }}</td>
              <td><span class="label label-success">0%</span></td>
              <td>
                <div class="btn-group">
                  <button id="modal_detail" class="btn btn-warning btn-detail btn-sm" value="{{$venta->Vendedor}}">
                    <i class="fa fa-search"></i>
                  </button>
                  <button id="modal_grafica" class="btn btn-primary btn-delete btn-sm" value="{{$venta->Vendedor}}">
                    <i class="fa fa-edit"></i>
                  </button>                
                  <!--<button class="btn btn-danger btn-delete delete-producto" value="{{$venta->Vendedor}}">
                    <i class="fa fa-trash-o"></i>
                  </button>-->
                </div>                
              </td>
            </tr>          
            @endforeach
            <tr>
              <td><b>VENTAS TOTAL MES</b></td>
              <td><b>{{ number_format($total, 0,",",".") }}</b></td>            
              <td><span class="label label-success">0%</span></td>
              <td>
                <!-- <div class="btn-group">
                  <button id="modal_detail" class="btn btn-warning btn-detail btn-sm" value="">
                    <i class="fa fa-search"></i>
                  </button>
                </div> -->            
              </td>
            </tr>
        </table>
      </div>
    </div>
  </div><!-- /.col -->

  <div class="col-md-5">
    <!-- PRODUCT LIST -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Ranking por Familias</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <canvas id="pieChart" style="width: 647px; height: 323px;" width="647" height="323"></canvas>
      </div><!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="#" class="uppercase" onclick="alert(1)">Más info <i class="fa fa-arrow-circle-right"></i></a>
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>

<div class="row">

  <div class="col-md-12">
    <!-- PRODUCT LIST -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Prueba</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <canvas id="testChart"></canvas>
      </div><!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="#" class="uppercase" onclick="alert(1)">Más info <i class="fa fa-arrow-circle-right"></i></a>
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>

<script type="text/javascript">

  // Rango de fecha para consultar los documentos
  function rangeDateDocs(mes, id) {

    var fe_ini = moment().month(parseInt(mes)).startOf('month').format("YYYY-DD-MM");
    var fe_fin = moment().month(parseInt(mes)).endOf('month').format("YYYY-DD-MM");

    $('#spinner').modal('show');

    switch(id) {
      case 1: // Factura de Venta
        $(this).ajaxPost('facturaVentaFE/001/'+ fe_ini + '/' + fe_fin, 'GET', '#principalPanel');
        break;
      case 2: // Nota de Credito
        $(this).ajaxPost('notaCrdtoVentaFE/001/'+ fe_ini + '/' + fe_fin, 'GET', '#principalPanel');
        //$(this).ajaxPost('notaCrdtoVentaFE/001/', 'GET', '#principalPanel');
        break;
      case 3:
        $(this).ajaxPost('facturaVentaFE/001/'+ fe_ini + '/' + fe_fin, 'GET', '#principalPanel');
        break;
      case 4:
        $(this).ajaxPost('facturaVentaFE/001/'+ fe_ini + '/' + fe_fin, 'GET', '#principalPanel');
        break;            
    }

  } 

  $(function () {

    var ventas = JSON.parse('{!! $ventas2 !!}');
    //console.log(ventas.data);

    var vendedor = [];
    var neto = [];
    var neto_venta = 0;

    for (var i in ventas) {
      vendedor.push(ventas[i].Vendedor);
      neto.push(ventas[i].Total);
      neto_venta += ventas[i].Total;
    }

    //$('#neto_venta').text('$ '+neto_venta);
    //$('#neto_venta').html('$ '+ new Intl.NumberFormat('es-CL', 'CLP').format(neto_venta));

    var documentos = JSON.parse('{!! $documentos !!}');
    console.log(documentos);

    var tipoDoctos = [];
    var netoDoctos = [];

    for (var j in documentos) {
      netoDoctos.push(documentos[j].Total);
      //tipoDoctos.push(documentos[j].tipodocto);

      switch(documentos[j].tipodocto) {
        case 'BOLETA VENTA (FE)':
          $('#info_bta_venta_fe').html('$ '+ new Intl.NumberFormat('es-CL', 'CLP').format(netoDoctos[j]));
          break;
        case 'FACTURA VENTA (FE)':
          $('#info_fact_venta_fe').html('$ '+ new Intl.NumberFormat('es-CL', 'CLP').format(netoDoctos[j]));
          break;
        case 'N. CRDTO VENTA (FE)':
          $('#info_nc_venta_fe').html('$ '+ new Intl.NumberFormat('es-CL', 'CLP').format(netoDoctos[j]));
          break;            
        default:
          $('#info_fact_export').html('$ '+ new Intl.NumberFormat('es-CL', 'CLP').format(netoDoctos[j]));
      }
    }

    var familias = JSON.parse('{!! $familias !!}');
    console.log(familias);

    var familia = [];
    var neto_familia = [];

    for (var k in familias) {
      familia.push(familias[k].Familia);
      neto_familia.push(familias[k].Total);
    }

    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    //

    var areaChartData = {
      labels: vendedor,
      datasets: [
        {
          label: "Meta",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
        },
        {
          label: "Ventas",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: neto
        }
      ]
    };
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : neto_familia[0],
        color    : '#f56954',
        highlight: '#f56954',
        label    : familia[0]
      },
      {
        value    : neto_familia[1],
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : familia[1]
      },
      {
        value    : neto_familia[2],
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : familia[2]
      },
      {
        value    : neto_familia[3],
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : familia[3]
      },
      {
        value    : neto_familia[4],
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : familia[4]
      },
      {
        value    : neto_familia[5],
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : familia[5]
      }
    ];

    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);


    var testChartCanvas = $('#testChart').get(0).getContext("2d");
    var testChart = new Chart(testChartCanvas);
     // The data for our dataset
      /*var data = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
              label: "My First dataset",
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [0, 10, 5, 2, 20, 30, 45],
          }]
      };*/

      /*var data = {
          datasets: [{
              data: [100000000, 200000000, 300000000]
          }],

          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
              'Red',
              'Yellow',
              'Blue'
          ]
      };*/
      var data = [{
          value: 10,
          label: 'Red'
        }, {
          value: 20,
          label: 'Yellow'
        }, {
          value: 30,
          label: 'Blue'
      }];            

      // Configuration options go here
      var options = {};
      testChart.Doughnut(data, options);   

  });

</script>

@endsection