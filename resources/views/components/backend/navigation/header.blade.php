<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box text-center">
                <a href="{{ route('backend.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        {{ $settings->site_name }}
                    </span>
                    <span class="logo-lg">
                        {{ $settings->site_name }}
                    </span>
                </a>

                <a href="{{ route('backend.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('/') }}assets/backend/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="apps-contacts-profile.html"><i
                            class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="auth-lock-screen.html"><i
                            class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
                    <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>

    </div>
</header>
