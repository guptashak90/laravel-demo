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
                    <h3 class="box-title">Add New Sub Category</h3>
                    <a href="" class="btn btn-primary fa fa-arrow-left pull-right"> Back</a> 
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data" id="createSubCategoryForm">
                    @csrf
                    <div class="box-body">
                        <div class="form-group col-md-9">
                            <label>Category<span class="red">*</span></label>
                            <select class="form-control" name="category_id">
                                <option value="">Select</option>
                                @foreach($categoryLists as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                                <label for="UPD">Name<span class="red">*</span></label>
                                <input type="text" value ="{{old('name')}}" class="form-control" name="name" placeholder="enter category name">
                        </div>
                        <div class="form-group col-md-9">
                                <label for="numero">Description<span class="red">*</span></label>
                                <input type="text" value ="{{old('description')}}" class="form-control" name="description" placeholder="enter description">
                        </div>
                        <div class="form-group col-md-9">
                                <label for="data">Image<span class="red">*</span></label>
                                <input type="file" class="form-control" name="image">
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
