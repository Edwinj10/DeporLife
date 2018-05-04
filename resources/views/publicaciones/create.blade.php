<html>
<head>
	<meta charset="UTF-8">
</head>
<body>

	<!-- <div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Se recomienda poner un tamaño de letra de 16 y justificar  el texto agregado en la descripcion antes de proceder a guardar. Todo esto con el objetivo de mantener uniformidad en el texto.
	</div> -->
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Titulo</label>
			<input type="text"  id="titulo" maxlength="100" onkeyup="cuentatitulo();" name="titulo" required value="{{old('titulo')}}" 
			class="form-control" placeholder="Ingrese el Titulo">
		</div>
		<input type="text" id="mostar_titulo" name="mostar_titulo" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">

	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="resumen">Resumen</label>
			<input type="text"  id="resumen" maxlength="100" onkeyup="cuentatitulo();" name="resumen" required value="{{old('resumen')}}" class="form-control" placeholder="Ingrese el breve resumen">
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" placeholder="Ingrese la Descripcion"></textarea>
			@ckeditor('bodyField')
			
			<!-- <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Ingrese la Descripcion"> -->
		</div>
		
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Categoria</label>
			<select name="categoria" class="form-control">
				@foreach ($categorias as $c)
				<option value="{{$c->id}}">{{$c->categoria}}</option>
				@endforeach
			</select>

		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label> Noticia Importante</label>
			<select name="importante" class="form-control">
				<option value="No">No</option>
				<option value="Si">Si</option>
			</select>

		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Tipo</label>
			<select name="tipo" class="form-control">
				<option value="Nacional">Nacional</option>
				<option value="Internacional">Internacional</option>
			</select>

		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="foto">Imagen</label>
			<input type="file" id="imagen" name="foto" required value="{{old('foto')}}" class="form-control">
		</div>
	</div>
	<div class="col-lg-12 col-md-12">
		<label for="">Tags</label>
		<div class="dual-list col-md-12">
			<div class="well">
				@include('publicaciones.etiquetas')
			</div>
		</div>
	</div>
</body>
@push ('scripts')
<script type="text/javascript">
	function cuentatitulo(){
		var longi=100;
		var resta="";
		var titulo = document.getElementById("titulo").value.length;
		resta=longi-titulo;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_titulo").value=resta;
		if (titulo==100) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}

</script>

@endpush
