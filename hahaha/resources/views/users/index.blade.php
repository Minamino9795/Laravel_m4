


@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Authors table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    TT</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Name</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Email</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($users as $key => $user)
                        
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            {{ $key + 1 }}
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <td>{{ $user->name }}</td>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    
                                    <p class="text-xs font-weight-bold mb-0">  {{ $user->email }}</p>
                                </td>
                              
                                <td>
                                    <div class="btn-group">
                                        <div>
                                            <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                                                <button type="submit" class="btn btn-primary">edit</button>
                                            </a>
                                        </div>
                                        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
            
                                        <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                            <button type="submit" class="btn btn-success mb-2">show</button>
                                        </a>
            
                                    </div>
            
            
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
