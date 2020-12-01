@extends('customer::layouts.master')
@section('title', 'Trò chuyện với chủ nhà')

@push('css')
    <link rel="shortcut icon" href="images/brand/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/bootstrap58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/style58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/responsive58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/animate58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="themes/bandonvn/assets/css/magnific-popup58ce.css?v=1602513334" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" type="text/css" />
    <link rel="canonical" href="index.html" />
    <script src="manage/themes/bandonvn/assets/js/jquery.min58ce.js?v=1602513334" type="text/javascript"></script>
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

    <style>

        .area {
            background: #eee;
            padding: 1rem;
            background: white;
            height: 500px;
            overflow: auto;
            margin-bottom: 50px;
        }

        .container-chat {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            }

            .darker {
            border-color: #ccc;
            background-color: #ddd;
            }

            .container-chat::after {
            content: "";
            clear: both;
            display: table;
            }

            .container-chat img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
            }

            .container-chat img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
            }

            .time-right {
            float: right;
            color: #aaa;
            }

            .time-left {
            float: left;
            color: #999;
            }
    </style>

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
                <div class="col-md-12">
                    <div class="area">
                        @foreach ($data['customer'] as $item)
                            @if ($item->message_type === MESSAGE_HOST)
                                <div class="container-chat">
                                    <img src="{!! url('storage/'.  Auth::user()->avatar) !!}" alt="Avatar" style="width:100%;">
                                    <p>{{ $item->message }}</p>
                                    <span class="time-right">{{ $item->created_at }}</span>
                                </div>
                            @elseif ($item->message_type === MESSAGE_CUSTOMER)
                                <div class="container-chat darker">
                                    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
                                    <p>{{ $item->message }}</p>
                                    <span class="time-left">{{ $item->created_at }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1">

                </div><!-- /.col-md-4 -->

                <div class="col-md-10">
                    <form action="{{ route('customer.message.send') }}" class="w3layouts-contact-fm" method="POST">
                        @csrf
                        <input type="hidden" name="host_id" value="{{ \Request::segment(3) }}">
                        <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="message_type" value="{{ MESSAGE_CUSTOMER }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="textarea" name="message" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ old('content') }}</textarea>
                                    @error('message')
                                    <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mx-auto mt-3">
                                    <button type="submit" class="flat-button bg-theme">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col-md-4 -->

                <div class="col-md-1">

                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>



@endsection

@push('script')
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
@endpush
