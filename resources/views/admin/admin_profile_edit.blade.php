@extends('admin.admin_master')

@section('admin')
    
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Username <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                        </div>
                                        <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image</h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="profile_photo_path" class="form-control" value="{{ $editData->profile_photo_path }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ (!empty($editData->profile_photo_path)) 
                                                    ? url('upload/admin_images/'.$editData->profile_photo_path)
                                                    : url('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px">
                                            </div>
                                            <!-- end col-md-6 -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
    {{--<!-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script> -->--}}
    <script type="text/javascript">
        /* ----------------------------- Vanila JS Style ---------------------------- */
        const image = document.getElementById('image')
        const showImage = document.getElementById('showImage')
        document.addEventListener("DOMContentLoaded", function(e) { 
            image.addEventListener('change', function(e) { // e diperlukan
                var reader = new FileReader();
                reader.onload = function(e) {
                    showImage.src = reader.result
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })

        /* ------------------------------ JQuery Style ------------------------------ */
        // $(document).ready(function() {
        //     $('#image').change(function(e) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#showImage').attr('src',e.target.result);
        //         }
        //         reader.readAsDataURL(e.target.files['0']);
        //     });
        // });
    </script>
@endsection