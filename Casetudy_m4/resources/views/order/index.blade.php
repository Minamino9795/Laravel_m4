@extends('admin.master')
@section('content')
    <h1 class="offset-4">Đơn hàng</h1>
    <hr>
    <td> <a style="width:50%" class="btn btn-warning" href="{{ route('xuat') }}">Xuất file excel </a> </td>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Ngày Đặt Hàng</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->customer->email }}</td>
                    <td>{{ $item->customer->phone }}</td>
                    <td>{{ $item->customer->address }}</td>
                    <td>{{ $item->date_at }}</td>

                    <td>
                        <a class='btn btn-info' href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection