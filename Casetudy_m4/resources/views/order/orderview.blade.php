@extends('Usershop.master')
@section('content')
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
@endif
    <table>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"></span></h5>
                    <form class="checkout-form" method="POST" action="{{ route('order') }}">
                        @csrf
                        @if (isset(Auth()->guard('customers')->user()->name))
                        <div class="bg-light p-30">
                            <div class="row">
                                    <h2>Your order has been placed successfully</h2>
                                       
                                   
                                    <div class="col-md-6 form-group">
                                        <label>Recipient's name</label>
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
                                        <label>Delivery address </label>
                                        <input name="address" class="form-control" type="text" placeholder="123 Street"
                                            value="{{ Auth()->guard('customers')->user()->address }}" id="user_address">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Date of receipt of goods </label>
                                        <input name="address" class="form-control" type="text" placeholder="123 Street"
                                            value="20/10/2023 - 22/10/2023" id="user_address">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>shipping unit </label>
                                        <input name="address" class="form-control" type="text" placeholder="123 Street"
                                            value="Viettel Post" id="user_address">
                                    </div>
                                    
                                @else
                                    <h4>Please log in before paying</h4>
                                    <a href="{{ route('shop.login') }}" class="btn btn-danger">Login</a>
                        @endif
                      
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                            Shopping</a>
    </table>
@endsection
