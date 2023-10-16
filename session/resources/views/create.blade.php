<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="mb-3">
    
            <label>name:</label>
            <input type="text" name="name" class="form-control" title="vui lòng điền vào trường này" placeholder="Name">
            @error('name')
            <div style="color: red">{{ $message }}</div>
        @enderror
        </div>
    
            @csrf
        <div class="mb-3">
            <label>email:</label>
            <input type="email" name="email" class="form-control" title="vui lòng điền vào trường này" placeholder="Email">
            @error('email')
            <div style="color: red">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label>password:</label>
            <input type="password" name="password" class="form-control" title="vui lòng điền vào trường này" placeholder="Password">
        </div>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
