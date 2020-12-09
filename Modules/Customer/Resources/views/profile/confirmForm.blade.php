@extends('customer::layouts.master')
@section('title', 'Đăng nhập')

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
                <div class="col-md-12">
                    <div class="title-section">
                        <h2 class="title">@yield('title')</h2>
                        <span class="border-icon">
                            <span class="title-icon"></span>
                        </span>
                    </div><!-- /.title-section -->

                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-3">

                </div><!-- /.col-md-4 -->

                <div class="col-md-6">
                    <form action="{{ route('customer.confirm') }}" class="w3layouts-contact-fm" method="POST">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <input type="hidden" name="registration_token" value="{{ $registration_token }}">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="" value="{{ $email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" placeholder="">
                                </div>
                                @error('password')
                                <div>
                                    <label class="col-form-label text-danger">
                                        {{ $message }}</i>
                                    </label>
                                </div>
                                @enderror

                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="">
                                </div>
                                @error('password')
                                <div>
                                    <label class="col-form-label text-danger">
                                        {{ $message }}</i>
                                    </label>
                                </div>
                                @enderror

                            </div>
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="form-group mx-auto mt-3">
                                    <button type="submit" class="flat-button bg-theme">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('customer.formLogin') }}" style="float: left">Đăng nhập</a>
                            <a href="{{ route('customer.password.reset.showForm') }}" style="float: right">Quên mật khẩu</a>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->

                <div class="col-md-3">

                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>



@endsection
