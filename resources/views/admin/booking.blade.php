<!doctype html>
<html lang="en">
    <head>
   @include('admin.head')
    <style>
        .table_des{
            border: 2px solid white;
            width: 100%;
            
        }
        .th-deg{
            color: black;
            background-color: rgb(226, 220, 196);
            text-align: center;
        }
        tr{
            border: 3px solid white;
        }
        .td-deg{
            min-width: 50px; 
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
                <th class="th-deg">Room_id</th>
                <th class="th-deg">Name</th>
                <th class="th-deg">Email</th>
                <th class="th-deg">Phone_no</th>
                <th class="th-deg">Status</th>
                <th class="th-deg">Arrival_Date</th>
                <th class="th-deg">Departure_Date</th>
                <th class="th-deg">Room_Title</th>
                <th class="th-deg">Price</th>
                <th class="th-deg">Image</th>
                <th class="th-deg">Delete</th>
                <th class="th-deg">Status Update</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td class="td-deg">{{$data->room_id}}</td>
                <td class="td-deg">{{$data->name}}</td>
                <td class="td-deg">{{$data->email}}</td>
                <td class="td-deg">{{$data->phone}}</td>
                <td class="td-deg">
                @if($data->status =='Approve')
                <span style="color: rgb(27, 169, 225);">Approved</span>
                @endif  
                
                @if($data->status =='Rejected')
                <span style="color: red;">Rejected</span>
                @endif  
                @if($data->status =='waiting')
                <span style="color: rgb(177, 177, 24);">waiting</span>
                @endif  

                </td>
                <td class="td-deg">{{$data->start_date}}</td>
                <td class="td-deg">{{$data->end_date}}</td>
                <td class="td-deg">{{$data->room->room_title}}</td>
                <td class="td-deg">{{$data->room->price}}</td>
                <td class="td-deg">
                <img width="60px" src="{{ asset('room/' . $data->room->image) }}">
                </td>
                <td class="td-deg">
                    <a onclick="return confirm('Are you sure to delete this')" class="btn btn-danger" href="{{route('delete.booking',$data->id)}}">Delete</a>
                </td>
                <td class="td-deg">
                <span style="padding-bottom: 10px;"><a class="btn btn-success" href="{{route('approve_book',$data->id)}}">Approve</a>
                </span>
                <a class="btn btn-warning" href="{{route('reject_book',$data->id)}}">Rejected</a>
                </td>
            </tr>

            @endforeach
           </table> 
        </div>
        @include('admin.footer')
      <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>