<div id="bdSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start"
    style="width: 280px;">
    <a href="#" class="navbar-brand">
        <h5><i class="fa-solid fa-bomb me-2" style="font-size: 28px;"></i>Na'ilTour</h5>
        {{-- <h5><i class="fa-solid fa-plane-departure me-2" style="font-size: 28px;"></i> NailTour</h5> --}}
    </a>
    <hr class="mb-1">
    <ul class="mynav nav nav-pills flex-column mb-auto">
        {{-- <li class="nav-item mb-1">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="officerDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    Officer
                </a>
                <div class="dropdown-menu" aria-labelledby="officerDropdown">
                    <a class="dropdown-item" href="/admin-officer">Officer</a>
                    <!-- Add other Officer-related items as dropdown items -->
                </div>
            </div>
        </li> --}}
        <li class="nav-item mb-1">
            <a href="admin-dashboard" class="{{ $title === 'Dashboard' ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>
        </li>
        {{-- <li class="nav-item mb-1">
            <a href="#" class="active">
                <i class="fa-solid fa-wave-square"></i>
                Overview
            </a>
        </li> --}}

        <li class="nav-item mb-0 dropdown-custom {{ $active === 'data' ? 'dropdown-active-custom' : '' }}">
            <button onclick="toggleDataDropdown()" href=""
                class="{{ $active === 'data' ? 'active-custom' : '' }}">
                <i class="fa-solid fa-database button-icon"></i>
                Data
                <i class="fa-solid fa-chevron-down down"></i>
            </button>
            <ul id="dataDropdown">
                <li class="nav-item mb-1">
                    <a href="/admin-officer" class="{{ $title === 'Officer' ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        Officer
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-user" class="{{ $title === 'User' ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        User
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-provinces" class="{{ $title === 'Provinces' ? 'active' : '' }}">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Provinces
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-city" class="{{ $title === 'City' ? 'active' : '' }}">
                        <i class="fa-solid fa-city"></i>
                        Cities
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-countries" class="{{ $title === 'Countries' ? 'active' : '' }}">
                        <i class="fa-solid fa-globe"></i>
                        Countries
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-catalog" class="{{ $title === 'Catalog' ? 'active' : '' }}">
                        <i class="fa-solid fa-list"></i>
                        Catalogs
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="/admin-transportations" class="{{ $title === 'Transportation' ? 'active' : '' }}">
                        <i class="fa-solid fa-car"></i>
                        Transportations
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-payments" class="{{ $title === 'Payment Method' ? 'active' : '' }}">
                        <i class="fa-solid fa-credit-card"></i>
                        Payments Method
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item mb-1">
            <a href="/admin-transactions" class="{{ $title === 'Transaction' ? 'active' : '' }}">
                <i class="fa-solid fa-cash-register"></i>
                Transaction
            </a>
        </li>
        <li class="nav-item mb-1">
            <a href="/admin-reports" class="{{ $title === 'Reports' ? 'active' : '' }}">
                <i class="fa-solid fa-scroll"></i>
                Reports
            </a>
        </li>
        {{-- <li class="nav-item mb-0 dropdown-custom">
            <button onclick="toggleDataDropdown2()" href=""
                class="{{ $active === 'transaction' ? 'active-custom' : '' }}">
                <i class="fa-solid fa-user button-icon"></i>
                Data
                <i class="fa-solid fa-chevron-down down"></i>
            </button>
            <ul id="dataDropdown2">
                <li class="nav-item mb-1">
                    <a href="/admin-officer" class="{{ $title === 'Officer' ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        Officer
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-provinces" class="{{ $title === 'Provinces' ? 'active' : '' }}">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Provinces
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-city" class="{{ $title === 'City' ? 'active' : '' }}">
                        <i class="fa-solid fa-city"></i>
                        Cities
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-countries" class="{{ $title === 'Countries' ? 'active' : '' }}">
                        <i class="fa-solid fa-globe"></i>
                        Countries
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin-catalog" class="{{ $title === 'Catalog' ? 'active' : '' }}">
                        <i class="fa-solid fa-list"></i>
                        Catalogs
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="/admin-transportations" class="{{ $title === 'Transportation' ? 'active' : '' }}">
                        <i class="fa-solid fa-car"></i>
                        Transportations
                    </a>
                </li>
            </ul>
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
    {{-- <div class="logout" style="margin-bottom: 100px">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </button>
        </form>
    </div> --}}
    <hr class="mt-0 hr-custom">
    <div class="d-flex user-custom mb-0">
        @if (auth()->user()->photo_profile == 'photoprofile/user.png')
            <img src="../assets/img/user.png" class="img-fluid rounded me-2"
                style="width: 50px; height: 50px; margin-top: 4px" alt="">
        @else
            <img src="{{ asset('storage/' . auth()->user()->photo_profile) }}" class="img-fluid rounded me-2"
                style="width: 50px; height: 50px; margin-top: 4px" alt="">
        @endif
        <span style="margin-top: 4px">
            <h6 class="mt-1 mb-0">{{ auth()->user()->username }}</h6>
            <small>Admin</small>
        </span>
        <div class="logout" style="margin-bottom: 100px">
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                </button>
            </form>
        </div>
    </div>
</div>
