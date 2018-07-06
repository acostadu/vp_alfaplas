@extends('adminlte::layouts.app')

@section('main-content')

<!-- Custom Tabs -->
<div class="nav-tabs-custom" id="myTabs">
   <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="#tab_1" data-toggle="tab">Visor</a></li>
      <li><a href="#tab_2" id="tab_2" data-toggle="tab">Vendedor</a></li>
      <li><a href="#tab_3" data-toggle="tab">Factura</a></li>
      <li><a href="#tab_4" data-toggle="tab">Detalles</a></li>              
      <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
   </ul>
   <div class="tab-content">
      <div class="tab-pane fade in active" id="tab_1">
        <?php $neto = 0; ?>
        @foreach ($meses->chunk(4) as $mes)
          <div class="row">
          @foreach ($mes as $data)
            @foreach ($ventas as $value)
              @if ($value->fechames == $data->id)
                <?php $neto = $value->Total; ?>
              @endif
            @endforeach

            <div class="col-lg-3 col-xs-6">       
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>$ {{ number_format(round($neto), 0,",",".") }}</h3>

                  <p>Plan: $ 0</p>

                  @if ($data->id > $mes_actual)
                    <span class="label label-warning">Pendiente</span>
                  @elseif ($data->id < $mes_actual)
                    <span class="label label-danger">Finalizado</span>
                  @else
                    <span class="label label-success">En Proceso</span>
                  @endif                  
                  
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                  <a href="#" id="ventas_mensual" data-value="{{ $data->id }}" class="small-box-footer">
                    <b>{{ ucfirst(strtolower($data->descripcion)) }}</b> | Más info 
                    <i class="fa fa-arrow-circle-right"></i>
                  </a>                 
              </div>
            </div>
            <?php $neto = 0; ?>            
          @endforeach
          </div>
        @endforeach        
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane fade" id="tab_2">
    	@section('crud-vendedor')
    		
    	@show              	
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane fade" id="tab_3"></div>
      <!-- /.tab-pane -->

      <div class="tab-pane fade" id="tab_4"></div>
      <!-- /.tab-pane -->
   </div>      
</div>
<!-- nav-tabs-custom -->

<div class="modal fade" id="notificacionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Notificación</h4>
      </div>
      <div class="modal-body">
        <p>Este <b>mes</b> aún no contiene ninguna información</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-outline">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection
