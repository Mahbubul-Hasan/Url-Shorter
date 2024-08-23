<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('backend.dashboard') }}">
                        <i class="fas fa-yin-yang"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('backend.url-short') }}">
                        <i class="fas fa-link"></i>
                        <span data-key="t-dashboard">Url</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.users') }}">
                        <i class="fas fa-user"></i>
                        <span data-key="t-dashboard">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.settings.index') }}">
                        <i class="fas fa-cog"></i>
                        <span data-key="t-dashboard">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
