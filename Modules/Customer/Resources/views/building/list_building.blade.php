@extends('customer::layouts.master')

@section('title', 'Bài viết')

@push('css')
    <link rel="shortcut icon" href="images/brand/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/style5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/responsive5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/animate5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/slick/slick5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/select2/dist/css/select2.min5298.css?v=1602513347" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/rating-star/jquery.rateyo5298.css?v=1602513347" type="text/css" />
    <script src="themes/bandonvn/assets/js/jquery.min5298.js?v=1602513347" type="text/javascript"></script>
@endpush

@section('content')

    <section class="filter-promotel">
        <div class="search-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @include('customer::building.search')
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="slick-wapper">
        <div class="container">
            <div class="col-md-12">
                <div class="slider slick-uni">
                    @foreach ($data['school'] as $school)
                        <div>
                            <div>
                                <a href="{{ route('customer.building.detail.school', $school->id) }}" class="uni-area">
                                    <p class="uni-area__title">{{ $school->name }}</p>
                                    <p class="uni-area__desc">Có {{ $school->building->count() }} căn hộ cho thuê</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="main-content promotel-grid">
        <div class="container">
            <div class="container-promotel-grid">
                <div class="row row--pd ">
                    <div class="col-md-12">
                        <h1 style="text-transform: uppercase">Bạn cần Tìm phòng trọ, nhà trọ, chung cư mini uy tín
                            tại Hà Nội?</h1>
                        <hr style="margin: 4px 0px 12px" />
                        <h2>Bạn cần tìm phòng trọ, nhà trọ - tìm căn hộ, chung cư mni tại Hà Nội. Hãy đến với hệ
                            thống +110 tòa nhà tại Đơn vị vận hành nhà Bản Đôn.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content promotel-grid">
        <div class="container">
            <div class="container-promotel--grid">
                <div class="row row--pd ">
                    <div class="col-md-12">
                        <div class="">
                            <div class="row row--pd">
                                @include('customer::building.buildings')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Flat recent post -->
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

    <script>
        var thuephongtro = '';
        var current_page = '1';
    </script>

@endsection

@push('scripts')
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="themes/bandonvn/assets/js/bootstrap.min5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery.easing5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery-waypoints5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery.cookie5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/select2/dist/js/select2.min5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/sweetalert.min5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/rating-star/jquery.rateyo5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/slick/slick.min5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/dragscroll5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/main5298.js?v=1602513347" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/custom5298.js?v=1602513347" type="text/javascript"></script>
@endpush
