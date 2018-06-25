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
                  <h3>{{ $neto }}</h3>

                  <p>{{ $data->descripcion }}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" id="ventas_mensual" data-value="{{ $data->id }}" class="small-box-footer">
                  Más info <i class="fa fa-arrow-circle-right"></i>
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

@endsection
