<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <div class="avatar">
            <img src="{{ $avatar }}" alt="Avatar {{ $user->name }}">
        </div>
        <a href="{{ url('/admin/resepsionis') }}">Back to Users List</a>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
