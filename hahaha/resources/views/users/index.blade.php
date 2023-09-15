<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('user.index') }}" method="GET">
        <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit" >Tìm Kiếm</button>
        
    </form><br>

    
    
    <a href="{{ route('user.create') }}" class="btn btn-success mb-2">+ New</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>TT</th>
                <th>Name</th>
                <th>Email</th>
                
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
               
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
    {{ $users->links('pagination::bootstrap-4') }}

</body>

</html>
