<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--Bootstrap core CSS-->
  @include('complementos.styles')

  
  <title>Deportes.com</title>
  
</head>

<body>
  <span class="ir-arriba icon-arrow-up2"></span>
  <!--  estos espacios son para que el menu no quede muy pegado<br>  -->
  <br> <br>
  <header>
    <!-- estas son la parte de arriba donde sale la fecha y las redes sociales -->
    <!-- <div class="small-top">
      <div class="container">
        <div class="col-lg-4 date-sec hidden-sm-down">
          <div id="Date"></div>
        </div>
        <div class="col-lg-3 offset-lg-5">
          <div class="social-icon"> <a target="_blank" href="#" class=" fa fa-facebook"></a> <a target="_blank" href="#" class=" fa fa-twitter"></a> <a target="_blank" href="#" class=" fa fa-google-plus"></a> <a target="_blank" href="#" class=" fa fa-linkedin"></a> <a target="_blank" href="#" class=" fa fa-youtube"></a> <a target="_blank" href="#" class=" fa fa-vimeo-square"></a> </div>
        </div>
      </div>
    </div> -->
    <div class="top-head left">
      <div class="container">
       <div class="row">
        <div class="col-md-6 col-lg-4 col-xs-12">
          <h1>DeporMania.com<small>El Mejor Espacio Para Informarte</small></h1>
        </div>
        @if (Auth::guest())
        <div class="col-md-6 col-lg-5 offset-lg-3 admin-bar hidden-sm-down">
          <nav class="nav nav-inline"> 
            <a href="" data-target="#modal-login" data-toggle="modal" class="nav-link">
              <button class="btn btn-danger">Iniciar Sesion</button></a>
              <a href="{{ route('register') }}"  class="nav-link"><button class="btn btn-danger">Registrame</button></a>
            </nav>
            @include('modallogin')
            <!-- @include('modal') -->

          </div>
          @else
          <div class="col-md-6 col-lg-5 offset-lg-3 admin-bar hidden-sm-down">
            <nav class="nav nav-inline"> <a href="#" class="nav-link">
              <span class="ping"></span>
              <i class="fa fa-envelope-o"></i></a> 
              <a href="#" class="nav-link"><i class="fa fa-bell-o"></i></a> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" class="nav-link" href="/ajustes" id="men">Ajustes</a>
                  @if (Auth::user()->tipo == "Administrador")
                  <a class="dropdown-item" class="nav-link" href="/panel" id="men">Administracion</a>
                  @else       
                  @endif 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" class="nav-link" href="{{ route('logout') }}" id="men" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Salir</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                  <!-- <a class="dropdown-item" href="#">Something else here</a> -->

                </div>
              </li>
              <a><img class="img-fluid img-circle" src="/imagenes/usuarios/{{ Auth::user()->foto }}"></a> 
            </nav>

          </div>

          @endif
        </div>
      </div>
    </div>
  </header>
  <!-- menu -->
  @include('complementos.menu')
  <section class="banner-sec">
    <div class="container">
      <h2 class="widget-title">Lo Mejor del Deporte</h2>
      <div class="row">
        <div class="col-md-12"> 
          @foreach ($portadas as $portada)
          <div class="col-md-4">
            <div class="card"> 
              <a href="/noticias/{{$portada->categoria}}/{{$portada->slug}}">
                <div class="view hm-zoom">
                  <img class="img-fluid" src="imagenes/publicaciones/{{ $portada->foto }}" alt="{{$portada->titulo}}"></a>  
                </div>  
                <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$portada->categoria}}</span> </div>
                <div class="card-block">
                  <div class="news-title">
                    <h2 class=" title-small"><a href="/noticias/{{$portada->categoria}}/{{$portada->slug}}">{{$portada->titulo}}</a></h2>
                  </div>
                  <p class="card-text">{{substr(strip_tags($portada->resumen), 0,100)}}...</p>
                  <p class="card-text"><small class="text-time" id="sma"><em>{!!$portada->created_at->diffForHumans()!!} </em></small></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <section class="section-01">
        <div class="container">
          <div class="row">
           <div class="col-lg-8 col-md-12">
            <!-- <h3 class="heading-large">Deportes Nacionales</h3> -->
            <h2 class="widget-title">Deportes Nacionales</h2>
            <div class="row">
              @foreach ($nacional as $nac)
              <div class="col-lg-6">
                <div class="card"> 
                  <a href="/noticias/{{$nac->categoria}}/{{$nac->slug}}">
                    <div class="view hm-zoom">
                      <img class="img-fluid" src="imagenes/publicaciones/{{ $nac->foto }}" alt="{{$nac->titulo}}"></a>  
                    </div>  
                    <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$nac->categoria}}</span> </div>
                    <div class="card-block">
                      <div class="news-title">
                        <h2 class=" title-small"><a href="/noticias/{{$nac->categoria}}/{{$nac->slug}}">{{substr(strip_tags($nac->titulo), 0,70)}}...</a></h2>
                      </div>
                      <p class="card-text">{{substr(strip_tags($nac->resumen), 0,80)}}...</p>
                      <p class="card-text"><small class="text-time" id="sma"><em>{!!$nac->created_at->diffForHumans()!!} </em></small></p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <aside class="col-lg-4 side-bar col-md-12">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Lo último</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Lo mejor</a> </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content sidebar-tabing">
                <div class="tab-pane active" id="home" role="tabpanel">
                  @foreach ($latest as $la)
                  <div class="media"> <a class="media-left" href="/noticias/{{$la->categoria}}/{{$la->slug}}"> 

                    <img class="media-object" src="imagenes/publicaciones/{{ $la->foto }}" alt="{{$la->titulo}}"> </a>
                    <div class="media-body">
                      <div class="news-title">
                        <h2 class="title-small"><a href="/noticias/{{$la->categoria}}/{{$la->slug}}">{{substr(strip_tags($la->titulo), 0,50)}}...</a></h2>
                      </div>
                      <div class="news-auther"><span class="text-time" id="sma">{{ $la->created_at->diffForHumans() }}</span></div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                  @foreach ($top as $to)
                  <div class="media"> <a class="media-left" href="/noticias/{{$to->categoria}}/{{$to->slug}}"> 
                    <img class="media-object" src="imagenes/publicaciones/{{ $to->foto }}" alt="{{$to->titulo}}"> </a>
                    <div class="media-body">
                      <div class="news-title">
                        <h2 class="title-small"><a href="/noticias/{{$to->categoria}}/{{$to->slug}}">{{substr(strip_tags($to->titulo), 0,50)}}...</h2></a>
                      </div>
                      <div class="news-auther"><span class="text-time" id="sma">{{ $to->created_at->diffForHumans()}}</span></div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="video-sec">
                <!-- <h4 class="heading-small">Videos</h4> -->
                <h2 class="widget-title">Videos</h2>
                <div class="video-block">
                  <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/omHJOgbwmP0"  allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </section>

      <section class="banner-sec">
        <div class="container">
          <h2 class="widget-title">Fútbol Internacional</h2>
          <div class="row">
            @foreach ($futbolinter as $futinter)
            <div class="col-md-4">
              <div class="card"> 
                <a href="/noticias/{{$futinter->categoria}}/{{$futinter->slug}}">
                  <div class="view hm-zoom">
                    <img class="img-fluid" src="imagenes/publicaciones/{{ $futinter->foto }}" alt="{{$futinter->titulo}}"></a>
                  </div>  
                  <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$futinter->categoria}}</span> </div>
                  <div class="card-block">
                    <div class="news-title">
                      <h2 class=" title-small"><a href="/noticias/{{$futinter->categoria}}/{{$futinter->slug}}">{{substr(strip_tags($futinter->titulo), 0,70)}}...</a></h2>
                    </div>
                    <p class="card-text">{{substr(strip_tags($futinter->resumen), 0,100)}}...</p>
                    <p class="card-text"><small class="text-time" id="sma"><em>{!!$futinter->created_at->diffForHumans()!!} </em></small></p>
                  </div>
                </div>
                <!-- >diffForHumans() -->
              </div>
              <!--  -->
              @endforeach  

            </div>
          </div>
        </section>
        <section class="section-02">
          <div class="container">
            <!--               <div class="heading-large">Béisbol Internacional</div> -->
            <h2 class="widget-title">Béisbol Internacional</h2>
            <section class="section magazine-section" id="beisbol_internacional">
              <!--Grid row-->
              <div class="row text-left">
                @foreach ($beisbolinter as $b)
                <div class="col-lg-6 col-md-12">

                  <!--Featured news-->
                  <div class="single-news">

                    <!--Image-->

                    <div class="view hm-zoom">

                      <img src="imagenes/publicaciones/{{ $b->foto }}" class="img-fluid" alt="{{$b->titulo}}">

                      <a href="/noticias/{{$b->categoria}}/{{$b->slug}}">
                        <div class="mask"></div>
                        <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$b->categoria}}</span> </div>                          
                      </a>
                    </div>

                    <!--Excerpt-->
                    <div class="news-data">
                      <!-- <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$b->categoria}}</span> </div> -->

                      <!-- <p><strong></p> -->
                        <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>{!!$b->created_at->diffForHumans()!!} </em></small></p>
                      </div>
                      <br>
                      <h2 class=" title-small"><a href="/noticias/{{$b->categoria}}/{{$b->slug}}">{{substr(strip_tags($b->titulo), 0,65)}}...</a></h2>
                      <p class="card-text">{{substr(strip_tags($b->resumen), 0,100)}}...</p>

                    </div>
                  </div>
                  @endforeach

                </div>
                <div class="col-md-12">
                  @foreach ($beisbolinter2 as $b2)
                  <div class="col-md-12 col-lg-6">

                    <div class="single-news">

                      <div class="row">

                        <div class="col-md-3 col-xs-6">

                          <!--Image-->
                          <div class="view hm-zoom">
                            <img src="imagenes/publicaciones/{{ $b2->foto }}" class="img-fluid" alt="{{$b2->titulo}}">
                            <a href="/noticias/{{$b2->categoria}}/{{$b2->slug}}">
                              <div class="mask"></div>
                            </a>
                          </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9 col-xs-6">
                          <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>{!!$b2->created_at->diffForHumans()!!} </em></small></p>
                          <h2 class=" title-small"><a href="/noticias/{{$b2->categoria}}/{{$b2->slug}}">{{substr(strip_tags($b2->titulo), 0,70)}}...
                            <i class="fa fa-angle-right"></i></a></h2>
                          </div>

                        </div>

                      </div>

                    </div>
                    @endforeach
                  </div>
                </section>
                <!--/Section: Magazine v.1-->
              </div>
            </section>
          </div>
        </section>
        <section class="section-02" id="box">
          <div class="container">
            <h2 class="widget-title">Boxeo</h2>
            <!--Section: Magazine v.2-->
            <section class="section magazine-section" id="Boxeo">
              <!--Grid row-->
              <div class="row text-left">

                <!--Grid column-->
                @foreach ($boxeo as $box)
                <div class="col-lg-6 col-md-12">

                  <!--Featured news-->
                  <div class="single-news">

                    <!--Image-->
                    <div class="view hm-zoom">
                      <img src="imagenes/publicaciones/{{ $box->foto }}" class="img-fluid" alt="{{$box->titulo}}">
                      <a href="/noticias/{{$box->categoria}}/{{$box->slug}}">
                        <div class="mask"></div>
                        <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$box->categoria}}</span> </div>
                      </a>
                    </div>

                    <!--Excerpt-->
                    <div class="news-data">
                      <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>{!!$box->created_at->diffForHumans()!!} </em></small></p>
                    </div>

                    <h2 class=" title-small"><a href="/noticias/{{$box->categoria}}/{{$box->slug}}">{{substr(strip_tags($box->titulo), 0,65)}}...</a></h2>
                    <p class="card-text">{{substr(strip_tags($box->resumen), 0,150)}}...</p>
                  </div>
                  <!--/Featured news-->

                </div>
                @endforeach
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                  <div class="col-md-12 col-xs-12">
                    @foreach ($boxeo2 as $box2)
                    <!--Small news-->
                    <div class="single-news">

                      <div class="row">
                        <div class="col-md-3 col-xs-6">

                          <!--Image-->
                          <div class="view hm-zoom">
                            <img src="imagenes/publicaciones/{{ $box2->foto }}" class="img-fluid" alt="{{$box2->titulo}}" class="img-fluid" alt="{{$box2->titulo}}">
                            <a href="/noticias/{{$box2->categoria}}/{{$box2->slug}}">
                              <div class="mask"></div>
                            </a>
                          </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9 col-xs-6">
                         <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>{!!$box2->created_at->diffForHumans()!!} </em></small></p>
                         <h2 class=" title-small"><a href="/noticias/{{$box2->categoria}}/{{$box2->slug}}">{{substr(strip_tags($box2->titulo), 0,70)}}...
                          <i class="fa fa-angle-right"></i></a></h2>
                        </div>

                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

            </section>
            <!--Section: Magazine v.2-->
          </div>
        </section>
        <!-- <section class="section-02">
          <div class="container"> -->
            <!--Carousel Wrapper-->
            <!-- <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel"> -->

              <!--Controls-->
              <!-- <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div> -->
              <!--/.Controls-->

              <!--Indicators-->
              <!-- <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
              </ol> -->
              <!--/.Indicators-->

              <!--Slides-->
              <!-- <div class="carousel-inner" role="listbox"> -->

                <!--First slide-->
                <!-- <div class="carousel-item active">

                  <div class="col-md-4">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                </div> -->
                <!--/.First slide-->

                <!--Second slide-->
                <!-- <div class="carousel-item">

                  <div class="col-md-4">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                </div> -->
                <!--/.Second slide-->

                <!--Third slide-->
               <!--  <div class="carousel-item">

                  <div class="col-md-4">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 clearfix d-none d-md-block">
                    <div class="card">
                      <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary">Button</a>
                      </div>
                    </div>
                  </div>

                </div> -->
                <!--/.Third slide-->

                <!-- </div> -->
                <!--/.Slides-->

                <!--  </div> -->
                <!--/.Carousel Wrapper-->
          <!-- </div>
          </section> -->
          <!--footer start from here-->
          <!-- footer -->
          @include('complementos.footer')

          @include('complementos.copyright')

          <script> 
            $(document).ready(function(){

              $('.ir-arriba').click(function(){
                $('body, html').animate({
                  scrollTop: '0px'
                },300 );
              });

              $(window).scroll(function(){
                if ($(this).scrollTop() > 0){
                  $('.ir-arriba').slideDown(300);
                } else {
                  $('.ir-arriba').slideUp(300);
                };
              });

            });
          </script>
          @include('complementos.scrips')
        </body>

        </html>
