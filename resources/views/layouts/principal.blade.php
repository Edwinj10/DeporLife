<!DOCTYPE html>
<html lang="es">
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Deportes.com</title>

      <!--Bootstrap core CSS-->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <!-- Custom styles for this template -->
      
      
      {!!Html::style('css/bootstrap.min.css')!!}
      {!!Html::style('css/custom.css')!!}
      {!!Html::style('css/responsive-style.css')!!}
      {!!Html::style('css/weather-icons.min.css')!!}
      {!!Html::style('css/font-awesome.min.css')!!}
      {!!Html::style('css/lightbox.min.css')!!}
      {!!Html::style('/fonts.css')!!}
      {!!Html::style('css/estilo.css')!!}
      {!!Html::style('/css/bootstrap.css')!!}
      {!!Html::style('css/loaders.css')!!}
      {!!Html::style('css/ajustes.css')!!}

      {!!Html::script('js/arriba.js')!!}
      {!!Html::script('js/sistemalaravel.js')!!} 
      {!!Html::script('js/jquery.min.js')!!}

      

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
                        <a href="" data-target="#modal-login" data-toggle="modal" class="nav-link"><button class="btn btn-danger">Iniciar Sesion</button></a>
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
                                        <a class="dropdown-item" class="nav-link" href="#" id="men">Ajustes</a>
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
        <nav class="navbar top-nav">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation"> &#9776; </button>
                  <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2"> <a class="navbar-brand" href="#">Responsive navbar</a>
                    <ul class="nav navbar-nav ">
                        <li class="nav-item active"> <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a> </li>
                       
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Futbol </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" id="hijos" href="/futbolinternacional">Futbol Europeo </a>
                            <a class="dropdown-item" id="hijos" href="/futbolnacional">Futbol Nacional </a>
                            <a class="dropdown-item" id="hijos" href="/futbolinternacional">Liga Primera </a>
                            <a class="dropdown-item" id="hijos" href="/futbolinternacional">Liga Segunda Division </a>
                            <a class="dropdown-item" id="hijos" href="/futbolinternacional">Liga Juvenil Sub 21 </a>
                            <a class="dropdown-item" href="#" id="hijos">Reportajes</a>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Béisbol </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="hijos">MLB</a>
                            
                              <a class="dropdown-item" href="#" id="hijos">Liga German Pomares</a>
                              <a class="dropdown-item" href="#" id="hijos">Liga Profesional Nicaraguense</a>
                              <a class="dropdown-item" href="#" id="hijos">Liga Juvenil</a>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Boxeo </a>
                          <div class="dropdown-menu">
                            
                            <a class="dropdown-item" href="#" id="hijos">Boxeo Internacional</a>
                            
                              <a class="dropdown-item" href="#" id="hijos">Boxeo Nacional</a>
                              <a class="dropdown-item" href="#" id="hijos">Campeones Nacionales</a>
                              <a class="dropdown-item" href="#" id="hijos">Reportajes</a>


                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Baloncesto </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="hijos">MLB</a>
                            <a class="dropdown-item" href="#" id="hijos">NBA</a>
                            <a class="dropdown-item" href="#" id="hijos">Baloncesto Nicaraguense</a>
                            <a class="dropdown-item" href="#" id="hijos">Baloncesto Juvenil</a>
                            <a class="dropdown-item" href="#" id="hijos">Reportajes</a>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                          
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tenis </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="hijos">Tenis Internacional</a>
                            <a class="dropdown-item" href="#" id="hijos">Tenis Nacionla</a>
                            <a class="dropdown-item" href="#" id="hijos">Reportajes</a>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                          
                          </div>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Ciclismo</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Más deportes</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#">Videos</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/galeria">Galeria</a> </li>

                    </ul>
                    {!!Form::open(array('url'=>'busqueda', 'method'=> 'GET', 'autocomplete' => 'off', 'class'=>'pull-xs-right', 'role' => 'search')) !!}
                          <div class="search">
                            <input type="text" class="form-control" name="searchText" maxlength="64" placeholder="Search" value="{{$searchText}}">
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                          </div>
                    {{Form::close()}}
                  </div>
            </div>
        </nav>
        @yield('content')        
      <footer>
      <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4">
                <h6 class="heading-footer">SOBRE NOSOTROS</h6>
                  <p><i class="fa fa-user"> <span>Creador :</span> Edwin Perez</i></p>
                    <p><i class="fa fa-phone"></i> <span>Llamame :</span> +50589271365</p>
                    <p><i class="fa fa-envelope"></i> <span>Email :</span> edwinjosealtamirano@gmail.com</p>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-4">
                <h6 class="heading-footer">ENLACES RAPIDOS</h6>
               <ul class="footer-ul">
                <li><a href="{{ url('/futbol') }}"> Futbol</a></li>
                <li><a href="{{ url('/futbol') }}"> Beisbol</a></li>
                <li><a href="#"> Boxeo</a></li>
                <li><a href="#"> NBA</a></li>
                <li><a href="#"> Tenis</a></li>
                <li><a href="#"> Otros</a></li>
              </ul>
            </div>
            <div class="col-lg-2 offset-lg-3 col-md-4 social-icons">
                      <h6 class="heading-footer">Siguenos</h6>
                  <ul class="footer-ul">
                          <li><a href="#"><i class=" fa fa-facebook"></i> Facebook</a></li>
                          <li><a href="#"><i class=" fa fa-twitter"></i> Twitter</a></li>
                          <li><a href="#"><i class=" fa fa-google-plus"></i> Google+</a></li>
                          <li><a href="#"><i class=" fa fa-linkedin"></i> Linkedin</a></li>
                  </ul>
            </div>
          </div>
      </div>
</footer>
<!--footer start from here-->

<div class="copyright">
     <div class="container">
         <div class="col-lg-6 col-md-4">
             <p>© 2017 - <a href="http://grafreez.com">Deportes.com</a></p>
          </div>
          <div class="col-lg-6 col-md-8">
            <ul class="bottom_ul">
              <li><a href="#">Sobre Nosotros</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contáctenos</a></li>
              <li><a href="#">Mapa del Sitio</a></li>
            </ul>
          </div>
      </div>
</div>

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
<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
</script>
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/bootstrap.min.js')!!} 
{!!Html::script('js/core.js')!!} 
{!!Html::script('js/lightbox-plus-jquery.min.js')!!} 

@stack('scripts')

 
</body>
</html>
