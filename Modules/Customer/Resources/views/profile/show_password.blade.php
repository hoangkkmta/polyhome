@extends('customer::layouts.master')
@section('title', 'Đổi mật khẩu')

@push('css')
    <link rel="shortcut icon" href="images/brand/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/style58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/responsive58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/animate58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
    <link rel="canonical" href="index.html" />
    <script src="themes/bandonvn/assets/js/jquery.min58ce.js?v=1602513334" type="text/javascript"></script>
@endpush

@section('content')

    <section class="breadcrumb-area breadcrumbs border-bottom border-top" style="clear: both">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="breadcrumb-menu">
                        <nav itemscope itemtype="https://schema.org/Breadcrumb">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a
                                        itemprop="item" href="../../index.html"> <span itemprop="name">Trang
                                            chủ</span> </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="active"> <span>@yield('title')</span> </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-row why-choose-bandon">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" >
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <img id="image" src="{!! url('storage/'.Auth::user()->avatar) !!}" height="300px" width="300px" class="card-img-top mb-3" alt="...">
                            </div>
                        </div>
                        <h4 class="text-center pt-3">{{ Auth::user()->name }}</h4>
                        <hr>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <a href="{{ route('customer.tai-khoan.show') }}">Cập nhật tài khoản</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.tai-khoan.forgotPassword') }}">Đổi mật khẩu</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer.tai-khoan.showOrderRoom') }}">Lịch sử đặt lịch</a>
                                </li>
                            </ul>
                            <hr>
                            <a class="btn btn-block btn-default"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Đăng xuất</a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->

                <div class="col-md-9">
                    <div class="title-section">
                        <h2 class="title">@yield('title')</h2>
                        <span class="border-icon">
                            <span class="title-icon"></span>
                        </span>
                    </div><!-- /.title-section -->


                    <form action="{{ route('customer.tai-khoan.showOrderRoom', $account->id) }}" class="w3layouts-contact-fm" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $account->id }}">
                        <div class="form-group">
                            <label>Mật khẩu mới:</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @error('password')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu mới:</label>
                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
                            @error('password')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div><!-- /.col-md-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>



@endsection
