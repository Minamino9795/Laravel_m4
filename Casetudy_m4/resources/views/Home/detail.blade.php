@extends('Usershop.master')
@section('content')
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset($products->image) }}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        {{-- <i class="fa fa-2x fa-angle-left text-dark"></i> --}}
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        {{-- <i class="fa fa-2x fa-angle-right text-dark"></i> --}}
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $products->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Đánh giá)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ number_format($products->price) }} vnd</h3>
                    <p class="font-family"><h5>Mô tả:</h5>{!! $products->decscription !!}</p>
                    <p class="font-family"><h5>Loại sản phẩm:</h5>{{ $products->category->name }}</p>
                    <p class="font-family"><h5>Tình trạng:</h5> 
                        @if ($products->status == 0)
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle"></i> In stock
                            </span>
                        @else
                            <span class="badge badge-danger">
                                <i class="fas fa-times-circle"></i> Out stock
                            </span>
                        @endif
                    </p>



                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <a href="{{ route('shop.store', $products->id) }}" id="{{ $product->id }}"
                            class="btn btn-danger mt-20">Thêm vào giỏ hàng</a> --}}
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
