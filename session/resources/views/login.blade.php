<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            font-weight: bold;
        }

        .register-button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    
    @if (session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif
    <div class="container">
        <form method="post" action="/login">
            @csrf
            <label for="email">Tên đăng nhập:</label>
            <input type="email" name="email" id="email" placeholder="Nhập email" required>
            <br>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" placeholder="Nhập password" required>
            <br>
            <button type="submit">Đăng nhập</button>
        </form>

        <form action="{{ route('user.create') }}" method="get" class="register-button">
            @csrf
            <button type="submit" class="btn btn-danger">Đăng ký tài khoản</button>
        </form>
    </div>
</body>

</html>
