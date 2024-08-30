<header class="head">
    <div class="logo">
        <a href="index.html"><img src="{{asset('images/Elevate.jpg')}}" alt="Logo"></a>
        </div>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">
                <div class="nav-icon"></div>
                <div class="nav-icon"></div>
                <div class="nav-icon"></div>
            </label>
            <div class="menus">
                <a href="rooms.html" class="menu">Rooms</a>
                <a href="booking.html" class="menu">Booking</a>
                <a href="about.html" class="menu">About Us</a>
                <a href="{{route('account.login')}}" class="menu">Login</a>
            </div>
        </div>
        </header>