@extends('layouts.backend')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Danh Mục</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tổng quan</a></li>
        <li class="breadcrumb-item active">Danh mục</li>
    </ol>
    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <div class="col-lg-12">
        <div class="d-flex flex-wrap align-items-center justify-content-end mb-4">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary add-list"><i class="fa-solid fa-plus"></i> Thêm danh mục</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>slug</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody class="order_position">
                @foreach ($categories as $item)
                    <tr id="{{ $item->id }}">
                        <td> {{ $item->id }} </td>
                        <td> {{ $item->title }} </td>
                        <td> {{ $item->slug }} </td>
                        <td> {!! $item->description !!} </td>
                        <td>
                            @if ($item->status == 1)
                                <span class="text text-success">Hiển thị</span>
                            @else
                                <span class="text text-danger">Không hiển thị</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('admin.category.edit', $item->id) }}" class="badge bg-success" ><i class="fa-solid fa-pen-to-square" style="height: 20px" ></i></a>


                                <form class="delete-form" action="{{ route('admin.category.destroy', $item->id) }}" method="POST">
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
