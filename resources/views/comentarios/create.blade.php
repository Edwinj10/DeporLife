<!-- Central Modal Medium Info -->
<div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Modal Info</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <div id="message-error" class="alert alert-danger danger" role="alert" style="display: none ">
                        <strong id="error-save"></strong>
                  </div>
                  <div class="md-form">
                    <strong id="error"></strong>
                    {!! Form::open(['id' => 'form']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                    <input type="hidden" id="id">
                    <br>
                    <textarea type="text"  class="md-textarea" id="comentario"></textarea>
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                    <input type="hidden" name="publicacions_id" id="publicacions_id" value="{{$publicacion->id}}">
                    <input type="hidden" name="estado" id="estado" value="Espera">
                    <label for="form8">Agregar comentario</label>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    <!--Footer-->
    <div class="modal-footer justify-content-center">
     {!!link_to('##', 'Grabar', ['id' => 'Grabar', 'class' => 'btn btn-primary'])!!}

     <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">No, thanks</a>
 </div>
</div>
<!--/.Content-->
</div>
</div>
<!-- Central Modal Medium Info-->
