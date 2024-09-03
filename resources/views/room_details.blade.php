<!DOCTYPE html>
<html lang="en">
@include ('partials.head')
<link rel="stylesheet" href="{{asset('css/room.css')}}">
<style>
label{
    display: inline-block;
    width: 200px;
}
input{
    width: 100%;
}
</style>
<body>
    @include('partials.header')
    <div class="rooms">
    <h1 class="h1"><b>Our Room</b></h1>
    <div class="cont">
        <div class="room">
            <div class="room_img">
                <a href="javascript:void(0)" data-image="{{ asset('room/' . $room->image) }}" onclick="openModal(this)">
                    <figure><img width="600px" src="{{ asset('room/' . $room->image) }}" alt=""></figure>
                </a>
            </div>
            <div class="bed_room">
                <h2>{{$room->room_title}}</h2>
                <p style="padding: 12px; font-family: Californian FB;">{{$room->description}}</p>
                <h4 style="padding: 12px">Room Type: {{$room->room_type}}</h4>
                <h4 style="padding: 12px">Price: {{$room->price}}</h4>
            </div>
        </div>
        <form action="{{route('add_booking',$room->id)}}" method="Post" >
            @csrf
        <div class="booking">
            <h1 style="font-size: 40px!important;">Book Room</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button"  style="background-color: transparent; border:none;" class="close" data-bs-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
            @endif

            @if($errors)
            @foreach($errors->all() as $errors)
            <li>
                {{$errors}}
            </li>
            @endforeach
            @endif

            <div>
                <label >Name:</label>
                <input type="text" name="name" @if(Auth::id())
                value="{{Auth::user()->name}}" @endif>
            </div>
            <div>
                <label >Email:</label>
                <input type="email" name="email"  @if(Auth::id())
                value="{{Auth::user()->email}}" @endif >
            </div>
            <div>
                <label >Phone:</label>
                <input type="number" name="phone" 
                @if(Auth::id())
                value="{{Auth::user()->phone}}" @endif>
            </div>
            <div>
                <label >Start Date:</label>
                <input type="date" name="startdate" id="startdate">
            </div>
            <div>
                <label >End Date:</label>
                <input type="date" name="enddate" id="enddate" >
            </div>
            <div style="padding-top: 20px;">
                <input type="submit" class="btn btn-primary" value="Book" >
            </div>
            </form>
        </div>
    </div>
</div>


    @include('partials.footer')

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img id="modalImage" src="" alt="Room Image">
        </div>
    </div>

    <script>
        // javascript for opening image
    function openModal(element) {
        const imageSrc = element.getAttribute('data-image');
        document.getElementById('myModal').style.display = "flex";  
        document.getElementById('modalImage').src = imageSrc;
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
     //javascript for booking
     
    $(function(){
        var dtToday = new Date();
     
        var month = dtToday.getMonth() + 1;
    
        var day = dtToday.getDate();
    
        var year = dtToday.getFullYear();
    
        if(month < 10)
            month = '0' + month.toString();
    
        if(day < 10)
         day = '0' + day.toString();
    
        var maxDate = year + '-' + month + '-' + day;
        $('#startdate').attr('min', maxDate);
        $('#enddate').attr('min', maxDate);
    
    });
      
    </script>
</body>
</html>


