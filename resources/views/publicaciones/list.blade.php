<!--Grid column-->
  <!--Newsfeed-->
  <div class="mdb-feed">
   @foreach ($comentario as $co)
   <!--First news-->
   <div class="news">

    <!--Label-->
    <div class="label">
      <img src="/imagenes/usuarios/{{ $co->foto }}" class="rounded-circle z-depth-1-half">
    </div>

    <!--Excert-->
    <div class="excerpt">

      <!--Brief-->
      <div class="brief">
        <a class="name">{{$co->name}}</a>
        <div class="date">{!!$co->created_at->diffForHumans()!!}</div>
      </div>
      <div class="added-text">{{$co->comentario}}</div>
      <!--Feed footer-->
      <div class="feed-footer">
        @if (Auth::guest())
        @else
        @if (Auth::user()->id == $co->user_id) 
        <a href="#" onclick='Mostrar({{$co->Id}});' data-toggle='modal' data-target='#myModalEditar'><i class="fa fa-pencil">[Editar]</i></a>
        <a href="#" onclick='Eliminar({{$co->Id}});'><i class="fa fa-trash">[Eliminar]</i>
        </a>
        @else
        @endif
        @endif
      </div>

    </div>

  </div>
  @endforeach

</div>
{{$comentario->render()}}
