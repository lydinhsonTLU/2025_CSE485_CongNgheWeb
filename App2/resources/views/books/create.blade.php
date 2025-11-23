@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm khách hàng mới</h4>
        </div>
        <div class="card-body">
            {{-- Hiển thị lỗi validate --}}
            {{--            @if ($errors->any())--}}
            {{--                <div class="alert alert-danger">--}}
            {{--                    <ul>--}}
            {{--                        @foreach ($errors->all() as $error)--}}
            {{--                            <li>{{ $error }}</li>--}}
            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title"
                           class="form-control" value="{{ old('title') }}" >

                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="author" name="author" id="author"
                           class="form-control" value="{{ old('author') }}" >
                    @error('author')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="years" class="form-label">Year</label>
                    <input type="text" name="year" id="years"
                           class="form-control" value="{{ old('years') }}">

                    @error('years')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
