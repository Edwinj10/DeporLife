  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/responsive-style.css">
    <link rel="stylesheet" type="text/css" href="css/weather-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts.css">
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/loaders.css">
    <link rel="stylesheet" type="text/css" href="css/mdb.css">
    <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/deportlife.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/deportlife.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/deportlife.png">
    <link rel="apple-touch-icon-precomposed" href="img/deportlife.png">
    <link rel="shortcut icon" href="img/deportlife.png">
    
    <script src="js/arriba.js"></script>
    <title>Deportes.com</title>
    <script src="js/jquery.min.js"></script>
  </head>

  <body>
    <span class="ir-arriba icon-arrow-up2"></span>
    
    <header>
      <div class="small-top">
        <div class="container">
          <div class="col-lg-4 date-sec hidden-sm-down">
            <div id="Date"></div>
          </div>
          <div class="col-lg-3 offset-lg-5">
            <div class="social-icon"> <a target="_blank" href="#" class=" fa fa-facebook"></a> <a target="_blank" href="#" class=" fa fa-twitter"></a> <a target="_blank" href="#" class=" fa fa-google-plus"></a> <a target="_blank" href="#" class=" fa fa-linkedin"></a> <a target="_blank" href="#" class=" fa fa-youtube"></a> <a target="_blank" href="#" class=" fa fa-vimeo-square"></a> </div>
          </div>
        </div>
      </div>
      <div class="top-head left">
        <div class="container">
         <div class="row">
          <div class="col-md-6 col-lg-4 col-xs-12">
            <h1>DeporLife.com<small>El Mejor Espacio Para Informarte</small></h1>
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
        <div class="row">
          <div class="col-md-12">
            <h3 class="heading-large">Lo Mejor del Deporte</h3>
            @foreach ($portadas as $portada)
            <div class="col-md-4">
              <div class="card"> 
                <a href="{{ route('portadas.show', $portada->id ) }}">
                  <div class="view hm-zoom">
                    <img class="img-fluid" src="imagenes/portada/{{ $portada->foto }}" alt=""></a>  
                  </div>  
                  <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$portada->categoria}}</span> </div>
                  <div class="card-block">
                    <div class="news-title">
                      <h2 class=" title-small"><a href="{{ route('portadas.show', $portada->id ) }}">{{$portada->titulo}}</a></h2>
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
              <h3 class="heading-large">Deportes Nacionales</h3>
              <div class="row">
                @foreach ($nacional as $nac)
                <div class="col-lg-6">
                  <div class="card"> 
                    <a href="{{ route('publicaciones.show', $nac->id ) }}">
                      <div class="view hm-zoom">
                        <img class="img-fluid" src="imagenes/publicaciones/{{ $nac->foto }}" alt=""></a>  
                      </div>  
                      <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$nac->categoria}}</span> </div>
                      <div class="card-block">
                        <div class="news-title">
                          <h2 class=" title-small"><a href="{{ route('publicaciones.show', $nac->id ) }}">{{substr(strip_tags($nac->titulo), 0,70)}}...</a></h2>
                        </div>
                        <p class="card-text">{{substr(strip_tags($nac->resumen), 0,100)}}...</p>
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
                    <div class="media"> <a class="media-left" href="{{ route('publicaciones.show', $la->id ) }}"> 

                      <img class="media-object" src="imagenes/publicaciones/{{ $la->foto }}" alt=""> </a>
                      <div class="media-body">
                        <div class="news-title">
                          <h2 class="title-small"><a href="{{ route('publicaciones.show', $la->id ) }}">{{substr(strip_tags($la->titulo), 0,50)}}...</a></h2>
                        </div>
                        <div class="news-auther"><span class="text-time" id="sma">{{ $la->created_at->diffForHumans() }}</span></div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="tab-pane" id="profile" role="tabpanel">
                    @foreach ($top as $to)
                    <div class="media"> <a class="media-left" href="{{ route('publicaciones.show', $to->id ) }}"> 
                      <img class="media-object" src="imagenes/publicaciones/{{ $to->foto }}" alt=""> </a>
                      <div class="media-body">
                        <div class="news-title">
                          <h2 class="title-small"><a href="{{ route('publicaciones.show', $to->id ) }}">{{substr(strip_tags($to->titulo), 0,50)}}...</h2></a>
                        </div>
                        <div class="news-auther"><span class="text-time" id="sma">{{ $to->created_at->diffForHumans()}}</span></div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="video-sec">
                  <h4 class="heading-small">Videos</h4>
                  <div class="video-block">
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="//www.youtube.com/embed/KoHGpJFNYjg" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </section>

        <section class="banner-sec">
          <div class="container">
            <h3>
              <div class="heading-large">Fútbol Internacional</div>
            </h3>
            <div class="row">
              @foreach ($inter as $int)
              <div class="col-md-4">
                <div class="card"> 
                  <a href="{{ route('publicaciones.show', $int->id ) }}">
                    <div class="view hm-zoom">
                      <img class="img-fluid" src="imagenes/publicaciones/{{ $int->foto }}" alt=""></a>
                    </div>  

                    <div class="card-block">
                      <div class="news-title">
                        <h2 class=" title-small"><a href="{{ route('publicaciones.show', $int->id ) }}">{{substr(strip_tags($int->titulo), 0,70)}}...</a></h2>
                      </div>
                      <p class="card-text">{{substr(strip_tags($int->resumen), 0,100)}}...</p>
                      <p class="card-text"><small class="text-time" id="sma"><em>{!!$int->created_at->diffForHumans()!!} </em></small></p>
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
              <h3>
                <div class="heading-large">Béisbol Internacional</div>
              </h3>
              <section class="section magazine-section" id="beisbol_internacional">
                <!--Grid row-->
                <div class="row text-left">
                  @foreach ($beisbol as $b)
                  <div class="col-lg-6 col-md-12">

                    <!--Featured news-->
                    <div class="single-news">

                      <!--Image-->
                      <div class="view overlay hm-white-slight z-depth-1-half">
                        <img src="imagenes/publicaciones/{{ $b->foto }}" class="img-fluid" alt="Sample post image">
                        <a>
                          <div class="mask"></div>
                        </a>
                      </div>

                      <!--Excerpt-->
                      <div class="news-data">

                        <p><strong><i class="fa fa-clock-o"></i>{!!$b->created_at->diffForHumans()!!}</strong></p>
                      </div>
                      <h2 class=" title-small"><a href="{{ route('publicaciones.show', $b->id ) }}">{{substr(strip_tags($b->titulo), 0,70)}}...</a></h2>
                      <p class="card-text">{{substr(strip_tags($b->resumen), 0,100)}}...</p>

                    </div>
                  </div>
                  @endforeach

                </div>
                <div class="col-md-12">
                  @foreach ($beisbol2 as $b2)
                  <div class="col-md-6">

                    <div class="single-news">

                      <div class="row">

                        <div class="col-md-3">

                          <!--Image-->
                          <div class="view overlay hm-white-slight z-depth-1-half">
                            <img src="imagenes/publicaciones/{{ $b2->foto }}" class="img-fluid" alt="Minor sample post image">
                            <a>
                              <div class="mask"></div>
                            </a>
                          </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9">
                          <p><strong><i class="fa fa-clock-o"></i>{!!$b2->created_at->diffForHumans()!!}</strong></p>
                          <a>{{substr(strip_tags($b2->titulo), 0,50)}}... 
                            <i class="fa fa-angle-right"></i>
                          </a>
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

        </section>
        <section class="section-02">
          <div class="container">
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

              <!--Controls-->
              <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div>
              <!--/.Controls-->

              <!--Indicators-->
              <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
              </ol>
              <!--/.Indicators-->

              <!--Slides-->
              <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

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

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

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

                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">

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

                </div>
                <!--/.Third slide-->

              </div>
              <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->
          </div>
        </section>
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
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script> 
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
        <script type="text/javascript" src="js/mdb.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        {!!Html::script('js/core.js')!!} 
      </body>
      </html>
