<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar Example</title>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            font-size: 24px;
            background-color: #f9f9f9;
            padding: 10px;

        }



        .navbar .profile {
            display: flex;
            align-items: center;
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

        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        <div class="profile">
            {{-- Uncomment the line below and replace with your dynamic avatar URL --}}
            {{-- <img src="{{ $avatar }}"> --}}
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>



    <!-- Rest of your HTML content -->

</body>

</html>
