<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="../css/bootstrap-tabs-x.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/bootstrap-tabs-x.js" type="text/javascript"></script>
<style type="text/css">
.nav-tabs { border-bottom: 2px solid #DDD; }
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
.nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
.nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:20%; text-align:center;}
.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }


@media all and (max-width:724px){
    .nav-tabs > li > a > span {display:none;}   
    .nav-tabs > li > a {padding: 5px 5px;}
}

</style>
@extends('layouts.principal')
@section('content')



<div class="container">
    <div class="page-header">
        <small>
            @foreach ($ajustes as $a)
            Bienvenido {{ $a->name}} al Panel de Configuracion
            @endforeach
        </small>
    </div>
    <div class="row">
        <div class="col-md-8">
            <legend class="text-warning">Ajustes</legend>
            <div class="tabs-x tabs-left">
                <ul id="myTab-kv-13" class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#home-kv-13" role="tab" data-toggle="tab"><i
                        class="glyphicon glyphicon-home"></i> Configuracion General</a></li>
                        <li><a href="#profile-kv-13" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
                        Foto de Perfil</a></li>
                        <li><a href="#profile-kv-14" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
                        Seguridad de la Cuenta</a></li>
                    </ul>
                    <div id="myTabContent-kv-13" class="tab-content">
                        <div class="tab-pane fade in active" id="home-kv-13">
                            {{Form::open(array('action'=>array('AjustesController@update', $a->id), 'method'=>'put', 'files'=> 'true'))}}
                            <div class="form-group">
                                <label for="detalles">Modificar Nombre de Usuario</label>
                                <input type="text" name="name" required value="{{$a->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="detalles">Modificar Email</label>
                                <input type="text" name="email" required value="{{$a->email}}" class="form-control">
                            </div>
                            <div class="form-group" hidden="">
                                {!!Form::label('','Tipo de Usuario:')!!}

                                <select class="form-control" name="tipo" id="option">
                                    <option value="{{$a->tipo}}">{{$a->tipo}}</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Modificar
                                    </button>
                                </div>
                            </div> 
                            {{Form::close()}}
                        </div>
                        <div class="tab-pane fade" id="profile-kv-13">
                            {{Form::open(array('action'=>array('AjustesController@update', $a->id), 'method'=>'put', 'files'=> 'true'))}}
                            <div class="form-group">
                                <label for="foto">Imagen</label>
                                <!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
                                <input type="file" name="foto"  class="form-control">
                                <br>
                                @if(($a->foto)!="")
                                <img src="/imagenes/usuarios/{{$a->foto}}" height="100px" width="100px">
                                @endif
                            </div>
                            <div class="form-group" hidden="">
                                <label for="detalles">Modificar Nombre de Usuario</label>
                                <input type="text" name="name" required value="{{$a->name}}" class="form-control">
                                <label for="detalles">Modificar Email</label>
                                <input type="text" name="email" required value="{{$a->email}}" class="form-control">
                                {!!Form::label('','Tipo de Usuario:')!!}

                                <select class="form-control" name="tipo" id="option">
                                    <option value="{{$a->tipo}}">{{$a->tipo}}</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Modificar
                                    </button>
                                </div>
                            </div> 
                            {{Form::close()}}

                        </div>
                        <div class="tab-pane fade" id="profile-kv-14">
                            <div class="form-group">
                                <label for="foto">Imagen</label>
                                
                            </div> 
                        </div>
                        
                    </div>
                </div>
                <!-- /tabs-left -->
            </div>
            <!-- /col-md-6 -->
            
        </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
          <!-- Nav tabs -->
          <div class="card">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>&nbsp; <span>Lo mas Visto</span></a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>&nbsp; <span>Lo mas reciente</span></a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i>&nbsp; <span>Lo Mas Comentado</span></a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi obcaecati neque, laborum vitae, pariatur aperiam ad fugit commodi a, iure odit, illum dicta molestiae exercitationem eum sint debitis distinctio. Cum!lorem
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus iste dignissimos vero ex suscipit necessitatibus aliquid perferendis earum. Alias, provident. Perspiciatis sapiente natus illo quia facilis harum quo sint labore!</div>
              <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
              <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
              
          </div>
      </div>
  </div>
</div>
</div>
@endsection