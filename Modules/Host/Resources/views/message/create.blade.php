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
                    <form action="{{ route('host.nha-cho-thue.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="host_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện:</label>
                            <input id="img" type="file" class="form-control" name="image" onchange="changeImg(this)">
                            <img id="image" class="img-thumbnail img-fluid mt-3"  src="img/import-img.png">
                            @error('image')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Giá điện:</label>
                                <input type="number" class="form-control" name="electricity_price" value="{{ old('electricity_price') }}">
                                @error('electricity_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá nước:</label>
                                <input type="number" class="form-control" name="water_price" value="{{ old('water_price') }}">
                                @error('water_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá Internet:</label>
                                <input type="number" class="form-control" name="internet_price" value="{{ old('internet_price') }}">
                                @error('internet_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá vệ sinh:</label>
                                <input type="number" class="form-control" name="cleaning_price" value="{{ old('cleaning_price') }}">
                                @error('cleaning_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá thang máy:</label>
                                <input type="number" class="form-control" name="elevator_price" value="{{ old('elevator_price') }}">
                                @error('elevator_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá gửi xe:</label>
                                <input type="number" class="form-control" name="parking_price" value="{{ old('parking_price') }}">
                                @error('parking_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung mô tả:</label>
                            <textarea class="textarea" name="description" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ old('description') }}</textarea>
                            @error('description')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Khu vực quận:</label>
                                <select name="district_id" id="" class="form-control select2bs4">
                                    @foreach ($data['dataDistrict'] as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Địa chỉ:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @error('address')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Link google map:</label>
                                <input type="text" class="form-control" name="google_map" value="{{ old('google_map') }}">
                                @error('google_map')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Khu vực quận:</label>
                                <select name="school_id" id="" class="form-control select2bs4">
                                    @foreach ($data['dataSchool'] as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Tiện ích nhà:</label>
                                <div class="select2-purple">
                                    <select name="utility_id[]" id="" class="select2" multiple="multiple" data-placeholder="Chọn" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach ($data['dataUtility'] as $id => $district)
                                            <option value="{{ $id }}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('district_id')
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
