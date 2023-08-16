@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Phim</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item active">Phim</li>
    </ol>
    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <div class="col-lg-12">
        <div class="d-flex flex-wrap align-items-center justify-content-end mb-4">
            <a href="{{ route('admin.movie.create') }}" class="btn btn-primary add-list"><i class="fa-solid fa-plus"></i> Thêm phim</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="dataTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>Tên tiếng anh</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Thể loại</th>
                    <th>Danh mục</th>
                    <th>Quốc gia</th>
                    <th>Hot</th>
                    <th>Phụ đề</th>
                    <th>Định dạng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($movies as $item)
                    <tr>
                        <td> {{ $item->id }} </td>
                        <td>
                            <img src="{{$item->image}}" width="100px" alt="{{$item->slug}}">
                        </td>
                        <td> {{ $item->title }} </td>
                        <td> {{ $item->title_english }} </td>
                        <td> {{ $item->slug }} </td>
                        <td> {!! $item->description !!} </td>
                        <td> {{ $item->genre->title }} </td>
                        <td> {{ $item->category->title }} </td>
                        <td> {{ $item->country->title }} </td>
                        <td>
                            @if ($item->hot == 1)
                                <span class="text text-success">Có</span>
                            @else
                                <span class="text text-danger">Không</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->sub == 1)
                                <span class="text text-success">Việt sub</span>
                            @else
                                <span class="text text-danger">Thuyết minh</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->resolution == 1)
                                <span class="text text-success">HD</span>
                            @elseif ($item->resolution == 2)
                                <span class="text text-success">SD</span>
                            @elseif ($item->resolution == 3)
                                <span class="text text-success">HDCam</span>
                            @elseif ($item->resolution == 4)
                                <span class="text text-success">Cam</span>
                            @else
                                <span class="text text-success">FullHD</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 1)
                                <span class="text text-success">Hiển thị</span>
                            @else
                                <span class="text text-danger">Không hiển thị</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('admin.movie.edit', $item->id) }}" class="badge bg-success" ><i class="fa-solid fa-pen-to-square" style="height: 20px" ></i></a>


                                <form class="delete-form" action="{{ route('admin.movie.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
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