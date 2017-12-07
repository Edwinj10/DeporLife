<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$com->id}}">
	{{Form::open(array('action'=>array('ComentariosController@update', $com->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Comentario</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
			<div class="row">			
				<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
						<div class="form-group">
							<label for="comentario">Comentario</label>
							<input type="text" name="comentario"required value="{{$com->comentario}}" class="form-control" placeholder="Ingrese el comentario">
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