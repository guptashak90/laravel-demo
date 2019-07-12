<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{!empty(Auth::user()->image)? asset('images/user_images/'.Auth::user()->image): asset('images/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::route()->getName() == 'home' ? 'active': '' }}">
                <a href="/home">
                <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>
            @can('isAdmin')
            <li class="treeview {{ Request::route()->getName() == 'createUser' || Request::route()->getName() == 'usersListing' ? 'active': '' }}">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::route()->getName() == 'createUser' ? 'active': '' }}"><a href="/createUser"><i class="fa fa-plus"></i> Add New</a></li>
                    <li class="{{ Request::route()->getName() == 'usersListing' ? 'active': '' }}"><a href="/usersListing"><i class="fa fa-list"></i> Listing</a></li>
                </ul>
            </li>
            @endcan
             <li class="treeview {{ Request::route()->getName() == 'category.index' || Request::route()->getName() == 'category.create' ? 'active': '' }}">
                <a href="#">
                <i class="fa fa-tag"></i>
                <span>Category</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ Request::route()->getName() == 'category.create' ? 'active': '' }}"><a href="{{route('category.create')}}"><i class="fa fa-plus"></i> Add New</a></li>
                <li class="{{ Request::route()->getName() == 'category.index' ? 'active': '' }}"><a href="{{route('category.index')}}"><i class="fa fa-list"></i> Listing</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::route()->getName() == 'subcategory.index' || Request::route()->getName() == 'subcategory.create' ? 'active': '' }}">
                <a href="#">
                <i class="fa fa-houzz"></i>
                <span>Sub Category</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ Request::route()->getName() == 'subcategory.create' ? 'active': '' }}"><a href="{{ route('subcategory.create') }}"><i class="fa fa-plus"></i> Add New</a></li>
                <li class="{{ Request::route()->getName() == 'subcategory.index' ? 'active': '' }}"><a href="{{ route('subcategory.index') }}"><i class="fa fa-list"></i> Listing</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>