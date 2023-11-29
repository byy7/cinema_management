<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="#"><img
                    src="{{ asset('assets/images/cgw-high-resolution-logo-transparent-2.png') }}" class="img-fluid"
                    alt="Images"></a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#studio">Studio</a></li>
                <li><a class="nav-link scrollto " href="#film">Film</a></li>
                <li><a class="nav-link scrollto" href="#tiket">Pemesanan Tiket</a></li>
                <li>
                    <a class="getstarted"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                        href="">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
