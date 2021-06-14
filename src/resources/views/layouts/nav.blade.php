<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm">
  <a class="navbar-brand text-warning ml-md-5 pl-md-5" href="{{ url('/') }}">
    {{ config('app.name', 'MyTop3') }}
  </a>
  <!-- Navbar content -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"      aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">
    
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto mr-md-5 pr-md-5">
      <!-- Authentication Links -->
      @guest
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item mr-md-4">
            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @endif
        <li class="nav-item">
            <a class="nav-link text-warning" href="{{ route('admin.login') }}">{{ __('Admin') }}</a>
        </li>
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile_image') }}">
              {{ __('Profile') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
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