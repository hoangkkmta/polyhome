@extends('customer::layouts.master')

@section('title', '')

@push('css')
<link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/css/style7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/css/responsive7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/css/animate7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/slick/slick7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/select2/dist/css/select2.min7254.css?v=1602513406" type="text/css" />
<link rel="stylesheet" href="themes/bandonvn/assets/rating-star/jquery.rateyo7254.css?v=1602513406" type="text/css" />
<script src="themes/bandonvn/assets/js/jquery.min7254.js?v=1602513406" type="text/javascript" ></script>
<style>
    .link-room:hover{
        color: #fff;
    }
    .active .link-room{
        color: #fff;
    }
</style>
@endpush

@section('content')
<section class="breadcrumb-area breadcrumbs breadcrumb-detail-motel border-bottom border-top"
style="clear: both">
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="breadcrumb-menu">
                <nav itemscope itemtype="https://schema.org/Breadcrumb">
                    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a
                                itemprop="item" href="{{ route('customer.home')}}"> <span itemprop="name">Trang chủ</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a
                                itemprop="item" href="{{ route('customer.building.list') }}"> <span itemprop="name">Thuê
                                    phòng</span> </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li class="active"> <span>{{ $data['building']->name }}</span> </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</section>
<section class="main-content slider-image 1">
<div class="promotel-slider">
    @foreach (json_decode($data['building']->image) as $image)
        <div class="popup-gallery" data-index="" data-image-id="">
            <a href="{!! url('building/'.  $image) !!}" class="">
                <img src="{!! url('building/'.  $image) !!}" />
            </a>
        </div>
    @endforeach
</div><!-- /.row -->
</section>
<!-- Blog posts -->
<section class="blog-single section-promotel-detail" style="margin-top: 0">
<div class="container">
    <div class="row" data-sticky_parent>
        <div class="col-md-8 col-xs-12">
            <div class="post-wrap">
                <article class="entry format-standard">
                    <div class="main-post">
                        <div class="title">
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-md-9">
                                    <h1><strong style="font-weight: 400">{{ $data['building']->name }}</strong></h1>

                                    <div class="detail__location">
                                        <div>
                                            <img src="images/icon/marker.png" width="20px"
                                                style="margin: 0 6px 6px 0" />
                                            <a class="marker-map-link" href="#map"
                                                style="color: #303030; text-transform: initial">{{ $data['building']->district->name }}, Hà Nội</a>
                                        </div>
                                        <div class="type__room-head mt--5">
                                            <img src="images/icon/door.png" width="20px"
                                                style="margin: 0 6px 6px 0" />
                                            <span style="letter-spacing:0px">Phòng 1 ngủ </span>
                                        </div>
                                        <div class="mt--5">
                                            <img src="images/icon/price-tag.png" width="20px"
                                                style="margin: 0 6px 6px 0" />
                                            <span style="letter-spacing:0px; text-transform: initial">Giá
                                                dịch vụ</span>
                                        </div>
                                    </div>
                                    <div class="rating-star rating_wrapper__mobile"
                                        style="text-align: center; width: 130px; position: absolute; top: 75px; right: 0px;">
                                        <p
                                            style="margin:0 0 5px 0; text-transform: initial; line-height: 1.2">
                                            Đánh giá</p>
                                        <div class="rateYo" style="margin: 0 auto"></div>
                                        <div class="rating"
                                            style="text-transform: initial; font-size: 12px;letter-spacing: 0; color: #646161">
                                            <span class="rating-avg">4</span> /5 của <span
                                                class="number_rating">27</span> đánh giá</div>
                                    </div>
                                </div>
                                <div class="d-none d-sm-block col-lg-2 col-md-3 col-sm-2 room-id">
                                    <div class="rating-star rating_wrapper__pc"
                                        style="text-align: center; width: 135px; position: absolute; bottom: -75px; right: 0px;">
                                        <p style="margin: 0; text-transform: initial; line-height: 1.2">Đánh
                                            giá</p>
                                        <div class="rateYo" style="margin: 0 auto"></div>
                                        <div class="rating"
                                            style="text-transform: initial; font-size: 12px;letter-spacing: 0; color: #646161">
                                            <span class="rating-avg">4</span> /5 của <span
                                                class="number_rating">27</span> đánh giá</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="ul_list_detail_room_wrapper">
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá điện <span class="text-muted">(bao gồm điện dùng chung)</span>
                                                </div>
                                                <span class="list__distance">
                                                    <span style="">{{ number_format($data['building']->electricity_price)}}₫</span>/số
                                                </span>
                                            </div>
                                        </li>
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá vệ sinh
                                                </div>
                                                <span class="list__distance ">
                                                    <span style="">{{ number_format($data['building']->cleaning_price)}}₫</span>/người
                                                </span>
                                            </div>
                                        </li>
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá nước
                                                </div>
                                                <span class="list__distance ">
                                                    <span style="">{{ number_format($data['building']->water_price)}}₫</span>/số
                                                </span>
                                            </div>
                                        </li>
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá thang máy
                                                </div>
                                                <span class="list__distance ">
                                                    <span style="">{{ number_format($data['building']->elevator_price)}}₫</span>/người
                                                </span>
                                            </div>
                                        </li>
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá Internet
                                                </div>
                                                <span class="list__distance ">
                                                    <span style="">{{ number_format($data['building']->internet_price)}}₫</span>/phòng
                                                </span>
                                            </div>
                                        </li>
                                        <li class="li_list__item li-list--2">
                                            <div class="li_list__body">
                                                <div class="list__description">
                                                    Giá gửi xe
                                                </div>
                                                <span class="list__distance ">
                                                    <span style="">
                                                        @if ($data['building']->internet_price === 0)
                                                            miễn phí
                                                        @else
                                                            {{ $data['building']->internet_price }}
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="box-room box__wrapper" id="promotel-box-room" data-motel-id="30">
                            <div class="box-service">
                                <h3 class="convenient">✺ Danh sách phòng </h3>
                                <span class="sp-convenient">Chọn loại phòng và căn hộ phù hợp với
                                    bạn.</span>
                            </div>
                            <div class="wrapper-room-grid">
                                <div class="">
                                    <div class="box-filter_wrapper">
                                        <span id="filter_0_1_1" class="span__wrapper"
                                            onclick="filterTypeRoom('30', '0', '1', '1')">
                                            Phòng 1 ngủ </span>
                                    </div>
                                    <div class="box-room-grid">
                                        @foreach ($data['room'] as $room)
                                            <span
                                                onclick="viewRoom('30', '{{ $room->id }}', true)"
                                                class="promotel-room-grid " id="room_{{ $room->id }}">
                                                    <a href="{{ route('customer.building.room.detail', [ 'slug' => $data['building']->slug, 'id' => $room->id]) }}" class="link-room">{{ $room->name }}</a>
                                            </span>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="box-room-convenient" id="room_convenient_482">
                                    <div class="detail__room start-xs">
                                        <div class="ajax-loading-small">
                                            <p style="text-align: center;">
                                                <img width="48px" src="images/Spinner-line.svg" />
                                            </p>
                                        </div>
                                        <div class="detail__room__title is-flex jbetween">
                                            <p class="mb--0 bold title__room">
                                                {{ $data['room'][0]->name }}
                                            </p>
                                        </div>
                                        <div class="detail__room__content">
                                            <div class="detail__room__description">
                                                <ul class="ul_list_detail_room_wrapper">
                                                    <li class="li_list__item">
                                                        <div class="li_list__body">
                                                            <div class="list__description">
                                                                Giá thuê phòng
                                                            </div>
                                                            <span class="list__distance price__room">
                                                                <span
                                                                    style=""><b>{{ number_format($data['room'][0]->price)}}₫</b></span>/tháng
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="li_list__item">
                                                        <div class="li_list__body">
                                                            <div class="list__description">
                                                                Loại phòng
                                                            </div>
                                                            <span class="list__distance type__room">
                                                                {{ $data['room'][0]->room_category->name}}
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="li_list__item">
                                                        <div class="li_list__body">
                                                            <div class="list__description">
                                                                Diện tích
                                                            </div>
                                                            <span class="list__distance area__room">
                                                                {{ $data['room'][0]->acreage }}m<sup>2</sup>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="li_list__item">
                                                        <div class="li_list__body">
                                                            <div class="list__description">
                                                                Số người ở tối đa
                                                            </div>
                                                            <span class="list__distance max_people__room">
                                                                {{ $data['room'][0]->max_people }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="li_list__item">
                                                        <div class="li_list__body">
                                                            <div class="list__description">
                                                                Tầng
                                                            </div>
                                                            <span class="list__distance floor__room">
                                                                {{ $data['room'][0]->floors }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="li_list__item md-d-none">
                                                        <div class="li_list__body">
                                                            <button style="margin-top: 5px;" class="btn btn-grad--primary btn--shadow-primary btn-book-room">
                                                                Đặt phòng ngay!
                                                            </button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-service">
                            <h3 class="convenient">✺ Mô tả chung</h3>
                        </div>
                        <div class="entry-content description__room" style="padding-bottom: 0px">
                            {!! nl2br($data['building']->description) !!}
                        </div>

                        <div class="box-service__wrapper box__wrapper">
                            <div class="box-service">
                                <h3 class="convenient">✺ Tiện nghi chỗ ở </h3>
                            </div>
                            <div class="box-convenient" id="promotel-convenient">
                                <h4 class="">✵ Tiện nghi chung của tòa nhà</h4>
                                <ul class="list list--3 is-flex">
                                    @foreach ($data['utility_building'] as $item)
                                        <li class="mt--12"> <img width="30px" style="margin-right: 10px" src="{!! url('storage/'.  $item->icon) !!}" />
                                            <span>{{ $item->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="box-convenient" id="promotel-convenient">
                                <h4 class="">✵ Tiện nghi chung của phòng</h4>
                                <ul class="list list--3 is-flex">
                                    @foreach ($data['utility_room'] as $item)
                                        <li class="mt--12"> <img width="30px" style="margin-right: 10px" src="{!! url('storage/'.  $item->icon) !!}" />
                                            <span>{{ $item->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="promotel-gmaps box__wrapper" id="map">
                            <div class="box-service">
                                <h3 class="convenient">✺ Địa chỉ tòa nhà</h3>
                            </div>
                            <div class="google-map-area">
                                <div class="google-map-box">
                                    <div>
                                        {{ $data['building']->google_map }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="related-promotel">
                            <div class="box-service">
                                <h3 class="convenient text-uppercase">Tòa nhà gần đây</h3>
                            </div>
                            <div class="row row--pd ">
                                @foreach ($data['buildings'] as $building)
                                    <div class="col-xs-6 col-md-3 col-sm-6">
                                        <div class="card-product-grid">
                                            <div class="card-product-grid--item">
                                                <div class="promotel-image">
                                                    <div class="promotel-image-wrap">
                                                        <a href="{{ route('customer.building.detail', $building->slug) }}">
                                                            <?php $image = json_decode($building->image) ?>
                                                            <img src="{!! url('building/'.  $image[0]) !!}" alt="{{ $building->name }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="promotel-content">
                                                    <div class="promotel-content-wrap">
                                                        <div class="promotel__type bold"
                                                            style="-webkit-box-orient: vertical;">
                                                            CHUNG CƯ MINI, PHÒNG TRỌ
                                                        </div>
                                                        <a href="{{ route('customer.building.detail', $building->slug) }}">
                                                            <div class="promotel-title">
                                                                {{ $building->name }}
                                                            </div>
                                                        </a>
                                                        <div class="promotel-price">
                                                            <b>
                                                                @foreach ($building->room as $key => $item)
                                                                    @if ($key === 0)
                                                                        {{ number_format($item->price) }}
                                                                    @endif
                                                                @endforeach đ/tháng
                                                            </b>
                                                        </div>
                                                        <div class="promotel-address">
                                                            {{ $building->district->name }}, Hà Nội </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="">
                            <div class="fb-comments" data-width="100%" width="100%"
                                data-href=""
                                data-numposts="10" data-order-by="reverse_time"></div>
                        </div>
                        <div class="post-content-related sidebar mt-2">
                            <div class="widget widget-recent-post style1">
                                <h5 class="widget-title"><strong>Tin tức</strong></h5>
                            </div>
                            <div class="row">
                                @foreach ($data['posts'] as $post)
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 image-blog-sm">
                                                <div class="feature-post">
                                                    <a href="{{ route('customer.post.detail', $post->slug) }}">
                                                        <div class="entry-image ">
                                                            <img class="lazy"
                                                                data-src="{!! url('storage/'.  $post->image) !!}"
                                                                src="{!! url('storage/'.  $post->image) !!}"
                                                                alt="image">
                                                        </div><!-- /.entry-image -->
                                                    </a>
                                                </div><!-- /.feature-post -->
                                            </div>
                                            <div style="margin-bottom: 15px"
                                                class="col-lg-12 col-md-12 col-sm-12 article-blog-sm">
                                                <div class="main-post">
                                                    <h3 class="entry-title">
                                                        <strong>
                                                            <a href="{{ route('customer.post.detail', $post->slug) }}">
                                                                {{ $post->title }}
                                                            </a>
                                                        </strong>
                                                    </h3>
                                                </div><!-- /.main-post -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-md-4 sm-d-none" data-sticky_column>
            <div class="is-shadow-box-2 box-detail-view-room sidebar">
                <p style="margin-bottom: 15px; text-align: right">
                    <span class="price-promotelroom">{{ number_format($data['room'][0]->price)}}</span><span class=""><b>₫</b>/tháng</span>
                </p>
                <div class="wrap-type-input">
                    <div class="input-wrap name">
                        <input class="date-view-room" type="text" tabindex="1"
                            placeholder="Chọn ngày xem phòng" name="dateview" id="dateview">
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-picker-date">Đặt lịch xem phòng</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-book-room">
                        <svg version="1.1" viewBox="0 0 20 20" class="mr--6 svg-icon svg-fill"
                            style="width: 20px; height: 20px;margin-right: 5px;vertical-align: middle">
                            <g fill="none" fill-rule="evenodd" transform="translate(-2 -2)">
                                <path pid="0" d="M0 0h24v24H0z"></path>
                                <circle pid="1" cx="12" cy="12" r="10" fill="#FFF" opacity=".3"></circle>
                                <path pid="2" fill="#FFF"
                                    d="M12.42 17.158l3.037-6.073a.75.75 0 0 0-.67-1.085H12V7.177a.75.75 0 0 0-1.42-.335l-3.037 6.073A.75.75 0 0 0 8.213 14H11v2.823a.75.75 0 0 0 1.42.335z">
                                </path>
                            </g>
                        </svg>
                        <span><a href="{{ route('customer.message', $data['building']->host_id ) }}" style="color: #fff">Nhắn tin với chủ nhà</a></span>
                    </button>
                </div>
                <hr>
                <div class="text-center">
                    <ul class="flat-socials">
                        <li class="facebook">
                            <a href="{{ $data['building']->facebook }}"
                                target="_blank" rel="nofollow"><span style="color: #fff"
                                    class="share-top bold">facebook</span></a>
                        </li>
                        <li class="zalo">
                            <a rel="nofollow" href="{{ $data['building']->zalo }}" style="cursor: pointer"
                                class="zalo-share-button"><span style="color: #fff"
                                    class="share-top bold">zalo</span></a>
                        </li>
                    </ul>
                </div>
                <hr />
                <div class="operating-unit is-flex">
                    <div class="image-operating-unit">
                        <img src="images/brand/operate_unit_eee.png" />
                    </div>
                    <div class="title-operating-unit">
                        <p class="name-unit">Bản Đôn</p>
                        <p class="date-unit">Đơn vị vận hành chung cư mini & nhà trọ</p>
                    </div>
                </div>
                <hr />
                <div class="rounded bg-gray-f p--12 align-center jbetween">
                    <p class="mb--0 p--small-2 c-gray-3">
                        Gọi <a href="tel:0902062222" class="extra-bold">0902.06.2222</a> để được hỗ trợ 24/7
                    </p>
                </div>
            </div>
        </div>
        @guest
        <div class="modal modal-fullscreen fade" id="modalPickerView" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-uppercase"><b>Vui lòng đăng nhập để đặt lịch xem phòng</b></h4>
                    </div>
                    <div class="modal-body">
                        @error('login')
                        <div class="mt-3">
                            <div class="col-12 m-auto text-danger">
                                Sai tài khoản hoặc mật khẩu
                            </div>
                        </div>
                        @enderror
                        @error('expired')
                            <div class="mt-3">
                                <div class="col-12 m-auto text-danger">
                                    Tài khoản không được kích hoạt, vui lòng liên hệ quản trị viên
                                </div>
                            </div>
                        @enderror
                        <form action="{{ route('customer.login') }}" class="w3layouts-contact-fm" method="POST">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <div>
                                        <label class="col-form-label text-danger">
                                            {{ $message }}</i>
                                        </label>
                                    </div>
                                    @enderror

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
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="form-group mx-auto mt-3">
                                        <button type="submit" class="flat-button bg-theme">Đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endguest

        @auth
        <div class="modal modal-fullscreen fade" id="modalPickerView" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-uppercase"><b>Thông tin đặt lịch xem phòng</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('customer.order.room') }}" class="flat-contact-form style1 custom1" id="form-picker-view-room" method="post">
                            @csrf
                            <input type="hidden" name="host_id" value="{{ $data['room'][0]->host_id }}">
                            <input type="hidden" name="room_id" value="{{ $data['room'][0]->id }}">
                            <input type="hidden" name="building_id" value="{{ $data['building']->id }}">
                            <input type="hidden" name="total_price" value="{{ $data['room'][0]->price }}">
                            <h3 class="text-uppercase"><b>Số 20D, ngách 7/155 Cầu Giấy</b></h3>
                            <hr style="margin: 10px 0" />
                            <div class="field clearfix">
                                <div class="room-price__wrap">
                                    <div class="is-flex jbetween align-center detail-item-room">
                                        <span class="fl-item-50 text-left">Giá thuê phòng:</span>
                                        <span class="fl-item-50 pl--12 bold text-right price__room">{{ number_format($data['room'][0]->price)}}<span class=""><b>₫</b>/tháng</span>
                                    </div>
                                    <div class="is-flex jbetween align-center detail-item-room">
                                        <span class="fl-item-50 text-left">Diện tích</span>
                                        <span class="fl-item-50 pl--12 bold text-right area__room">{{ $data['room'][0]->acreage }}m<sup>2</sup></span>
                                    </div>
                                </div>
                                <hr style="margin: 10px 0 " />
                                <div class="wrap-type-input">
                                    <div class="input-wrap room">
                                        <span class="span-wrap">Phòng</span>
                                        <select data-motel-id="30" name="room_id" id="room_id"
                                            class="input-flat form-control select2 seclect_room_id"
                                            style="width: 100%">
                                            @foreach ($data['room'] as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-wrap dateview">
                                        <span class="span-wrap">Ngày xem phòng</span>
                                        <input readonly="readonly" autocomplete="false"
                                            class="date-view-room" type="text" tabindex="1" placeholder=""
                                            name="date_view_room" id="date_view_room">
                                    </div>
                                    <div class="input-wrap name">
                                        <span class="span-wrap">Họ và tên</span>
                                        <input autocomplete="false" type="text" tabindex="2" placeholder=""
                                            name="customer_name" id="name">
                                    </div>
                                    <div class="input-wrap phone">
                                        <span class="span-wrap">Số điện thoại</span>
                                        <input autocomplete="false" type="text" tabindex="3" placeholder=""
                                            name="customer_phone_number" id="phone">
                                    </div>
                                    @guest
                                        <div class="input-wrap name">
                                            <span class="span-wrap">Email</span>
                                            <input autocomplete="false" type="text" tabindex="4" placeholder=""
                                                name="customer_email" id="email">
                                        </div>
                                    @endguest
                                    @auth
                                        <input type="hidden" name="customer_email" value="{{ Auth()->user()->email }}">
                                        <input type="hidden" name="customer_id" value="{{ Auth()->user()->id }}">
                                    @endauth
                                </div>
                                <div class="textarea-wrap clearboth">
                                    <span class="span-wrap">Ghi chú</span>
                                    <textarea class="type-input" tabindex="4" placeholder="" name="note"
                                        id="note"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align: center">
                                <button class="flat-button bg-theme btn-hg-auto btn-grad--primary "
                                    id="btn-picker-dateview">Đặt lịch xem phòng</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endauth

    </div>
</div>
</section>

<style>
@media only screen and (max-width: 479px) {

    /*.fb_dialog{bottom: 60pt !important; z-index: 111 !important}*/
    .btn-tet-2020 {
        bottom: 135px;
    }
}

.blog-single .entry .feature-post {
    margin-left: 0;
}
</style>
<script>
var room_id_first = '{{ $data['room'][0]->id }}';
var motel_id = '30';
var alias = 'CG001';
var domain = 'bandon.vn';
jQuery(document).ready(function ($) {
    $('.promotel-slider').slick({
        infinite: true,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    arrows: true,
                    slidesToShow: 1,
                    centerMode: true,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 770,
                settings: {
                    arrows: true,
                    slidesToShow: 1,
                    centerMode: true,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
</script>

@endsection

@push('scripts')
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="themes/bandonvn/assets/js/bootstrap.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.easing7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery-waypoints7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.cookie7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/select2/dist/js/select2.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/moment/moment.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/moment/vi7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/bootstrap-datepicker/js/locales/bootstrap-datepicker.vi7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqIcC5sMGSpuShL_xxFvHJ6wrsmRABwWg" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/gmaps/gmaps7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/gmaps/map-helper7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/sweetalert.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/slick/slick.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.magnific-popup.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/sticky-kit7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/imagesloaded.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/sweetalert.min7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/rating-star/jquery.rateyo7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="sp.zalo.me/plugins/sdk.js" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/dragscroll7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/main7254.js?v=1602513406" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/custom7254.js?v=1602513406" type="text/javascript" ></script>
@endpush
