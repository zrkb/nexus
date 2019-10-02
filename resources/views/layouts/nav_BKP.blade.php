<nav class="navbar navbar-expand-md bg-white border-bottom fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ route('app') }}">
			<i class="bx bxs-server mr-2"></i>
			{{ env('APP_NAME') }}
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header-dropdown" aria-controls="navbar-header-dropdown" aria-expanded="false" aria-label="Toggle navigation">
			<i data-feather="menu"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbar-header-dropdown" style="flex-grow: 0;">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('activities.index') }}" title="Notificaciones">
						<i class="bx bx-terminal"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a href="javascript:;"
						id="profile-dropdown"
						class="nav-link nav-link-avatar dropdown-toggle"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false">
						<div class="user-avatar">
							<span class="no-image-user" title="{{ admin()->fullname }}">
								{{ admin()->initials }}
							</span>
							<!-- <img src="assets/img/avatars/quaver.svg" title="{{ admin()->fullname }}"> -->
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
						<a class="dropdown-item" href="{{ route('admins.show', ['id' => admin()->id]) }}">
							{{ admin()->fullname }}
							<span class="text-muted">{{ admin()->email }}</span>
						</a>

						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="{{ route('admins.index') }}">
							<i data-feather="users" class="mr-2 text-muted"></i>
							@lang('nexus::messages.profile-menu-item-admins')
						</a>

						<a class="dropdown-item" href="{{ route('roles.index') }}">
							<i data-feather="star" class="mr-2 text-muted"></i>
							@lang('nexus::messages.profile-menu-item-roles')
						</a>

						<a class="dropdown-item" href="{{ route('permissions.index') }}">
							<i data-feather="shield" class="mr-2 text-muted"></i>
							@lang('nexus::messages.profile-menu-item-permissions')
						</a>

						<a
							class="dropdown-item text-danger mt-2"
							href="{{ admin_base_path('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i data-feather="log-out" class="mr-2"></i>
								@lang('nexus::messages.profile-menu-item-logout')
							</a>

						<form
							id="logout-form"
							action="{{ admin_base_path('logout') }}"
							method="POST"
							class="d-none">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
