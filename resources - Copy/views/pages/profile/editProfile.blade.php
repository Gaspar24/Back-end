
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{url("css/style.css")}}" rel="stylesheet">


<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title">Edit Profile</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<form>
    <div class="mb-3">
        <label for="name" class="form-label text-white">name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
{{--    <div class="mb-3">--}}
{{--        <label for="phone" class="form-label text-white">phone</label>--}}
{{--        <input type="text" class="form-control" id="phone">--}}
{{--    </div>--}}
{{--    <div class="mb-3">--}}
{{--        <label for="adress" class="form-label text-white">phone</label>--}}
{{--        <input type="text" class="form-control" id="adress">--}}
{{--    </div>--}}

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
