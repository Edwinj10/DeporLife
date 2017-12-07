<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$cat->id}}">
	{{Form::open(array('action'=>array('CategoriaController@update', $cat->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Categoria</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
			<div class="row">			
				<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
						<div class="form-group">
							<label for="categoria">Categoria</label>
							<input type="text" name="categoria"required value="{{$cat->categoria}}" class="form-control" placeholder="Ingrese la categoria">
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