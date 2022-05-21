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
                        <a href="{{ route('change.password') }}" class="btn btn-sm btn-primary btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger btn-block">Logout</a>
                    </ul>
                </div> 
                <!-- end col md-2-->
                <div class="col-md-2">

                </div>
                <!-- end col md-2-->
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi... </span><b>{{Auth::user()->name}}</b> Welcome to Ecommerce online shop</h3>
                    </div>
                </div>
                <!-- end col md-6-->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection