<!-- NAVIGATION
================================================== -->

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
  <div class="container-fluid">

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="{{ route('app') }}">
      <img src="{{ assets_path() }}/assets/img/logo.svg" class="navbar-brand-img 
      mx-auto" alt="...">
    </a>

    <!-- User (xs) -->
    <div class="navbar-user d-md-none">

      <!-- Dropdown -->
      <div class="dropdown">

        <!-- Toggle -->
        <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-sm avatar-online">
            <img src="{{ assets_path() }}/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
          </div>
        </a>

        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
          <a href="profile-posts.html" class="dropdown-item">Profile</a>
          <a href="settings.html" class="dropdown-item">Settings</a>
          <hr class="dropdown-divider">
          <a href="sign-in.html" class="dropdown-item">Logout</a>
        </div>

      </div>

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
