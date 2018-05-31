<table class="table table-striped table-bordered table-list table-hover" id="dev-table">
  <thead>
    <tr>
      <th><em class="fa fa-cog"></em></th>
      <!-- <th class="hidden-xs">ID</th> -->
      <th>Categoria</th>
      <th>Fechas</th>
    </tr> 
  </thead>
  <tbody>
    <tr>
      @foreach ($categorias as $cat)
      <td align="center">
        <a class="btn btn-default" onclick='Mostrar({{$cat->id}});' data-toggle='modal' data-target='#myModalEditar'><em class="fa fa-pencil"></em></a>
        <a href="#" class="btn btn-danger" onclick='Eliminar({{$cat->id}});'><em class="fa fa-trash"></em></a>
      </td>

      <td>{!!$cat->categoria!!}</td>
      <td>{!!$cat->created_at!!}</td>
    </tr>
    
    @endforeach
  </tbody>
</table>
<div class="panel-footer">
  <div class="row">
    <div class="col-xs-8">
      {{$categorias->render()}}
    </div>
  </div>
</div>