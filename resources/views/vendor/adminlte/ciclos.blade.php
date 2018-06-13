@extends('adminlte::layouts.app')

@section('window-modal')

<!-- Modal -->
<div class="modal fade in" id="cicloModal" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ciclo Presupuestario</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Cod.</th>
                  <th>Ciclo</th>          
                  <th>Status</th>
                </tr>
			         @foreach ($ciclos as $ciclo)
                <tr>
                  <td>{{{ $ciclo->id }}}</td>
                  <td>{{ $ciclo->descripcion }}</td>
                  <td>
                    @switch($ciclo->estado)
                        @case(0)
                            <span class="label label-md label-warning">Bloqueado</span>
                            @break

                        @case(1)
                            <span class="label label-md label-success">En Proceso</span>
                            @break

                        @default
                            <span class="label label-md label-danger">Cerrado</span>
                    @endswitch                    
                    
                    <!-- <input type="radio" name="optionsRadios" id="opcionCiclos" value="{{ $ciclo->codigo }}"> -->
                    <!-- <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                      <div class="btn-group" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-default btn-sm" value="{{-- $empresa->EMPRESA --}}">
                           <i class="fa fa-square text-blue"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm active">
                           <i class="fa fa-square text-red"></i>
                        </button>
                      </div>
                    </div> -->
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
        <button id="btnCiclosCerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button id="btnCiclosAplica" type="button" class="btn btn-default" disabled>Aplicar</button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $("input[type=radio][name=optionsRadios]").click(function() { 
      $("#btnCiclosAplica").removeAttr('disabled');
      //alert($(this).attr('value'));
      //alert($("input[name='optionsRadios']:checked").val());
    });

    $("#btnCiclosAplica").click(function() {
      $("#btnCiclosAplica").attr('disabled','disabled');
      //$(this).ajaxPost('listarVentas','GET','#principalPanel'); 
      $("#btnCiclosAcepta").removeAttr('disabled');
    });    
</script>

@endsection