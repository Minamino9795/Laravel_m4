@extends('admin.master')
@section('edit')
    <!DOCTYPE html>
    <html>

    <body>

        <h2>HTML Forms</h2>

        <form action="<?php echo route('category.update', $categories->id); ?>" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Tên loại hàng:</label><br>
            <input type="text" name="category_name" value="{{ $categories->category_name }}"><br>
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description">{{ $categories->description }}</textarea>
            <br>
            <input type="submit" value="Submit">
        </form>



    </body>

    </html>
@endsection
