@extends ('layouts.admin')
@section ('content')
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div> 
			</div>
			<!-- listar equipos -->
			<div class="col-md-12">

				<div class="panel panel-default panel-table">
					<div class="panel-heading" id="panel">
						<div id="message-save" class="alert alert-success success" role="alert" style="display: none ">
							<strong id="save">Guardado Correctamente</strong>
						</div>
						<div id="message-delete" class="alert alert-info" role="alert" style="display: none ">
							<strong>El registro se elimino correctamente</strong>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<h3 class="panel-title">Listado de Publicacaiones</h3>
								<h3 class="panel-title">Actualmente se encuentran registradas <b>{{$team->total()}}</b></h3>
								<br>
							</div>
							<div class="col-md-6 text-right col-xs-12">
								<button type="button" class="btn btn-sm btn-primary btn-primary" id="ver"><em class="fa fa-pencil">Crear Nuevo</em></button>
								<!-- <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button> -->
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div id="listar-equipos"></div>
						</div>
					</div>
				</div>


			</div>
			<!-- fin listar equipos -->
			<!-- empieza guardar equipos -->
			<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12" id="save-equipos">
				<form action="{{ route('equipos.store') }}" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label> Nombre:</label>
							<input type="text" name="nombre" class="form-control" placeholder="Agregar Nombre" maxlength="60">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label> Apodo:</label>
							<input type="text" name="apodo" class="form-control" placeholder="Agregar Apodo" maxlength="60">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label> Nombre Estadio:</label>
							<input type="text" name="nombre_estadio" class="form-control" placeholder="Agregar Nombre Estadio" maxlength="60">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label> Sitio Web:</label>
							<input type="text" name="sitio_web" class="form-control" placeholder="Agregar Sitio Web" maxlength="60">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Uniforme:</label>
							<input type="file" name="uniforme" class="form-control">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Logo:</label>
							<input type="file" name="logo" class="form-control">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Estadio:</label>
							<input type="file" name="estadio" class="form-control">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label> Pais:</label>
							<input type="text" name="pais" class="form-control" placeholder="Agregar Sitio Web" maxlength="60">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Plantilla:</label>
							<input type="file" name="plantilla" class="form-control">
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
						<div class="form-group">
							<label>Ligas</label>
							<select name="ligas" class="form-control" id="ligas">
								<option value="" selected="selected">Ninguna</option>
								@foreach ($ligas as $l)
								<option value="{{$l->id}}">{{$l->liga}}</option>
								@endforeach
							</select>
							<input type="hidden" name="ligas_id" id="ligas_id" size="40" value="Aquí saldrá el valor del select cuando cambie">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="descripcion">Descripcion</label>
							<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" placeholder="Ingrese la Descripcion"></textarea>
							@ckeditor('bodyField')
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="descripcion">Historia</label>
							<textarea rows="5" id="bodyField2" name="historia"  class="form-control" placeholder="Ingrese la Descripcion"></textarea>
							@ckeditor('bodyField2')
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-success upload-image" type="submit">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	
	$(document).ready(function(){
		listEquipos();
	});
	$(document).ready(function(){
		$("#listar-equipos").hide();
		$("#panel").hide();
	});
	// mostra create y ocultar lista
	$(document).ready(function(){
		$("#ver").click(function(){
			$('#save-equipos').toggle(1000);
			$("#listar-equipos").hide();
			$("#panel").hide();
		});
	});
	// paginacion
	$(document).on("click", ".pagination li a", function(e){
		e.preventDefault();

		var url = $(this).attr('href');

		$.ajax({
			type: 'get',
			url: url,
			success: function(data){
				$('#listar-equipos').empty().html(data);
			}
		});
	});
      // listar
      var listEquipos = function()
      {

      	$.ajax({
      		type:'get',
      		url: '{{url('listall')}}',
      		success: function(data){
      			$('#listar-equipos').empty().html(data);
      		}
      	});
      }
      // guardar
      $("body").on("click",".upload-image",function(e){
      	$(this).parents("form").ajaxForm(options);
      });

      $(document).on('change', '#ligas', function(event) {
      	$('#ligas_id').val($("#ligas option:selected").val());
		// var id=$('#ligas option:selected').val();
		// alert(id);
	});


      var options = { 
      	complete: function(response) 
      	{
      		if($.isEmptyObject(response.responseJSON.error)){
      			$("input[name='nombre']").val('');
      			$("input[name='apodo']").val('');
      			$("input[name='sitio_web']").val('');
      			$("input[name='pais']").val('');
      			$("input[name='historia']").val('');
      			$("input[name='descripcion']").val('');
      			$("input[name='ligas_id']").val('');
      			// alert('Image Upload Successfully.');
      			listEquipos();
      			$("input[name='logo']").val('');
      			$("input[name='plantilla']").val('');
      			$("input[name='uniforme']").val('');
      			$("input[name='estadio']").val('');
      			$("input[name='historia']").val('');
      			$("input[name='descripcion']").val('');
      			$("input[name='nombre_estadio']").val('');
      			$('#listar-equipos').toggle(1000);
      			$('#panel').toggle(1000);
      			$("#save-equipos").hide();

      		}else{
      			printErrorMsg(response.responseJSON.error);
      			$('.print-error-msg').show().delay(4000).fadeOut(2);
      		}
      	}
      };
      function printErrorMsg (msg) {
      	$(".print-error-msg").find("ul").html('');
      	$(".print-error-msg").css('display','block');
      	$.each( msg, function( key, value ) {
      		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      	});
      }
  </script>


  @endsection