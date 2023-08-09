<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/admin/dist/img/pngegg.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.employee.index')}}" class="nav-link @yield('empActive')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            الموظفين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.customer.index')}}" class="nav-link @yield('CustomerActive')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            الزبائن
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link @yield('PActive')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            المنتجات
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview @yield('menu-open')">
                    <a href="#" class="nav-link @yield('order') ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            الطلبات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('admin.order.index')}}" class="nav-link @yield('index')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    عرض الطلبات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('admin.order.direct')}}" class="nav-link @yield('direct')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    عرض الطلبات المباشرة
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.create')}}" class="nav-link  @yield('create')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>إضافة طلب مباشر</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.offer.index')}}" class="nav-link @yield('OfferActive')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            العروض
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
