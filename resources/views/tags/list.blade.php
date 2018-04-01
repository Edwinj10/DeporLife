<table class="table table-striped table-bordered table-list table-hover" id="dev-table">
  <thead>
    <tr>
      <th><em class="fa fa-cog"></em></th>
      <!-- <th class="hidden-xs">ID</th> -->
      <th>Etiqueta</th>
    </tr> 
  </thead>
  <tbody>
    <tr>
      @foreach ($tags as $tag)
      <td align="center">
        <a class="btn btn-default" onclick='Mostrar({{$tag->id}});' data-toggle='modal' data-target='#myModalEditar'><em class="fa fa-pencil"></em></a>
        <a href="#" class="btn btn-danger" onclick='Eliminar({{$tag->id}});'><em class="fa fa-trash"></em></a>
      </td>

      <td>{{ $tag->etiqueta}}</td>
    </tr>
    
    @endforeach
  </tbody>
</table>
<div class="panel-footer">
  <div class="row">
    <div class="col-xs-8">
      {{$tags->render()}}
    </div>
  </div>
</div>