
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" style="font-weight:56px" href="{{route('home')}}">PasuBazzar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-times"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li> -->
        @php
          ($category = \App\Models\Category::all())
        @endphp
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($category as $c)
            <li><a class="dropdown-item" href="{{ route('categories', ['id' => $c->id]) }}">{{$c->name}}</a></li>
            @endforeach
          </ul>
        </li>

      </ul>
      <form class="d-flex" method="GET" action="{{ route('productsearch')}}"> 
        @csrf
        <input class="px-2 search" name="search" type="text" placeholder="Search" aria-label="Search">
        <!-- <input type="text"> -->
        <button class="btn0" type="submit">Search</button>
      </form>
      
       
          <a class="nav-link" style = "margin-left:-1%; font-size: 1.4rem;" href="{{route('viewwishlist')}}"><i class="fa fa-heart"></i></a>
        
          <a class="nav-link" style = "margin-left:-1%; font-size: 1.4rem;" href="{{route('viewcart')}}"><i class="fa fa-cart-plus"></i></a>


      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; padding-left:3em;">
          </li>
          @guest
                        @if (Route::has('login'))
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                    @endif
                    @else
                      @endguest
     
                    
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
 

</nav>

