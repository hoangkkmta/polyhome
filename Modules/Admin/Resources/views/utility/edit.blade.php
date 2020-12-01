@extends('admin::layouts.master')

@section('title', 'Quản lý tiện ích')

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
                    <form action="{{ route('admin.tien-ich.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Icon:</label>
                            <input id="img" type="file" class="form-control" name="icon" onchange="changeImg(this)" value="{{ old('icon', $data->icon) }}">
                            <img id="image" class="img-thumbnail img-fluid mt-3"  src="{!! url('storage/'.  $data->icon) !!}">
                            @error('icon')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <br>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary1"
                                        name="type"
                                        @if ($data->type == UTILITY_ROOM) checked @endif
                                        value="{{ UTILITY_ROOM }}">
                                <label for="radioPrimary1">
                                    Phòng
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary2"
                                        name="type"
                                        @if ($data->type == UTILITY_BUILDING) checked @endif
                                        value="{{ UTILITY_BUILDING }}">
                                <label for="radioPrimary2">
                                    Chung căn nhà
                                </label>
                            </div>
                            @error('type')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.tien-ich.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
                            <button type="submit" class="btn btn-lg btn-primary">Cập nhật</button>
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
