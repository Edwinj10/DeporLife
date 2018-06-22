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
              <h3 class="panel-title">Listado de Publicacaiones</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$team->total()}}</b></h3>
              <br>
            </div>
            <div class="col-md-6 text-right col-xs-12">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <!-- <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button> -->
            </div>
          </div>
          @include('equipos.modal-create')
          

        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <div id="listar-equipos"></div>
          </div>
        </div>
      </div>


    </div></div></div>

    <script>
      $(document).ready(function(){
        listEquipos();
      });
      // paginacion
      $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
          type: 'get',
          url: url,
          success: function(data){
            $('#listar-equipos').empty().html(data);
          }
        });
      });
      // listar
      var listEquipos = function()
      {

        $.ajax({
          type:'get',
          url: '{{url('listall')}}',
          success: function(data){
            $('#listar-equipos').empty().html(data);
          }
        });
      }
      // guardar


      
      // cuando se cierra la ventana modal
      


    </script>

    @stop