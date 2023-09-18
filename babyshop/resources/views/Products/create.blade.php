<h2>ADD PRODUCT:</h2>

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        Name: <br>
        <input type="text" name="product_name"> <br>
    </div>
    <div>
        Category:<br>
        <select name="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select><br>
    </div>
    <div>
        Price:<br>
        <input type="number" name="price">VND<br>
    </div>
    <div>
        Quantity:<br>
        <input type="number" name="stock_quantity"> SET<br>
    </div>
    <div>
        Image:<br>
        <input type="file" name="image_url"> <br>
        <span class="file-name-display">No file selected</span>
        <br>
    </div>

    <input type="submit" value="Add">
</form>
