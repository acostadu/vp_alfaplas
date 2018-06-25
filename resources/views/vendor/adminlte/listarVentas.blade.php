@extends('adminlte::layouts.app')

@section('main-content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de ventas 2018</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <p class="text-center">
              <strong>Ventas 2018</strong>
            </p>
            <div class="chart">
              <canvas id="barChart" style="height:380px"></canvas>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fa fa-tags"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Inventario Neto</span>
                <span class="info-box-number">64,165,889.24</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  Productos en stock: 9                  </span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->

            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-money"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Ventas 2018</span>
                <span class="info-box-number">4,083,616,846.49</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Facturas emitidas: 341</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->

            <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Compras 2018</span>
                <span class="info-box-number">278,681,893.30</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Compras realizadas: 141</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->

            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fa fa-users "></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number">188</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <!-- <span class="progress-description">Clientes nuevos: 16</span> -->
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- ./box-body -->
      <div class="box-footer">
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Reporte de Ventas por Vendedor: Alfaplas - Mes: Mayo</h3>
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
          <th>Avance</th>
          <th>Acciones</th>
        </tr>
        @foreach ($ventas as $venta)
          <?php $total = $total+round($venta->Total) ?>
          <tr>
            <td>{{ $venta->Vendedor }}</td>
            <td>{{ number_format(round($venta->Total), 0,",",".") }}</td>
            <td><span class="label label-success">%%</span></td>
            <td>
              <div class="btn-group">
                <button id="modal_detail" class="btn btn-warning btn-detail btn-sm" value="{{$venta->Vendedor}}">
                  <i class="fa fa-search"></i>
                </button>
<!--                 <button class="btn btn-primary btn-delete delete-producto" value="{{$venta->Vendedor}}">
                  <i class="fa fa-edit"></i>
                </button>                
                <button class="btn btn-danger btn-delete delete-producto" value="{{$venta->Vendedor}}">
                  <i class="fa fa-trash-o"></i>
                </button> -->
              </div>                
            </td>
          </tr>
          
        @endforeach
        <tr>
          <td><b>VENTAS TOTAL MES</b></td>
          <td><b>{{ number_format($total, 0,",",".") }}</b></td>            
          <td><span class="label label-success">%%</span></td>
          <td>
            <div class="btn-group">
              <button id="modal_detail" class="btn btn-warning btn-detail btn-sm" value="">
                <i class="fa fa-search"></i>
              </button>
            </div>            
          </td>
        </tr>
    </table>
  </div>
</div>
@endsection