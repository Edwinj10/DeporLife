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
    <link rel="stylesheet" type="text/css" href="/css/mdb.css">
    <link rel="stylesheet" type="text/css" href="/css/mdb.min.css">
    {!!Html::style('css/ajustes.css')!!}
    {!!Html::script('js/arriba.js')!!}
    {!!Html::script('js/sistemalaravel.js')!!} 
    {!!Html::script('js/jquery.min.js')!!}
    <script src="/js/toastr.js"></script>
    <script src="/js/vue.js"></script>
    <script src="/js/axios.js"></script>
    <script src="../js/main.js"></script>



  </head>

  <body>
    <span class="ir-arriba icon-arrow-up2"></span>
    <br>  <br>  
    <!-- <br>   -->
    <header>
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
    @yield('content')  
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
  <script type="text/javascript" src="/js/mdb.js"></script>
  <script type="text/javascript" src="/js/mdb.min.js"></script>

  @stack('scripts')


</body>
</html>
