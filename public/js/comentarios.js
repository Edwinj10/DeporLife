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
              $('#message-save').fadeIn(1500);
              listComentarios();

            }
          },
          error:function(data)
          {
            // console.log(data.responseJSON.comentario);
            $("#error").html(data.responseJSON.comentario);
            $("#message-error").fadeIn();
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
            $("#message-update").fadeIn();
          }
        },
        error:function(data)
        {
          $('#error_edit').html(data.responseJSON.comentario);
          $('#message-error_edit').fadeIn();
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
              $('#message-delete').show().deplay(3000).fadeOut(1);
              $("#message-save").hide();
            }
          }
        });
      });
    };