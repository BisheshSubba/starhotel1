<!DOCTYPE html>
<html lang="en">
@include ('partials.head')
<style>
.modal {
    display: none; 
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0, 0, 0, 0.8); 
    justify-content: center; 
    align-items: center;    
}

.modal-content {
    margin: auto;
    width: 80%;
    max-width: 700px;
}

.modal-content img {
    width: 100%;
    height: auto;
}

.close {
    position: absolute;
    top: 10px;
    right: 25px;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

</style>
<body>
    @include('partials.header')
    
    <div class="gallery">
        <h1 style="text-align: center;"><b>Gallery</b></h1>
        <div class="row">
    @foreach($data as $gallery)
    
        <div class="col-md-3 col-sm-6">
        <a href="javascript:void(0)" data-image="{{asset('gallery/'.$gallery->image)}}" onclick="openModal(this)">
                    <figure><img width="300px" src="{{asset('gallery/'.$gallery->image)}}" alt=""></figure>
                </a>
            </div>
        
            
    @endforeach
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
      function openModal(element) {
        const imageSrc = element.getAttribute('data-image');
        document.getElementById('myModal').style.display = "flex";  
        document.getElementById('modalImage').src = imageSrc;
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
    </script>
</body>
</html>