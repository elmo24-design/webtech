 <nav class="main-nav">
      @guest
      <h1>
        <a href="/" class="webtech"><i class="fas fa-code"></i>WebTech</a>
      </h1>
      @else
      <h1>
        <a href="/home" class="webtech"><i class="fas fa-code"></i>WebTech</a>
      </h1>
      @endguest
      <ul>
        @guest
          <li><a href="/posts">Posts</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
           @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
           @endif
        @else
            <li><a href="/posts">Posts</a></li>
            <li><a href="/home"><i class="fas fa-user"></i><span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>{{ __('Logout') }}</span>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </li>      
        @endguest
      </ul>
 </nav>