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
    {{-- thông báo --}}
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
                timer: 2000,
                width: '300px',
                customClass: {
                    popup: 'animated bounce',
                },
                background: '#f4f4f4',
                iconColor: '#00a65a',

            });
        </script>
    @endif


    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div>
                    <h2>LIST CATEGORIES</h2>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <form action="{{ route('category.index') }}" method="GET">
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
                    </form><br>
                    <a href="{{ route('category.create') }}" class="btn btn-success">+ New</a>

                    <table class="table table-hover" border="1">
                        <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
                            <tr>
                                <th scope="col" style="color: white">Category ID</th>
                                <th scope="col" style="color: white">Category Name</th>
                                <th scope="col" style="color: white">Action</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $category->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('category.show', $category->id) }}">
                                                <button class="btn btn-success" title="Show"><i
                                                        class="fas fa-eye"></i></button>
                                                <span></span>
                                            </a>|
                                            <a href="{{ route('category.edit', $category->id) }}">
                                                <button class="btn btn-primary" title="Edit"><i
                                                        class="fas fa-edit"></i></button></a>|
                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
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
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>


</body>
