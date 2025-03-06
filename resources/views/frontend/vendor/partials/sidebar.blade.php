<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ route('web.vendor.profile.index') }}" class="brand-link">
            <img src="{{ asset('backend/assets/img/pspc-logo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">PSPC</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('web.vendor.profile.index') }}" class="nav-link"><i
                            class="nav-icon fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="nav-icon fa-solid fa-user"></i>
                        <p>Authentication<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link"> <i
                                    class="nav-icon far fa-circle"></i>
                                <p>Add Admin User</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('web.vendor.business-profiling.index') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-user"></i>
                        <p>Business Profile
                            {!! session('profile_incomplete.business-profile')
                                ? '<i class="blinking-circle"></i>'
                                : '<i class="blinking-tic"></i>' !!}

                        </p>


                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.authentication.logout') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
