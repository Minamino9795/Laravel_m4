@extends('Usershop.master')
@section('content')

    <table>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Delivery
                            address</span></h5>
                    <form class="checkout-form" method="POST" action="{{ route('order') }}">
                        @csrf
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <div class="bg-light p-30">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>First and last name</label>
                                        <input name="name" class="form-control" type="text" placeholder="John"
                                            value="{{ Auth()->guard('customers')->user()->name }}" id="full_name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" type="text"
                                            placeholder="example@email.com"
                                            value="{{ Auth()->guard('customers')->user()->email }}" id="user_city">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Phone number</label>
                                        <input name="phone" class="form-control" type="text" placeholder="+123 456 789"
                                            value="{{ Auth()->guard('customers')->user()->phone }}" id="user_post_code">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>address </label>
                                        <input name="address" class="form-control" type="text" placeholder="123 Street"
                                            value="{{ Auth()->guard('customers')->user()->address }}" id="user_address">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-block btn-primary font-weight-bold py-3">Order</button>
                                @else
                                    <h4>Please log in before paying</h4>
                                    <a href="{{ route('shop.login') }}" class="btn btn-danger">Login</a>
                        @endif
                        @php

                            $totalAll = 0;

                        @endphp

                        <div class="block">

                            <h4 class="widget-title">Summary</h4>
                            <div class="bg-light p-30 mb-5">
                                <div class="border-bottom">
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php
                                                $total = $details['price'] * $details['quantity'];
                                                $totalAll += $total;

                                            @endphp
                                            <div>
                                                <h6 class="mb-3">Product</h6>
                                                <div class="d-flex justify-content-between">
                                                    <p> <input type="hidden" value="{{ $id }}"
                                                            name="product_id[]">{{ $details['name'] ?? '' }} x <input
                                                            type="hidden" value="{{ $id }}" name="quantity[]">
                                                        {{ $details['quantity'] ?? '' }}</p>


                                                    <input type="hidden" value="{{ $total }}" name="total[]">

                                                </div>
                                            </div>

                                            <div class="border-bottom pt-3 pb-2">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h6>Subtotal</h6>
                                                    <h6>{{ number_format($total) }} VNĐ </h6>
                                                </div>

                                            </div>
                                            <div class="pt-2">
                                                <div class="d-flex justify-content-between mt-2">
                                                    <h5>Total amount</h5>
                                                    <h5>{{ number_format($total) }} VNĐ </h5>
                                                </div>
                                            </div>
                                </div>
                                <div class="discount-code">
                                    @endforeach
                                    @endif
                                    <div class="pt-2">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5>Amount to be paid : {{ number_format($totalAll) }} VNĐ </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </table>
@endsection
