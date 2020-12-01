@extends('admin::layouts.master')

@section('title', 'Khách hàng')

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
                    <form action="{{ route('admin.khach-hang.update', [$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}" readonly>
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $data->email) }}" readonly>
                            @error('email')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh:</label>
                            <input disabled type="date" class="form-control" name="birthday" value="{{ old('birthday', $data->birthday) }}">
                            @error('birthday')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input disabled type="text" class="form-control" name="phone" value="{{ old('phone', $data->phone) }}">
                            @error('phone')
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
                                    value="{{STATUS_ACCOUNT_CUSTOMER_REGISTER}}"
                                    {{ ($data->status == STATUS_ACCOUNT_CUSTOMER_REGISTER) ? 'checked' : '' }}>
                              <label for="radioPrimary1">
                                  Không kích hoạt
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input
                                    type="radio"
                                    id="radioPrimary2"
                                    name="status"
                                    value="{{STATUS_ACCOUNT_CUSTOMER_ACTIVE}}"
                                    {{ ($data->status == STATUS_ACCOUNT_CUSTOMER_ACTIVE) ? 'checked' : ''}}>
                              <label for="radioPrimary2">
                                  Hoạt động
                              </label>
                            </div>
                          </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.khach-hang.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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

@endpush
