<!DOCTYPE html>
<html>

<body>

    <h2>CHỈNH SỬA SẢN PHẨM:</h2>

    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name:</label><br>
        <input type="text" name="name" value="{{ $products->name }}"><br>
        <label>Slug:</label><br>
        <input type="text" name="slug" value="{{ $products->slug }}"><br>
        <label>Price:</label><br>
        <input type="text" name="price" value="{{ $products->price }}"><br>
        <label for="description">Decscription:</label><br>
        <textarea name="decscription" id="decscription">{{ $products->decscription }}</textarea><br>
        <label>Quantity</label>:</label><br>
        <input type="text" name="quantity" value="{{ $products->quantity }}"><br>
        <label>Status</label>:</label><br>
        <input type="text" name="status" value="{{ $products->status }}"><br>

        <label>Category</label>:</label><br>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select><br>
        <label>Ảnh</label>:</label><br>
        <img width="100" height="100" src="{{ asset($products->image) }}" alt=""><br>
        <input type="file" name="image"><br>
        <input type="submit" value="Submit">
    </form>



</body>

</html>
