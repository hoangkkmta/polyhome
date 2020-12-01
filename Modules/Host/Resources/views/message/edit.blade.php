@extends('host::layouts.master')

@section('title', 'Quản lý khu vực quận')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('host.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Trò chuyện</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="direct-chat-messages" style="height: 600px">
                                @foreach ($data as $item)
                                    @if ($item->message_type === MESSAGE_CUSTOMER)
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">{{ $item->customer->name }}</span>
                                                <span class="direct-chat-timestamp float-right">{{ $item->created_at }}</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                            <div class="direct-chat-text">
                                                {{ $item->message }}
                                            </div>
                                        </div>
                                    @elseif ($item->message_type === MESSAGE_HOST)
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">{{ $item->host->name }}</span>
                                                <span class="direct-chat-timestamp float-left">{{ $item->created_at }}</span>
                                            </div>
                                            <img class="direct-chat-img" src="{!! url('storage/'.  Auth::user()->avatar) !!}" alt="avatar">
                                            <div class="direct-chat-text">
                                                {{ $item->message }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach



                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="{{ route('host.tro-chuyen.update', \Request::segment(3)) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="customer_id" value="{{ \Request::segment(3) }}">
                                <input type="hidden" name="host_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="message_type" value="{{ MESSAGE_HOST }}">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Nhắn tin ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
            //Initialize Select2 Elements
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

    </script>
@endpush
