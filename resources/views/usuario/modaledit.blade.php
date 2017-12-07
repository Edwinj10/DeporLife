<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$usuario->id}}">
	{{Form::open(array('action'=>array('UsuarioController@update', $usuario->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Usuario</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
			<div class="row">			
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" required value="{{$usuario->name}}" class="form-control">
				</div>
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Email</label>
				<input type="text" name="email" required value="{{$usuario->email}}" class="form-control">
			</div>
				
		</div>
		
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Modificar Contraseña</label>
				<input type="text" name="password" required value="{{$usuario->password}}" class="form-control">

			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Tipo</label>
				<select name="tipo" class="form-control">
						<option value="{{$usuario->tipo}}">{{$usuario->tipo}}</option>
						<option value="0">Administrador</option>
						<option value="1">SuperUsuario</option>
                        <option value="2">Usuario</option>
				</select>

			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" name="foto"  class="form-control">
					@if(($usuario->foto)!="")
						<img src="/imagenes/usuario/{{$usuario->foto}}" height="200px" width="200px">
					@endif
			</div>
			
		</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>

	{{Form::close()}}
</div>