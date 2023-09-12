<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Discount Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="/calculator" method="POST">
    @csrf
    <p>
        <label>
            <input type="text" name="description" placeholder="nhập mô tả sản phẩm">
        </label>
    </p>
    <p>
        <label>
            <input type="number" name="price" placeholder="nhập giá niêm yết">
        </label>
    </p>
    <p>
        <label>
            <input type="number" name="percent" placeholder="tỷ lệ chiết khấu %">
        </label>
    </p>
    <p>
        <button type="submit">Tính chiết khấu</button>
    </p>
    
    
    </form>
</body>
</html>