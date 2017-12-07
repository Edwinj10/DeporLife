@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de todos los comentarios <a href="/comentarios/create"><button class="btn btn-success">Nuevo</button></a></h3>
              
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Comentarios</th>
          <th>Estado</th>
          <th>Fechas</th>
          <th>Creador del Comentario</th>
          <th>Titulo de la publicacion comentada</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($comentarios as $com)
        <tr>
          
          <td>{{ $com->comentario}}</td>
          <td>{!!$com->estado!!}</td>
          <td>{!!$com->fecha!!}</td>
          <td>{{ $com->name}}</td>
          <td>{{ $com->titulo}}</td>
          <td>

            <a href="" data-target="#modal-edit-{{$com->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>  
            <a href="" data-target="#modal-delete-{{$com->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        @include('comentarios.edit')
        @include('comentarios.modal')
        
        @endforeach
      </table>
    </div>
    {{$comentarios->render()}}
  </div>
</div>      
@stop