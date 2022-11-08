<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{url("css/style.css")}}" rel="stylesheet">

<style>
    .select1{
        display: none;

    }
    .buton{
        width: 80px;
    }
    h1{
        color: white;
    }
</style>
<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title">Liked Songs</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>



<div class="d-flex flex-wrap square ms-5">
    @foreach($songs as $song)
        @if($song->like_id===1)
            <div class="card cardStyle mx-2 my-2" style="width: 18rem; text-align: center">
                <img src="https://online.berklee.edu/takenote/wp-content/uploads/2022/01/how_to_write_a_love_song_article_image_2022-1.png" width="120" height="120" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$song->name}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{route('view.song',['song'=>$song->id])}}" class="btn btn-success buton">Play</a>
                    </li>
                    <li class="list-group-item">
                        <form class="d-flex" action="{{route('update.song',['song'=>$song->id])}}" method="post">
                            @csrf
                            @method('put')
                            <select class="form-select select1" id="like" name="like_id">
                                <option selected>0</option>
                                <option value="{{$song->like_id===0}}"}}></option>
                            </select>
                            <button style="margin-left:87px; width: 80px " type="submit" class="btn btn-warning text-white ">Dislike</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    @endforeach
</div>


