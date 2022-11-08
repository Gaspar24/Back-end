

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{url("css/style.css")}}" rel="stylesheet">

<style>
    .album:hover{
        transform: scale(1.2);
        z-index: 11;

    }
    .album:hover .butonAlb{
        opacity: 1;
    }
    .butonAlb{
        opacity: 0;
    }
</style>

<div class="container-fluid pt-3 navbar1">
    <div class="row d-flex flex-row">
        <div class="col">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col">
            <a class="text-decoration-none" href="{{route('live.song')}}"><h3 class="text-danger">Live</h3></a>
        </div>
        <div class="col">
            <a href="{{route('like.song')}}">Liked</a>
        </div>
        <div class="col">
            <a href="{{route('add.album')}}" >Create Albums</a>
        </div>
        <div class="col">
            <a href="{{route('history.song')}}">History</a>
        </div>
        <div class="col">
            <a href="{{route('albums')}}">Albums</a>
        </div>
        <div class="col">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<div class="col-2 rightSide mt-5 ms-5">--}}
    <h2 class="text-white">Albums</h2><br>
    <div class="d-flex">
        @foreach( $albums as $album)
            <div class="album d-flex my-1">
                <a  class="text-decoration-none" href="{{route('show.album',['album'=>$album->id])}}">
                    <img  style="width: 150px; height: 150px" src="{{$album->image_link != null ? $album->image_link:"https://play-lh.googleusercontent.com/QovZ-E3Uxm4EvjacN-Cv1LnjEv-x5SqFFB5BbhGIwXI_KorjFhEHahRZcXFC6P40Xg"}}">
                </a>
                <div class="infoAlb">
                    <h2  class="text-white albumName mt-5 ms-2"> {{$album->name}}</h2>
                    <form action="{{route('delete.album',['album'=>$album->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger butonAlb ">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
