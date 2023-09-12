<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <form action="/login" method="POST">
    @csrf
    <p>
        <label>
            <input type="text" name="username" placeholder="tên đăng nhập">
        </label>
    </p>
    <p>
        <label>
            <input type="password" name="password" placeholder="mật khẩu">
        </label>
    </p>
    <p>
        <button type="submit">Đăng nhập</button>
    </p>
    
    
    </form>
</body>
</html>