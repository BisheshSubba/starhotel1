<!doctype html>
<html lang="en">
    <head>
   @include('admin.head')
    <style>
        .table_des{
            border: 2px solid white;
            margin: auto;
            width: 80%;
            
        }
        .th-deg{
            color: black;
            background-color: rgb(226, 220, 196);
        }
        tr{
            border: 3px solid white;
        }
        .td-deg{
            padding: 10px;
            min-width: 80px;
            color: black;
            background-color: lightgray;
        }
    </style>
   </head>
   <body class="bg-light">
       @include('admin.navbar')
        <div class="main">
       @include('admin.sidebar')
        <div class="content">
           <table class="table_des">
            <tr>
                <th class="th-deg">Room Title</th>
                <th class="th-deg">Description</th>
                <th class="th-deg">Room Type</th>
                <th class="th-deg">Price</th>
                <th class="th-deg">Image</th>
                <th class="th-deg">Delete</th>
                <th class="th-deg">Update</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td class="td-deg">{{$data->room_title}}</td>
                <td class="td-deg">{!!Str::limit($data->description,150)!!}</td>
                <td class="td-deg">{{$data->room_type}}</td>
                <td class="td-deg">Rs.{{$data->price}}</td>
                <td class="td-deg">
                  <img width="60px" src="{{ asset('room/' . $data->image) }}">
                </td>
                <td class="td-deg"><a class="btn btn-danger" href="{{route('admin.deleteroom',$data->id)}}">Delete</a></td>
                <td class="td-deg"><a class="btn btn-primary" href="{{route('admin.updateroom',$data->id)}}">Update</a></td>
            </tr>

            @endforeach

           </table> 
        </div>
        @include('admin.footer')
      <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>