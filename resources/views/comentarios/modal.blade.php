<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$com->id}}">
	{{Form::open(array('action'=>array('ComentariosController@update', $com->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Cancelar Venta</h4>
			</div>
			<div class="modal-body">
				<p>Confirmar si desea CAncelar la Venta</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>

	{{Form::close()}}
</div>