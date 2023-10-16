{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('category.index') }}" method="GET">
        <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit">Tìm Kiếm</button>

    </form><br>
    <a href="{{ route('category.create') }}" class="btn btn-success">Thêm loại hàng</a>
    <table border="1" class="table">
        <tr>
            <th>Mã loại hàng</th>
            <th>Tên loại hàng</th>
            <th>Mô tả</th>
            <th>Tùy chọn</th>
        </tr>
        <!-- Bắt đầu lặp -->
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('category.show', $category->id) }}">
                                <button class="btn btn-success">Xem</button></a>|
                            <a href="{{ route('category.edit', $category->id) }}">
                                <button class="btn btn-primary">Sửa</button></a>|
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $categories->links('pagination::bootstrap-4') }}
</body>

</html> --}}
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
        {{-- thông báo --}}


    </head>

    <body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
        @if (session('successMessage'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @elseif(session('successMessage1'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage1') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @elseif(session('successMessage2'))
            <script>
                Swal.fire({
                    title: "<h6>{{ session('successMessage2') }}</h6>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    width: "300px"
                });
            </script>
        @endif

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">DANH SÁCH LOẠI HÀNG</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                        <form action="{{ route('category.index') }}" method="GET">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Nhập từ khóa tìm kiếm">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <a href="{{ route('category.create') }}" class="btn btn-success">+Thêm</a>

                        <table class="table align-items-center mb-0" border="1">
                            <thead>
                                <tr>
                                    <th scope="col">Mã loại hàng</th>
                                    <th scope="col">Tên loại hàng</th>
                                    {{-- <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tình trạng</th> --}}
                                    {{-- <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mô tả</th> --}}
                                    <th scope="col">Tùy chọn</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                {{-- <div>
                                                    <img src="../assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div> --}}
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $category->id }}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $category->category_name }}</p>

                                        </td>
                                        {{-- <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Còn hàng</span>
                                        </td> --}}
                                        {{-- <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $category->description }}</span>
                                        </td> --}}
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('category.show', $category->id) }}">
                                                    <button class="btn btn-success"><i class="fas fa-eye"></i></button>
                                                </a>|
                                                <a href="{{ route('category.edit', $category->id) }}">
                                                    <button class="btn btn-primary"><i
                                                            class="fas fa-edit"></i></button></a>|
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
