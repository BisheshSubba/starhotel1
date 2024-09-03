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

        <h1 style="font-size: 40px; font-family:Cooper Black; font-weight:bolder; color:rgb(231, 231, 231); text-align:center;">Users</h1>
           <table class="table_des">
            <tr>
                <th class="th-deg">Name</th>
                <th class="th-deg">Email</th>
                <th class="th-deg">Phone</th>

            </tr>
            @foreach($data as $data)
            <tr>
                <td class="td-deg">{{$data->name}}</td>
                <td class="td-deg">{{$data->email}}</td>
                <td class="td-deg">{{$data->phone}}</td>
            </tr>

            @endforeach

           </table> 
        </div>
        @include('admin.footer')
      <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>