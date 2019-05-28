<nav class="navbar nav navbar-expand-sm navbar-light bg-dark">
    <a class="navbar-brand text-light" href="#">AdminBar</a>
    <button class="navbar-toggler custom-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-light" href="{{ route('threads.index') }}">Home<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Threads</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="{{ route('threads.index') }}">All</a>
                    <a class="dropdown-item" href="{{ route('threads.create') }}">New</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="{{ route('users.index') }}">All</a>
                    <a class="dropdown-item" href="{{ route('users.create') }}">New</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown custom-toggler">
                <a id="navbarDropdown" class="nav-link dropdown-toggle custom-toggler text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nick }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>