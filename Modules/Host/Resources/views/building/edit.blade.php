@extends('host::layouts.master')

@section('title', 'Quản lý khu vực quận')

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
                    <form action="{{ route('host.nha-cho-thue.update', [ $data->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="host_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label>Tên số nhà:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
                            @error('name')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá phòng:</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price', $data->price) }}">
                            @error('price')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Ảnh đại diện:</label>
                                <input id="img" type="file" class="form-control" name="image[]" onchange="changeImg(this)" value="{{ old('image') }}">
                                <img id="image" class="img-thumbnail img-fluid mt-3" src="{!! url('building/'.  $image[0]) !!}">
                                @error('image')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh đại diện:</label>
                                <input id="img-2" type="file" class="form-control" name="image[]" onchange="changeImg2(this)" value="{{ old('image') }}">
                                <img id="image-2" class="img-thumbnail img-fluid mt-3" src="{!! url('building/'.  $image[1]) !!}">
                                @error('image')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh đại diện:</label>
                                <input id="img-3" type="file" class="form-control" name="image[]" onchange="changeImg3(this)" value="{{ old('image') }}">
                                <img id="image-3" class="img-thumbnail img-fluid mt-3" src="{!! url('building/'.  $image[3]) !!}">
                                @error('image')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh đại diện:</label>
                                <input id="img-4" type="file" class="form-control" name="image[]" onchange="changeImg4(this)" value="{{ old('image') }}">
                                <img id="image-4" class="img-thumbnail img-fluid mt-3" src="{!! url('building/'.  $image[3]) !!}">
                                @error('image')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá điện:</label>
                                <input type="number" class="form-control" name="electricity_price" value="{{ old('electricity_price', $data->electricity_price) }}">
                                @error('electricity_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá nước:</label>
                                <input type="number" class="form-control" name="water_price" value="{{ old('water_price', $data->water_price) }}">
                                @error('water_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá Internet:</label>
                                <input type="number" class="form-control" name="internet_price" value="{{ old('internet_price', $data->internet_price) }}">
                                @error('internet_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá vệ sinh:</label>
                                <input type="number" class="form-control" name="cleaning_price" value="{{ old('cleaning_price', $data->cleaning_price) }}">
                                @error('cleaning_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá thang máy:</label>
                                <input type="number" class="form-control" name="elevator_price" value="{{ old('elevator_price', $data->elevator_price) }}">
                                @error('elevator_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá gửi xe:</label>
                                <input type="number" class="form-control" name="parking_price" value="{{ old('parking_price', $data->parking_price) }}">
                                @error('parking_price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung mô tả:</label>
                            <textarea class="textarea" name="description" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ old('description', $data->description) }}</textarea>
                            @error('description')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Khu vực quận:</label>
                                <select name="district_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['district'] as $district)
                                        <option
                                            value="{{$district->id}}"
                                            @if ($district->id == $data->district_id)
                                                selected
                                            @endif>
                                            {{$district->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Địa chỉ:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address', $data->address) }}">
                                @error('address')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Link google map:</label>
                                <input type="text" class="form-control" name="google_map" value="{{ old('google_map', $data->google_map) }}">
                                @error('google_map')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Khu vực trường học:</label>
                                <select name="school_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['school'] as $school)
                                        <option
                                            value="{{$school->id}}"
                                            @if ($school->id == $data->school_id)
                                                selected
                                            @endif>
                                            {{$school->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('school_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Tiện ích:</label>
                                <div class="select2-purple">
                                    <select name="utility_id[]" id="" class="select2" multiple="multiple" data-placeholder="Chọn" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach ($dataRelation['utility'] as $id => $utility)
                                        <option
                                            value="{{$utility->id}}"
                                            @if ($utility->id == $data->utility_id)
                                                selected
                                            @endif>
                                            {{$utility->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('utility_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('host.nha-cho-thue.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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
