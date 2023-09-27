@extends('admin.master')
@section('create')
    <h2>ADD NEW PRODUCT TYPES:</h2>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            Name: <br>
            <input type="text" name="name"> <br>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            Slug: <br>
            <input type="text" name="slug"> <br>
            @error('slug')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            Price:<br>
            <input type="number" name="price"><br>
            @error('price')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            Decscription: <br>
            <textarea class="form-control" rows="4" name="decscription" id="decscription" placeholder="Enter description"></textarea><br>
            @error('decscription')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            Quantity:<br>
            <input type="number" name="quantity"><br>
            @error('quantity')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            Status:<br>
            <select name="status" class="form-control">

                <option value="0">In stock</option>
                <option value="1">Out stock</option>
            </select><br>

        </div>
        <div>
            Category:<br>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
        </div>
        <div>
            Image:<br>
            <input type="file" name="image"> <br>
            <span class="file-name-display"></span>
            <br>
            @error('image')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Add">
    </form>
    <style>
        /* Định dạng phần nội dung */
form {
    max-width: 90%; /* Điều chỉnh chiều rộng tối đa của biểu mẫu */
    margin: 0 auto; /* Canh giữa biểu mẫu */
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    border-radius: 5px;
}

/* Định dạng tiêu đề */
h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Định dạng các trường nhập liệu */
input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

/* Định dạng nút gửi */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Định dạng thông báo lỗi */
div.error-message {
    color: red;
    font-size: 14px;
}

/* Định dạng tên file đính kèm */
span.file-name-display {
    font-size: 14px;
    color: #333;
    margin-top: 5px;
}

/* Định dạng các option của select */
select option {
    font-size: 16px;
}

/* Định dạng dropdown select */
select.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

/* Định dạng các thông báo thành công */
div.success-message {
    color: green;
    font-size: 14px;
}

    </style>
@endsection
