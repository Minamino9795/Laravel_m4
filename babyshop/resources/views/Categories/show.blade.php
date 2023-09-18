<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
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
