@extends('layouts.principal')
@section('content')
  <br>
  <br>
      
          <div class="container" id="publicaciones">
            <div class="row">
              <div class="col-md-12">
                <h4 id="titulo" align="center">{{$portada->titulo}}</h4>
              </div>
            </div>
            <div class="row">
                <div align="center">
                    <div class="col-md-8 offset-md-2" align="center" id="imag">
                      <a href="/imagenes/portada/{{$portada->foto}}" data-lightbox="portadas" data-title="{{$portada->titulo}}"> 
                        <img class="img-thumbnail" src="/imagenes/portada/{{$portada->foto}}"   alt=""/>
                      </a>
                      <div class="tittle"><i class="fa fa-search" aria-hidden="true">Click en la Imagen para aumentar el tamaño</i></div>
                    </div>
                    
                </div>
            </div>
            <div class="row">          
              <div class="col-md-12">
                <p id="descripcion">
                  <div class="title-large">{!!$portada->descripcion!!}</div>
                </p>
              </div>
            </div>
          </div>
          
      

@endsection
