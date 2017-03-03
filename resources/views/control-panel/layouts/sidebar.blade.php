<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">

            <div class="pull-left info">
                @if(Auth::check())
                    <p>{{ Auth::user()->name }}</p>
                @endif
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            
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
                <a href="{!! route('messages.index') !!}">
                    <i class="fa fa-envelope"></i><span>Messages</span>
                </a>
            </li>
            <li class="treeview @yield('global')">
                <a href="{!! route('subscriptions.index') !!}">
                    <i class="fa fa-users"></i><span>Subscriptions</span>
                </a>
            </li>
        </ul>

    </section>
</aside>