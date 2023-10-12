@extends('admin.master')
@section('content')
<main class="page-content">
    <div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">

                </header>
                <hr>
                <div class="panel-heading">
                    <h2 class="offset-4">Employee Group List</h2>
                </div>
                <nav aria-label="breadcrumb">
                    @if (Auth::user()->hasPermission('Group_create'))
                     <a href="{{ route('group.create') }}" class="btn btn-success">Create employee groups</a>
                    @endif
                </nav>
                <div>
                    <table class="table" ui-jq="footable"
                        ui-options='{
        "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
    <thead style="background: linear-gradient(to bottom, #a208c8 , #0768f1)">

                            <tr>
                                <th style="color: white">#</th>
                                <th style="color: white">Name</th>
                                <th style="color: white">Person in charge of the job</th>
                                <th data-breakpoints="xs" style="color: white">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($groups as $key => $group)
                                <tr data-expanded="true" class="item-{{ $group->id }}">
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $group->name }} </td>
                                    <td>There are currently {{ count($group->users) }} people</td>
                                    <td>
                                        <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a class="btn btn-success" href="{{route('group.detail', $group->id)}}" title="Authorize"><i class="material-icons">vpn_key</i></a>
                                            @endif
                                            @if (Auth::user()->hasPermission('Group_update'))
                                            <a href="{{ route('group.edit', $group->id) }}"
                                                class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                            @endif
                                                @if (Auth::user()->hasPermission('Group_forceDelete'))
                                                <a data-href="{{ route('group.destroy', $group->id) }}"
                                                    id="{{ $group->id }}" class="btn btn-danger sm deleteIcon"title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $groups->appends(request()->query()) }}
                </div>
            </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @php
       if(Session::has('addgroup')){
       @endphp
       Swal.fire({
            icon: 'success',
            title: 'more success!',
            text: "Grant permission now",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
    </script>
    <script>



        $(document).on('click', '.deleteIcon', function(e) {
            // e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You will not be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'yes, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted!',
                                'success'
                            )
                            $('.item-' + id).remove();
                        }

                    });
                }
            })
        });
    </script>
    </div>
</main>
@endsection