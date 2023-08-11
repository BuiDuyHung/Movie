@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Cập nhật Danh Mục</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>
        <li class="breadcrumb-item active">Cập nhật danh mục</li>
    </ol>

    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Tên :</label>
                        <input type="text" name="title" class="form-control {{$errors->has('title')?'is-invalid':''}}" value="{{old('title') ?? $category->title}}">
                        @error('title')
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
                            <option value="1" {{old('status')==1 || $category->status==1 ? 'selected':false}}>Hiển thị</option>
                            <option value="2" {{old('status')==2 || $category->status==0 ? 'selected':false}}>Không hiển thị</option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="">Mô tả :</label>
                        <textarea name="description" class="form-control ckeditor {{$errors->has('description')?'is-invalid':''}}" >{{old('description') ?? $category->description}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('admin.category.index')}}" class="btn btn-danger">Hủy</a>
        </div>
    </form>
</div>
@endsection
