<!-- NAVIGATION
================================================== -->

<nav class="navbar {{ config('nexus.sidebar_color_scheme') }} navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
	<div class="container-fluid">

	  <!-- Toggler -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<i class='bx bx-menu'></i>
	  </button>

	  <!-- Brand -->
	  <a class="navbar-brand my-3 text-left" href="{{ route('app') }}">
		<h3 class="text-inherit">
            <i class='bx bxs-cube-alt text-primary'></i>
		    Nexus
        </h3>
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
