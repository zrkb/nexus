<!-- NAVIGATION
================================================== -->

<nav class="navbar {{ config('nexus.sidebar_color_scheme') }} navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
	<div class="container-fluid">

	  <!-- Toggler -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<i class='bx bx-menu'></i>
	  </button>

	  <!-- Brand -->
	  <a class="navbar-brand" href="{{ route('app') }}">
		<img src="{{ assets_path() }}/assets/img/logo.svg" class="navbar-brand-img
		mx-auto" alt="...">
	  </a>

	  <!-- User (xs) -->
	  <div class="navbar-user d-md-none">
		@include('nexus::layouts/menu')
	  </div>

	  <!-- Collapse -->
	  <div class="collapse navbar-collapse mt-3 pt-3" id="sidebarCollapse">

		@include('nexus::sidebar/general')

		<!-- Push content down -->
		<div class="mt-auto"></div>

		<!-- Bottom Content -->

	  </div>
	  <!-- / .navbar-collapse -->
	</div>
  </nav>
