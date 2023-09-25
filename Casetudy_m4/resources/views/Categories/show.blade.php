<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      
    
</head>

<body>
    <table  class="table table-striped" id="dataTable"  border="1">
        <tr>
            <th>Mã loại hàng</th>
            <th>Tên loại hàng</th>  
        </tr>
        <tbody>
            <tr>
                <td class="table-primary">{{ $categories->id }}</td>
                <td class="table-primary">{{ $categories->name }}</td>
            </tr>
            
        </tbody>
    </table>
</body>

</html>