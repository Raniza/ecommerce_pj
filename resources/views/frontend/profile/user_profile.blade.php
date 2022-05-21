@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="card-img-top" src="{{ (!empty($user->profile_photo_path)) 
                        ? url('upload/user_images/'.$user->profile_photo_path)
                        : url('upload/no_image.jpg') }}" alt="user image" style="border-radius: 50%; height= 100%; width: 100%;">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary btn-block">Profile Update</a>
                        <a href="" class="btn btn-sm btn-primary btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger btn-block">Logout</a>
                    </ul>
                </div> 
                <!-- end col md-2-->
                <div class="col-md-2">

                </div>
                <!-- end col md-2-->
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi... </span><b>{{Auth::user()->name}}</b> Update your profile</h3>
                        <div class="class-body">
                            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="name">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="name">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="name">Profile Image</label>
                                    <input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" id="btnSave" name="btnSave" value="Update" style="border-radius: 25px;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col md-6-->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection