<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table" border="1">
<tr>
    <th>Mô tả sản phẩm</th>
    <th>Giá niêm yết</th>
    <th>giá chiết khấu</th>
    <th>Chiết khấu</th>
</tr>
<tr>
    <td>{{ $description }}</td>
    <td>{{ $price }}</td>
    <td>{{ $percent }}</td>
    <td>{{ $amount }}</td>
</tr>
</table>
</body>
</html>



