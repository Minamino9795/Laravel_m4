@extends('admin.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
@if (session('successMessage3'))
<script>
    Swal.fire({
        icon: 'success',
        title: '<h6>{{ session('successMessage3') }}</h6>',
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
<h2 class="offset-4">PRODUCT CATALOG TRASH</h2>
    <div class="table-responsive pt-3">
        <table class="table table-hover" border="1">
            <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
                <tr>
                    <th style="width: 35% ; color: white; ">
                        #
                    </th>
                    <th style="color: white">
                        Product name deleted
                    </th>
                    <th style="color: white">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr data-expanded="true" class="item-{{ $product->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td >{{ $product->name }}</td>
                        <td>
                            <form action="{{ route('product.restoredelete', $product->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success" title="Restore"><i class="fa fa-undo"></i></button>
                                <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}"
                                    class="btn btn-danger"title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
@endsection