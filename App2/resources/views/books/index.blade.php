@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách tác phẩm</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tác giả</th>
            <th>Năm sáng tác</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->Author }}</td>
                <td>{{ $book->Years }}</td>
                <td>
                    <a href="{{ route('books.edit',$book->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Bạn chắc chắn muốn xóa không');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Danh sách không có dữ liệu!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
