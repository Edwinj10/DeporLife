<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Agregar Categoria</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">	
					<div class="col-md-12">
						<div id="message-error" class="alert alert-danger danger" role="alert" style="display: none ">
							<strong id="error"></strong>
						</div>
					</div>
					{!! Form::open(['id' => 'form']) !!}
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="categoria">Categoria</label>
							<input type="text"  id="categoria" maxlength="60" name="categoria" required value="{{old('categoria')}}" class="form-control" placeholder="Ingrese la categoria">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					{!!link_to('##', 'Grabar', ['id' => 'GrabarC', 'class' => 'btn btn-primary'])!!}
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>


