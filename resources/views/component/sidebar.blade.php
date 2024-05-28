<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    /* Sidebar Styles */
    * {
        margin: 0;
        padding: 0;
    }

    .sidebar {
        width: 250px;
        background-color: #C39D7A;
        color: #fff;
        position: fixed;
        height: 100%;
    }

    .sidebar img {
        width: 100%;
        height: 120%;
        margin-bottom: 20px;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
    }

    .sidebar-menu {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }


    .sidebar-menu li {
        padding: 0;
    }

    .sidebar-menu li a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 10px;
        text-align: center;
        border: 1px solid #fff;
        border-radius: 4px;
    }

    .sidebar-menu li a:hover {
        background-color: #c4ad97;
        border-radius: 4px;
    }

    .bg-logo {
        background-color: #fff;
        color: #c22f2f;
    }

    li a .text-dashboard {
        padding: 20px;
    }
</style>

<body>
    <div class="sidebar">
        <div class="bg-logo">
            <img src="{{ asset('img/logo_lanscap.png') }}" alt="Company Logo">
        </div>
        <ul class="sidebar-menu">
            <li><a href="#profile" class="text-dashboard">Dashboard</a></li>
            <li><a href="#profile">Kamar Hotel</a></li>
            <li><a href="#settings">Fasilitas</a></li>
            <li><a href="{{ url('/admin/resepsionis') }}">Resepsionis</a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
        </ul>
    </div>
</body>

</html>
