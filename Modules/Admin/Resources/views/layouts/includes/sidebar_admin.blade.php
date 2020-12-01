<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.thong-ke.khach-hang*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.thong-ke.khach-hang') }}" class="nav-link {{ request()->routeIs('admin.thong-ke.khach-hang*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>
            Thống kê
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.thong-ke.khach-hang') }}"
                class="nav-link {{ request()->routeIs('admin.thong-ke.khach-hang') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê khách hàng</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.thong-ke.chu-nha') }}"
                class="nav-link {{ request()->routeIs('admin.thong-ke.chu-nha') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê chủ nhà</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.thong-ke.dat-lich') }}"
                class="nav-link {{ request()->routeIs('admin.thong-ke.dat-lich') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê đặt lịch</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.tai-khoan*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.tai-khoan.index') }}" class="nav-link {{ request()->routeIs('admin.tai-khoan*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Quản lý tài khoản
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.tai-khoan.index') }}"
                class="nav-link {{ request()->routeIs('admin.tai-khoan.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tai-khoan.create') }}"
                class="nav-link {{ request()->routeIs('admin.tai-khoan.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.khach-hang*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.khach-hang.index') }}" class="nav-link {{ request()->routeIs('admin.khach-hang*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-grin"></i>
        <p>
            Quản lý khách hàng
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.khach-hang.index') }}"
                class="nav-link {{ request()->routeIs('admin.khach-hang.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.khach-hang.create') }}"
                class="nav-link {{ request()->routeIs('admin.khach-hang.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.chu-nha*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.chu-nha.index') }}" class="nav-link {{ request()->routeIs('admin.chu-nha*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-grin"></i>
        <p>
            Quản lý chủ nhà
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.chu-nha.index') }}"
                class="nav-link {{ request()->routeIs('admin.chu-nha.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.chu-nha.create') }}"
                class="nav-link {{ request()->routeIs('admin.chu-nha.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.quan*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.quan.index') }}" class="nav-link {{ request()->routeIs('admin.quan*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-disease"></i>
        <p>
            Khu vực quận
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.quan.index') }}"
                class="nav-link {{ request()->routeIs('admin.quan.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.quan.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.quan.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.truong-dai-hoc*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.truong-dai-hoc.index') }}" class="nav-link {{ request()->routeIs('admin.truong-dai-hoc*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-school"></i>
        <p>
            Khu vực đại học
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.truong-dai-hoc.index') }}"
                class="nav-link {{ request()->routeIs('admin.truong-dai-hoc.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.truong-dai-hoc.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.truong-dai-hoc.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.loai-phong*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.loai-phong.index') }}" class="nav-link {{ request()->routeIs('admin.loai-phong*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-door-closed"></i>
        <p>
            Loại phòng thuê
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.loai-phong.index') }}"
                class="nav-link {{ request()->routeIs('admin.loai-phong.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.loai-phong.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.loai-phong.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.tien-ich*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.tien-ich.index') }}" class="nav-link {{ request()->routeIs('admin.tien-ich*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-check-circle"></i>
        <p>
            Tiện ích nhà / phòng
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.tien-ich.index') }}"
                class="nav-link {{ request()->routeIs('admin.tien-ich.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tien-ich.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.tien-ich.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.nha-cho-thue*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.nha-cho-thue.index') }}" class="nav-link {{ request()->routeIs('admin.nha-cho-thue*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Nhà cho thuê
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.nha-cho-thue.index') }}"
                class="nav-link {{ request()->routeIs('admin.nha-cho-thue.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.nha-cho-thue.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.nha-cho-thue.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.phong-cho-thue*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.phong-cho-thue.index') }}" class="nav-link {{ request()->routeIs('admin.phong-cho-thue*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-door-open"></i>
        <p>
            Phòng cho thuê
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.phong-cho-thue.index') }}"
                class="nav-link {{ request()->routeIs('admin.phong-cho-thue.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.phong-cho-thue.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.phong-cho-thue.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.bai-viet*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.bai-viet.index') }}" class="nav-link {{ request()->routeIs('admin.bai-viet*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>
            Bài viết
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.bai-viet.index') }}"
                class="nav-link {{ request()->routeIs('admin.bai-viet.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.bai-viet.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.bai-viet.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.bai-viet.create') }}"
                class="nav-link {{ request()->routeIs('admin.bai-viet.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.chuyen-muc*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.chuyen-muc.index') }}" class="nav-link {{ request()->routeIs('admin.chuyen-muc*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-blog"></i>
        <p>
            Chuyên mục
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.chuyen-muc.index') }}"
                class="nav-link {{ request()->routeIs('admin.chuyen-muc.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.chuyen-muc.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.chuyen-muc.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.chuyen-muc.create') }}"
                class="nav-link {{ request()->routeIs('admin.chuyen-muc.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->routeIs('admin.binh-luan*') ? 'menu-open' : '' }}">
    <a href="{{ route('admin.binh-luan.index') }}" class="nav-link {{ request()->routeIs('admin.binh-luan*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-comments"></i>
        <p>
            Bình luận
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.binh-luan.index') }}"
                class="nav-link {{ request()->routeIs('admin.binh-luan.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.binh-luan.listSoftDelete') }}"
                class="nav-link {{ request()->routeIs('admin.binh-luan.listSoftDelete') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thùng rác</p>
            </a>
        </li>
    </ul>
</li>

