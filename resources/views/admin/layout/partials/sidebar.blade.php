<div class="custom-sidebar">
    <div class="top">
        <div class="logo">
            <i class="fa-solid fa-bars"></i>
            <span>Test</span>
        </div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <div class="user">
        <img src="assets/img/user.jpg" alt="" class="user-img">
        <div class="mt-3">
            <p class="bold mb-0">{{ auth()->user()->name }}</p>
            <p>Admin</p>
        </div>
    </div>
    <div>
        <ul class="list-unstyled mt-4">
            <li id="dashboard">
                <a href="/dashboardadmin" onmouseenter="showToolhint1(this)" onmouseleave="hideToolhint1(this)">
                    <i class="fa-solid fa-igloo"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="toolhint" id="toolhint">Dashboard</span>
            </li>
            <li id="catalog">
                <a href="/catalogadmin" onmouseenter="showToolhint2(this)" onmouseleave="hideToolhint2(this)">
                    <i class="fa-solid fa-database ms-3"></i>
                    <span class="nav-item">Catalog</span>
                </a>
                <span class="toolhint toolhint2" id="toolhint2">Catalog</span>
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
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" href="/logout" onmouseenter="showToolhint(this)"
                        onmouseleave="hideToolhint(this)">
                        <i class="fa-solid fa-igloo"></i>
                        <span class="nav-item">Logout</span>
                    </button>
                    <span class="toolhint" id="">Logout</span>
                </form>
            </li>
        </ul>
    </div>
</div>
