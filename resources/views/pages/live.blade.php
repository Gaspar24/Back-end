
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{url("css/style.css")}}" rel="stylesheet">

<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title text-danger">Live</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<iframe width="1900" height="900" src="https://www.youtube.com/embed/MQq0rE488nU?autoplay=1" title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

</iframe>
