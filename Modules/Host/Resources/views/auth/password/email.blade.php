@extends('host::layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('customer.home') }}"><b>POLYHOME</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bạn quên mật khẩu của mình? Tại đây bạn có thể dễ dàng lấy lại mật khẩu mới.</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('host.send.link.email') }}" method="POST">
                    @csrf
                    @error('email')
                    <div>
                        <label class="col-form-label text-danger">
                            {{ $message }}</i>
                        </label>
                    </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Lấy lại mật khẩu</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1 text-center">
                    <a href="{{ route('host.formLogin') }}">Đăng nhập</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
