@if (Auth::guest())

@else
 <!-- Sidebar -->
          <ul class="sidebar navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/clients">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Vartotojai</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/requests">
                      <i class="fas fa-fw fa-heartbeat"></i>
                      <span>Prašymai</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/users/create">
                      <i class="fas fa-fw fa-male"></i>
                      <span>Pridėti trenerį</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/users">
                      <i class="fas fa-fw fa-male"></i>
                      <span>Treneriai</span></a>
                  </li>
              </ul>
@endif