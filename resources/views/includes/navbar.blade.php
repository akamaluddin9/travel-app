<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('Home') }}" class="navbar-brand">
            <img src="{{ url('frontend/images/logo.png') }}" alt="LOGO NOMADS">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"> </span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2"><a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2"><a href="#" class="nav-link">Packages</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="{{ url('/') }}" class="nav-link dropdown-toggle" id="navbardrop"
                        data-toggle="dropdown">
                        Services
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                </li>
                <li class="nav-item mx-md-2"><a href="#" class="nav-link">Reviews</a>
                </li>


                </form>

                @guest
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                            Sign In
                        </button>
                    </form>

                    <!-- Desktop Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
                        type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                            Sign In
                        </button>
                    </form>
                    @endguest

                    @auth
                        
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login my-2 my-sm-0" type="submit">
                            Sign Out
                        </button>
                    </form>

                    <!-- Desktop Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                            Sign Out
                        </button>

                    </form>
                    @endauth
            </ul>
        </div>
    </nav>
</div>
