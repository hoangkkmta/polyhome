@extends('admin::layouts.master')

@section('title', 'Chủ nhà')

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
                    <form action="{{ route('admin.tai-khoan.update', [$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Tên:</label>
                            <input {{ $data->id == Auth::user()->id ? '' : 'readonly' }} type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input {{ $data->id == Auth::user()->id ? '' : 'readonly' }} type="text" class="form-control" name="email" value="{{ old('email', $data->email) }}">
                            @error('email')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @error('password')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu:</label>
                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
                            @error('password')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái tài khoản:</label>
                            <br>
                            <div class="icheck-primary d-inline">
                              <input
                                    type="radio"
                                    id="radioPrimary1"
                                    name="status"
                                    value="{{STATUS_ACCOUNT_ADMIN_NOT_ACTIVE}}"
                                    {{ ($data->status == STATUS_ACCOUNT_ADMIN_NOT_ACTIVE) ? 'checked' : '' }}>
                              <label for="radioPrimary1">
                                  Chưa kích hoạt
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input
                                    type="radio"
                                    id="radioPrimary2"
                                    name="status"
                                    value="{{STATUS_ACCOUNT_ADMIN_ACTIVE}}"
                                    {{ ($data->status == STATUS_ACCOUNT_ADMIN_ACTIVE) ? 'checked' : ''}}>
                              <label for="radioPrimary2">
                                  Hoạt động
                              </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.chu-nha.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        })
    </script>
@endpush
