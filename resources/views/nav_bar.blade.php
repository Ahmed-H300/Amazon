<!-- resources/views/_navbar.blade.php -->
<nav>
    <ul class="navbar">
        <li><a class="navbar-link" href="{{ route('home') }}">Home</a></li>
        <li><a class="navbar-link" href="{{ route('about_us') }}">About Us</a></li>
        <li><a class="navbar-link" href="{{ route('contact_us') }}">Contact Us</a></li>
        <li><a class="navbar-link" href="{{ route('products.index') }}">Products</a></li>
        <li><a class="navbar-link" href="{{ route('categories.index') }}">Categories</a></li>
        @guest
            @if (Route::has('login'))
                <li class="nav-item navbar-link" style="color: white">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item navbar-link" style="color: white">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
