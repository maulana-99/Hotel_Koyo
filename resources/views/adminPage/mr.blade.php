<!DOCTYPE html>
<html>

<head>
    <title>Users List</title>
</head>

<body>
    <h1>List of Users</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Create</th>
            <th>Update</th>
        </tr>
        @if ($users->isEmpty())
            <tr>
                <td>{{ '0' }}</td>
                <td>{{ 'No Data' }}</td>
                <td>{{ 'No Data' }}</td>
                <td>{{ 'No Data' }}</td>
                <td>{{ 'No Data' }}</td>
                <td>{{ 'No Data' }}</td>
            </tr>
            @else
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td> <img src="{{$user->avatar}}"> </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @endforeach
        @endif
    </table>
</body>

</html>
