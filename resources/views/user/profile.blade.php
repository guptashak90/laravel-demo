@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
       
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{!empty(Auth::user()->image)? asset('images/user_images/'.Auth::user()->image): asset('images/avatar5.png') }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <p class="text-muted text-center"></p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="pull-right">{{ $user->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="pull-right">{{ $user->role ? 'Admin':'User'}}</a>
                            </li>
                        </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Activity</a></li>
                    <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Change Password</a></li>
                    <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Update Profile</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                {{-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                              </span> --}}
                            <span class="description">Join Date - {{ $user->created_at}}</span>
                            </div>
                            <!-- /.user-block -->
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        {{-- Change Password --}}
                        <form class="form-horizontal" method="POST" action="/changePassword" id="changePasswordForm">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Old Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="current_password" class="form-control" id="current_password"  placeholder="Enter Old Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">New Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="new_password" class="form-control" id="new_password"  placeholder="Enter new password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>

                                <div class="col-sm-10">
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password"  placeholder="Enter confirm password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="/profile" enctype="multipart/form-data" method="post" id="updateProfileForm">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputName" value="{{ $user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" id="inputName" value="{{ $user->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="image">
                                <img src="{{!empty(Auth::user()->image)? asset('images/user_images/'.Auth::user()->image): asset('images/noimage.png') }}" alt="" id="appendImage" height="100" width="100"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection