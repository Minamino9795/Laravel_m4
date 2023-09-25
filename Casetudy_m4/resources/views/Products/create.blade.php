<h2>THÊM SẢN PHẨM:</h2>

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        Name: <br>
        <input type="text" name="name"> <br>
    </div>
    <div>
        Slug: <br>
        <input type="number" name="slug"> <br>
    </div>
    <div>
        Price:<br>
        <input type="number" name="price">VND<br>
    </div>
    <div>
        Decscription: <br>
        <textarea class="form-control" rows="4" name="decscription" id="decscription" placeholder="Enter description"></textarea><br>
    </div>
    <div>
        Quantity:<br>
        <input type="number" name="quantity">Set<br>
    </div>
    <div>
        Status:<br>
        <input type="number" name="status"><br>
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
        <span class="file-name-display">No file selected</span>
        <br>
    </div>

    <input type="submit" value="Add">
</form>
