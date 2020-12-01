@extends('customer::layouts.master')

@section('title', 'Tìm phòng trọ các quận Hà Nội')

@push('css')
    <link rel="shortcut icon" href="images/brand/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap9d43.css?v=1602513349" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/style9d43.css?v=1602513349" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/responsive9d43.css?v=1602513349" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/animate9d43.css?v=1602513349" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup9d43.css?v=1602513349" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
@endpush

@section('content')

<link rel="stylesheet" href="themes/bandonvn/assets/rating-star/jquery.rateyo.css" type="text/css" />
<script src="themes/bandonvn/assets/rating-star/jquery.rateyo.js" type="text/javascript"></script>
<style>
    .breadcrumb {
        padding: 8px 0px !important;
    }
</style>
<script>
    function ratingInit(id, rating) {
        $("#rateyo_" + id).rateYo({
            rating: rating,
            numStars: 5,
            precision: 2,
            starWidth: "14px",
            spacing: "3px",
            halfStar: true,
            onSet: function (i, v) {
            }
        });
    }
</script>
<section class="breadcrumb-area breadcrumbs border-bottom border-top breadcrumb-promotel">
    <div class="container">
        <div class="row">
            <div class="breadcrumb-box col-xl-12 col-lg-12 col-md-12">
                <div class="breadcrumb-menu">
                    <nav itemscope itemtype="https://schema.org/Breadcrumb">
                        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a
                                    itemprop="item" href="index.html"> <span itemprop="name">Trang chủ</span>
                                </a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="active"> <span>Tìm phòng, căn hộ, chung cư mini các trường Đại học, Cao
                                    đẳng Hà Nội</span> </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-content promotel-grid">
    <div class="container">
        <div class="container-promotel--grid">
            <div class="row row--pd ">
                <div style="padding:0 8px;">
                    <h1 class="title-group">Tìm phòng, căn hộ, chung cư mini các trường Đại học, Cao đẳng Hà Nội
                    </h1>
                    <hr style="margin: 4px 0px 12px" />
                    <h2>Tìm phòng, căn hộ, chung cư mini gần các trường Đại học, Cao đẳng Hà Nội. Bản Đôn - hệ
                        thống tòa nhà cho thuê chính chủ, chất lượng, uy tín!</h2>
                </div>
                <div class="clear_fix" style="padding-top: 15px;clear: both">
                    <div style="padding: 8px;">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li id="tabs_districts"><a href="{{ route('customer.building.list.district') }}" data-toggle="tab">Quận/Huyện</a></li>
                                    <li id="tabs_university" class="active"><a href="{{ route('customer.building.list.school') }}" data-toggle="tab">Các trường đại học</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade   in active " id="tab_uni">
                                        <ul class="ia_section-container clearfix">
                                            @foreach ($data['school'] as $school)
                                                <li class=" ia_section_uni  fl ">
                                                    <a class="ia_link" href="{{ route('customer.building.detail.school', $school->id) }}">{{ $school->name }}</a>
                                                    <span class="ia_hotelnum">Có {{ $school->building->where('status', 1)->count() }} căn hộ cho thuê</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="">
                        <div class="box-service" style="margin: 0">
                            <h3 class="convenient text-uppercase">Tòa nhà, căn hộ chung cư mini tại Hà Nội</h3>
                        </div>
                        <div class="row row--pd">
                            @include('customer::building.buildings')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flat-row pad-top80px main-content blog-posts post-in-motel" style="padding: 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h3 style="text-transform: uppercase"><span>Tin tức</span></h3>
                    <hr style="margin: 4px 0px 12px">
                </div><!-- /.title-section -->
                <div class="flat-divider d20px"></div>
            </div>
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="post-wrap">
                    @include('customer::building.posts')
                </div><!-- /.post-wrap -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

@endsection

@push('scripts')
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="themes/bandonvn/assets/js/bootstrap.min9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.easing9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery-waypoints9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.cookie9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/dragscroll9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/main9d43.js?v=1602513349" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/custom9d43.js?v=1602513349" type="text/javascript" ></script>
@endpush
