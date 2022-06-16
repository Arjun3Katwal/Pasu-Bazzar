<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('Users')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
           

            <li class="nav-item">
              <a class="nav-link active" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><ion-icon name="log-out-outline"></ion-icon>Logout</a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
          </li>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>