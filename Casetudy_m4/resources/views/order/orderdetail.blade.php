@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>ORDER DETAIL</h1>

</div>
<table class="table table-bordered">
    <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
        <tr>
            <th style="color: white" scope="col">#</th>
            <th style="color: white" scope="col">Product's name</th>
            <th style="color: white" scope="col">Price</th>
            <th style="color: white" scope="col">Order id</th>
            <th style="color: white" scope="col">Total Money</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach ($items as $key => $item)
        @php $total += $item->total @endphp
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price) }} VNĐ</td>
                <td>{{ $item->id }}</td>
                <td>{{ number_format($item->total) }}VNĐ</td>
            </tr>
        @endforeach
    </tbody>
</table>
Total amount of the order: {{number_format($total)}} $
@endsection