@if (Auth::guest())

@else
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    
        <a class="navbar-brand mr-1" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
  
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
  
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <p class="dropdown-item" href="/dashboard">Sveiki, {{ Auth::user()->name }}</p>
              <a class="dropdown-item" href="/dashboard">Dashboard</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"  data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                </form>
            </div>
          </li>
        </ul>
      </nav>
@endif