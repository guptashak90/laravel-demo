@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    {{--
    <h1>
        Mandates Listing
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol> --}}
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sub Category Listing</h3>
                <a href="{{route('subcategory.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="recordsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Descriotion</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($subCategories)>0)
                                @php $srNo=0; @endphp
                                @foreach($subCategories as $category)
                                    <tr>
                                        <td>{{++$srNo}}</td>
                                        <td>{{$category->category->name}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td><img src="{{asset('/images/subcategory/'.$category->image)}}" alt="not available" height="100" width="100"></td>
                                        <td id="action">
                                            <span><a href="{{ route('subcategory.edit', $category->id) }}" class="fa fa-edit" title="Click Here To Edit"></a></span>
                                            <span><a href="#" class="fa fa-trash deleteRecord" alert="Are you sure you want to delete Mandate" title="Click Here To Delete"></a>
                                                <form action="{{ route('subcategory.destroy', $category->id)}}" method="post" style="display:none">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection