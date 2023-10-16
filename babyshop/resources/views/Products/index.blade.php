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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
        @if (session('successMessage'))
        <script>
            Swal.fire({
                title: "<h6>{{ session('successMessage') }}</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
        </script>
    @elseif(session('successMessage1'))
        <script>
            Swal.fire({
                title: "<h6>{{ session('successMessage1') }}</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
        </script>
    @elseif(session('successMessage2'))
        <script>
            Swal.fire({
                title: "<h6>{{ session('successMessage2') }}</h6>",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                width: "300px"
            });
        </script>
    @endif

    <form action="{{ route('product.index') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit">Tìm Kiếm</button>

    </form><br>
    <a href="{{ route('product.create') }}" class="btn btn-success">+ Thêm</a>


    <table border="1" class="table">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Mã loại hàng</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
            <th>Tùy chọn</th>
        </tr>
        <!-- Bắt đầu lặp -->
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->price }}.000 VNĐ</td>
                    <td>{{ $product->stock_quantity }} Cái</td>
                    <td><img width="100" height="90" src="{{ asset($product->image_url) }}" alt="Ảnh"></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('product.show', $product->id) }}">
                                <button class="btn btn-success">Xem</button></a>|
                            <a href="{{ route('product.edit', $product->id) }}">
                                <button class="btn btn-primary">Sửa</button></a>|
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a onclick=" return confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?'); "
                                    href="{{ route('product.destroy', $product->id) }}">
                                    <button class="btn btn-danger">xóa</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
</body>

</html>
