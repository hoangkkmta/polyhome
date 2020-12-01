@extends('admin::layouts.master')

@section('title', 'Tài khoản')

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
                    <form action="{{ route('admin.tai-khoan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
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
                            <label>Vai trò:</label>
                            <div class="select2-purple">
                              <select name="roles[]" id="roles" class="select2" multiple="multiple" data-placeholder="Chọn" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                              </select>
                              @error('roles')
                              <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <br>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary1"
                                        name="status"
                                        value="{{ STATUS_ACCOUNT_ADMIN_NOT_ACTIVE }}">
                                <label for="radioPrimary1">
                                    Chưa kích hoạt
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary2"
                                        name="status"
                                        value="{{ STATUS_ACCOUNT_ADMIN_ACTIVE }}">
                                <label for="radioPrimary2">
                                        Kích hoạt
                                </label>
                            </div>
                            <div class="d-block">
                                @error('status')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.tai-khoan.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
                            <button type="submit" class="btn btn-lg btn-primary">Thêm mới</button>
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
