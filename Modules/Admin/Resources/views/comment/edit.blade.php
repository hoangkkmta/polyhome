@extends('admin::layouts.master')

@section('title', 'Cập nhật bình luận')

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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                    <form action="{{ route('admin.binh-luan.update', [$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Tiêu đề bình luận:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $data->title) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea class="form-control" name="content" placeholder="Place some text here" disabled >{{ old('content', $data->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Bài viết bình luận:</label>
                            <input type="text" class="form-control" name="post_id" value="{{ old('post_id', $data->post->title ) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Người bình luận:</label>
                            <input type="text" class="form-control" name="customer_id" value="{{ old('customer_id', $data->customer->name ) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Ngày giờ bình luận:</label>
                            <input type="text" class="form-control" name="created_at" value="{{ old('created_at', $data->created_at ) }}" disabled>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.binh-luan.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
                            {{-- <button type="submit" class="btn btn-lg btn-primary">Cập nhật</button> --}}
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
