<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-login">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                    
                </button>
                <h4 class="modal-title" id="iniciarsesion">Iniciar Sesion</h4>
            </div>
            <div class="top-head left">
              <div class="container">
                 <div class="row">
                    <div class="col-md-6 col-lg-4 col-xs-12">
                        <h1>Deportes.com<small>El Mejor Espacio Para Informarte</small></h1>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-body">
                {{Form::token()}}
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="email">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="password">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" data-toggle="password" required>



                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="logi">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}" id="olvidar">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $("#password").password('toggle');
</script>
<script type="text/javascript">
      $(document).ready(function(){
        $('.showPassword').on('change',function(){
          var isChecked = $(this).prop('checked');
          if (isChecked) {
            $('.my-password').attr('type','text');
          } else {
            $('.my-password').attr('type','Password');
          }
        });
      });
  </script>

    
