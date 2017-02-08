<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('control-panel/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-dashboard"></i>--}}
            {{--<span>Dashboard</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Cinemas</a></li>--}}
            {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            <li class="treeview @yield('global')">
                <a href="">
                    <i class="fa fa-users"></i><span>Users</span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview @yield('global')">
                <a href="">
                    <i class="fa fa-globe"></i><span>Global Settings</span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Menu Item</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>