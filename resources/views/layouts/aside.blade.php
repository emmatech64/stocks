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
            <li class="mn-products">
                <a href="{{ url('/admin/products') }}">
                    <i class="fa fa-list-alt"></i> <span>Products</span>
                </a>
            </li>
            <li class="mn-purcheses">
                <a href="{{url('/admin/purchasses')}}">
                    <i class="fa fa-list-ul"></i> <span>Purchases</span>
                </a>
            </li>
            <li class="mn-menu">
                <a href="{{url('/admin/sale')}}">
                    <i class="fa fa-shopping-cart"></i> <span>Sales</span>
                </a>
            </li>
            <li class="treeview menu-open mn-reports">
                <a href="">
                    <i class="ion-ios-settings-strong"></i> <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="{{ url('/admin/products') }}"><i class="fa fa-circle-o"></i> Sotck</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Requisitions</a></li>
                </ul>
            </li>

            <li class="treeview menu-open mn-reports">
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
