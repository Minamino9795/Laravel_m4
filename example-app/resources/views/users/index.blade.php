<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>TT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>


                        </form>

                        <a href="{{ route('user.show', ['id' => $user->id]) }}">
                            <button type="submit">show</button>
                        </a>


                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
</body>

</html>
