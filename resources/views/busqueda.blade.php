@extends('layouts.principal')
@section('content')

<div class="container">
            <div class="row">
    
                <div class="btn-group btn-breadcrumb" id="miga">
                      <a href="/" class="btn btn-danger"><i class="fa fa-home "></i></a>
                      <a href="/" class="btn btn-danger">Inicio</a>
                      
                      <a href="#" class="btn btn-danger">Busqueda</a>
                </div>
            </div>
 </div>
<section class="section-02">
          <div class="container">
              <h2>
                  <div class="heading" align="center">Resultados Encontrados de: "{{$searchText}}">
              </h2>
              <div class="row">
              @foreach ($publicaciones as $publicacion)
                  <div class="col-md-4">
                      <div class="card"> 
                          <img class="img-fluid" id="internacional" src="imagenes/publicaciones/{{ $publicacion->foto }}" alt="">
                            <div class="card-block">
                                <div class="news-title"><a href="{{ route('publicaciones.show', $publicacion->id ) }}">
                                    <h2 class=" title-small">{{ $publicacion->titulo}}</h2>
                                </a></div>
                                <p class="card-text"><small class="text-time"><em>{{$publicacion->created_at}}</em></small></p>
                            </div>
                      </div>
                      <!-- >diffForHumans() -->
                  </div>
                  <!--  -->
                  @endforeach
                  <div align="center">
                      
                    </div>
                  
                   @foreach ($portadas as $portada)
                  <div class="col-md-4">
                      <div class="card"> 
                          <img class="img-fluid" id="internacional" src="imagenes/portada/{{ $portada->foto }}" alt="">
                            <div class="card-block">
                                <div class="news-title"><a href="{{ route('portadas.show', $portada->id ) }}">
                                    <h2 class=" title-small">{{ $portada->titulo}}</h2>
                                </a></div>
                                <p class="card-text"><small class="text-time"><em>{{$portada->created_at}}</em></small></p>
                            </div>
                      </div>
                      <!-- >diffForHumans() -->
                  </div>
                  <!--  -->
                  @endforeach
              </div>
             
          </div>
        </section>

        <br>
        
@endsection