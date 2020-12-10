<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">POLYHOME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{!! url('storage/'.  Auth::user()->avatar) !!}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="">
                    @auth('host')
                        {{ Auth::user()->name }}
                    @endauth
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('host.dashboard') }}" class="nav-link {{ request()->routeIs('host.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('host.nha-cho-thue*') ? 'menu-open' : '' }}">
                    <a href="{{ route('host.nha-cho-thue.index') }}" class="nav-link {{ request()->routeIs('host.nha-cho-thue*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Nhà cho thuê
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('host.nha-cho-thue.index') }}"
                                class="nav-link {{ request()->routeIs('host.nha-cho-thue.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('host.nha-cho-thue.listSoftDelete') }}"
                                class="nav-link {{ request()->routeIs('host.nha-cho-thue.listSoftDelete') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thùng rác</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('host.phong-cho-thue*') ? 'menu-open' : '' }}">
                    <a href="{{ route('host.phong-cho-thue.index') }}" class="nav-link {{ request()->routeIs('host.phong-cho-thue*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            Phòng cho thuê
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('host.phong-cho-thue.index') }}"
                                class="nav-link {{ request()->routeIs('host.phong-cho-thue.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('host.phong-cho-thue.listSoftDelete') }}"
                                class="nav-link {{ request()->routeIs('host.phong-cho-thue.listSoftDelete') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thùng rác</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('host.dat-lich-xem-phong*') ? 'menu-open' : '' }}">
                    <a href="{{ route('host.dat-lich-xem-phong.index') }}" class="nav-link {{ request()->routeIs('host.dat-lich-xem-phong*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Đặt lịch xem phòng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('host.dat-lich-xem-phong.index') }}"
                                class="nav-link {{ request()->routeIs('host.dat-lich-xem-phong.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('host.tro-chuyen*') ? 'menu-open' : '' }}">
                    <a href="{{ route('host.tro-chuyen.index') }}" class="nav-link {{ request()->routeIs('host.tro-chuyen*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Tin nhắn
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('host.tro-chuyen.index') }}"
                                class="nav-link {{ request()->routeIs('host.tro-chuyen.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('host.setting.account') }}" class="nav-link {{ request()->routeIs('host.setting.account') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Thông tin tài khoản
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('host.change.password.account') }}" class="nav-link {{ request()->routeIs('host.change.password.account') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Đổi mật khẩu
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
