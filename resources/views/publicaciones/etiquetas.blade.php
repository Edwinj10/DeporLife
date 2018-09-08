
<ul class="list-group" id="listar-tags">
	@foreach ($tags as $tag)

	<label>
		{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->etiqueta }}
	</label>
	@endforeach
</ul>