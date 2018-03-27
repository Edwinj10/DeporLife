
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
             <!--  <div class="form-group">
                <h3 class="panel-title"><b>Filtrar por estado:</b></h3>
                <br>
                <select name="estado" class="form-control selectpicker" data-live-search="true" onchange="Seleccionar();" id="estado">
                  <option value="">Eliga una opcion</option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div> -->
            </div>
            <div class="col-md-6 text-right col-xs-12">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
            </div>
          </div>
          @include('errors.buscador')
          
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
                @include('publicaciones.modal-create')
                @include('publicaciones.modal')
                

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
    @push ('scripts')
    <script type="text/javascript">
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
</script>
@endpush
@stop