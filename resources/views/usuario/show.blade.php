@extends('layouts.admin')
  @section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelregistar">Nombre del usuario seleccionado: {{$usuario->name}} </div>
                <div class="panel-body">
                    
                        {{ csrf_field() }}
                        <div class="form-group"> 
                        
          
                            <label for="nombre">Nombre: </label>
                            <label for="">{{$usuario->name}}</label>
                            
                         </div> 
                        <div class="form-group"> 
                             <label for="nombre">Correo</label>
                             <label for="">{{$usuario->email}}</label>
                        </div> 
                        <div class="form-group"> 
                             <label for="">Tipo de Usuario</label>
                             <select class="form-control" name="tipo" id="option">
                                <option value="">{{$usuario->tipo}}</option>
                                
                            </select>

                        </div>
                        <div class="form-control">
                          <img class="img-thumbnail" src="/imagenes/usuarios/{{$usuario->foto}}"   alt=""/ height="250px" width="250px">
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection