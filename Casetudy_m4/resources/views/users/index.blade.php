@extends('admin.master')
@section('content')
    <style>
        img#avt {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
        }
    </style>
    <main class="page-content">

        <section class="wrapper">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel-panel-default">
                        <header class="page-title-bar">
                            <h1 class="offset-4">HRM management</h1>
                            <a href="{{ route('user.create') }}" class="btn btn-info">Register for an HR account</a>
                        </header>
                        <hr>
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
                                        <th data-breakpoints="xs" style="color: white">#</th>
                                        <th style="color: white">Avatar</th>
                                        <th style="color: white">Name</th>
                                        <th style="color: white">Phone</th>
                                        <th style="color: white">Position</th>
                                        <th data-breakpoints="xs" style="color: white">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($users as $key => $user)
                                        <tr data-expanded="true" class="item-{{ $user->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td><a href="{{ route('user.show', $user->id) }}"><img id="avt"
                                                        src="{{ asset($user->image) }}" alt=""></a></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->group->name }}</td>
                                            <td>
                                                @if (Auth::user()->hasPermission('User_update'))
                                                    <a href="{{ route('user.edit', $user->id) }}" 
                                                        title="Edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->hasPermission('User_forceDelete'))
                                                    <a data-href="{{ route('user.destroy', $user->id) }}"
                                                        id="{{ $user->id }}" class="btn btn-danger deleteIcon"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
            {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).on('click', '.deleteIcon', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');
                    let href = $(this).data('href');
                    let csrf = '{{ csrf_token() }}';
                    console.log(id);
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
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
                                },
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Sorry',
                                text: 'Admin cannot delete!',
                            })
                        }
                    })
                });
            </script>

            <script>
                Swal.bindClickHandler()
                Swal.mixin({
                    toast: true,
                    icon: 'error',
                    text: "",
                }).bindClickHandler('data-swal-toast-template')
            </script>
        </section>
    </main>
@endsection
