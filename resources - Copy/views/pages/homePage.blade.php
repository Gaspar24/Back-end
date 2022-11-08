
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{url("css/style.css")}}" rel="stylesheet">

    <style>
     body{
         overflow-x: hidden;
     }
        .square{
            opacity: 0;
        }
        .video1:hover .square{
            opacity: 1;
        }
        .buton{
            width: 80px;
        }

        .cardStyle:hover{
            /*transform: scale(1.2);*/
            transform: translateY(-30px);
            z-index: 10;
        }
        li{
            height: 50px;
        }
        .select1{
            display: none;

        }

    </style>
</head>
<body>
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
            <div class="d-flex">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main d-flex">
            <div class="col-12 center">
                <div class="row search">
                    <div class="col">
                        <form action="{{route('search.song')}}" method="get" class="d-flex">
                            <input class="form-control" type="search" name="search" placeholder="search">
                            <button type="submit" class="btn btn-primary text-white">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-primary text-white" href="{{route('add.song')}}">Add Song</a>
                </div>
                <div class="row">
                    <a href="{{route('random.song')}}" class="btn btn-warning text-white">Play Random</a>
                </div>
                <div class="row">
                    <div class="col d-flex flex-wrap mt-3 ms-4">
                        @foreach($songs as $song)
                            <div class="card cardStyle mx-2 my-2 " style="width: 18rem; text-align: center">
                                <img src="https://online.berklee.edu/takenote/wp-content/uploads/2022/01/how_to_write_a_love_song_article_image_2022-1.png" width="120" height="120" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$song->name}}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="{{route('view.song',['song'=>$song->id])}}" class="btn btn-success buton">Play</a>
                                    </li>
                                    <li class="list-group-item">
                                        <form action="{{route('delete.song',['song'=>$song->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger buton">Delete</button>
                                        </form>
                                    </li>
                                    <li class="list-group-item">
                                        @if($song->like_id===0)
                                            <form class="d-flex" action="{{route('update.song',['song'=>$song->id])}}" method="post">
                                                @csrf
                                                @method('put')
                                                <select class="form-select select1" id="like" name="like_id">
                                                    <option selected>1</option>
                                                    <option value="{{$song->like_id='1'}}"></option>
                                                </select>
                                                <button style="margin-left:87px; width: 80px " type="submit" class="btn btn-primary text-white ">Like</button>
                                            </form>
                                        @else
                                            <form class="d-flex" action="{{route('update.song',['song'=>$song->id])}}" method="post">
                                                @csrf
                                                @method('put')
                                                <select class="form-select select1" id="like" name="like_id">
                                                    <option selected>0</option>
                                                    <option value="{{$song->like_id='0'}}"></option>
                                                </select>
                                                <button style="margin-left:87px; width: 80px " type="submit" class="btn btn-warning text-white ">Dislike</button>
                                            </form>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <form class="d-flex" action="{{route('update.song',['song'=>$song->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <select class="form-select" id="album" name="song_album_id">
                                                <option selected value="0">Chose Album</option>
                                                @foreach ($albums as $album)
                                                    <option value="{{$album->id}}" {{$album->id === $song->song_album_id? 'selected': ''}}>{{$album->name}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary text-white ms-2">add</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div style="">
                    <p> {{$songs->links()}}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

