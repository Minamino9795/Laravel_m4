<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Edit category</h2>

    <form action="<?php echo route('category.update', $categories->id); ?>" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Tên loại hàng:</label><br>
        <input type="text" name="name" value="{{ $categories->name }}"><br>
        
        <input type="submit" onclick=" return confirm('Are you sure you want to make changes?')" value="Submit">
    </form>
</body>
</html>