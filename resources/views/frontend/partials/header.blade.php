<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('frontend/assets/img/pspc-logo.png') }}" alt="Bootstrap" width="80" height="80">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ACTIVE
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">TENDERS</a></li>
                        <li><a class="dropdown-item" href="#">RFQ's</a></li>
                        <li><a class="dropdown-item" href="#">NOTIFICATIONS</a></li>
                        <li><a class="dropdown-item" href="#">BID EVALUATIONS RESULTS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ARCHIVED
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">TENDERS</a></li>
                        <li><a class="dropdown-item" href="#">RFQ'S</a></li>
                        <li><a class="dropdown-item" href="#">NOTIFICATIONS</a></li>
                        <li><a class="dropdown-item" href="#">BID EVALUATIONS RESULTS</a></li>
                    </ul>
                </li>
            </ul>
            @auth('vendor')
                <a href="{{ route('web.vendor.profile.index') }}"><button class="custom-btn m-2"
                        role="button">PROFILE</button></a>
                <a href="{{ route('web.vendor.authentication.logout') }}"><button class="custom-btn m-2"
                        role="button">LOGOUT</button></a>
            @endauth
            @guest('vendor')
                <a href="{{ route('web.vendor.authentication.login') }}"><button class="custom-btn m-2"
                        role="button">ACCOUNT</button></a>
            @endguest
            <a href="{{ url('https://wpstaging.a2zcreatorz.com/pspc/v10') }}"><button class="custom-btn"
                    role="button">MAIN WEBSITE</button></a>
        </div>
    </div>
</nav>
