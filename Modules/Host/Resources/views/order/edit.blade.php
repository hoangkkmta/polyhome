@extends('host::layouts.master')

@section('title', 'Quản lý phòng cho thuê')

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
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                          <div class="col-12">
                            <h4>
                              <i class="fas fa-globe"></i> POLYHOME
                              <small class="float-right">Date: 2/10/2014</small>
                            </h4>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info mb-3">
                            <div class="col-sm-8 invoice-col">
                                <div>
                                    <strong>Khách hàng đặt lịch xem phòng:</strong><br>
                                    <b>Tên:</b> {{ $data->customer_name }}<br>
                                    <b>Số điện thoại:</b> {{ $data->customer_phone_number }}<br>
                                    <b>Email:</b> {{ $data->customer_email }}<br>
                                    <b>Ngày xem phòng:</b> {{ $data->date_view_room }}<br>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Mã đặt lịch #{{ $data->id }}</b><br>
                                <br>
                                <b>Mã đặt lịch:</b> {{ $data->id }}<br>
                                <b>Ngày đặt lịch:</b> {{ $data->created_at }}<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                          <!-- /.col -->
                            <div class="col-12">
                                <p class="lead">Chi tiết thông tin khách hàng đặt lịch</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tên khách hàng:</th>
                                            <td>{{ $data->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại:</th>
                                            <td>{{ $data->customer_phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $data->customer_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ngày đặt lịch:</th>
                                            <td>{{ $data->date_view_room }}</td>
                                        </tr>
                                        <tr>
                                            <th>Giá phòng:</th>
                                            <td>{{ number_format($data->total_price) }}<span class=""> <b> ₫</b>/tháng</span></td>
                                        </tr>
                                        <tr>
                                            <th>Ghi chú:</th>
                                            <td>{{ $data->note }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nhà:</th>
                                            <td>{{ $data->building->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phòng:</th>
                                            <td>{{ $data->room->name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <!-- this row will not appear when printing -->
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('host.dat-lich-xem-phong.update', [$data->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="room_id" value="{{ $data->room_id }}">
                                    <div class="form-group col-6">
                                        <label>Phòng cho thuê:</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $data->room->name ) }}" disabled>
                                        @error('name')
                                        <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Trạng thái cho thuê:</label>
                                        <br>
                                        <div class="icheck-primary d-inline">
                                            <input
                                                  type="radio"
                                                  id="radioPrimary3"
                                                  name="status"
                                                  value="3"
                                                  {{ ($data->room->status == 3) ? 'checked' : '' }}>
                                            <label for="radioPrimary3">
                                                Không cho thuê
                                            </label>
                                          </div>
                                        <div class="icheck-primary d-inline">
                                          <input
                                                type="radio"
                                                id="radioPrimary2"
                                                name="status"
                                                value="2"
                                                {{ ($data->room->status == 2) ? 'checked' : '' }}>
                                          <label for="radioPrimary2">
                                              Chờ cho thuê
                                          </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                          <input
                                                type="radio"
                                                id="radioPrimary1"
                                                name="status"
                                                value="1"
                                                {{ ($data->room->status == 1) ? 'checked' : ''}}>
                                          <label for="radioPrimary1">
                                              Cho thuê
                                          </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <a href="{{ route('host.dat-lich-xem-phong.index') }}" class="btn btn-default mr-3">Trở lại</a>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
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
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
