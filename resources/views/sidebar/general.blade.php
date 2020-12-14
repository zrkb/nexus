<!-- Heading -->
<h6 class="navbar-heading">
    @lang('nexus::messages.sidebar-group-general-title')
</h6>

<!-- Navigation -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ is_route('app') ? 'active' : '' }}" href="{{ route('app') }}" role="button">
            <i class='bx bxs-home'></i>
            @lang('nexus::messages.sidebar-group-general-item-welcome')
        </a>
    </li>

    @includeIf(config('nexus.general_sidebar_items'))
</ul>
