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
        <label>Tên loại hàng:</label><br>
        <input type="text" name="category_name" placeholder="Nhập tên loại hàng"><br>
        <label>Mô Tả:</label><br>
        <input type="text" name="description" placeholder="Nhập mô tả"><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>
