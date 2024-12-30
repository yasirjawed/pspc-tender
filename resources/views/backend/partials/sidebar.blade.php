<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ url('/manager') }}" class="brand-link">
            <img src="{{ asset('backend/assets/img/pspc-logo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">PSPC</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        @if (Auth::guard('admin')->check())
            <form id="logout-form" action="{{ route('manager.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/manager') }}" class="nav-link"><i class="nav-icon fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="nav-icon fa-solid fa-user"></i>
                        <p>Authentication<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin-create')
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link"> <i class="nav-icon far fa-circle"></i>
                                    <p>Add Admin User</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin-list')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link"> <i class="nav-icon far fa-circle"></i>
                                    <p>Manage Admin Users</p>
                                </a>
                            </li>
                        @endcan
                        @can('add-role')
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link"> <i class="nav-icon far fa-circle"></i>
                                    <p>Add Role</p>
                                </a>
                            </li>
                        @endcan
                        @can('list-role')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link"> <i class="nav-icon far fa-circle"></i>
                                    <p>Manage Roles</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manager.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"> <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
