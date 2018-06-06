@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Despacho Venta (FE): Alfapet SPA - Año: 2017</h3>

      <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
		    <tr>
		      <th>Empresa</th>
		      <th>Documento</th>            
		      <th>Correlativo</th>
          <th>Fecha</th>
          <th>Moneda</th>
          <th>Bodega</th>
          <th>Vendedor</th>
          <th>Total Ingreso</th>
		    </tr>
			@foreach ($desp_venta_fe as $data)
		    <tr>
		      <td>{{ $data->empresa }}</td>
		      <td>{{ $data->tipodocto }}</td>
          <td>{{ $data->correlativo }}</td>
          <td>{{ $data->fecha }}</td>
          <td>{{ $data->moneda }}</td>
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
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
            
          </div>
          <!-- /.box -->
        </div>
      </div>		

@endsection