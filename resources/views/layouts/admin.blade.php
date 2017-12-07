<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel de Administracion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="">
    <!-- Bootstrap 3.3.5 -->
    {!!Html::style('/css/bootstrap.min.css')!!}

    <link rel="stylesheet" href="{{asset('/css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    {!!Html::style('/css/font-awesome.css')!!}
    {!!Html::style('/css/estilo')!!}
    {!!Html::style('/css/comentarios.css')!!}
    

      <!-- Theme style -->
    {!!Html::style('/css/AdminLTE.min.css')!!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    {!!Html::style('/css/_all-skins.min.css')!!}
    {!!Html::style('/img/favicon.ico')!!}
  </head>

  <!-- @if (Auth::user()->tipo ==0 ) -->

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


      <header class="main-header">

        <!-- Logo -->
        <a href="{!!URL::to('/')!!}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>NEXA Panel de Adminstracion</b>NEXA Panel de Adminstracion</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nexa Administracion</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ Auth::user()->name }}
                        <i class="fa fa-user fa-fw"></i>
                        </a>
                         <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Ajustes</a>
                            </li>
                            <li class="divider"></li>

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-gear fa-fw"></i> Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                            
                           </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" id="side">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="header"></li>
            <!-- inicia usuarios -->
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('/usuarios/create')!!}"><i class="fa fa-circle-o">
                  
                  </i> Agregar Usuarios</a>
                </li>
                <li><a href="{!!URL::to('/usuarios')!!}" ><i class="fa fa-circle-o">
                  
                </i> Listar Usuarios</a>
                </li>

                
              </ul>
            </li>

            <!-- inicai estudiantes -->
          
            <!-- inicia maestros -->

            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Publicaciones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('/publicaciones/create')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Agregar</a>
                </li>
                <li><a href="{!!URL::to('/publicaciones/')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Listar</a>
                </li>
          
              </ul>

            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Portada</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('/portadas/create')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Agregar</a>
                </li>
                <li><a href="{!!URL::to('/portadas/')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Listar</a>
                </li>
          
              </ul>

            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Imagenes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('/fotos/create')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Agregar</a>
                </li>
                <li><a href="{!!URL::to('/fotos/')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Listar</a>
                </li>
          
              </ul>

            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Comentarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{!!URL::to('/comentarios/')!!}"><i  class="fa fa-circle-o"class>
                  
                </i>Listar</a>
                </li>
          
              </ul>

            </li>
            <!-- acerca de -->
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">NEXA</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
        <!-- contenido principal -->

        <section class="main-footer"  id="contenido_principal">
          @yield('content')
        </section>
    
      <!-- cargador empresa -->
        
  
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016<a href="www.nexa.com">Nexas</a>.</strong> All rights reserved.
      </footer>
    <!-- @elseif (Auth::user()->tipo !=0)
    <br>
    <br>
      <div class="container">
          <h3>
            
            <img class="img-fluid" src="/img/acceso-denegado.png" alt="">
            <div align="center">
              <img class="img-fluid" src="/img/accesodenegado.gif" alt="">
            </div>
            
          </h3>
          <nav class="nav nav-inline">
            <meta http-equiv="refresh" content="0; /">
            <h1>Sera Redirigido a la pagina principal en <h1 id="Cuenta"></h1></h1>
        
      </div>
      <script type="text/javascript">
      var ttiempo=10;
      var url= '/'

      function updateReloj()
      {
        document.getElementById('Cuenta').innerHTML= "Redireccionando en " + ttiempo+"segundos";
        if (  ttiempo==0) 
        {
          window.location=url;
        } else {
          ttiempo-=1;
          setTimeout('updateReloj()', 1000);
        }
      }
      window.onload=updateReloj;

      </script>
    
    @endif
     -->

    <!-- jQuery 2.1.4 -->
    {!!Html::script('/js/jQuery-2.1.4.min.js')!!}
    
    
     <!-- Bootstrap 3.3.5 -->
    {!!Html::script('/js/bootstrap.min.js')!!}
    <script src="{{asset('/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('j/s/sistemalaravel.js') }}"></script>
    @stack('scripts')

    <!-- AdminLTE App -->
   
  </body>
</html>
