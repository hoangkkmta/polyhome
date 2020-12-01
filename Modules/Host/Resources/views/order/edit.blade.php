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
                              <i class="fas fa-globe"></i> AdminLTE, Inc.
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
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
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
