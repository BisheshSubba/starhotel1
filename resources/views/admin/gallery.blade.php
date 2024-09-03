<!doctype html>
<html lang="en">
    <head>
   @include('admin.head')
    <style>
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
       form{
        display: flex;
        flex-direction: column;
        height: 250px;
        border-radius: 20px;
        justify-content: center;
        padding: 20px;
        gap: 20px;
        color:black;
        width: 50%;
        background-color: hsl(277, 13%, 52%);
        margin-bottom: 20px;
       }
       label{
        display: inline-block;
       }
       .del{
        align-content: center;
       }
    </style>
   </head>
   <body class="bg-light">
       @include('admin.navbar')
        <div class="main">
       @include('admin.sidebar')
        <div class="content">
          <h1 style="font-size: 40px; font-family:Cooper Black; font-weight:bolder; color:rgb(231, 231, 231); text-align:center;">Gallery</h1>
        
          <div class="row">

          @foreach($gallery as $gallery)
          <div class="col-md-4">
          <img style="height: 200px!important; width:300px!important;" src="{{asset('/gallery/'.$gallery->image)}}" >
          <a  style="margin-left: 120px;" class="btn btn-danger" href="{{route('deleteimage',$gallery->id)}}" >Delete</a>
          </div>
          @endforeach 

        </div>

          <form action="{{route('uploadgallery')}}" method="Post" enctype="multipart/form-data">
          @csrf  
          <div> 
                <label >Upload Image:</label>
                <input type="file" name="image" required>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Add image" >
            </div>
          </form>
        </div>
        @include('admin.footer')
      <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>