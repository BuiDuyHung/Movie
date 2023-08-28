@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tập Phim</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item active">Danh sách tập phim</li>
    </ol>
    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <div class="col-lg-12">
        <div class="d-flex flex-wrap align-items-center justify-content-end mb-4">
            <a href="{{ route('admin.episode.create') }}" class="btn btn-primary add-list"><i class="fa-solid fa-plus"></i> Thêm tập phim</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="dataTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên phim</th>
                    <th>Tập phim</th>
                    <th>Link</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($episodes as $item)
                    <tr>
                        <td> {{ $item->id }} </td>
                        <td>
                            <img src="{{$item->movie->image}}" width="100px" alt="{{$item->movie->slug}}">
                        </td>
                        <td> {{ $item->movie->title }} </td>
                        <td> {{ $item->episode }} </td>
                        <td>
                            {{ $item->link }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('admin.episode.edit', $item->id) }}" class="badge bg-success" ><i class="fa-solid fa-pen-to-square" style="height: 20px" ></i></a>


                                <form class="delete-form" action="{{ route('admin.episode.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn badge bg-danger ms-3 delete-action"><i class="fa-solid fa-trash" style="height: 20px"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
