@extends('layouts.principal')
@section('content')
<section class="section-01">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h4 id="titulo">{{$publicacion->titulo}}</h4>
        <div class="social-counters ">
          <!--Facebook-->
          <a class="btn btn-fb ">
            <i class=" fa fa-facebook"></i>
            <span class="clearfix d-none d-md-inline-block">Facebook</span>
          </a>
          <!--Twitter-->
          <a class="btn btn-tw ">
            <i class="fa fa-twitter"></i>
            <span class="clearfix d-none d-md-inline-block">Twitter</span>
          </a>
          <!--Google+-->
          <a class="btn btn-gplus ">
            <i class="fa fa-google-plus"></i>
            <span class="clearfix d-none d-md-inline-block">Google+</span>
          </a>
          <!--Comments-->
          <a class="btn btn-default " href="" data-target="#myModalCreate" data-toggle="modal">
            <i class="fa fa-comments-o"></i>
            <span class="clearfix d-none d-md-inline-block">Comentar</span>
          </a>
        </div>
        <!-- fin social -->
        <!-- linia de tiempo -->
        <hr id="icon">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6">
              <img src="/img/Logos/perfil.png" alt="" id="iconos1"><label id="icon">{{$publicacion->name}}</label>
            </div>
            <div class="col-md-6">
              <img src="/img/Logos/reloj-de-contorno-circular.png" alt="" id="iconos2"><label id="icon">{{$publicacion->created_at->diffForHumans()}}</label>
            </div>
          </div>
        </div>
        <hr id="icon">
        <!-- fin linea de tiempo -->
        <br>
        <!--Social shares-->
        <div class="card">
          <div class="view hm-zoom">
            <img class="img-fluid" src="/imagenes/publicaciones/{{ $publicacion->foto }}" alt="{{$publicacion->titulo}}"></a>  
          </div> 
          <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$publicacion->categoria}}</span> </div>
        </div>

        {!!$publicacion->descripcion!!}
        <!-- slishow -->

        @if(!$imagenes->isEmpty())
        <div class="row">
          <div class="bxslider">
            @foreach($imagenes as $img)
            <div><img src="/imagenes/publicaciones/{{ $img->image }}" class="img-fluid"></div>
            @endforeach
          </div>
        </div>
        @else
        @endif
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <h6 id="temas">Temas relacionados:</h6>
            @foreach($publicacion->etiquetas as $tag)
            <button type="button" class="btn btn-danger btn-rounded" id="tags">{{$tag->etiqueta}}</button>
            @endforeach
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-4">
        <h2 class="widget-title">Últimas Noticias</h2>
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
                <h2 class=" title-small"><a href="/noticias/{{$last->categoria}}/{{$last->slug}}">{{substr(strip_tags($last->titulo), 0,35)}}..
                  <i class="fa fa-angle-right"></i></a></h2>
                  <p class="card-text"></strong><small class="text-time" id="sma"><em><i class="fa fa-clock-o"></i>  {!!$last->created_at->diffForHumans()!!} </em></small></p>
                </div>

              </div>
            </div>
            <hr>
            @endforeach
            <!--poner etiquetas -->
          </div>

        </div>
      </div>
      <!-- mensajes -->
      <div class="col-lg-12">
        <!-- <div id="message-error" class="alert alert-danger danger" role="alert" style="display: none ">
          <strong id="error"></strong>
        </div> -->
        <div id="message-delete" class="alert alert-info" role="alert" style="display: none ">
          <strong>El registro se elimino correctamente</strong>
        </div>
        <div id="message-save" class="alert alert-success success" role="alert" style="display: none ">
          <strong id="save">Comentario Guardado Correctamente</strong>
        </div>
        <div id="message-update" class="alert alert-success info" role="alert" style="display: none ">
          <strong id="save">Comentario Actualizado Correctamente</strong>
        </div>
      </div>
      <br>
      <h2 class="widget-title">Comentarios</h2>
      <section class="">

        <!--Grid row-->
        <div class="row">
          <div class="col-lg-6" id="listar-comentarios">
          </div>
          <div class="col-lg-6">
            <h1>save</h1>
          </div>
        </div>
        
        <!--Grid row-->
      </section>
      @include('comentarios.editar')
      @include('comentarios.create')
    </section>
    <!--  </div> -->

  <!-- <section class="video-gallery-sec">
    <div class="container">
      <div class="heading-large">Últimas Noticias</div>
      <div class="row">
       

      </div>

    </div>
  </section> -->
</div>
<div id="divCheckbox" style="display: none;">
  <input id="categoria" class="form-control" name="categoria" type="text" value="{{$publicacion->categoria}}">
</input>
<input id="slug" class="form-control" name="categoria" type="text" value="{{$publicacion->slug}}">
</input>
</div>     

<!-- script comentario -->
<script>
  $(function(){
    $('.bxslider').bxSlider({
      mode: 'fade',
      captions: true,
      // slideWidth: 700,
      // auto: true

    });
  });
</script>
<script>
  $(document).ready(function(){
    listComentarios();
  });
    // paginacion
    $(document).on("click", ".pagination li a", function(e){
      e.preventDefault();

      var url = $(this).attr('href');

      $.ajax({
        type: 'get',
        url: url,
        success: function(data){
          $('#listar-comentarios').empty().html(data);
        }
      });
    });
    // fin paginacion

    // $('#nuevo').click(function(event)
    // {
    //   document.location.href = "{{ route('comentarios.create')}}";
    // });
    // // listar los comentatios
    var listComentarios = function()
    {
      // concatenar slug y categoria
      var categoria=$('#categoria').val();
      var slug=$('#slug').val();
      var concatenar = categoria+ '/'+slug;
      // console.log(slug);
      $.ajax({
        type:'get',
        url: '{{url('listall')}}' + '/' + concatenar,
        success: function(data){
          $('#listar-comentarios').empty().html(data);
        }
      });
    }
    // guardar comentario
    $('#Grabar').click(function(event)
    {
      var user_id = $('#user_id').val();
      var publicacions_id = $('#publicacions_id').val();
      var comentario = $('#comentario').val();
        // var fecha = moment().format('D MMM, YYYY');
        var estado = $('#estado').val();
        var token = $("input[name=_token]").val();
        var route = "{{route('comentarios.store')}}";

        $.ajax({
          url : route ,
          headers: {'X-CSRF-TOKEN':token},
          type: 'post',
          datatype : 'json' ,
          data: {user_id: user_id, comentario: comentario, publicacions_id: publicacions_id, comentario: comentario, estado: estado},
          success:function(data)
          {
            if (data.success == 'true')
            {

              // alert('Comentario Guardado Correctamente');
              // $('#save').fadeOut(1500);
              $('#comentario').val('');
              $('#myModalCreate').modal('toggle');
              // $('#message-save').fadeIn(1500);
              alert('Comentario Guardado Correctamente');
              $('#message-save').show().delay(2000).fadeOut(2);
              listComentarios();

            }
          },
          error:function(data)
          {
            // console.log(data.responseJSON.comentario);
            $('#error-save').html(data.responseJSON.comentario);
          // $('#message-error_edit').fadeIn();
          $('#message-error').show().delay(2000).fadeOut(2);
        }
      })

      });

    // editar comentario
    var Mostrar = function(id)
    {
      var route = "{{url('comentarios')}}/" +id+"/edit";
      $.get(route, function(data){
        $("#id").val(data.id);
        $("#comentarioedit").val(data.comentario);
        $("#estadoedit").val(data.estado);
        $("#user_edit").val(data.user_id);
        $("#publicacions_id_edit").val(data.publicacions_id);
      });
    }
    $('#actualizar').click(function()
    {
      var id= $('#id').val();
      var user_edit = $('#user_edit').val();
      var publicacions_id_edit = $('#publicacions_id_edit').val();
      var comentarioedit = $('#comentarioedit').val();
      var estadoedit = $('#estadoedit').val();

      var route = "{{url('comentarios')}}/" +id+"";
      var token = $('#token').val();

      $.ajax({
        url : route ,
        headers: {'X-CSRF-TOKEN':token},
        type: 'PUT',
        datatype : 'json' ,
        data: {comentario: comentarioedit},
        success: function(data){
          if (data.success == 'true') 
          {
            listComentarios();
            // $("#myModalEditar").modal('toggle');
            
            $('#myModalEditar').modal('toggle');
            $('#message-update').show().delay(2000).fadeOut(2);
            // $("#message-update").fadeIn(1500);

          }
        },
        error:function(data)
        {
          $('#error_edit').html(data.responseJSON.comentario);
          // $('#message-error_edit').fadeIn();
          $('#message-error_edit').show().delay(2000).fadeOut(2);
          if (data.status == 422) 
          {
            console.clear();
          }
        }
      });
    });

    // cuando se cierra la ventana modal
    $("#myModalEditar").on("hidden.bs.modal", function () {
      $("message-error_edit").fadeOut()
    });
    
    var Eliminar = function(id)
    {
      // Alert Jquery
      $.alertable. confirm ("Está seguro de eliminar el registro?").then(function(){
        var route = "{{url('comentarios')}}/" +id+"";
        var token = $('#token').val();

        $.ajax({
          url : route ,
          headers: {'X-CSRF-TOKEN':token},
          type: 'DELETE',
          datatype : 'json' ,
          success: function(data){
            if (data.success == 'true') 
            {
              listComentarios();
              // $("#message-delete").fadeIn();
              $('#message-delete').show().delay(2000).fadeOut(2);
            }
          }
        });
      });
    };
  </script>
  @endsection

