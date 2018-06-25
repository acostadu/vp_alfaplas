@extends('adminlte::layouts.app')

@section('window-modal')

<!-- Modal -->
<div class="modal fade in" id="empresaModal" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Empresas Relacionadas</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Cod.</th>
                  <th>Rut</th>
                  <th>Descripción</th>            
                  <th>Status</th>
                </tr>
			         @foreach ($empresas as $empresa)
                <tr>
                  <td>{{{ $empresa->codigo }}}</td>
                  <td>{{ $empresa->rut }}</td>
                  <td>{{ $empresa->descripcion }}</td>
                  <td align="center">
                    <input type="radio" name="optionsRadios" id="opcionEmpresas" value="{{ $empresa->codigo }}">
                    <!-- <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                      <div class="btn-group" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-default btn-sm" value="{{ $empresa->EMPRESA }}">
                           <i class="fa fa-square text-red"></i>
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
        <!-- <button id="btnEmpresasAcepta" type="button" class="btn btn-default" data-dismiss="modal" disabled>Aceptar</button> -->
        <button id="btnEmpresasAplica" type="button" class="btn btn-default" data-dismiss="modal" disabled>Aplicar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $("input[type=radio][name=optionsRadios]").click(function() { 
      $("#btnEmpresasAplica").removeAttr('disabled');
      //alert($(this).attr('value'));
      //alert($("input[name='optionsRadios']:checked").val());
    });

    $("#btnEmpresasAplica").click(function() {
      //$("#btnEmpresasAplica").attr('disabled','disabled');
      //$(this).ajaxPost('listarVentas','GET','#principalPanel'); 
      $(this).ajaxPost('dashboard/'+ $("input[name='optionsRadios']:checked").val() +'/2018','GET','#principalPanel'); 
      //$("#btnEmpresasAcepta").removeAttr('disabled');
    });    
</script>

@endsection