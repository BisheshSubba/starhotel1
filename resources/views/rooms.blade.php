<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="star.css">
    <link rel="stylesheet" href="rooms.css">
</head>
<body>
@include('partials.header')
    <H1>Rooms We Offer:</H1>
    <div class="rooms">
        <div class="room">
            <img src="normalr.jpeg" alt="">
            <a href="">Normal room</a>
        </div>
        <div class="room">
            <img src="normal.jpeg" alt="">
            <a href="">Normal plus room</a>
        </div>
        <div class="room">
            <img src="delux.jpeg" alt="">
            <a href="">Delux room</a>
        </div>
        <div class="room">
            <img src="super delux.jpeg" alt="">
            <a href="">super Delux room</a>
        </div>
        <div class="room">
            <img src="luxurious.jpeg" alt="">
            <a href="">Custom room</a>
        </div>
    </div>
    @include('partials.footer')
</body>
</html>