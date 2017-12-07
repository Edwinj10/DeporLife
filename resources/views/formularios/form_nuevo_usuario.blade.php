<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Nuevo Usuario del Sistema</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>



<form  id="f_nuevo_usuario"  method="post"  route="usuarios.store" class="form-horizontal form_entrada" >                
  <!-- es necesario para que se cargenlos datos -->
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              


<div class="box-body col-xs-12">
<div class="form-group col-xs-12">
                      <label for="nombre">Nombres*</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" >
</div>

<div class="form-group col-xs-12">
                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="email" >
</div>

<div class="form-group col-xs-12">
                      <label for="email">Password*</label>
                      <input type="password" class="form-control" id="password" name="password" p required >
</div>

</div>
<div class="form-group col-xs-12">
                      <label for="email">Password*</label>
                      <input type="text" class="form-control" id="foto" name="foto" p required >
</div>
<div class="form-group">
                            {!!Form::label('','Tipo de Usuario:')!!}

                            <select class="form-control" name="tipo" id="option">
                                
                                <option value="2">Usuario</option>
                            </select>
                         </div>


<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
</div>


</form>

</div>
