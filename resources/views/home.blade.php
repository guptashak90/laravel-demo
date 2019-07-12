@extends('layouts.app') 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        
                        <h3>{{$usersCount}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a class="small-box-footer"></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3><sup style="font-size: 20px">{{ $categoryCount }}</sup></h3>

                        <p>Category</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a class="small-box-footer"></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3>{{ $subCategoryCount}}</h3>

                        <p>Sub Category</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cog"></i>
                    </div>
                    <a class="small-box-footer"></a>
                </div>
            </div>
            <!-- ./col -->
            
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-4 col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Recent Users</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="latestUsersTable" class="table table-bordered table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created Date</th>
                            </thead>
                            @if(!empty($latestUsers))
                                @foreach($latestUsers as $user)
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->id}}</td>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->created_at}}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Recent Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="latestUsersTable" class="table table-bordered table-striped">
                            <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                </thead>
                                @if(!empty($latestCategory))
                                    @foreach($latestCategory as $category)
                                        <tbody>
                                            <tr>
                                                <td>{{ $category->id}}</td>
                                                <td>{{ $category->name}}</td>
                                                <td>{{ $category->created_at}}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
                <!-- /.col -->
            <div class="col-md-4 col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Recent Mandates</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="latestUsersTable" class="table table-bordered table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                </thead>
                                @if(!empty($latestSubCategory))
                                    @foreach($latestSubCategory as $subCategory)
                                        <tbody>
                                            <tr>
                                                <td>{{ $subCategory->id}}</td>
                                                <td>{{ $subCategory->name}}</td>
                                                <td>{{ $subCategory->created_at}}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>


    </section>
    <!-- /.content -->
@endsection