<!DOCTYPE html>
<html lang="en">
@include ('partials.head')
<style>
.rooms {
    display: flex;
    flex-direction: column;
}

h1 {
    padding: 20px;
    text-align: center;
}

.cont {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Vertical gap between cards */
    justify-content: center; /* Center cards horizontally */
    padding: 0 80px; /* Add horizontal padding to account for the side margins */
}

.room {
    flex: 1 1 calc(33.333% - 20px); /* Adjust width to fit 3 items per row with gap */
    min-width: 300px;
    max-width: calc(33.333% - 20px); /* Ensure max-width is same as the calculated width */
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd; /* Card border */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 2px 8px rgba(0,0,0,0.1); /* Shadow for card effect */
    overflow: hidden; /* Hide overflow content */
    background-color: #fff; /* Card background color */
    transition: box-shadow 0.3s; /* Smooth shadow transition */
}

.room:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.2); /* Shadow effect on hover */
}

.room_img {
    width: 100%;
    height: 200px; /* Fixed height for images */
    overflow: hidden;
}

.room_img img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s; /* Smooth zoom effect on hover */
}

.room_img:hover img {
    transform: scale(1.05); /* Zoom effect on hover */
}

.bed_room {
    padding: 15px;
    text-align: center; /* Center text inside the card */
}

.bed_room h3 {
    margin: 10px 0;
    font-size: 1.2em; /* Slightly larger font size for titles */
}

.bed_room p {
    font-size: 1em;
    color: #555; /* Slightly darker text color */
}


</style>
<body>
    @include('partials.header')
    
    <div class="rooms">
        <h1><b>Our Rooms</b></h1>
        <div class="cont">
    @foreach($data as $rooms)
    
        <div class="room">
            <div class="room_img">
                <figure><img width="600px" src="{{asset('room/'.$rooms->image)}}" alt=""></figure>
            </div>
            <div class="bed_room">
                <h3 style="font-family: Baskerville Old Face;"><b>{{$rooms->room_title}}</b></h3>
                    <p style="font-family: Californian FB;">{!!Str::limit($rooms->description,200)!!}</p>
                <a class="btn btn-primary" href="{{route('room_details',$rooms->id)}}">Room Details</a>
            </div>
        </div>
        
    @endforeach
        </div> 
    </div>
   
    @include('partials.footer')

</body>
</html>