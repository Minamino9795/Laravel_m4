@extends('admin.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
        @if (session('successMessage'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<h6>{{ session('successMessage') }}</h6>',
                    showConfirmButton: false,
                    timer: 2000,
                    width: '300px',
                    customClass: {
                        popup: 'animated bounce',
                    },
                    background: '#f4f4f4',
                    iconColor: '#00a65a',
                });
            </script>
        @elseif(session('successMessage1'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<h6>{{ session('successMessage1') }}</h6>',
                    showConfirmButton: false,
                    timer: 2000,
                    width: '300px',
                    customClass: {
                        popup: 'animated bounce',
                    },
                    background: '#f4f4f4',
                    iconColor: '#00a65a',
                });
            </script>
        @elseif(session('successMessage2'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<h6>{{ session('successMessage2') }}</h6>',
                    showConfirmButton: false,
                    timer: 1500,
                    width: '300px',
                    customClass: {
                        popup: 'animated bounce',
                    },
                    background: '#f4f4f4',
                    iconColor: '#00a65a',
                });
            </script>
            
        @endif
    </head>

    <body>
        <div class="panel-heading">
            <h2 class="offset-4">PRODUCTS</h2>
        </div>
        <div class="container">
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <form action="{{ route('product.index') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Enter search keywords">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <br>
                    <a href="{{ route('product.create') }}" class="btn btn-success">+ New</a>
                    <table class="table table-hover" border="1">
                        <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
                            <tr>
                                <th style="color: white">#</th>
                                <th style="color: white">Name</th>
                                <th style="color: white">Slug</th>
                                <th style="color: white">Price</th>
                                <th style="color: white">Quantity</th>
                                <th style="color: white">Status</th>
                                <th style="color: white">Category</th>
                                <th style="color: white">Image</th>
                                <th style="color: white">Action</th>
                            </tr>
                        </thead>
                        <!-- Bắt đầu lặp -->
                        <tbody>
                            @foreach ($products as $key=>$product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{number_format($product->price)}} VNĐ</td>
                                    <td>{{ $product->quantity }} cái</td>
                                    @if ($product->status == 0)
                                        <td><span class="badge bg-success">
                                                <i class="fas fa-check-circle"></i> In stock
                                            </span></td>
                                    @else
                                        <td> <span class="badge bg-danger">
                                                <i class="fas fa-times-circle"></i> Out stock
                                            </span></td>
                                    @endif
                                    <td>{{ $product->category->name }}</td>
                                    <td><img width="100" height="90" src="{{ asset($product->image) }}"
                                            alt="Image">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <button class="btn btn-success" title="Show"><i
                                                        class="fas fa-eye"></i></button></a>|
                                            <a href="{{ route('product.edit', $product->id) }}">
                                                <button class="btn btn-primary" title="Edit"><i
                                                        class="fas fa-edit"></i></button></a>|
                                            <form action="{{ route('product.softdeletes', $product->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button class="btn btn-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete?')"><i
                                                            class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
