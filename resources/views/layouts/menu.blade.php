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

        @if (admin()->can('view_roles'))
            <a class="dropdown-item" href="{{ route('admins.index') }}">
                @lang('nexus::messages.profile-menu-item-admins')
            </a>
        @endif

        @if (admin()->can('view_roles'))
            <a class="dropdown-item" href="{{ route('roles.index') }}">
                @lang('nexus::messages.profile-menu-item-roles')
            </a>
        @endif

        @if (admin()->can('view_permissions'))
            <a class="dropdown-item" href="{{ route('permissions.index') }}">
                @lang('nexus::messages.profile-menu-item-permissions')
            </a>
        @endif

        <a class="dropdown-item text-danger mt-2" href="{{ admin_base_path('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            @lang('nexus::messages.profile-menu-item-logout')
        </a>

        <form id="logout-form" action="{{ admin_base_path('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div>
{{-- END dropdown --}}
