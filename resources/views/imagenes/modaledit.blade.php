<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$imagen->id}}">
	{{Form::open(array('action'=>array('ImagenesController@update', $imagen->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Imagen</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
			<div class="row">			
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" required value="{{$imagen->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
				</div>
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" required value="{{$imagen->descripcion}}" class="form-control" placeholder="Ingrese la Descripcion">
			</div>
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" name="foto"  class="form-control">
					@if(($imagen->foto)!="")
						<img src="/imagenes/imagenes/{{$imagen->foto}}" height="200px" width="200px">
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