<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('category.index') }}" method="GET">
        <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit">Tìm Kiếm</button>

    </form><br>
    <a href="{{ route('category.create') }}" class="btn btn-success">Thêm loại hàng</a>
    <table border="1" class="table">
        <tr>
            <th>Mã loại hàng</th>
            <th>Tên loại hàng</th>
            <th>Mô tả</th>
            <th>Tùy chọn</th>
        </tr>
        <!-- Bắt đầu lặp -->
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('category.show', $category->id) }}">
                                <button class="btn btn-success">Xem</button></a>|
                            <a href="{{ route('category.edit', $category->id) }}">
                                <button class="btn btn-primary">Sửa</button></a>|
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $categories->links('pagination::bootstrap-4') }}
</body>

</html>
