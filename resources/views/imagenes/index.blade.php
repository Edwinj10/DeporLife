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
          <h3>Listado de Imagenes<a href="/fotos/create"><button class="btn btn-success">Nuevo</button></a></h3>
              @include('imagenes.search')
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Creador</th>
          <th>Imagen</th>
          <th>Opciones</th>
          
        </thead>
        @foreach ($imagenes as $imagen)
        <tr>
          
          <td>{{ $imagen->titulo}}</td>
          <td>{{ $imagen->descripcion}}</td>
          <td>{{ $imagen->name}}</td>
          <td>
            <img src="{{asset('imagenes/imagenes/'.$imagen->foto)}}" alt="{{ $imagen->titulo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>

            <a href="" data-target="#modal-edit-{{$imagen->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
            <a href="{{URL::action('PublicacionesController@show',$imagen->id )}}"><button class="btn btn-info">Detalles</button></a>
            <a href="" data-target="#modal-delete-{{$imagen->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        @include('imagenes.modal')
        @include('imagenes.modaledit')
        
        @endforeach
      </table>
    </div>
    {{$imagenes->render()}}
  </div>
</div>      
@stop