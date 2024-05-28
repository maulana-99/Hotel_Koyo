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

@include('component.navbarAdmin')
@include('component.sidebar')
<body>
    <div class="content">
        <div class="page-title">
            <h2>Resepsionis</h2>
        </div>
        <form method="GET" action="" style="display: flex; justify-content: space-between;">
            <div>
                <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </div>
            <a href="#" id="openPopupCreate" class="button_create">Create</a>
        </form>
        
        
        @include('component.alert')
        <div class="table-container">
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
                            <td>No Action</td>
                        </tr>
                    @else
                        @foreach ($users as $user)
                            <tr class="user-row" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                data-email="{{ $user->email }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="password-column">{{ $user->password }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <button class="edit-btn" onclick="editPopup()">Edit Selected</button>
                                    <form method="POST" action="{{ route('deactivateResepsionis', $user->id) }}"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menon aktifkan resepsionis ini?');">
                                        @csrf
                                        <button type="submit" class="delete-btn">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('component.createRes')
</body>

</html>
