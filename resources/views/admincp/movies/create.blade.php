@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Thêm Phim</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Phim</a></li>
        <li class="breadcrumb-item active">Thêm phim</li>
    </ol>

    <form action="{{ route('admin.movie.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Tên :</label>
                        <input type="text" name="title" class="form-control title {{$errors->has('title')?'is-invalid':''}}" value="{{old('title')}}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Slug :</label>
                        <input type="text" name="slug" class="form-control slug {{$errors->has('slug')?'is-invalid':''}}" value="{{old('slug')}}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Thể loại :</label>
                        <select class="form-select {{$errors->has('genre_id')?'is-invalid':''}}" name="genre_id" aria-label="Default select example">
                            <option value="0" selected>--chọn thể loại---</option>
                            @foreach ($genres as $item)
                                <option value=" {{ $item->id }} "> {{ $item->title }} </option>
                            @endforeach
                        </select>

                        @error('genre_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Danh mục :</label>
                        <select class="form-select {{$errors->has('category_id')?'is-invalid':''}}" name="category_id" aria-label="Default select example">
                            <option value="0" selected>--chọn danh mục---</option>
                            @foreach ($categories as $item)
                                <option value=" {{ $item->id }} "> {{ $item->title }} </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Quốc gia :</label>
                        <select class="form-select {{$errors->has('country_id')?'is-invalid':''}}" name="country_id" aria-label="Default select example">
                            <option value="0" selected>--chọn quốc gia---</option>
                            @foreach ($countries as $item)
                                <option value=" {{ $item->id }} "> {{ $item->title }} </option>
                            @endforeach
                        </select>

                        @error('country_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Trạng thái :</label>
                        <select class="form-select {{$errors->has('status')?'is-invalid':''}}" name="status" aria-label="Default select example">
                            <option value="0" selected>--chọn trạng thái---</option>
                            <option value="1" {{old('status')==1 ? 'selected':false}}>Hiển thị</option>
                            <option value="2" {{old('status')==2 ? 'selected':false}}>Không hiển thị</option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Hình ảnh :</label>
                        <input type="file" name="image" class="form-control {{$errors->has('image')?'is-invalid':''}}" value="{{old('image')}}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="">Mô tả :</label>
                        <textarea name="description" class="form-control ckeditor {{$errors->has('description')?'is-invalid':''}}" >{{old('description')}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>



            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('admin.movie.index')}}" class="btn btn-danger">Hủy</a>
        </div>

        @csrf
    </form>
</div>
@endsection
