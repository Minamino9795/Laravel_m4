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
    </head>

    <body>
        <div class="container">
            <table class="table table-hover">
                <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
                    <tr>
                        <th style="color: white">Product ID</th>
                        <th style="color: white">Name</th>
                        <th style="color: white">Slug</th>
                        <th style="color: white">Price</th>
                        <th style="color: white">Description</th>
                        <th style="color: white">Quantity</th>
                        <th style="color: white">Status</th>
                        <th style="color: white">Category ID</th>
                        <th style="color: white">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $products->id }}</td>
                        <td>{{ $products->name }}</td>
                        <td>{{ $products->slug }}</td>
                        <td>{{ $products->price }}.000 VNĐ</td>
                        <td>{!! $products->decscription !!}</td>
                        <td>{{ $products->quantity }} Đôi</td>
                        <td>
                            @if ($products->status == 0)
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle"></i> In stock
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-times-circle"></i> Out stock
                                </span>
                            @endif
                        </td>
                        <td>{{ $products->category->name }}</td>
                        <td><img width="100" height="90" src="{{ asset($products->image) }}" alt="Image"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

    </html>
@endsection
