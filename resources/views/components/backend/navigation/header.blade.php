<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box text-center">
                <a href="{{ route('backend.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="" height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="" height="50">
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
    </div>
</header>
