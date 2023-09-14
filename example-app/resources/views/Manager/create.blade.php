<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>

<body>
    <h1>Thêm mới nhiệm vụ</h1>
    <form action="{{ route('user') }}" method="post">
        @csrf
        <p>
            Nhập Stt:<br>
            <label>
                <input type="number" name="stt" placeholder="nhập stt">
            </label>
        </p>
        <p>
            Nhập title:<br>
            <label>
                <input type="number" name="title" placeholder="nhập title">
            </label>
        </p>
        <p>
            Ngày bắt đầu:<br>
            <label>
                <input type="date" name="startdate" placeholder="">
            </label>
        </p>
        <p>
            Ngày kết thúc:<br>
            <label>
                <input type="date" name="enddate" placeholder="">
            </label>
        </p>
        <p>
            <input type="submit" value="Add">
        </p>
    </form>
</body>

</html>
