@extends('adminlte::layouts.app')

@section('main-content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Reporte de Ventas por Vendedor: Alfaplas - Mes: Mayo</h3>
  </div>
  <div class="box-body no-padding">
    <table class="table table-striped">
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