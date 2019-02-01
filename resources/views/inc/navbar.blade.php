<nav class="navbar navbar-expand-lg navbar-light m-auto border">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/events">Events</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Members
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/athletes">Athletes</a>
                <a class="dropdown-item" href="/coaches">Coaches</a>
                <a class="dropdown-item" href="/board">Board Members</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="/guidelines" class="nav-link">Guidelines</a>
        </li>
        <li class="nav-item">
            <a href="/guidelines" class="nav-link">Registration</a>
        </li>
        <li class="nav-item">
            <a href="/guidelines" class="nav-link">Policies</a>
        </li>
        <li class="nav-item">
            <a href="/products" class="nav-link">Products</a>
        </li>
    </ul>
    <div class="nav-controls">
        @if (Route::has('login'))
            <div class="top-right-links d-flex">
                @auth
                    <a href="{{ url('/home') }}">Dashboard</a>
                @endauth
            @endif

            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
            @else
                <a href="#"> {{ ucwords(Auth::user()->name) }} </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
  </nav>