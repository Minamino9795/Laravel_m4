

@extends('admin.master')
@section('show')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table" id="dataTable" width="100%" cellspacing="0" border="1">
        <tr>
            <th>Mã loại hàng</th>
            <th>Tên loại hàng</th>
            <th>Mô tả</th>
        </tr>
        <tbody>
            <tr>
                <td>{{ $categories->id }}</td>
                <td>{{ $categories->category_name }}</td>
                <td>{{ $categories->description }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
<style>
   /* Thiết lập kiểu cho bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Khoảng cách giữa tiêu đề và bảng */
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

/* Thiết lập kiểu cho tiêu đề cột */
th {
    background-color: #007bff;
    color: #151414;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
}

/* Thiết lập kiểu cho nội dung trong bảng */
td {
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
}

/* Định dạng cho hàng chẵn và hàng lẻ */
tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Định dạng cho cột "Mô tả" */
td:nth-child(3) {
    max-width: 200px; /* Giới hạn chiều rộng tối đa của cột "Mô tả" */
    white-space: normal; /* Cho phép ngắt dòng trong cột "Mô tả" */
    word-wrap: break-word; /* Ngắt dòng khi cần thiết */
}

</style>
@endsection



