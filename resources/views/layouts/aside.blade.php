<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>


            <li class="mn-dashboard">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="mn-categories">
                <a href="{{ url('/admin/categories') }}">
                    <i class="fa fa-list-ul"></i> <span>Categories</span>
                </a>
            </li>



            <li class="mn-suppliers">
                <a href="{{ route('suppliers.all') }}">
                    <i class="ion ion-android-people"></i> <span>Suppliers</span>
                </a>
            </li>


            <li class="treeview tr-products">
                <a href="#">
                    <i class="ion ion-ios-list"></i> <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="mn-products">
                        <a href="{{ url('/admin/products') }}">
                            <i class="fa fa-circle-o"></i>
                            Manage products
                        </a>
                    </li>
                    <li class="mn-stocks">
                        <a href="{{ route('stocks.all') }}">
                            <i class="fa fa-circle-o"></i>
                            Stocking
                        </a>
                    </li>
                    <li class="mn-requisitions">
                        <a href="{{ route('requisitions.all') }}">
                            <i class="fa fa-circle-o"></i>
                            Requisitions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('requests') }}">
                            <i class="fa fa-circle-o"></i>
                            Requests
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mn-users">
                <a href="{{ route('suppliers.all') }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>

            <li class="treeview mn-reports">
                <a href="#">
                    <i class="ion ion-printer"></i> <span>Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-circle-o"></i> Report v1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Report v2</a></li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
