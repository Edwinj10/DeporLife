@extends('layouts.principal')
@section('content')
  <br>
  <br>
      
          <div class="container" id="publicaciones">
            <div class="row">
              <div class="col-md-12">
                <h4 id="titulo" align="center">{{$imagen->titulo}}</h4>
              </div>
            </div>
            <div class="row">
                <div align="center">
                    <div class="col-md-12" align="center" id="imag">
                      <a href="/imagenes/imagenes/{{$imagen->foto}}" data-lightbox="publicaciones" data-title="{{$imagen->titulo}}"> 
                        <img class="img-thumbnail" src="/imagenes/imagenes/{{$imagen->foto}}"   alt=""/>
                      </a>
                      <div class="tittle">Click en la Imagen para aumentar el tamaño</div>
                    </div>
                </div>
            </div>
            <div class="row">          
              <div class="col-md-12">
                <p id="descripcion">
                  <div class="tittle">Click en la Imagen para aumentar el tamaño</div>
                </p>
              </div>
            </div>
            <div class="row">          
              <div class="col-md-12">
                <p id="descripcion">
                  <div class="title-large">{{$imagen->descripcion}}</div>
                </p>
              </div>
            </div>
          </div>
          
      

@endsection
