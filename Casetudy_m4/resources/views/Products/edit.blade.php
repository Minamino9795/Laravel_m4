@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html>

<body>

    <h2>EDIT PRODUCT:</h2>

    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ $products->name }}"><br>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Slug:</label><br>
            <input type="text" name="slug" value="{{ $products->slug }}"><br>
            @error('slug')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Price:</label><br>
            <input type="text" name="price" value="{{ $products->price }}"><br>
            @error('price')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Decscription:</label><br>
            <textarea name="decscription" id="decscription">{!! $products->decscription !!}</textarea><br>
            @error('decscription')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Quantity</label>:</label><br>
            <input type="text" name="quantity" value="{{ $products->quantity }}"><br>
            @error('quantity')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Status</label>:</label><br>
            <select name="status" class="form-control">
                <option value="0" {{ $products->status ? 'selected' : '' }}>In stock</option>
                <option value="1" {{ $products->status ? 'selected' : '' }}>Out stock</option>
            </select><br>
        </div>
        <div>
            <label>Category</label>:</label><br>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $products->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select><br>
        </div>
        <div>
            <label>Image:</label>
            <img width="100" height="100" src="{{ asset($products->image) }}" alt=""><br>
            <input type="file" name="image" ><br>
            <input type="hidden" name="old_image" value="{{ $products->image }}" ><br>
            @error('image')
            <div style="color: red">{{ $message }}</div>
        @enderror
        </div>

        <input type="submit" value="Submit">

    </form>



</body>

</html>
@endsection
