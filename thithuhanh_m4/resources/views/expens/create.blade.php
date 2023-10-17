<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm chi tiêu</title>
    <!-- Link CSS của Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Thêm chi tiêu</h2>
    <form action="{{ route('chitieu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Danh mục:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Số tiền:</label>
            <input type="number" name="money" class="form-control" placeholder="Nhập số tiền" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ghi chú:</label>
            <input type="text" name="decscription" class="form-control" placeholder="Nhập ghi chú">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Link JS của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
