@extends('host::layouts.master')

@section('title', 'Quản lý nhà cho thuê')

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
                    <form action="{{ route('host.phong-cho-thue.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="host_id" value="{{ Auth::user()->id }}">
                            <div class="form-group col-md-12">
                                <label>Tên:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Chọn nhà:</label>
                                <select name="building_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['building'] as $building)
                                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                                    @endforeach
                                </select>
                                @error('building_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá phòng:</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                @error('price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Chọn loại phòng:</label>
                                <select name="room_category_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['room_category'] as $room_category)
                                        <option value="{{ $room_category->id }}">{{ $room_category->name }}</option>
                                    @endforeach
                                </select>
                                @error('room_category_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tiện ích trong phòng:</label>
                                <div class="select2-purple">
                                    <select name="utility_id[]" id="" class="select2" multiple="multiple" data-placeholder="Chọn" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach ($dataRelation['utility'] as $id => $district)
                                            <option value="{{ $id }}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('utility_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Diện tích (m2):</label>
                                <input type="text" class="form-control" name="acreage" value="{{ old('acreage') }}">
                                @error('acreage')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số người ở tối đa (m2):</label>
                                <input type="text" class="form-control" name="max_people" value="{{ old('max_people') }}">
                                @error('max_people')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tầng</label>
                                <input type="text" class="form-control" name="floors" value="{{ old('floors') }}">
                                @error('floors')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('host.nha-cho-thue.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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
