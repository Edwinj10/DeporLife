@extends('layouts.principal')
@section('content')
<div class="container">
            <div class="row">
    
                <div class="btn-group btn-breadcrumb" id="miga">
                      <a href="/" class="btn btn-danger"><i class="fa fa-home "></i></a>
                      <a href="/" class="btn btn-danger">Inicio</a>
                      
                      <a href="#" class="btn btn-danger">Futbol</a>
                      
                      <a href="#" class="btn btn-danger">Nacional</a>
                </div>
            </div>
 </div>
<section class="section-02">
          <div class="container">
              <h3>
                  <div class="heading-large">Noticias de Futbol Nacional
              </h3>
              <div class="row">
              @foreach ($futbol as $fut)
                  <div class="col-md-4">
                      <div class="card"> 
                          <img class="img-fluid" id="internacional" src="imagenes/publicaciones/{{ $fut->foto }}" alt="">
                            <div class="card-block">
                                <div class="news-title"><a href="{{ route('publicaciones.show', $fut->id ) }}">
                                    <h2 class=" title-small">{{ $fut->titulo}}</h2>
                                </a></div>
                                <p class="card-text">{{$fut->resumen}} ...</p>
                                <p class="card-text"><small class="text-time"><em>{{$fut->created_at}}</em></small></p>
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
                                <p class="card-text">{!! $portada->resumen!!} ...</p>
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