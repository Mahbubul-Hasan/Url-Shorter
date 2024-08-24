<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @can('Dashboard')
                    <li>
                        <a href="{{ route('backend.dashboard') }}">
                            <i class="fas fa-yin-yang"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endcan
                @can('Short url list')
                    <li>
                        <a href="{{ route('backend.url-short') }}">
                            <i class="fas fa-link"></i>
                            <span data-key="t-dashboard">Url</span>
                        </a>
                    </li>
                @endcan
                @can('Show settings')
                    <li>
                        <a href="{{ route('backend.settings.index') }}">
                            <i class="fas fa-cog"></i>
                            <span data-key="t-dashboard">Settings</span>
                        </a>
                    </li>
                @endcan
                @can('Permission list')
                    <li>
                        <a href="{{ route('backend.permissions.index') }}">
                            <i class="fas fa-shield-alt"></i>
                            <span data-key="t-dashboard">Permissions</span>
                        </a>
                    </li>
                @endcan
                @can('Role list')
                    <li>
                        <a href="{{ route('backend.roles.index') }}">
                            <i class="fas fa-user-shield"></i>
                            <span data-key="t-dashboard">Roles</span>
                        </a>
                    </li>
                @endcan
                @can('User list')
                    <li>
                        <a href="{{ route('backend.users.index') }}">
                            <i class="fas fa-user"></i>
                            <span data-key="t-dashboard">Users</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
