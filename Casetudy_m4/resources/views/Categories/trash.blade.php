@extends('admin.master')
@section('trash')
<h2 class="offset-4">CATEGORY CATALOG TRASH</h2>
    <div class="table-responsive pt-3">
        <table class="table table-info" style="width:100%">
            <thead>
                <tr>
                    <th style="width:35%">
                        #
                    </th>
                    <th>
                        Category name deleted
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr data-expanded="true" class="item-{{ $category->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('category.restoredelete', $category->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Restore</button>
                                <a href="{{ route('category_destroy', $category->id) }}" id="{{ $category->id }}"
                                    class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
@endsection