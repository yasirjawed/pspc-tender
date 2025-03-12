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
                        <p class="text-sidebar-resizer">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><i class="nav-icon fa-solid fa-globe"></i>
                        <p class="text-sidebar-resizer">Main Website</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.business-profiling.index') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-business-time"></i>
                        <p class="text-sidebar-resizer">Business Profile
                            {!! session('profile_incomplete.business-profile')
                                ? '<i class="blinking-circle"></i>'
                                : '<i class="blinking-tic"></i>' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.registration-bodies.index') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-registered"></i>
                        <p class="text-sidebar-resizer">Registration Bodies
                            {!! session('profile_incomplete.registration-bodies')
                                ? '<i class="blinking-circle"></i>'
                                : '<i class="blinking-tic"></i>' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.supporting-documents.index') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-folder-open"></i>
                        <p class="text-sidebar-resizer">Supporting Documents
                            {!! session('profile_incomplete.supporting-documents')
                                ? '<i class="blinking-circle"></i>'
                                : '<i class="blinking-tic"></i>' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.vendor-addresses.index') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-map-location-dot"></i>
                        <p class="text-sidebar-resizer">Vendor Address(es)
                            {!! session('profile_incomplete.vendor-addresses')
                                ? '<i class="blinking-circle"></i>'
                                : '<i class="blinking-tic"></i>' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.vendor.authentication.logout') }}" class="nav-link"> <i
                            class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p class="text-sidebar-resizer">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
