<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <!--<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>-->
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img src="https://static.wikia.nocookie.net/9ec601b8-beb0-47b9-a5ad-19d8dea9c8e8/scale-to-width/370" alt="user" width="30" height="30" class="rounded-circle">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <form method="get" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout')  }}" onclick="event.preventDefault(); this.closest('form').submit();"
                class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
              </form>
            </div>
          </li>
        </ul>
      </nav>