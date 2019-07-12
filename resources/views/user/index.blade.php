@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    {{--
    <h1>
        Users Listing
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
                    <h3 class="box-title">Users Listing</h3>
                    <a href="/createUser" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="recordsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th><input type="checkbox" value="" id="checkAll"></th> --}}
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="control">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($user)>0)
                                @php $srNo=0; @endphp
                                @foreach($user as $user)
                                    <tr>
                                        {{-- <td><input type="checkbox" value="{{$user->id}}" class="checkbox"></td> --}}
                                        <td>{{++$srNo}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{!empty($user->email)? $user->email: "-"}}</td>
                                        <td>{{!empty($user->phone)? $user->phone: "-"}}</td>
                                        <td>
                                            <img class="img-responsive" style="max-height:40px;max-width:40px" src="{{!empty($user->image)? asset('images/user_images/'.$user->image): asset('images/noimage.png') }}">
                                        </td>
                                        <td <?php if($user->status) {
                                             $user->status = "Active"; ?> class="btn btn-success" 
                                             <?php } else { $user->status="Inactive"; 
                                             ?> class="btn btn-danger" <?php } ?> > 
                                             {{$user->status}} </td>
                                        <td id="action">
                                            <span><a href="/changeUserStatus/{{$user->id}}" alert="Are you sure you want to change user status" class="fa fa-ban changeStatus" title="Click Here To change status"></a></span>
                                            <span><a href="{{ route('editUser', $user->id) }}" class="fa fa-edit" title="Click Here To Edit User"></a></span>
                                            <span><a href="#" class="fa fa-trash deleteRecord" alert="Are you sure you want to delete user" title="Click Here To Delete User"></a>
                                                <form action="{{ route('deleteUser', $user->id)}}" method="post" style="display:none">
                                                    @csrf
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