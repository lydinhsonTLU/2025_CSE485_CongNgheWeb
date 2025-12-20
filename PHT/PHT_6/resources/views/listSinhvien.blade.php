
@extends('layouts.app')
@section('content')
    <h2>Danh sach SV</h2>
{{--    <p>{{ $page_description }}</p>--}}
{{--    <h3>Danh sách công việc (Lấy từ Controller):</h3>--}}
    <ul>
        @foreach($danhsachSV as $sv)
            <li>{{ $sv->ten_sinh_vien  }} - {{$sv -> email}}</li>
        @endforeach
    </ul>
@endsection
