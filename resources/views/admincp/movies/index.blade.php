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
                    <th>Mã phim</th>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>Tập phim</th>
                    <th>Tên tiếng anh</th>
                    <th>Thời lượng phim</th>
                    <th>Số tập</th>
                    <th>Slug</th>
                    <th>Thuộc phim</th>
                    {{-- <th>Mô tả</th> --}}
                    <th>Thể loại</th>
                    <th>Danh mục</th>
                    <th>Quốc gia</th>
                    <th>Tag</th>
                    <th>Hot</th>
                    <th>Phụ đề</th>
                    <th>Định dạng</th>
                    <th>Trạng thái</th>
                    <th>Top view</th>
                    <th>Năm sản xuất</th>
                    <th>Season</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
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
                        <td>
                            <a href="{{ route('admin.add_episode', $item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                        <td> {{ $item->title_english }} </td>
                        <td> {{ $item->time }} </td>
                        <td> {{ $item->episodes_count }}/{{ $item->episode }} tập </td>
                        <td> {{ $item->slug }} </td>
                        <td>
                            @if ($item->belong_category == 'phimbo')
                                Phim bộ
                            @elseif ($item->belong_category == 'phimle')
                                Phim lẻ
                            @endif
                        </td>
                        {{-- <td> {!! $item->description !!} </td> --}}
                        <td>
                            @foreach ($item->movie_genre as $genre)
                                <span class="badge bg-info text-dark">{{ $genre->title }}</span>
                            @endforeach
                        </td>
                        <td> {{ $item->category->title }} </td>
                        <td> {{ $item->country->title }} </td>
                        <td> {{ $item->tag }} </td>
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
                            @elseif ($item->resolution == 5)
                                <span class="text text-success">FullHD</span>
                            @else
                                <span class="text text-success">Trailer</span>
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
                            <select class="select-topview" name="topview" id="{{$item->id}}">
                                <option value="0">--Top view--</option>
                                <option value="1" {{ $item->topview == 1 ? 'selected':'' }}>Ngày</option>
                                <option value="2" {{ $item->topview == 2 ? 'selected':'' }}>Tuần</option>
                                <option value="3" {{ $item->topview == 3 ? 'selected':'' }}>Tháng</option>
                            </select>
                        </td>
                        <td>
                            <select name="year" id="{{$item->id}}" class="select-year">
                                @for ($year = 2000; $year <= 2023; $year++)
                                    <option value="{{ $year }}" {{ $item->year == $year ? 'selected':'' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </td>
                        <td>
                            <select name="season" id="{{$item->id}}" class="select-season">
                                @for ($season = 0; $season <= 20; $season++)
                                    <option value="{{ $season }}" {{ $item->season == $season ? 'selected':'' }}>{{ $season }}</option>
                                @endfor
                            </select>
                        </td>
                        <td> {{ $item->created_at }} </td>
                        <td> {{ $item->updated_at }} </td>
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
