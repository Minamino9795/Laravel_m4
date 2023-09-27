@extends('admin.master')
@section('category_edit')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>EDIT CATEGORY</h2>

    <form action="<?php echo route('category.update', $categories->id); ?>" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Category name:</label><br>
            <input type="text" name="name" placeholder="Enter category name" value="{{ $categories->name }}"><br>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" onclick=" return confirm('Are you sure you want to make changes?')" value="Submit">
    </form>
</body>

</html>

@endsection
