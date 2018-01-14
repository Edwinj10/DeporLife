 @if(Session::has('message'))
 <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@extends('layouts.principal')
@section('content')
<section class="section-01">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h4>{{$publicacion->titulo}}</h4>
        <div class="card">
          <div class="view hm-zoom">
            <img class="img-fluid" src="/imagenes/publicaciones/{{ $publicacion->foto }}" alt="{{$publicacion->titulo}}"></a>  
          </div> 
          <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$publicacion->categoria}}</span> </div>
        </div>
        {!!$publicacion->descripcion!!}
      </div>
      <div class="col-md-4">
        <div class="heading-large">Últimas Noticias</div>
        <div class="col-md-12 col-xs-12">
          @foreach ($latest as $last)
          <!--Small news-->
          <div class="single-news">

            <div class="row">
              <div class="col-md-6 col-xs-6">

                <!--Image-->
                <div class="view hm-zoom">
                  <img src="/imagenes/publicaciones/{{ $last->foto }}" class="img-fluid" alt="{{$last->titulo}}" class="img-fluid" alt="{{$last->titulo}}">
                  <a href="/noticias/{{$last->categoria}}/{{$last->slug}}">
                    <div class="mask"></div>
                  </a>
                </div>
              </div>

              <!--Excerpt-->
              <div class="col-md-6 col-xs-6">
                <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>{!!$last->created_at->diffForHumans()!!} </em></small></p>
                <h2 class=" title-small"><a href="/noticias/{{$last->categoria}}/{{$last->slug}}">{{substr(strip_tags($last->titulo), 0,70)}}...
                  <i class="fa fa-angle-right"></i></a></h2>
                </div>

              </div>
            </div>
            <hr>
            @endforeach
            <!--poner etiquetas -->
          </div>

        </div>
      </div>

      <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
          Comentar
        </a>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
          Ver Comentarios
        </button>
      </p>
      <div class="collapse" id="collapseExample1">
        <!-- Form subscription -->
        <div class="col-md-4">
          <!-- <div class="heading-large">Agregar Comentario</div> -->

          <form method="POST" v-on:submit.prevent="crear">

            <div class="md-form">
              <!--   <i class="fa fa-pencil prefix"></i> -->
              <textarea type="text" id="form8" class="md-textarea"></textarea>
              <label for="form8">Agregar Comentario</label>
            </div>
            <button class="btn btn-primary">
              Guardar
            </button>

          </form>
        </div>
        <!-- Form subscription -->
      </div>
      <div class="collapse" id="collapseExample2">
        <div class="col-md-8">
          <div class="heading-large">Comentarios</div>
          <!--Section: Social newsfeed v.2-->
          

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-lg-12">

              <!--Newsfeed-->
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
                      <a class="name">{{$co->name}}</a> agregado a la página
                      <div class="date">{!!$co->created_at->diffForHumans()!!}</div>
                    </div>

                    <!--Added text-->
                    <div class="added-text">{{$co->comentario}}</div>
                    <!--Feed footer-->
                    <div class="feed-footer">
                      <a class="comment" data-toggle="collapse" href="#collapseExample-4" aria-expanded="false" aria-controls="collapseExample-4">Comment</a> &middot;
                      
                      <div class="collapse" id="collapseExample-4">
                        <div class="card card-body mt-1">
                          <!--Add comment-->
                          <div class="md-form mt-1 mb-1">
                            <textarea type="text" id="form7" class="md-textarea"></textarea>
                            <label for="form7">Add comment</label>
                          </div>
                          <div class="d-flex justify-content-end">
                            <button type="button" class="btn-flat waves-effect" data-toggle="collapse" data-target="#collapseExample-4" aria-expanded="false"
                            aria-controls="collapseExample-4">Cancel</button>
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample-4" aria-expanded="false"
                            aria-controls="collapseExample-4">Reply</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                @endforeach
              </div>
              <!--Newsfeed-->

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          
          <!--Section: Social newsfeed v.2-->
        </div>
      </div>


    </section>

















   <!--  <div class="col-md-8">
      <div class="widget-area no-padding blank">
        <div class="status-upload">
          {!! Form::open(['route' => 'comentarios.store' , 'method' =>'POST','files' => true]) !!}
          <textarea  name="comentario" class="form-control" placeholder="Cual es tu comentario?"  ></textarea>
          <input type="hidden" name="publicacions_id" value="{{$publicacion->id}}">
          <ul>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
          </ul>
          <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Comentar</button>
          {!!Form::close()!!}

        </div>
      </div>
    </div> -->

  </div>

  <section class="video-gallery-sec">
    <div class="container">
      <h3>
        <div class="heading-large">Noticias Relacionadas
        </h3>
        <div class="row">
          @foreach ($sugerencias as $fut)
          <div class="col-md-3 col-xs-6">
            <div class="card"> 
              <img class="img-fluid" id="internacional" src="/imagenes/publicaciones/{{ $fut->foto }}" alt="">
              <div class="card-block">
                <div class="news-title"><a href="{{ route('publicaciones.show', $fut->id ) }}">
                  <h2 class=" title-small">{{ $fut->titulo}}</h2>
                </a></div>
                <p class="card-text"><small class="text-time"><em>{{$fut->fecha}}</em></small></p>
              </div>
            </div>
            <!-- >diffForHumans() -->
          </div>
          <!--  -->
          @endforeach

        </div>

      </div>
    </section>
  </div>   




  @endsection
