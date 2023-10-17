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
    @endif
            <div class="panel-heading">
            <h2 class="offset-4">DANH SÁCH CHI TIÊU</h2>
        </div>

        <div class="card my-4">

            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    
                    <a href="{{ route('chitieu.create') }}" class="btn btn-success">Thêm chi tiêu</a>

                    <table class="table table-hover" border="1">
                        <div class="mt-3">
                            <h4>Tổng: {{number_format($totalAmount)}} VNĐ</h4>
                        </div>
                        <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
                            <tr>
                                <th scope="col" style="color: white">#</th>
                                <th scope="col" style="color: white">Danh mục</th>
                                <th scope="col" style="color: white">Ngày</th>
                                <th scope="col" style="color: white">Số tiền</th>
                                <th scope="col" style="color: white">Tùy chọn</th>
                                {{-- <th class="text-secondary opacity-7">tùy chọn</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expens as $key => $expen)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $expen->DANHMUCCHITIEU }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $expen->NGAYCHITIEU }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{number_format($expen->SOTIEN)}} VNĐ</p>
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            {{-- <a href="{{ route('category.show', $category->id) }}">
                                                <button class="btn btn-success" title="Show"><i
                                                        class="fas fa-eye"></i></button>
                                            </a> | --}}
                                           
                                            <a href="{{ route('chitieu.edit', $expen->id) }}">
                                                <button class="btn btn-primary" title="Edit">sửa</button>
                                            </a> 
                                           
                                            |
                                            <form action="{{ route('chitieu.destroy', $expen->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick=" return confirm('Bạn có chắc chắn muốn xóa danh mục chi tiêu này ?'); "
                                                    href="{{ route('chitieu.destroy', $expen->id) }}">
                                                    <button class="btn btn-danger">xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

