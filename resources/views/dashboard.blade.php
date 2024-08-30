<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel 11 Multi Auth</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('css/star.css')}}">
</head>
   </head>
   <body >
   <header class="head">
    <div class="logo">
        <a href="{{route('account.dashboard')}}"><img src="{{asset('images/Elevate.jpg')}}" alt="Logo"></a>
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
                <a class=" menu" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">                          
                    <li>
                        <a class="dropdown-item" href="">Hello, {{Auth::user()->name}}</a>
                        <a class="dropdown-item " href="{{route('account.logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </header>
        
       @include('partials.footer')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>