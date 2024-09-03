<header class="head">
    <div class="logo">
        <a href="{{route('account.home')}}"><img src="{{asset('images/Elevate.jpg')}}" alt="Logo"></a>
        </div>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">
                <div class="nav-icon"></div>
                <div class="nav-icon"></div>
                <div class="nav-icon"></div>
            </label>
            <div class="menus">
    
            <a href="{{route('account.room')}}" class="menu">Rooms</a>
        
            
            @auth
            <a href="{{route('gallery')}}" class="menu">Gallery</a>
            @endauth
              
                @guest
            <a href="{{ route('account.login') }}" class="menu">Login</a>
            @endguest
            
            @auth
            <a class="menu" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('profileshow')}}">Hello, {{ Auth::user()->name }}</a>
                    <a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
                </li>
            </ul>
            @endauth
            
            </div>
        </div>
        </header>