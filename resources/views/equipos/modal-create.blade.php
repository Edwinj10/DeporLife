<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
  <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>

          </button>
          <h4 class="modal-title">Agregar Equipos</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            
            <div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
              <form action="{{ route('equipos.store') }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label> Nombre:</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Add nombre" maxlength="60">
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="logo" class="form-control">
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label>Uniforme:</label>
                    <input type="file" name="uniforme" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button class="btn btn-success upload-image" type="submit">Guardar</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>


  </body>
  <script type="text/javascript">
    $("body").on("click",".upload-image",function(e){
      $(this).parents("form").ajaxForm(options);
    });

    var options = { 
      complete: function(response) 
      {
       if($.isEmptyObject(response.responseJSON.error)){
        $("input[name='nombre']").val('');
        alert('Image Upload Successfully.');
      }else{
        printErrorMsg(response.responseJSON.error);
      }
    }
  };


  function printErrorMsg (msg) {
   $(".print-error-msg").find("ul").html('');
   $(".print-error-msg").css('display','block');
   $.each( msg, function( key, value ) {
    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
  });
 }
</script>


