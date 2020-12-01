@extends('customer::layouts.master')

@section('title', 'Bài viết')

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
    <section class="breadcrumb-area breadcrumbs border-bottom border-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="breadcrumb-menu">
                        <nav itemscope itemtype="https://schema.org/Breadcrumb">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a
                                        itemprop="item" href="index.html"> <span itemprop="name">Trang chủ</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="active"> <span>Tin tức & kinh nghiệm thuê nhà trọ</span> </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog posts -->
    <section class="main-content blog-single v1 list-blog" style="margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-title-heading">
                        <h1 class="title" style="padding-left: 15px">TIN TỨC - KINH NGHIỆM THUÊ NHÀ TRỌ</h1>
                    </div><!-- /.page-title-captions -->
                </div><!-- /.col-md-12 -->
            </div>
            <div class="col-md-8">
                <div class="post-wrap">
                    @foreach ($dataPosts as $row)
                        <article class="entry format-standard">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 image-blog-lg">
                                    <div class="feature-post">
                                        <a href="{{ route('customer.post.detail', $row->slug) }}">
                                            <div class="entry-image">
                                                <img class="lazy" src="{!! url('storage/'.  $row->image) !!}" alt="">
                                            </div><!-- /.entry-image -->
                                        </a>
                                    </div><!-- /.feature-post -->
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 article-blog-lg">
                                    <div class="main-post">
                                        <h2 class="entry-title">
                                            <strong>
                                                <a href="{{ route('customer.post.detail', $row->slug) }}">{{ $row->title }}</a>
                                            </strong>
                                        </h2>
                                        <div class="entry-meta">
                                            <span class="author text-uppercase"><a style="margin: 0; font-weight: 600"
                                                    rel="nofollow" href="kinh-nghiem.html">{{ $row->category->name }}</a></span>
                                        </div>
                                    </div><!-- /.main-post -->
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div><!-- /.post-wrap -->
                <div class="blog-pagination">
                    @if(count($dataPosts))
                        <ul class="flat-pagination clearfix">
                            <li class="page-item @if(!$dataPosts->previousPageUrl()) disabled @endif">
                                <a class="page-link" href="{{ $dataPosts->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="{{ $dataPosts->url($dataPosts->currentPage()) }}">{{ $dataPosts->currentPage() }}</a></li>
                            {{-- <li><a href="{{ $dataPosts->url($dataPosts->currentPage() + 1) }}">{{ $dataPosts->currentPage() + 1 }}</a></li>
                            <li><a href="">...</a></li>
                            <li><a href="{{ $dataPosts->url($dataPosts->lastItem()) }}">{{ $dataPosts->lastItem() }}</a></li> --}}
                            <li class="page-item @if(!$dataPosts->nextPageUrl()) disabled @endif()">
                                <a class="page-link" href="{{ $dataPosts->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </div><!-- /.blog-pagination -->
            </div><!-- /.col-md-9 -->

            <div class="col-md-4" data-sticky_column>
                @include('customer::post.aside')
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection

@push('scripts')
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="themes/bandonvn/assets/js/bootstrap.min9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery.easing9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery-waypoints9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/jquery.cookie9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/sticky-kit9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/parallax9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/imagesloaded.min9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/dragscroll9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/main9d43.js?v=1602513349" type="text/javascript"></script>
    <script src="themes/bandonvn/assets/js/custom9d43.js?v=1602513349" type="text/javascript"></script>
@endpush
