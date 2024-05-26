<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    /* Sidebar Styles */
    .sidebar {
        width: 200px;
        background-color: #C22F2F;
        color: #fff;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar img {
        width: 80%;
        margin-bottom: 20px;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
    }

    .sidebar-menu li {
        padding: 10px 0;
    }

    .sidebar-menu li a {
        color: #fff;
        text-decoration: none;
        display: block;
    }

    .sidebar-menu li a:hover {
        background-color: #ee3838;
        border-radius: 4px;
    }

    .bg-logo {
        background-color: #fff;
        color: #C22F2F;
    }
</style>

<body>
    <div class="sidebar">
        <div class="bg-logo">
            <img src="logo.png" alt="Company Logo">
        </div>
        <ul class="sidebar-menu">
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="{{url('/logout')}}">Logout</a></li>
        </ul>
    </div>
</body>

</html>
