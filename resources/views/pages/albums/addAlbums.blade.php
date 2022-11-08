
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title">Add Album</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<form action="{{route('save.album')}}" method="post">
    @csrf
    <div class="mb-3">
        <label  for="name" class="form-label ">Name of the album</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label  for="image_link" class="form-label ">Image link (optional!)</label>
        <input type="text" class="form-control" id="image_link" name="image_link" placeholder="Optional">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
