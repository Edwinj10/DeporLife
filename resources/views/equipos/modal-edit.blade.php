<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="myModalEditar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Etiqueta</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">
					<div class="col-md-12">
						<div id="message-error_edit" class="alert alert-danger danger" role="alert" style="display: none ">
							<strong id="error_edit"></strong>
						</div>	
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						{!! Form::open(['id' => 'form']) !!}
						<input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
						<input type="hidden" id="id">
						<div class="form-group">
							<label for="etiqueta">Etiqueta</label>
							<input type="text"  id="etiquetaedit" maxlength="60" name="etiquetaedit" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					{!!link_to('##', $title='Actualizar',$attributes = ['id' => 'actualizar', 'class' => 'btn btn-primary'])!!}
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>


