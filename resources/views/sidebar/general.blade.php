<!-- Heading -->
<h6 class="navbar-heading">
	@lang('nexus::messages.sidebar-group-general-title')
</h6>

<!-- Navigation -->

<ul class="navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ route('app') }}" role="button" aria-expanded="true">
			<i class='bx bx-home-alt'></i> @lang('nexus::messages.sidebar-group-general-item-welcome')
		</a>
	</li>

	@includeIf('nexus::sidebar/user')
	
	{{-- <li class="nav-item">
		<a class="nav-link" href="#sidebarDashboards" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
			<i class='bx bx-package'></i> Menu
		</a>
		<div class="collapse" id="sidebarDashboards">
			<ul class="nav nav-sm flex-column">
				<li class="nav-item">
					<a href="#" class="nav-link ">
						Submenu
					</a>
				</li>
			</ul>
		</div>
	</li> --}}
</ul>
