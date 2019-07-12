@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    {{-- <h1>
        General Form Elements
        <small>Preview</small>
    </h1> --}}
    {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol> --}}
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12 centered">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New User</h3>
                    <a href="/usersListing" class="btn btn-primary fa fa-arrow-left pull-right"> Back</a> 
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="/createUser" method="post" enctype="multipart/form-data" id="createUserForm">
                    @csrf
                    <div class="box-body">
                        <div class="form-group col-md-9">
                                <label for="name">Name<span class="red">*</span></label>
                                <input type="text" class="form-control" value ="{{old('name')}}" name="name" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="email">Email<span class="red">*</span></label>
                            <input type="email" class="form-control" value ="{{old('email')}}" name= "email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-9">
                            <label>User Role<span class="red">*</span></label>
                            <select class="form-control" name="role" id="role">
                                <option value="1">Admin</option>
                                <option value="0" selected>User</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="phone">Phone<span class="red">*</span></label>
                            <input type="text" class="form-control" value ="{{old('phone')}}" name="phone" id="phone" placeholder="phone">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="password">Password<span class="red">*</span></label>
                            <input type="password" class="form-control" value ="{{old('password')}}" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="image">Image</label>
                            <input type="file" name='image' id="image">
                            <img src="{{asset('images/noimage.png')}}" alt="" id="appendImage" height="100" width="100"/>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>

                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
