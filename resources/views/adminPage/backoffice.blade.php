<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/backoffice.css') }}">
    <title>backoffice</title>
</head>
<style>
    .navbar h1 {
            margin: 0;
            font-size: 24px;
            
        }
</style>

<body>
    @include('component.sidebar')

   
    <div class="content">
        
        @include('component.navbarAdmin')
        
        <div class="page-title">
            <h2>Resepsionis</h2>
        </div>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
        <div>
            <button class="button_create">Create</button>
        </div>
        
        <table class="crud-table" id="crud-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="password-column">Password</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                    <tr>
                        <td>0</td>
                        <td>No Data</td>
                        <td>No Data</td>
                        <td class="password-column">No Data</td>
                        <td>No Data</td>
                        <td>No Data</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="password-column">{{ $user->password }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td> 
                                <div class="Button2">
                                    <button>Edit Selected</button>
                                    <button>Delete Selected</button>
                                </div>                                
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</body>

</html>
