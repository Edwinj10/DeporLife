	@extends('layouts.admin')
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
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="titulo">Resumen</label>
				<input type="text" name="titulo" required value="{{$publicacion->resumen}}" class="form-control" placeholder="Ingrese el Titulo">
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
			<div class="form-group">
				<label>Categoria</label>
				<select name="nombre" class="form-control selectpicker" data-live-search="true">
					@foreach ($categorias as $c)
					@if($c->id==$publicacion->categoria_id)
					<option value="{{$c->id}}" selected>{{$c->categoria}}</option>
					@else
					<option value="{{$c->id}}">{{$c->categoria}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
			<div class="form-group">
				<label> Noticia Importante</label>
				<select name="importante" class="form-control">
					@if($publicacion->importante=='Si')
					<option value="{{$publicacion->importante}}" selected="">Si</option>
					<option value="No">No</option>
					@else
					<option value="No">No</option>
					<option value="Si">Si</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
			<div class="form-group">
				<label>Tipo</label>
				<select name="tipo" class="form-control">
					@if($publicacion->tipo=='Nacional')
					<option value="{{$publicacion->tipo}}" selected="">Nacional</option>
					<option value="Internacional">Internacional</option>
					@else
					<option value="Internacional">Internacional</option>
					<option value="Nacional">Nacional</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" required value="{!!$publicacion->descripcion!!}"></textarea>
				@ckeditor('bodyField')
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
		<div class="col-lg-6">
			<div class="form-group">
				{{ Form::label('tags', 'Etiquetas') }}
				<div>
					@foreach($tags as $tag)
					<label>
						{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->etiqueta }}
					</label>
					@endforeach
				</div>
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
