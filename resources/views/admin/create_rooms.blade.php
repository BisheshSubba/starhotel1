<!doctype html>
<html lang="en">
    <head>
   @include('admin.head')
   <style>
        h1{
            padding: 30px;
            text-align: center;
            font-size: 40px; 
            font-family:Cooper Black; 
            font-weight:bolder; 
            color:rgb(231, 231, 231);
        }
        form{
            display: flex;
            flex-direction: column;
            padding-left: 30px;
            color: whitesmoke;
        }
        label{
            display: inline-block;
            width: 200px;

        }
        .div_des{
            padding-top: 30px;
        }

   </style>
   </head>
   <body class="bg-light">
       @include('admin.navbar')
        <div class="main">
       @include('admin.sidebar')
            <div class="content">
            <h1>Create Rooms:</h1>
            
            <form action="{{route('add_room')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="div_des">
                    <label for="">Room Title:</label>
                    <input type="text" name="title">
                </div>
                <div class="div_des">
                    <label for="">Room Description:</label>
                    <textarea cols="60" rows="6" name="description" ></textarea>
                </div>
                <div class="div_des">
                    <label for="">Upload Image:</label>
                    <input type="file" name="image">
                </div>
                <div class="div_des">
                    <label for="">Room Type:</label>
                    <select name="type" >
                        <option selected value="Standard">Standard</option>
                        <option value="Delux">Delux</option>
                        <option value="SuperDelux">Super Delux</option>
                    </select>
                </div>
                <div class="div_des">
                    <label for="">Room Price:</label>
                    <input type="number" name="price">
                </div>
                <div class="div_des">
                    <input class="btn btn-primary" type="submit" value="Add Room">
                </div>
            </form>
        </div>
        </div>
        @include('admin.footer')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>