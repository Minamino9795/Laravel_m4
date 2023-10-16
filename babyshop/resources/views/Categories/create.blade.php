@extends('admin.master')
@section('create')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>thêm loại hàng</title>
    </head>

    <body>
        <h2>Thêm mới loại hàng</h2>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tên loại hàng:</label>
                <input type="text" name="category_name" class="form-control" placeholder="Nhập tên loại hàng">
                @error('category_name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>

            <label>Mô Tả:</label><br>
            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Nhập mô tả"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </body>

    </html>
    <style>



    </style>
@endsection
