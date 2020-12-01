@extends('admin::layouts.master')

@section('title', 'Cập nhật bài viết')

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
                    <form action="{{ route('admin.bai-viet.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Tên tiêu đề:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $data->title) }}">
                            @error('title')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ old('content', $data->content) }}</textarea>
                            @error('content')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh bài viết:</label>
                            <input id="img" type="file" class="form-control" name="image" value="{{ old('image', $data->image) }}" onchange="changeImg(this)">
                            <img id="image" class="img-thumbnail img-fluid mt-3" src="{!! url('storage/'.  $data->image) !!}" alt="">
                            @error('image')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Chuyên mục</label>
                            <select name="category_id" id="" class="form-control select2bs4"  style="width: 100%;">
                                @foreach ($dataCategories as $category)
                                    <option
                                        value="{{$category->id}}"
                                        @if ($category->id == $data->category_id)
                                            selected
                                        @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="mt-3 errorMsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái bài viết:</label>
                            <br>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary1"
                                        name="status"
                                        @if ($data->status == STATUS_POST_DRAFT) checked @endif
                                        value="{{ STATUS_POST_DRAFT }}">
                                <label for="radioPrimary1">
                                    Chưa công khai
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input
                                        type="radio"
                                        id="radioPrimary2"
                                        name="status"
                                        @if ($data->status == STATUS_POST_PUBLIC) checked @endif
                                        value="{{ STATUS_POST_PUBLIC }}">
                                <label for="radioPrimary2">
                                        Công khai
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <a href="{{ route('admin.bai-viet.index') }}" class="btn btn-lg btn-default mr-3">Trở lại</a>
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
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@endpush
