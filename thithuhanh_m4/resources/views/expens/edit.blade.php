<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container">

    <h2 class="mt-5">CẬP NHẬT THÔNG TIN</h2>

    <form action="<?php echo route('chitieu.update', $expens->id); ?>" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Danh mục:</label>
            <input type="text" class="form-control" name="name" value="{{ $expens->DANHMUCCHITIEU }}" required>
        </div>
        <div class="form-group">
            <label for="name">Ngày:</label>
            <input type="date" class="form-control" name="date" value="{{ $expens->NGAYCHITIEU }}" required>
        </div>
        <div class="form-group">
            <label for="name">Số tiền:</label>
            <input type="number" class="form-control" name="money" value="{{ $expens->SOTIEN }}" required>
        </div>
        <div class="form-group">
            <label for="description">Ghi chú:</label>
            <textarea class="form-control" name="description" id="description">{{ $expens->GHICHU }}</textarea>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary" name="action" value="save">Lưu</button>
            <a href="{{ route('chitieu.index') }}" class="btn btn-secondary">Hủy</a>
        </div>
    </form>

</body>

</html>
