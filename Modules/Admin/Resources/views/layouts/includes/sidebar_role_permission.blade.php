<li class="nav-item has-treeview {{ request()->routeIs('admin.phan-quyen*') ? 'menu-open' : '' }}">
    <a href="" class="nav-link {{ request()->routeIs('admin.phan-quyen*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-drum-steelpan"></i>
        <p>
            Phân quyền tài khoản
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.phan-quyen.index') }}"
                class="nav-link {{ request()->routeIs('admin.phan-quyen.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.phan-quyen.create') }}"
                class="nav-link {{ request()->routeIs('admin.phan-quyen.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ request()->routeIs('admin.vai-tro*') ? 'menu-open' : '' }}">
    <a href="" class="nav-link {{ request()->routeIs('admin.vai-tro*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>
            Vai trò tài khoản
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.vai-tro.index') }}"
                class="nav-link {{ request()->routeIs('admin.vai-tro.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.vai-tro.create') }}"
                class="nav-link {{ request()->routeIs('admin.vai-tro.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>
