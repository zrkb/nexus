@extends('laramie::layouts/app')

@section('content')
<div class="row justify-content-center">
	<div class="col-12 col-lg-10 col-xl-8">
		<!-- Header -->
		<div class="header mt-md-5">
			<div class="header-body">
				<!-- Pretitle -->
				<h6 class="header-pretitle">
					Bienvenido 
				</h6>
				<!-- Title -->
				<h1 class="header-title">
					{{ greetings(admin()->firstname) }},
				</h1>
			</div>
		</div>
		<!-- Card -->

		<div class="card">
			<div class="card-body text-center">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-xl-8">
						<!-- Image -->
						<img src="{{ assets_path() }}/assets/img/illustrations/happiness.svg" alt="..." class="img-fluid mt-n5 mb-4" style="max-width: 272px;">
						<!-- Title -->
						<h2>
							Prueba estos consejos para comenzar.
						</h2>
						<!-- Content -->
						<p class="text-muted">
							Para comenzar a navegar por el sitio, puedes ir haciendo click en cualquier sección de la barra lateral izquierda.
						</p>
						<!-- Button -->
					</div>
				</div> <!-- / .row -->
			</div>
		</div>
	</div>
</div>
@endsection
