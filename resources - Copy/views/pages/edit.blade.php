<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title">Edit</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<form action="{{route('update.song',['song'=>$song->id])}}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="{{$song->name}}">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="link" name="link" placeholder="Link" value="{{$song->link}}">
    </div>

    <select class="form-select" name="song_album_id" id="song_album_id">
        @foreach ($albums as $album)
            <option value="{{$album->id}}" {{$album->id === $song->song_album_id? 'selected': ''}}>{{$album->name}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
