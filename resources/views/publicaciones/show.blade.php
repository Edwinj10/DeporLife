 @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@extends('layouts.principal')
@section('content')

        <div class="container">
            <div class="row">
    
                <div class="btn-group btn-breadcrumb" id="miga">
                      <a href="/" class="btn btn-danger"><i class="fa fa-home "></i></a>
                      <a href="/" class="btn btn-danger">Inicio</a>
                      @foreach ($categorias as $cat)
                      <a href="#" class="btn btn-danger">{{$cat->categoria}}</a>
                      @endforeach
                      <a href="#" class="btn btn-danger">{{$publicacion->tipo}}</a>
                </div>
            </div>
        </div>
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                  @foreach ($users as $u)
                  <i class="fa fa-user " id="user"></i>Por: {{$u->name}} 
                  @endforeach
                </div>
                <div class="col-md-12"> 
                <i class="fa fa-calendar" aria-hidden="true" id="cale"></i>Publicado:  {{$publicacion->fecha}}
                </div>
                <div class="col-md-12">
                <i class="fa fa-eye" id="ver" aria-hidden="true"></i>Visto Por: {{$variable->total_visitas}}
                </div>
                
            </div>
        </div>
        <div class="container" id="publicaciones">
            <div class="row">
              <div class="col-md-12">
                <h4 id="titulo" align="center">{{$publicacion->titulo}}</h4>
              </div>
            </div>
            <div class="row">
                <div align="center">
                    <div class="col-md-8 offset-md-2" align="center" id="imag">
                      <a href="/imagenes/publicaciones/{{$publicacion->foto}}" data-lightbox="publicaciones" data-title="{{$publicacion->titulo}}"> 
                        <img class="img-thumbnail" src="/imagenes/publicaciones/{{$publicacion->foto}}"   alt=""/>
                      </a>
                      <div class="tittle">Click en la Imagen para aumentar el tamaño</div>
                    </div>
                </div>
            </div>
            <div class="row">          
              <div class="col-md-12">
                <p id="descripcion">
                  {!!$publicacion->descripcion!!}
                </p>
              </div>
            </div>
        </div>
        <div align="center">
              <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.http://127.0.0.1:8000//" target="_blank"><img src="/img/facebook.png"></a>
              <a href="http://www.twitter.com/home?status=http://www.tuweb.com/" target="_blank"><img src="/img/twitter.png"></a>
              <a href="https://plus.google.com/share?url=http://www.tuweb.com/" target="_blank"><img src="/img/googleplus.png"></a>
              <iframe src="http://www.facebook.com/plugins/like.php?href=http://tuweb.com/&layout=button_count&show_faces=true&width=450&action=like&font=trebuchet+ms&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
        </div> 
        <section class="row-section">
          <div class="container">
            <div class="row">
              <h2 class="text-center"><span>Comentarios</span></h2>
            </div>
            <div class="col-md-8 row-block">
              <ul id="sortable">
                @foreach ($comentario as $co)
                <li>
                  <div class="media">
                    <div class="media-left align-self-center">
                      <img class="rounded-circle" id="avatar" src="/imagenes/usuarios/{{ $co->foto }}">
                    </div>
                    <div class="media-body">
                      <h4>{{$co->name}}</h4>
                      <h4 id="fecha">Fecha: {{$co->fecha}} </h4>
                      <p>{{$co->comentario}}</p>
                    </div>
              
                  </div>
                @endforeach
                </li>
              </ul>
            </div>
          </div>
        </section>

        
            <div class="row" id="comentarios">
              <div class="col-md-4 col-xs-12">
                <h3 id="comenta">Politicas</h3>
                  <p id="come">
                    Apegados a la libertad de expresión y a las políticas de privacidad, www.deportes.com.ni modera los comentarios. Para publicar un comentario más rápidamente debe iniciar sesión con su cuenta. No se publicaran comentarios que contengan expresiones ofensivas, imputaciones de delito, acusaciones personales o que inciten a la violencia. Solo se publicarán aquellos comentarios cuyo contenido esté relacionado a la nota.
                    DeporLife tampoco publicará comentarios escritos en mayúsculas o que hagan enlace hacia otros sitios webs no autorizados, y únicamente se publicará comentarios escritos en español.
                    
                  </p>

              </div>
              @if (Auth::guest())
                <div class="col-md-8">
                        
                      <h3 id="comenta">Debes Registrarte O Iniciar Session</h3>
                        
                        <a href="" data-target="#modal-login" data-toggle="modal" class="nav-link"><button class="btn btn-danger">Iniciar Sesion</button></a>
                        <a href="{{ route('register') }}"  class="nav-link"><button class="btn btn-danger">Registrame</button></a>
                        
                        @include('modallogin')
                        <!-- @include('modal') -->
                        
                </div>
              @else
              <div class="col-md-8">
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
                            @endif
                    </div>
                  </div>
              </div>

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
