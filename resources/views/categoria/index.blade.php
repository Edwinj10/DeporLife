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
          <h3>Listado de Categorias <a href="/categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
              
      </div>
  </div>
  <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Id</th>
          <th>Categoria</th>
          <th>Fechas</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($categorias as $cat)
        <tr>
          
          <td>{{ $cat->id}}</td>
          <td>{!!$cat->categoria!!}</td>
          <td>{!!$cat->created_at!!}</td>
         
          <td>

            <a href="" data-target="#modal-edit-{{$cat->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>  
            <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
          </td>
        </tr>
        @include('categoria.modaledit')
        
        
        @endforeach
      </table>
    </div>
    {{$categorias->render()}}
  </div>
</div>      
    
@endsection