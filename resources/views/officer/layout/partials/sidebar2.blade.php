<div id="bdSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start"
    style="width: 280px;">
    <a href="#" class="navbar-brand">
        <h5><i class="fa-solid fa-bomb me-2" style="font-size: 28px;"></i> NailTour</h5>
        {{-- <h5><i class="fa-solid fa-plane-departure me-2" style="font-size: 28px;"></i> NailTour</h5> --}}
    </a>
    <hr>
    <ul class="mynav nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-1">
            <a href="/officer-dashboard" class="{{ $title === 'Dashboard' ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item mb-1">
            <a href="/officer-transactions" class="{{ $title === 'Transaction' ? 'active' : '' }}">
                <i class="fa-solid fa-cash-register"></i>
                Transaction
            </a>
        </li>
        <li class="nav-item mb-1">
            <a href="/officer-reports" class="{{ $title === 'Reports' ? 'active' : '' }}">
                <i class="fa-solid fa-scroll"></i>
                Reports
            </a>
        </li>
        {{-- <li class="nav-item mb-1">
            <a href="#" class="active">
                <i class="fa-solid fa-wave-square"></i>
                Overview
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-officer" class="{{ $title === 'Officer' ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>
                Officer
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="#" class="">
                <i class="fa-solid fa-bell"></i>
                Notifications
                <span class="notification-badge">5</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-provinces" class="{{ $title === 'Provinces' ? 'active' : '' }}">
                <i class="fa-solid fa-map-location-dot"></i>
                Provinces
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="#" class="">
                <i class="fa-solid fa-chart-simple"></i>
                Analytics
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-city" class="{{ $title === 'City' ? 'active' : '' }}">
                <i class="fa-solid fa-city"></i>
                Cities
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="#" class="">
                <i class="fa-solid fa-star"></i>
                Saved Reports
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-countries" class="{{ $title === 'Countries' ? 'active' : '' }}">
                <i class="fa-solid fa-globe"></i>
                Countries
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-catalog" class="{{ $title === 'Catalog' ? 'active' : '' }}">
                <i class="fa-solid fa-list"></i>
                Catalogs
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="/admin-transportations" class="{{ $title === 'Transportation' ? 'active' : '' }}">
                <i class="fa-solid fa-car"></i>
                Transportations
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="#" class="">
                <i class="fa-solid fa-cart-shopping"></i>
                Orders
            </a>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-primary" type="submit" href="/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
        </li> --}}

        {{-- <li class="nav-item mb-1">
            <a href="#" class="">
                <i class="fa-solid fa-user"></i>
                User Reports
            </a>
        </li> --}}
    </ul>
    <div class="position-absolute bottom-0" style="margin-bottom: 100px">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </button>
        </form>
    </div>
    <hr>
    <div class="d-flex">
        <img src="../assets/img/user.jpg" class="img-fluid rounded me-2" width="50px" alt="">
        <span>
            <h6 class="mt-1 mb-0">{{ auth()->user()->username }}</h6>
            <small>Officer</small>
        </span>
    </div>
</div>
