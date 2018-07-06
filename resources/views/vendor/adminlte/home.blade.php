@extends('adminlte::layouts.app')

@section('contentheader_title')
{{-- 'Panel de Control' --}}
@endsection

@section('main-content')

<!-- Custom Tabs -->
<div class="nav-tabs-custom" id="myTabs">
   <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="#tab_1" data-toggle="tab">Inicio</a></li>
      <li><a href="#tab_2" id="tab_2" data-toggle="tab">Tab 2</a></li>
      <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
      <li><a href="#tab_4" data-toggle="tab">Tab 4</a></li>              
      <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
   </ul>
   <div class="tab-content">
      <div class="tab-pane fade in active" id="tab_1">
        <?php
          $meses = [
            'Enero', 
            'Febrero', 
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
          ];        
        ?>
        @foreach (array_chunk($meses, 4) as $mes)
          <div class="row">
          @foreach ($mes as $data)
            <div class="col-lg-3 col-xs-6">       
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 align="right">150</h3>
                  <h3>151</h3>
                  <span class="label label-danger">Cerrado</span>

                  <!-- <p>{{-- $data --}}</p> -->
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#"  id="ventas_mensual" data-value="5" class="small-box-footer">
                  <b>{{ $data }}</b> | Más info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          @endforeach
          </div>
        @endforeach        
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane fade" id="tab_2">
    	@section('crudventas')
    		
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

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button> -->
        <h4 class="modal-title">Empresas Relacionadas</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>            
                  <th>Status</th>
                </tr>
				        @foreach ($empresas as $empresa)
                <tr>
                  <td>{{ $empresa->EMPRESA }}</td>
                  <td>{{ $empresa->DESCRIPCION }}</td>
                  <td>
                    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                      <div class="btn-group" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-default btn-sm active">
                           <i class="fa fa-square text-green"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                           <i class="fa fa-square text-red"></i>
                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
