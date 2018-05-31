@extends ('layouts.admin')
@section ('content')
@include('errors.mensaje')
@include('errors.error')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div id="message-save" class="alert alert-success success" role="alert" style="display: none ">
            <strong id="save">Guardado Correctamente</strong>
          </div>
          <div id="message-delete" class="alert alert-info" role="alert" style="display: none ">
            <strong>El registro se elimino correctamente</strong>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <h3 class="panel-title">Listado de Categorias</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$categorias->total()}}</b></h3>
              <br>
            </div>
            <div class="col-md-6 text-right col-xs-12">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <!-- <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button> -->
            </div>
          </div>
          @include('errors.buscador')
          @include('categoria.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <div id="listar-categorias"></div>
          </div>
          </div
        </div>
        @include('categoria.modal-edit')

      </div></div></div>

      <script>
        $(document).ready(function(){
          listCategorias();
        });
      // paginacion
      $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
          type: 'get',
          url: url,
          success: function(data){
            $('#listar-categorias').empty().html(data);
          }
        });
      });
      // listar
      var listCategorias = function()
      {

        $.ajax({
          type:'get',
          url: '{{url('listallcategoria')}}',
          success: function(data){
            $('#listar-categorias').empty().html(data);
          }
        });
      }
      // guardar
      $('#GrabarC').click(function(event)
      {
        var categoria = $('#categoria').val();
        var token = $("input[name=_token]").val();
        var route = "{{route('categoria.store')}}";

        $.ajax({
          url : route ,
          headers: {'X-CSRF-TOKEN':token},
          type: 'post',
          datatype : 'json' ,
          data: {categoria: categoria},
          success:function(data)
          {
            if (data.success == 'true')
            {

              // alert('Comentario Guardado Correctamente');
              // $('#save').fadeOut(1500);
              $('#categoria').val('');
              $('#modal-create').modal('toggle');
              // $('#message-save').fadeIn(1500);
              $('#message-save').show().delay(2000).fadeOut(2);
              listCategorias();

            }
          },
          error:function(data)
          {
            // console.log(data.responseJSON.comentario);
            $("#error").html(data.responseJSON.categoria);
            $('#message-error').show().delay(2000).fadeOut(2);
          }
        })

      });

      // mostar
      var Mostrar = function(id)
      {
        var route = "{{url('categoria')}}/" +id+"/edit";
        $.get(route, function(data){
          $("#id").val(data.id);
          $("#categoriaedit").val(data.categoria);
        });
      }

      // actualizar

      $('#actualizar').click(function()
      {
        var id= $('#id').val();
        var categoriaedit = $('#categoriaedit').val();
        var route = "{{url('categoria')}}/" +id+"";
        var token = $('#token').val();

        $.ajax({
          url : route ,
          headers: {'X-CSRF-TOKEN':token},
          type: 'PUT',
          datatype : 'json' ,
          data: {categoria: categoriaedit},
          success: function(data){
            if (data.success == 'true') 
            {
              listCategorias();
            // $("#myModalEditar").modal('toggle');
            
            $('#myModalEditar').modal('toggle');
            $('#message-save').show().delay(2000).fadeOut(2);
            // $("#message-update").fadeIn(1500);

          }
        },
        error:function(data)
        {
          $('#error_edit').html(data.responseJSON.categoria);
          $('#message-error_edit').fadeIn();
           // $('#message-error_edit').show().delay(2000).fadeOut(2);
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
        var route = "{{url('categoria')}}/" +id+"";
        var token = $('#token').val();

        $.ajax({
          url : route ,
          headers: {'X-CSRF-TOKEN':token},
          type: 'DELETE',
          datatype : 'json' ,
          success: function(data){
            if (data.success == 'true') 
            {
              listCategorias();
              // $("#message-delete").fadeIn();
              $('#message-delete').show().delay(2000).fadeOut(2);
            }
          }
        });
      });
    };


  </script>
  
  @stop
