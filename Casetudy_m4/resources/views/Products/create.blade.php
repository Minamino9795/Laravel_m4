
<h2>THÊM SẢN PHẨM:</h2>

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

