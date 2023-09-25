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
            <input type="text" name="name" class="form-control" placeholder="Nhập tên loại hàng">
        </div>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
