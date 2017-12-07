@extends('layouts.admin')
  @section('content')
  @include('alerts.request')
  {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'files' =>true])!!}
    
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelregistar">Registrar Nuevo Usuario</div>
                <div class="panel-body">
                    
                        {{ csrf_field() }}
                        <div class="form-group"> 
                            {!!Form::label('nombre','Nombre:')!!}
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!} 
                            
                                @if ($errors->has('name'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                         </div> 
                        <div class="form-group"> 
                             {!!Form::label('email','Correo:')!!} 
                             {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif 
                        </div> 
                        <div class="form-group"> 
                             {!!Form::label('password','Contraseña:')!!} 
                             {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!} 
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         </div>
                         <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                         <div class="form-group">
                            {!!Form::label('','Tipo de Usuario:')!!}

                            <select class="form-control" name="tipo" id="option">
                                <option value="0">Administrador</option>
                                <option value="1">SuperUsuario</option>
                                <option value="2">Usuario</option>
                            </select>
                         </div>
                         <div class="form-group">
                            {!!Form::label('','Foto:')!!}
                            {!!Form::file('foto')!!}
                         </div>

                        
                   
                </div>

            </div>
        </div>
    </div>
</div>




     <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
     </div>

  {!!Form::close()!!}
  @endsection