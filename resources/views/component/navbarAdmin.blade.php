<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar Example</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
        }

        .navbar {
            margin-left: 250px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            font-size: 24px;
            background-color: #f9f9f9;
            position: fixed;
            width: 85%;
            top: 0;
            left: 0;
            z-index: 50;

        }
        .navbar h1{
            font-size: 24px;
        }
        .navbar .profile {
            display: flex;
            align-items: center;
            position: relative; /* Tambahkan posisi relatif */
        }

        .navbar .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar .profile span {
            font-weight: bold;
        }

        .page-title {
            font-size: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            text-align: center;
            margin-top: 60px;
            /* Adjust this to avoid overlap with the fixed navbar */
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #C39D7A;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 2px;
            z-index: 100;
        }

        .dropdown-menu a {
            color: #fff;
            padding: 20px 24px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .dropdown-menu a:hover {
            background-color: #c6a98d;
            border-radius: 2px;
        }

        /* Tambahkan gaya untuk menampilkan dropdown saat profil dihover */
        .profile:hover .dropdown-menu {
            display: block;
        }
        .profile{
            background-color: #C39D7A;
            padding: 15px;
            width: 130px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <h1>Selamat Datang, Admin</h1>
            <div class="profile">
                {{-- <img src="{{ $avatar }}" alt="Avatar {{ $user->name }}"> --}}
                <span>{{ Auth::user()->name }}</span>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Rest of your HTML content -->

</body>

</html>
