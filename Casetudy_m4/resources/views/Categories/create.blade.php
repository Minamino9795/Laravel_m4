
@extends('admin.master')
@section('Category_create')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new</title>
</head>

<body>
    <h2>ADD NEW CATEGORIE TYPES</h2>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Category name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter category name">
            @error('name')
            <div style="color: red">{{ $message }}</div>
        @enderror
        </div>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<style>
    
</style>
@endsection
