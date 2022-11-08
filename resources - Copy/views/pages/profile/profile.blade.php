
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{url("css/style.css")}}" rel="stylesheet">

<div class="container-fluid pt-3 navbar1">
    <div class="row ms-auto">
        <div class="col-3">
            <a href="{{route('home')}}" class="btn btn-danger homebtn">Home</a>
        </div>
        <div class="col-6">
            <h1 class="title">Profile</h1>
        </div>
        <div class="col-3">
            <a href="{{route('profile')}}" class="btn btn-success homebtn">Profile</a>
        </div>
    </div>
</div>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{$user->profile_image ? "/".$user->profile_image : 'http://via.placeholder.com/150'}}" alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <div class="col-12">
                            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <input type="text" placeholder="name" name="name" value="{{$user->name}}" style="display: none">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="profile_image" id="profile_image" placeholder="Profile Image">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$user->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$user->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">(097) 234-5678</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>
                            <hr>
                            <div class="col">
                                <a class="btn btn-primary text-white" href="{{route('edit.profile')}}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

