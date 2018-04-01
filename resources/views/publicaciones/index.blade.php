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
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <h3 class="panel-title">Listado de Publicacaiones</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$publicaciones->total()}}</b></h3>
              <br>
            </div>
            <div class="col-md-6 text-right col-xs-12">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-save" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
            </div>
            <div class="col-md-6 text-right col-xs-12">
              <button class="btn btn-primary" data-target="#modal-create" data-toggle="modal">Agregar Etiqueta</button>
            </div>
          </div>
          @include('errors.buscador')
          @include('tags.modal-create')
          
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Titulo</th>
                  <th>Resumen</th>
                  <th>Creador</th>
                  <th>Tipo de Deporte</th>
                  <th>Nacional o Internacional</th>
                  <th>Top de la Pagina</th>
                  <th>Imagen</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($publicaciones as $publicacion)
                  <td align="center">
                    <a class="btn btn-default" href="{{ route ('publicaciones.edit',[$publicacion->id])}}"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" href="" data-target="#modal-delete-{{$publicacion->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>

                  <td>{{ $publicacion->titulo}}</td>
                  <td>{!! $publicacion->resumen!!}</td>
                  <td>{{ $publicacion->name}}</td>
                  <td>{{ $publicacion->categoria}}</td>
                  <td>{{ $publicacion->tipo}}</td>
                  <td>{{ $publicacion->importante}}</td>
                  <td>
                    <img src="{{asset('imagenes/publicaciones/'.$publicacion->foto)}}" alt="{{ $publicacion->titulo}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                </tr>
                
                @include('publicaciones.modal')
                @include('publicaciones.modal-create')
                
                

                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-8">
              {{$publicaciones->render()}}
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    
    <script>
      $(document).ready(function(){
        listEtiquetas();
      });
      $(document).ready(function(){
        $("#ver").click(function(){
          $('.btn-danger').toggle(1000);
        });
      });
      $(document).ready(function(){
        $(".btn-danger").hide();
      });
      function Seleccionar()
      {

    // var cod = document.getElementById("indicadorcap").value;
    //  //` alert(cod);

    //  /* Para obtener el texto */
    // var combo = document.getElementById("indicadorcap");
    // var selected = combo.options[combo.selectedIndex].text;
    
    // document.getElementById('capturar').value = cod;
    // /* Para obtener el valor */
    var id=$('#estado option:selected').val();

    var ruta='/noticias/estado/'+ id;

    window.location.href=ruta;
    // var id=$('#capturar').val();
    // alert(selected);
     // console.log(ruta);
    // $.ajax({
    //   url:''+ruta,
    //   type:'get',
    // });
  }
  var listEtiquetas = function()
  {
    $.ajax({
      type:'get',
      url: '{{url('listtags')}}',
      success: function(data){
        $('#listar-tags').empty().html(data);
      }
    });
  }
  $('#GrabarE').click(function(event)
  {
    var etiqueta = $('#etiqueta').val();
    var token = $("input[name=_token]").val();
    var route = "{{route('etiquetas.store')}}";

    $.ajax({
      url : route ,
      headers: {'X-CSRF-TOKEN':token},
      type: 'post',
      datatype : 'json' ,
      data: {etiqueta: etiqueta},
      success:function(data)
      {
        if (data.success == 'true')
        {

              // alert('Comentario Guardado Correctamente');
              // $('#save').fadeOut(1500);
              $('#etiqueta').val('');
              $('#modal-create').modal('toggle');
              // $('#message-save').fadeIn(1500);
              $('#message-save').show().delay(2000).fadeOut(2);
              listEtiquetas();

            }
          },
          error:function(data)
          {
            // console.log(data.responseJSON.comentario);
            $("#error").html(data.responseJSON.etiqueta);
            $('#message-error').show().delay(2000).fadeOut(2);
          }
        })

  });
</script>

@stop