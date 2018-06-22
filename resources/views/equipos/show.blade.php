@extends('layouts.principal')
@section('content')
<div class="container">
	<!-- Projects section v.3 -->
	<section class="">
		

		<!-- Grid row -->
		<div class="row">


			<!-- Grid column -->
			<div class="col-lg-7 mb-lg-0 mb-5">
				<h2 class="widget-title">Equipos</h2>
				<!--Image-->
				<img src="/imagenes/equipos/platillas/{{ $equipo->plantilla }}" alt="{{$equipo->nombre}}" class="img-fluid rounded z-depth-1">
			</div>
			<!-- Grid column -->
			<div class="col-lg-1"></div>
			<!-- Grid column -->
			
			<div class="col-lg-4">
				<h2 class="widget-title">Datos Generales</h2>
				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Nombre</h5>
						<p class="grey-text">{{$equipo->nombre}}</p>
					</div>
				</div>
				<!-- Grid row -->

				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Apodo</h5>
						<p class="grey-text">{{$equipo->apodo}}</p>
					</div>
				</div>
				<!-- Grid row -->

				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Liga</h5>
						<p class="grey-text mb-0">{{$equipo->liga}}</p>
					</div>
				</div>
				<!-- Grid row -->
			</div>

			<div class="col-md-7" id="descripcion">
				{!!$equipo->descripcion!!}
			</div>
			<div class="col-lg-1"></div>
			
			<div class="col-lg-4">
				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Pais</h5>
						<p class="grey-text">{{$equipo->pais}}</p>
					</div>
				</div>
				<!-- Grid row -->

				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Nombre de Estadio</h5>
						<p class="grey-text">{{$equipo->nombre_estadio}}</p>
					</div>
				</div>
				<!-- Grid row -->

				<!-- Grid row -->
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Sitio Web</h5>
						<p class="grey-text mb-0">{{$equipo->sitio_web}}</p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-1 col-2">
						<i class="fa fa-check fa-2x red-text"></i>
					</div>
					<div class="col-md-11 col-10">
						<h5 class="font-weight-bold mb-3">Logo</h5>
						<img src="/imagenes/equipos/logos/{{ $equipo->lo }}" alt="{{$equipo->nombre}}" class="img-fluid rounded z-depth-1">
					</div>
					
				</div>
				<!-- Grid row -->

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

		<hr class="my-5">

		<!-- Grid row -->
		<div class="row">
			<!-- Grid column -->
			
			
			<div class="col-md-6" id="descripcion">
				<h2 class="widget-title">Historia</h2>
				{!!$equipo->historia!!}
			</div>

			
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-lg-6">
				<h2 class="widget-title">Estadio</h2>
				<!--Image-->
				<img src="/imagenes/equipos/estadios/{{ $equipo->estadio }}" alt="{{$equipo->nombre}}" class="img-fluid rounded z-depth-1">
			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

	</section>
	<!-- Projects section v.3 -->
</div>
@endsection