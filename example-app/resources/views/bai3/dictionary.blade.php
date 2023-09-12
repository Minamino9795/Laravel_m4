<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dictionary</title>
</head>
<body>
    <h1>Dictionary</h1>
    <form action="/dictionary" method="POST">
    @csrf
    <p>
        <label>
            <input type="text" name="text" placeholder="nhập từ cần dịch">
        </label>
    </p>
    
    <p>
        <button type="submit">Dịch</button>
    </p>
    
    
    </form>
</body>
</html>