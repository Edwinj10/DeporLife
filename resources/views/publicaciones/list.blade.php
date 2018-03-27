 <div class="col-lg-6">
  <div class="mdb-feed">

    <!--Fourth news-->
    @foreach ($comentario as $co)
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

        <!--Added text-->
        <div class="added-text">{{$co->comentario}}</div>
        <!--Feed footer-->
        <div class="feed-footer">
          @if (Auth::guest())
            @else
              @if (Auth::user()->id == $co->user_id) 
              <a href="#" onclick='Mostrar({{$co->Id}});' data-toggle='modal' data-target='#myModalEditar'>[Editar]</a>
              <a href="#" onclick='Eliminar({{$co->Id}});'>[Eliminar]
              </a>
                @else
              @endif
          @endif
        </div>
        <hr>

      </div>

    </div>
    @endforeach
    <!-- @include('error.alert') -->
    
    <div>

    </div>
  </div>
</div>

<!--Newsfeed-->
