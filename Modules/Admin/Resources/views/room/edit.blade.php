@extends('admin::layouts.master')

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
                    <form action="{{ route('admin.phong-cho-thue.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="host_id" value="{{ $data->host_id }}">
                            <div class="form-group col-md-12">
                                <label>Tên:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">
                                @error('name')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Chọn nhà:</label>
                                <select name="building_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['building'] as $building)
                                        <option
                                            value="{{$building->id}}"
                                            @if ($building->id == $data->building_id)
                                                selected
                                            @endif>
                                            {{$building->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá phòng:</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price', $data->price) }}">
                                @error('price')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Loại phòng:</label>
                                <select name="room_category_id" id="" class="form-control select2bs4">
                                    @foreach ($dataRelation['room_category'] as $room_category)
                                        <option
                                            value="{{$room_category->id}}"
                                            @if ($room_category->id == $data->room_category_id)
                                                selected
                                            @endif>
                                            {{$room_category->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_category_id')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tiện ích phòng:</label>
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
                            <div class="form-group col-md-6">
                                <label>Diện tích (m2):</label>
                                <input type="text" class="form-control" name="acreage" value="{{ old('acreage', $data->acreage) }}">
                                @error('acreage')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số người ở tối đa (m2):</label>
                                <input type="text" class="form-control" name="max_people" value="{{ old('max_people', $data->max_people) }}">
                                @error('max_people')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tầng</label>
                                <input type="text" class="form-control" name="floors" value="{{ old('floors', $data->floors) }}">
                                @error('floors')
                                <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.phong-cho-thue.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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
