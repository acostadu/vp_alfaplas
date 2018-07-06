@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{-- trans('adminlte_lang::message.home') --}}
@endsection

@section('contentheader_title')
<div class="row">
  <div class="col-xs-3">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input class="form-control" value="" id="daterange" readonly="" type="text">
    </div><!-- /input-group -->
  </div>
  <div class="col-xs-3">
    <!-- <div class="input-group">
      <select id="sale_by" class="form-control" onchange="load(1);">
        <option value="">Selecciona vendedor </option>
        <option value="1">Usuario demo</option> 
      </select>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="alert('Buscar')"><i class="fa fa-search"></i></button>
      </span>
    </div> -->  
  </div>
  <div class="col-xs-1">
    <div id="loader" class="text-center"></div>
  </div>
  <div class="col-xs-5 ">
    <div class="btn-group pull-right">
      <button type="button" onclick="alert('Imprimir')" class="btn btn-default">
        <i class="fa fa-print"></i> Imprimir
    </button>
    </div>
  </div>
</div>

<script type="text/javascript">

  $('#daterange').daterangepicker({
    "ranges": {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
        'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment()], //.endOf('month')
        'Último Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },            
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "calendarWeeks": true,
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
    "linkedCalendars": false,
    "autoUpdateInput": true,
    "opens": "right",
    "alwaysShowCalendars": true,
    "startDate": convertDateFormat('{!! $fe_inicio !!}'),
    "endDate": convertDateFormat('{!! $fe_fin !!}')            
  });

  $('#daterange').on('apply.daterangepicker', function(ev, picker) {

    var fe_ini = picker.startDate.format('YYYY-DD-MM');
    var fe_fin = picker.endDate.format('YYYY-DD-MM');

    $('#spinner').modal('show'); 

    $(this).ajaxPost('notaCrdtoVentaFE/001/'+ fe_ini + '/' + fe_fin, 'GET', '#principalPanel');
    console.log(fe_ini);
    console.log(fe_fin);
  });       
  
</script>

@endsection

@section('main-content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Nota Credito Venta (FE)</h3>
      <div class="box-tools">
        <div class="btn-group">
          <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li><a href="#">Por Vendedor</a></li>
            <li><a href="#">Por Cliente</a></li>
            <li><a href="#">Por Documento</a></li>
            <li class="divider"></li>
            <li><a href="#">Por Fecha</a></li>
          </ul>
        </div>          
      </div>
    </div>
    <!-- /.box-header -->
		<div class="box-body table-responsive">
		  <table class="table table-condensed table-hover table-striped">
        <tr>
          <th>Empresa</th>
          <th>Correlativo</th>            
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Moneda</th>
          <th>Vigencia</th>
          <th>Bodega</th>
          <th>Vendedor</th>
          <th>Total Ingreso</th>
          <th></th>
        </tr>
			@foreach ($nc_venta_fe as $data)
        <tr>
          <td>{{ $data->empresa }}</td>
          <td><a href="#">{{ $data->correlativo }}</a></td>
          <td>{{ $data->idctacte }}</td>
          <td>{{ $data->fecha }}</td>
          <td>{{ $data->moneda }}</td>
          <td>{{ $data->vigencia }}</td>
          <td>{{ $data->bodega }}</td>
          <td>{{ $data->vendedor }}</td>
          <td>{{ $data->totalingreso }}</td>
          <td><span class="label label-success">Activo</span></td>
        </tr>
			@endforeach

		  </table>
		</div>
            <!-- /.box-body -->
      <div class="box-footer clearfix">
        <div class="pull-right">{{ $nc_venta_fe->links() }}</div>
      </div>            
      <!-- <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div> -->
            
          </div>
          <!-- /.box -->
        </div>
      </div>		

@endsection