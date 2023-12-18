<!DOCTYPE html>
<html lang="en">

<head>
    @extends('front.layout.top')
</head>

<body>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-leaf fs-1 text-success me-3"></i>ECOCRAFT</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="{{route('home.about')}}" class="nav-item nav-link">About Us</a>
                <a href="{{route('home.menu')}}" class="nav-item nav-link">Menu & Pricing</a>
                <a href="{{route('home.contact')}}" class="nav-item nav-link">Contact Us</a>


                @if(Route::has('login'))
                                @auth
                                    @if(Auth::user()->utype===1)
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Dashboard" href="{{route('user.profile')}}">User Profile</a>
                                            </li>
                                            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                    @endif
                                    @else
                                    <div class="navbar-nav ml-auto py-0">
                                        <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                                        <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
                                    </div>
                                    @endif
                            @endif

            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')
    

    @extends('front.layout.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    @extends('front.layout.bottom')
</body>

</html>