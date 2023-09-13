<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Zone</title>
</head>
<body>
    <h1>ứng dụng hiển thị thời gian</h1>
    <form action="/time" method="post">
        @csrf
    <select name="location" id="" onchange="form.submit();">
        <option>Chọn thành phố</option>
            <option value="America/Chihuahua">Chihuahua, Mexico</option>
            <option value="America/Costa_Rica">Costa Rica</option>
            <option value="America/Havana">La Habana, Cuba</option>
            <option value="Asia/Hong_Kong">Hồng Kông</option>
            <option value="Asia/Ho_Chi_Minh">Hồ Chí Minh, Việt Nam</option>
            <option value="Japan">nhật bản</option>
    </select>
    </form>
</body>
</html>