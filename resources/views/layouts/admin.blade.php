<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DeporLife.com</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
  {!!Html::script('http://code.jquery.com/jquery-1.11.1.min.js')!!}
  <script src="/admin/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="/admin/css/_all-skins.min.css">
    <!--  <link rel="stylesheet" type="text/css" href="/css/mdb.min.css">
     <link rel="stylesheet" type="text/css" href="/css/mdb.css"> -->
     <link rel="stylesheet" type="text/css" href="/css/estilo.css">

     <!-- Bootstrap 3.3.5 -->
     <!-- <script type="text/javascript" src="/js/bootstrap-tags.min.js"></script>
       <link rel="stylesheet" href="/css/bootstrap-tags.css"> -->
       <!-- AdminLTE App -->
       {!!Html::script('/admin/js/tabla.js')!!}
       <script src="/admin/js/app.min.js"></script>
       <link rel="stylesheet" type="text/css" href="/admin/js/jquery-alertable/jquery.alertable.css">
       <script type="text/javascript" src="/admin/js/jquery-alertable/jquery.alertable.js"></script>
       <script type="text/javascript" src="/js/jquery.form.js"></script>
       
       <link rel="apple-touch-icon" href="../admin/img/apple-touch-icon.png">
       <link rel="shortcut icon" href="/admin/img/favicon.ico">
       <link rel="shortcut icon" type="img/CIIEMP.png" href="/favicon.ico">

     </head>
     <!-- <body class="hold-transition skin-blue sidebar-mini"> -->
      <body class="skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">

          <header class="main-header">

            <!-- Logo -->
            <a href="{!!URL::to('/')!!}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>Deport</b></span></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>DeportLife.com</b></span>
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
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-circle" aria-hidden="true"><small class="bg-green">Online</small></i>

                      <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img class="img-fluid img-circle" src="/imagenes/usuarios/{{ Auth::user()->foto }}">  

                      </li>

                      <!-- Menu Footer-->
                      <li class="user-footer">

                        <div class="pull-right">
                          <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" >Salir</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>                             
                        </div>
                        <div class="pull-left">
                          <a href="/perfil" class="btn btn-default btn-flat">Ajustes</a>
                        </div>
                      </li>
                    </ul>
                  </li>

                </ul>
              </div>

            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->

              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="header"></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Publicaciones</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li><a href="{!!URL::to('/noticias/create')!!}"><i class="fa fa-circle-o"></i> Agregar</a></li>-->                 
                    <li><a href="{!!URL::to('/publicaciones')!!}"><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Etiquetas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{!!URL::to('/etiquetas')!!}"><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Usuarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{!!URL::to('/usuarios/create')!!}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    <li><a href="{!!URL::to('/usuarios')!!}"><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span>Categorias/Ligas/Equipos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li><a href="{!!URL::to('/indicador/create')!!}"><i class="fa fa-circle-o"></i> Agregar</a></li> -->
                    <li><a href="{!!URL::to('/indicador')!!}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    <li><a href="{!!URL::to('/tipo')!!}"><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-comments"></i> <span>Comentarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li><a href="{!!URL::to('/institucion/create')!!}"><i class="fa fa-circle-o"></i> Agregar</a></li> -->
                    <li><a href="{!!URL::to('/comentarios')!!}"><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a data-target="#modal-ayuda" data-toggle="modal">
                    <i class="fa fa-plus-square"></i> <span>Ayuda</span> 
                    <!--  <small class="label pull-right bg-red">PDF</small> -->
                  </a>
                </li>
            <!-- <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Panel de Administracion CIIEMP</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <div class="row">
                  <div class="col-md-12">
                    <!--Contenido-->
                    @yield('content')
                    <!--Fin Contenido-->
                  </div>
                </div>

              </div>
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2017</strong> All rights reserved.
</footer>


<!-- jQuery 2.1.4 -->

<!-- {!!Html::script('/js/etiquetas.js')!!} -->
<!-- <script type="text/javascript" src="/js/mdb.min.js"></script>
  <script type="text/javascript" src="/js/mdb.js"></script> -->

  @stack('scripts')

</body>
</html>
