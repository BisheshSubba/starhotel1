<!DOCTYPE html>
<html lang="en">
@include ('partials.head')

<style>
  form{
    display: flex;
    justify-content: center;
    padding-bottom: 20px;
  }
  .email{
    height: 40px;
    width: 450px;
    
  }
  
</style>
<body>
    @include('partials.header')
    
    @include('intro')
    
    @include('experience')

    @include('Archi')
     
    <div class="newsletter">
      <h2 style="text-align: center;">NewsLetter</h2>

      @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button"  style="background-color: transparent; border:none; align-self: flex-end;" class="close" data-bs-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
            @endif

    <form action="{{route('add_newsletter')}}" method="Post" enctype="multipart/form-data">
      @csrf
      <div class="div_des">
          <input class="email" type="email" name="email" placeholder="Email">
      </div>
      <div style="padding-left: 10px;" class="div_des">
          <input class="btn btn-primary" type="submit" value="Subscribe">
      </div>
    </form>

    </div>

    @include('partials.footer')
    <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
function toggleText(dotsId, moreTextId, btn) {
    var dots = document.getElementById(dotsId);
    var moreText = document.getElementById(moreTextId);

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btn.textContent = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btn.textContent = "Read less";
        moreText.style.display = "inline";
    }
}
</script>
</body>
</html>