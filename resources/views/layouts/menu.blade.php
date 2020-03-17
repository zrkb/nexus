<div class="dropdown">

    <!-- Toggle -->
    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-sm">
            <span class="avatar-title rounded-circle">{{ admin()->initials }}</span>
        </div>
    </a>

    <!-- Menu -->
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('profile.edit') }}">
            {{ admin()->fullname }}
            <span class="text-muted d-block mt-2">{{ admin()->email }}</span>
        </a>

        <hr class="dropdown-divider">

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

        <a class="dropdown-item text-danger mt-2" href="{{ admin_base_path('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i data-feather="log-out" class="mr-2"></i>
            @lang('nexus::messages.profile-menu-item-logout')
        </a>

        <form id="logout-form" action="{{ admin_base_path('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div>
{{-- END dropdown --}}
