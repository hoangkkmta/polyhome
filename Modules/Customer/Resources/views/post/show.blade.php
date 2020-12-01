@extends('customer::layouts.master')

@section('title', $data->title)

@push('css')
    <link rel="shortcut icon" href="images/brand/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap3736.css?v=1602513851" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/style3736.css?v=1602513851" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/responsive3736.css?v=1602513851" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/animate3736.css?v=1602513851" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup3736.css?v=1602513851" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
@endpush

@section('content')

<section class="breadcrumb-area breadcrumbs border-bottom border-top" style="clear: both">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="breadcrumb-menu">
                    <nav itemscope itemtype="https://schema.org/Breadcrumb">
                        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="">
                                <a itemprop="item" href="{{ route('customer.home') }}">
                                    <span itemprop="name">
                                        Trang chủ
                                    </span>
                                </a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a itemprop="item" href="{{ route('customer.post.list') }}">
                                    <span itemprop="name">
                                        Tin tức
                                    </span>
                                </a>
                                <meta itemprop="position" content="2">
                            </li>
                            <li class="active">
                                <span>Mẫu hợp đồng thuê nhà trọ, phòng trọ [Mới nhất
                                    2020]
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog posts -->
<section class="main-content blog-single v1">
    <div class="container">
        <div class="row" data-sticky_parent>
            <div class="col-md-8">
                <div class="post-wrap">
                    <article class="entry format-standard">
                        <div class="feature-post">
                            <div class="entry-image">
                                <img class="lazy"
                                    data-src="/resize/1000x700/a-c/zc-1/f/uploads/posts/mau-hop-dong-thue-phong-tro-01.jpg"
                                    src="{!!  url('storage/' . $data->image) !!}"
                                    alt="image">
                            </div><!-- /.entry-image -->
                        </div><!-- /.feature-post -->

                        <div class="main-post">
                            <h1 class="entry-title full-title">
                                <strong style="font-weight: 400">{{ $data->title }}</strong>
                            </h1>

                            <div class="wrap-share">
                                <ul class="category-post">
                                    <li><span class="date"><a href="javascript:void(0)"><i
                                                    class="fa fa-clock-o"></i> 22 Tháng Tư, 2019</a></span></li>
                                </ul>
                                <div class="share-post">
                                    <div class="share-post">
                                        <ul class="flat-socials">
                                            <li class="facebook">
                                                <a href="http://www.facebook.com/sharer.php?u={{ route('customer.post.detail', $data->slug) }}"
                                                    target="_blank" rel="nofollow"><span style="color: #fff"
                                                        class="share-top bold">facebook</span></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="http://twitter.com/intent/tweet?url={{ route('customer.post.detail', $data->slug) }}"
                                                    target="_blank" rel="nofollow"><span style="color: #fff"
                                                        class="share-top bold">twitter</span></a>
                                            </li>
                                            <li class="zalo">
                                                <a rel="nofollow" style="cursor: pointer"
                                                    class="zalo-share-button"
                                                    data-href="{{ route('customer.post.detail', $data->slug) }}"
                                                    data-oaid="579745863508352884" data-color="white"
                                                    data-customize=true><span style="color: #fff"
                                                        class="share-top bold">zalo</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /.share-post -->
                            </div><!-- /.wrap-share -->
                            <div class="entry-content">
                                {!! nl2br($data->content) !!}
                            </div><!-- /.entry-content -->
                            <div class="wrap-share">
                                <div class="share-post">
                                    <ul class="flat-socials">
                                        <li class="facebook">
                                            <a href="http://www.facebook.com/sharer.php?u={{ route('customer.post.detail', $data->slug) }}"
                                                target="_blank" rel="nofollow"><span style="color: #fff"
                                                    class="share-top bold">facebook</span></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="http://twitter.com/intent/tweet?url={{ route('customer.post.detail', $data->slug) }}"
                                                target="_blank" rel="nofollow"><span style="color: #fff"
                                                    class="share-top bold">twitter</span></a>
                                        </li>
                                        <li class="zalo">
                                            <a rel="nofollow" style="cursor: pointer" class="zalo-share-button"
                                                data-href="{{ route('customer.post.detail', $data->slug) }}"
                                                data-oaid="579745863508352884" data-color="white"
                                                data-customize=true><span style="color: #fff"
                                                    class="share-top bold">zalo</span></a>
                                        </li>
                                    </ul>
                                </div><!-- /.share-post -->
                            </div><!-- /.wrap-share -->
                            <hr>
                            <div class="comments">
                                <h3 class="aside-title ">Bình luận:</h3>
                                <div class="comments-grids">
                                    @foreach ($dataComments as $row)
                                        <div class="media">
                                            <div class="media-body comments-grid-right">
                                                <h4><a href="#">{{ $row->customer->name }}</a></h4>
                                                <ul class="">
                                                    <li class="font-weight-bold">
                                                        {{ $row->title }}
                                                    </li>
                                                </ul>
                                                <p>{{ $row->content }}</p>
                                                {{-- <a href="#comment" class="replay"><span class="fa fa-reply"></span> Reply</a> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="w3l-comments-form-9 pt-3">
                                <div class="coments-forms-sub">
                                    <div class="wrapper">
                                        <div class="testi-top">
                                            <h3 class="title-main2">Viết bình luận</h3>
                                            @guest
                                                <a href="{{ route('customer.formLogin') }}">Đăng nhập để bình luận</a>
                                            @endguest

                                            @auth
                                                <div class="form-commets">
                                                    <form action="{{ route('customer.post.comment', $data->slug) }}" method="post">
                                                        @csrf
                                                        <input type="text" name="title" placeholder="Tiêu đề">
                                                        <textarea name="content" placeholder="Viết nội dung bình luận"></textarea>
                                                        <div class="media">
                                                            <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                                            {{-- <input type="text" name="name" placeholder="" value="">
                                                            <input type="email" name="email" placeholder="Email của bạn"> --}}
                                                        </div>
                                                        <div class="text-right">
                                                            <button class="btn button-eff" type="submit">Gửi bình luận</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content-related sidebar mt-2">
                                <div class="widget widget-recent-post style1">
                                    <h5 class="widget-title"><strong>Bài viết mới nhất</strong></h5>
                                </div>
                                <div class="row">
                                    @foreach ($dataPosts as $row)
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 image-blog-sm">
                                                    <div class="feature-post">
                                                        <a href="{{ route('customer.post.detail', $row->slug) }}">
                                                            <div class="entry-image">
                                                                <img class="lazy" src="{!! url('storage/'.  $row->image) !!}" alt="image">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div style="margin-bottom: 15px"
                                                    class="col-lg-12 col-md-12 col-sm-12 article-blog-sm">
                                                    <div class="main-post">
                                                        <h3 class="entry-title">
                                                            <strong>
                                                                <a href="{{ route('customer.post.detail', $row->slug) }}">
                                                                    {{ $row->title }}
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
                            <hr />
                            <div class="related-promotel">
                                <div class="box-service">
                                    <h3 class="convenient text-uppercase bold">Phòng trọ bạn có thể quan tâm
                                    </h3>
                                </div>
                                <div class="row row--pd ">
                                    @include('customer::building.buildings')
                                </div>
                            </div>
                        </div><!-- /.main-post -->
                    </article>

                    <!-- /.author-post -->

                    <!-- /.comment-post -->

                </div><!-- /.post-wrap -->
            </div>

            <div class="col-md-4" data-sticky_column>
                @include('customer::post.aside')
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

@endsection

@push('scripts')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../themes/bandonvn/assets/js/bootstrap.min3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.easing3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery-waypoints3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/jquery.cookie3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/sticky-kit3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/imagesloaded.min3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="sp.zalo.me/plugins/sdk.js" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/dragscroll3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/main3736.js?v=1602513851" type="text/javascript" ></script>
    <script src="themes/bandonvn/assets/js/custom3736.js?v=1602513851" type="text/javascript" ></script>
@endpush
