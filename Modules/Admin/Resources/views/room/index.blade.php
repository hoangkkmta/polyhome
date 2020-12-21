@extends('admin::layouts.master')

@section('title', 'Quản lý phòng cho thuê')

    @push('css')
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @endpush

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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên phòng</th>
                                        <th>Nhà</th>
                                        <th>Trạng thái</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        @if (!empty($row->building))
                                            <tr>
                                                <td>
                                                    {{ $row->id }}
                                                </td>
                                                <td>
                                                    {{ $row->name }}
                                                </td>
                                                <td>
                                                    {{ $row->building->name }}
                                                </td>
                                                <td>
                                                    @if ($row->status == 2)
                                                        <b class="text-warning">Còn phòng</b>
                                                    @elseif($row->status == 1)
                                                        <b class="text-success">Đã cho thuê</b><br>
                                                        <b class="text-success">Thời gian thuê từ {{ $row->date_start }} đến {{ $row->date_end }}</b>
                                                    @else
                                                    <b class="text-danger">Hết phòng</b>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.phong-cho-thue.show', [$row->id]) }}" class="btn btn-app">
                                                            <i class="fas fa-edit "></i> Cập nhật
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.phong-cho-thue.destroy', [$row->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-app text-danger" onclick="return destroy()">
                                                                <i class="far fa-trash-alt"></i> Xóa
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')

@endpush
