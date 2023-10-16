@extends('Usershop.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
    @if (session('successMessage1'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('successMessage1') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                width: '300px',
                padding: '20px',
                background: '#ffffff',
                iconColor: '#00a65a',
                customClass: {
                    popup: 'animated bounceInDown',
                    title: 'text-center',
                },
                grow: 'row',
                toast: true
            });
        </script>
       @elseif(session('successMessage'))
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
    @endif
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" width="100" height="90" src="{{ asset($product->image) }}"
                                alt="Image">

                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('shop.addtocart', [$product->id]) }}"
                                    onclick="return $successMessage1"><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="{{ route('shop.detail', [$product->id]) }}">{{ $product->name }}</a>
                            <h6>
                                @if ($product->status == 0)
                                    <td><span class="badge badge-success">
                                            <i class="fas fa-check-circle"></i> In stock
                                        </span></td>
                                @else
                                    <td> <span class="badge badge-danger">
                                            <i class="fas fa-times-circle"></i> Out stock
                                        </span></td>
                                @endif
                            </h6>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->price) }} VNĐ</h5>

                                <h6 class="text-muted ml-2"><del></del></h6>


                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $products->links('pagination::bootstrap-5') }}
@endsection
