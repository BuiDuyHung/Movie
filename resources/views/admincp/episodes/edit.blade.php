@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Cập Nhật Tập Phim</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.episode.index') }}">Tập phim</a></li>
        <li class="breadcrumb-item active">Cập nhật tập phim</li>
    </ol>

    <form action="{{ route('admin.episode.update', $episode->id) }}" method="POST">
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Phim :</label>
                        <select class="form-select {{$errors->has('movie_id')?'is-invalid':''}} select-movie" name="movie_id" aria-label="Default select example">
                            <option value="0" selected>--chọn phim---</option>
                            @foreach ($movies as $item)
                                <option value="{{$item->id}}" {{old('movie_id')==$item->id || $episode->movie_id==$item->id ? 'selected':false}}> {{$item->title}} </option>
                            @endforeach
                        </select>

                        @error('movie_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Tập phim:</label>
                        <select id="show_movie" class="form-select" name="episode" aria-label="Default select example" readonly>
                            <option value="{{ $episode->episode }}" selected>{{ $episode->episode }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Link phim :</label>
                        <input type="text" name="link" class="form-control {{$errors->has('link')?'is-invalid':''}}" value="{{old('link') ?? $episode->link}}">
                        @error('link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('admin.episode.index')}}" class="btn btn-danger">Hủy</a>
        </div>
        @csrf
    </form>
</div>

@endsection
