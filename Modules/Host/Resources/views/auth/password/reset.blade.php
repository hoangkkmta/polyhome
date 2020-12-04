@extends('host::layouts.app')

@section('title', 'Khôi phục mật khẩu')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('customer.home') }}"><b>POLYHOME</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bạn chỉ còn một bước nữa để có được mật khẩu mới, hãy khôi phục mật khẩu của bạn ngay bây giờ.</p>

                <form action="{{ route('host.password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    @error('email')
                    <div>
                        <label class="col-form-label text-danger">
                            {{ $message }}</i>
                        </label>
                    </div>
                    @enderror
                    <div class="input-group mb-3" style="display: none">
                        <input type="email" class="form-control" placeholder="Email" value="{{ $email ?? old('email') }}" name="email" autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <div>
                        <label class="col-form-label text-danger">
                            {{ $message }}</i>
                        </label>
                    </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('host.formLogin') }}">Đăng nhập</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
