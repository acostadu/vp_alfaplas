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
              <table class="table table-hover table-condensed table-striped">
                <tr>
                  <th>ID</th>
                  <th>Ciclo</th>
                  <th>Usuario Apertura</th> 
                  <th>Usuario Cierre</th>            
                  <th>Estado</th>
                </tr>
			         @foreach ($ciclos as $ciclo)
                <tr>
                  <td>{{{ $ciclo->id }}}</td>
                  <td>{{ $ciclo->descripcion }}</td>
                  <td>Luis Ortega</td>
                  <td>Sandra Vallejos</td>
                  <td>
                    @switch($ciclo->estado)
                        @case(0)
                            <span class="label label-md label-warning">Bloqueado</span>
                            @break

                        @case(1)
                            <span class="label label-md label-success">En Proceso</span>
                            @break

                        @default
                            <span class="label label-md label-danger">Finalizado</span>
                    @endswitch
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
        <button id="btnCiclosCerrar" type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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