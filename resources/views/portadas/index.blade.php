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
          <h3>Listado de Imagenes de Portada <a href="/portadas/create"><button class="btn btn-success">Nuevo</button></a></h3>
             @include('portadas.search')
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Creador</th>
          <th>Imagen</th>
          <th>Editar</th>
          <th>Ver Mas</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($portadas as $portada)
        <tr>
          
          <td>{{ $portada->titulo}}</td>
          <td>{!! $portada->resumen!!}</td>
          <td>{{ $portada->name}}</td>
          <td>
            <img src="{{asset('imagenes/portada/'.$portada->foto)}}" alt="{{ $portada->titulo}}" height="100px" width="100px" class="img-thumbail">
          </td>
          <td>
            <a href="" data-target="#modal-edit-{{$portada->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>
            <a href="{{URL::action('PortadaController@show',$portada->id )}}"><button class="btn btn-info">Detalles</button></a>
          </td>
          <td>
            <a href="" data-target="#modal-delete-{{$portada->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>

        </tr>
        
        @include('portadas.modal')
        @include('portadas.modaledit')
      
        @endforeach
      </table>
    </div>
    {{$portadas->render()}}
  </div>
</div>      
@stop