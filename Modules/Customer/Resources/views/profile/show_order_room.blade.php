@extends('customer::layouts.master')
@section('title', 'Lịch sử đặt lịch xem phòng')

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
                    <div>
                        @foreach ($data as $row)
                            <div class="widget widget_text" style="margin-bottom: 18px; border:1px solid #ccc;padding:20px; border-radius:20px">
                                <h4 class="widget-title">Mã đơn hàng: {{ $row->id }}</h4>
                                @if (!empty($row->room))
                                    <div class="textwidget">
                                        <p>Tên phòng: <b>{{ $row->room->name }}</b></p>
                                        <p>Số nhà: <b>{{ $row->building->name }}</b></p>
                                        <p>Ngày đặt lịch: <b>{{ $row->created_at->format('Y-m-d') }}</b></p>
                                        <p>Ngày xem phòng: <b>{{ $row->order->date_view_room }}</b></p>
                                        <p>Thuê nhà từ: <b>{{ $row->room->date_start }}</b> đến <b>{{ $row->room->date_end }}</b></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Trạng thái thuê:
                                            </div>
                                            <div class="col-md-4">
                                                @if ($row->room->status == 2)
                                                    <b class="text-warning">Đang chờ xác nhận</b>
                                                @elseif($row->room->status == 1)
                                                    <b class="text-success">Đã thuê</b><br>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn">Hủy đặt phòng</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div><!-- /.widget -->
                        @endforeach
                    </div>

                </div><!-- /.col-md-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>



@endsection
