<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav me-auto">
        @if (Auth::check())            
            @if (Auth::user()->role == 'developer')       
            <li class="nav-item">                        
                <a class="nav-link" href="{{ route('developer.home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('criteria.scoring') }}">Scoring</a>
            </li>    
            @else
                <li class="nav-item">                        
                    <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('utbk_score.index') }}">Score</a>
                </li>    
            @endif            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('campus.index') }}">Campus</a>
            </li>            
        @endif
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            @if (Route::has('login'))
                <li class="nav-item">
                    <a href="{{ route('login') }}" ><button class="btn btn-primary font-weight-bold mx-3" style="background-color: #FDE047; color: #1E293B">Lets Start</button></a>
                </li>
            @endif            
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
</div>