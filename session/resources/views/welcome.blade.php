<!DOCTYPE html>
<html>
<head>
    <title>Chào mừng</title>
</head>
<body>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
    @if(session('user'))
        <p>Xin chào, {{ session('user') }}!</p>
        <a href="/logout">Đăng xuất</a>
        <br>
        <a href="/regenerate">Tạo lại ID phiên</a>
    @else
        <p>Vui lòng đăng nhập để tiếp tục.</p>
        <a href="/login">Đăng nhập</a>
    @endif
</body>
</html>