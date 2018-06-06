<div class="panel panel-primary">
<div class="panel-heading">Presupuesto - Año: 2018</div>
<div class="panel-body">
  <button id="btn_add" name="btn_add" class="btn btn-primary pull-right">Nuevo Producto</button>
  <table class="table">
    <thead>
      <tr><span>
        <th>ID</th>
        <th>Mes</th>
        <th>Presupuesto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="productos-list" name="productos-list">
      @foreach ($productos as $producto)
      <tr id="producto{{$producto->id}}">
        <td>{{$producto->id}}</td>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->descripcion}}</td>
        <td>
          <div class="btn-group">
            <button class="btn btn-warning btn-detail open_modal" value="{{$producto->id}}">
              <i class="fa fa-pencil-square-o"></i>
            </button>
            <button class="btn btn-danger btn-delete delete-producto" value="{{$producto->id}}">
            	<i class="fa fa-trash-o"></i>
            </button>
          </div>                
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>