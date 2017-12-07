@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

{!!Html::style('css/custom2.css')!!}



@extends('layouts.principal')
@section('content')
<section class="gallery-sec" id="gallery">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
    <div class="heading text-md-center text-xs-center">
      <h2><div class="heading-large">Galeria de Imagenes</div></h2>

    </div>
    </div>
      <div class="col-md-12"> 
        <!-- iso section -->
        <div class="iso-section text-md-center text-xs-center" data-wow-delay="0.5">
          
          
          <!-- iso box section -->
          <div class="iso-box-section wow fadeInUp" data-wow-delay="0.9s">
            <div class="iso-box-wrapper col4-iso-box">
                @foreach ($galeria as $g)
              <div class="iso-box london paris ny col-md-4 col-sm-6">
                <div class="gallery-thumb"> <a href="imagenes/imagenes/{{ $g->foto }}" data-lightbox="media-4"> <img src="imagenes/imagenes/{{ $g->foto }}" class="fluid-img" alt="Gallery">
                  <div class="gallery-overlay">
                    <div class="gallery-item"> <i class="fa fa-search"></i> </div>
                  </div>
                  </a> </div>
              </div>
              @endforeach
              
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
          
          
@push ('scripts')     
<script src="/js/nivo-lightbox.min.js"></script>   
@endpush  
@endsection