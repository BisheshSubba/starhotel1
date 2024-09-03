<!DOCTYPE html>
<html lang="en">
@include ('partials.head')
<body>
@include ('partials.header')
<div class="profile">
<p><b>Name:</b> {{Auth::user()->name}}</p>
<p><b>Email:</b> {{Auth::user()->email}}</p>
<p><b>Role: </b>{{Auth::user()->role}}</p>
<p><b>Contact: </b>{{Auth::user()->phone}}</p>
</div>
@include('partials.footer')
</body>
</html>