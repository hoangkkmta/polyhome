@extends('host::layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>thuephongtro</b>.VN</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @error('expired')
                    <p class="login-box-msg text-danger">Tài khoản không được kích hoạt, vui lòng liên hệ quản trị viên</p>
                @enderror


                <form action="{{ route('host.login') }}" method="POST">
                    @csrf
                    @error('email')
                    <div>
                        <label class="col-form-label text-danger">
                            {{ $message }}</i>
                        </label>
                    </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
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
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                        @error('login')
                        <div class="mt-3">
                            <div class="col-12 m-auto text-danger">
                                Sai tài khoản hoặc mật khẩu
                            </div>
                        </div>
                        @enderror
                    </div>
                </form>
                <hr>
                <p class="mb-1 text-center">
                    <a href="{{ route('host.password.reset.showForm') }}">Quên mật khẩu</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
