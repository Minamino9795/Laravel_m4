<!DOCTYPE html>
<html>

<body>

    <h2>HTML Forms</h2>

    <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Tên loại hàng:</label><br>
        <input type="text" name="product_name" value="{{ $products->product_name }}"><br>
        <label>loại hàng</label>:</label><br>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
        </select><br>
        
        <label >Giá hàng</label>:</label><br>
        <input type="text" name="price" value="{{ $products->price}}"><br>
        <label>Số lượng</label>:</label><br>
        <input type="text" name="stock_quantity" value="{{ $products->stock_quantity }}"><br>
        <label>Ảnh</label>:</label><br>
        <img width="100" height="100" src="{{ asset($products->image_url) }}" alt="Ảnh hiện tại"><br>
        <input type="file" name="image_url" ><br>
        <input type="submit" value="Submit">
    </form>



</body>

</html>
