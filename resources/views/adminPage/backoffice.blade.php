<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/backoffice.css')}}">
    <title>backoffice</title>
</head>
<body>
@include('component.sidebar')

    <div class="content">
@include('component.navbarAdmin')
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
        <div>
            <button>Edit Selected</button>
            <button>Delete Selected</button>
        </div>
        <table class="crud-table" id="crud-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Create</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if ($users->isEmpty())
                <tr>
                    <td>0</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Data</td>
                </tr>
                @else
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><img src="{{ $user->avatar }}" alt="Avatar"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="width: 2px" >{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                @endforeach
                @endif --}}
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
