@extends('layouts.principal')
@section('content')
<section class="banner-sec">
  <div class="container">
    <h2 class="widget-title">Fútbol Nicaragüense</h2>
    <div class="row">
      <div class="col-md-11 offset-md-1"> 
        <div class="jumbotron" id="equipos" align="center">
          @foreach ($equipos as $team)
          <a href="/futbol/futbolnacional/equipos/{{$team->nombre}}">
            <img src="/imagenes/equipos/logos/{{ $team->logo }}" height="70px" alt="{{$team->titulo}}" align="center"></a>
            @endforeach
          </div>
        </div>
      </div>
      <h2 class="widget-title">Noticias</h2>
      <div class="row">
        <div class="col-md-8"> 
         @foreach ($futbolnac as $fut)
         <div class="col-md-6">
          <div class="card"> 
            <a href="/noticias/{{$fut->categoria}}/{{$fut->slug}}">
              <div class="view hm-zoom">
                <img class="img-fluid" src="/imagenes/publicaciones/{{ $fut->foto }}" alt="{{$fut->titulo}}"></a> 
              </div>
              <div class="card-img-overlay"> <span class="tag tag-pill tag-danger">{{$fut->categoria}}</span> </div>
              <div class="card-block">
                <div class="news-title">
                  <h2 class=" title-small"><a href="/noticias/{{$fut->categoria}}/{{$fut->slug}}">{{$fut->titulo}}</a></h2>
                </div>
                <p class="card-text">{{substr(strip_tags($fut->resumen), 0,100)}}...</p>
                <p class="card-text"><small class="text-time" id="sma"><em>{!!$fut->created_at->diffForHumans()!!} </em></small></p>
              </div>
            </div>

          </div>
          @endforeach
        </div>
        <h2 class="widget-title">Datos</h2>
        <div class="col-md-4">
          
        </div>
      </div>
    </div>

  </section>
  @endsection