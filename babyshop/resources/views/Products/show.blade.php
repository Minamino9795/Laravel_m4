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
<h2>XEM CHI TIẾT SẢN PHẨM:</h2>
    <table border="1" class="table">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Mã loại hàng</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
           
        </tr>
   
        <tbody>
         
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->product_name }}</td>
                    <td>{{ $products->category_id }}</td>
                    <td>{{ $products->price }}.000 VNĐ</td>
                    <td>{{ $products->stock_quantity }} Cái</td>
                    <td><img width="100" height="90" src="{{ asset( $products->image_url) }}" alt="Ảnh"></td>
                </tr>
        

        </tbody>
    </table>
  
</body>
</html>
<style>
    /* Định dạng cho bảng */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Khoảng cách giữa tiêu đề và bảng */
}

/* Định dạng cho tiêu đề bảng */
.table th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
}

/* Định dạng cho nội dung bảng */
.table td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
}

/* Định dạng cho hình ảnh */
.table img {
    max-width: 100px;
    max-height: 90px;
    display: block;
    margin: 0 auto; /* Canh giữa ảnh trong ô */
}

</style>