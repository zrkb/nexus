<!-- HEADER -->
<div class="header">
	<!-- Body -->
	<div class="header-body">
		<div class="row align-items-center">
			<div class="col">
				
				@isset($preTitle)
					<!-- Pretitle -->
					<h6 class="header-pretitle">
						{{ $preTitle }}
					</h6>
				@endisset

				<!-- Title -->
				<h1 class="header-title">
					{{ $slot }}
				</h1>
			</div>
			
			<div class="col-auto">
				{{ $superactions ?? '' }}
			</div>
		</div>
		<!-- / .row -->
		
		{{ $segments ?? '' }}
	</div>
	<!-- / .header-body -->
</div>
<!-- / .header -->
