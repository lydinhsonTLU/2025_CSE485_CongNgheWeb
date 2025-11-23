@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Sửa thông tin</h4>
        </div>
        <div class="card-body">
            {{-- Hiển thị lỗi validate --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" name="title" id="title"
                           class="form-control" value="{{ old('title', $book->Title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author"
                           class="form-control" value="{{ old('author', $book->Author) }}" required>
                </div>

                <div class="mb-3">
                    <label for="years" class="form-label">Years</label>
                    <input type="date" name="years" id="years"
                           class="form-control" value="{{ old('years', $book->Years) }}">
                </div>

                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
