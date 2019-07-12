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
                    <h3 class="box-title">Update Category</h3>
                <a href="{{ route('category.index') }}" class="btn btn-primary fa fa-arrow-left pull-right"> Back</a> 
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('category.update', $category->id)  }}" method="post" enctype="multipart/form-data" id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                            <div class="box-body">
                                <div class="form-group col-md-9">
                                        <label for="upd">Name<span class="red">*</span></label>
                                        <input type="text" value ="{{$category->name}}" class="form-control" name="name">
                                </div>
                                <div class="form-group col-md-9">
                                        <label for="numero">Description<span class="red">*</span></label>
                                        <input type="text" value ="{{$category->description}}" class="form-control" name="description" id="numero" placeholder="Enter numero">
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="numero">Image<span class="red">*</span></label>
                                    <input type="file" class="form-control" name="image">
                                    <img src="{{asset('images/category/'.$category->image)}}" height="100" width="100"/>
                                </div>
                            </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button type="button" class="btn btn-danger" onclick="window.history.back();">Go Back</button>
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
