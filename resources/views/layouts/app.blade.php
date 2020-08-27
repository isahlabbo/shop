<!DOCTYPE html>
<html lang="zxx">
@include('include.header.head')

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark site-navbar">
            <a class="navbar-brand site-logo" href="index.html#">
                <h2><span>Ai</span>Style</h2>
                <p>Fashion Forward</p>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- Main menu -->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    @yield('navbar')
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.registration') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>
    </header>

    <!-- Header section end-->
    @include('sweetalert::alert')
    @yield('content')
    <!-- Slide section -->
        
    @include('include.footer.scripts')

    @yield('scripts')
    
</body>
</html>

