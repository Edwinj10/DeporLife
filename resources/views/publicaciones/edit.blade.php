	@extends('layouts.principal')
	@section('content')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Publicacion: {{$publicacion->titulo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>

				@endforeach
				</ul>
			</div>

			@endif
		</div>
	</div>
	{!!Form::model($publicacion, [ 'method' => 'PATCH', 'route'=> ['publicaciones.update', $publicacion->id], 'files'=> 'true']) !!}

		{{Form::token()}}
			<div class="row">			
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" required value="{{$publicacion->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
				</div>
				
		</div>

		<!-- <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12"> 
			<div class="form-group">
					<label for="detalles">Detalles</label>
					<input type="text" name="detalles" required value="{{$publicacion->detalles}}" class="form-control" placeholder="Ingrese los Detalles">
			</div>
				
		</div>
		-->
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" required value="{{$publicacion->descripcion}}" class="form-control" placeholder="Ingrese la Descripcion">
			</div>
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" name="imagen"  class="form-control">
					@if(($publicacion->imagen)!="")
						<img src="/imagenes/publicaciones/{{$publicacion->foto}}" height="300px" width="300px">
					@endif
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
		</div>
	</div>
	
					
					
		{!!Form::close()!!}
@endsection
