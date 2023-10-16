@extends('admin.master')
@section('content')
    <h1 class="offset-4">ORDER</h1>
    <hr>
    
    <table class="table table-bordered">
        <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">
            <tr>
                <th style="color: white" scope="col">#</th>
                <th style="color: white" scope="col">Customer name</th>
                <th style="color: white" scope="col">Email</th>
                <th style="color: white" scope="col">Phone number</th>
                <th style="color: white" scope="col">Address</th>
                <th style="color: white" scope="col">Order date</th>

                <th style="color: white" scope="col">Action</th>
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
                        <a class='btn btn-success' href="{{ route('order.detail', $item->id) }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection