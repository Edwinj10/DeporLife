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
          <h3>Listado de Publicaciones <a href="/publicaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
              @include('publicaciones.search')
              <p>
                pagina {{$publicaciones->currentPage()}}
                de {{$publicaciones->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Creador</th>
          <th>Tipo de Deporte</th>
          <th>Top de la Pagina</th>
          <th>Nacional o Internacional</th>
          <th>Imagen</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($publicaciones as $publicacion)
        <tr>
          
          <td>{{ $publicacion->titulo}}</td>
          <td>{!! $publicacion->resumen!!}</td>
          <td>{{ $publicacion->name}}</td>
          <td>{{ $publicacion->categoria}}</td>
          <td>{{ $publicacion->importante}}</td>
          <td>{{ $publicacion->tipo}}</td>
          <td>
            <img src="{{asset('imagenes/publicaciones/'.$publicacion->foto)}}" alt="{{ $publicacion->titulo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>

            <a href="" data-target="#modal-edit-{{$publicacion->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>  
            <a href="" data-target="#modal-delete-{{$publicacion->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        @include('publicaciones.modal')
        @include('publicaciones.modaledit')
        
        @endforeach
      </table>
    </div>
    {{$publicaciones->render()}}
  </div>
</div>      
@stop