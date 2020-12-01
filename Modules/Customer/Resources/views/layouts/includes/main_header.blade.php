<header id="header" class="header clearfix header clearfix downscrolled upscrolled">
    <div class="header-wrap clearfix">
        <div id="logo" class="logo">
            <a href="{{ route('customer.home') }}" rel="home">
                <img src="images/brand/logo-horizontal.png" alt="image">
            </a>
        </div><!-- /.logo -->
        <div class="nav-wrap">
            <div class="btn-menu"></div><!-- //mobile menu button -->
            <nav id="mainnav" class="mainnav" style="margin-right: 115px">
                <ul class="menu">
                    <li class="home">
                        <a class="menu-first" href="{{ route('customer.home') }}">Trang chủ</a>
                    </li>
                    <li>
                        <a class="menu-first" href="{{ route('customer.building.list') }}">Thuê phòng & chung cư mini</a>
                        <ul class="submenu">
                            <li class="font-weight-bold"><a href="{{ route('customer.building.list.district') }}">Tìm phòng
                                    theo Quận</a></li>
                            <li class="font-weight-bold"><a href="{{ route('customer.building.list.school') }}">Tìm
                                    phòng theo trường ĐH</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu-first" href="{{ route('host.dashboard') }}">Bạn là chủ nhà</a>
                    </li>
                    <li>
                        <a class="menu-first" href="{{ route('customer.post.list') }}">Tin tức</a>
                    </li>

                    <li>
                        <a class="menu-first" href="">Tài khoản</a>
                        <ul class="submenu">
                            @guest
                                <li class="font-weight-bold">
                                    <a href="{{route('customer.formRegister')}}">
                                        Đăng ký
                                    </a>
                                </li>
                                <li class="font-weight-bold">
                                    <a href="{{route('customer.formLogin')}}">
                                        Đăng nhập
                                    </a>
                                </li>
                            @endguest
                            @auth
                                <li class="font-weight-bold">
                                    <a href="{{route('customer.tai-khoan.show')}}">
                                        Profile
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </nav><!-- /.mainnav -->
        </div><!-- /.nav-wrap -->
    </div><!-- /.header-inner -->
</header>
