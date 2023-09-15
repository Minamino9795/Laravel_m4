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
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                </td>

            </tr>
        </tbody>
    </table>
</body>

</html>
