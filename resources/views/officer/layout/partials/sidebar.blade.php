<div class="custom-sidebar position-fixed">
    <div class="top">
        <div class="logo">
            <i class="fa-solid fa-bars"></i>
            <span>Test</span>
        </div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <div class="user">
        <img src="../assets/img/user.jpg" alt="" class="user-img">
        <div class="mt-3">
            <p class="bold mb-0">{{ auth()->user()->name }}</p>
            <p>Admin</p>
        </div>
    </div>
    <div>
        <ul class="list-unstyled mt-4">
            <li id="dashboard">
                <a href="/admin-dashboard" onmouseenter="showToolhint1(this)" onmouseleave="hideToolhint1(this)">
                    <i class="fa-solid fa-igloo"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="toolhint" id="toolhint1">Dashboard</span>
            </li>
            {{-- <span id="line">-</span> --}}
            <li>
                <a href="/admin-officer" onmouseenter="showToolhint2(this)" onmouseleave="hideToolhint2(this)">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-item">Officer</span>
                </a>
                <span class="toolhint" id="toolhint2">Officer</span>
            </li>
            <li>
                <a href="/admin-provinces" onmouseenter="showToolhint3(this)" onmouseleave="hideToolhint3(this)">
                    <i class="fa-solid fa-database ms-3"></i>
                    <span class="nav-item">Provinces</span>
                </a>
                <span class="toolhint" id="toolhint3">Provinces</span>
            </li>
            <li>
                <a href="/admin-city" onmouseenter="showToolhint4(this)" onmouseleave="hideToolhint4(this)">
                    <i class="fa-solid fa-database ms-3"></i>
                    <span class="nav-item">City</span>
                </a>
                <span class="toolhint" id="toolhint4">City</span>
            </li>
            <li>
                <a href="/admin-catalog" onmouseenter="showToolhint5(this)" onmouseleave="hideToolhint5(this)">
                    <i class="fa-solid fa-database ms-3"></i>
                    <span class="nav-item">Catalog</span>
                </a>
                <span class="toolhint" id="toolhint5">Catalog</span>
            </li>
            {{-- <li>
                <a href="#" onmouseenter="showToolhint(this)" onmouseleave="hideToolhint(this)">
                    <i class="fa-solid fa-igloo"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="toolhint" id="">Dashboard</span>
            </li>
            <li>
                <a href="#" onmouseenter="showToolhint(this)" onmouseleave="hideToolhint(this)">
                    <i class="fa-solid fa-igloo"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="toolhint" id="">Dashboard</span>
            </li>
            <li>
                <a href="#" onmouseenter="showToolhint(this)" onmouseleave="hideToolhint(this)">
                    <i class="fa-solid fa-igloo"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="toolhint" id="">Dashboard</span>
            </li> --}}
            <div class="position-absolute bottom-0 mb-3 ms-1">
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit" href="/logout" onmouseenter="showToolhint(this)"
                        onmouseleave="hideToolhint(this)">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        {{-- <span class="nav-item">Logout</span> --}}
                    </button>
                    <span class="toolhint" id="">Logout</span>
                </form>
            </div>
        </ul>
    </div>
</div>
