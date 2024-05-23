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
            padding: 20px;
            border-bottom: 1px solid #ddd;
            font-size: 24px;
            background-color: #f9f9f9;
        }

        .navbar h1 {
            margin: 0;
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
    </style>
</head>
<body>
    <div class="navbar">
        <h1>My Website</h1>
        <div class="profile">
            {{-- Uncomment the line below and replace with your dynamic avatar URL --}}
            {{-- <img src="{{ $avatar }}" alt="Avatar {{ Auth::user()->name }}"> --}}
            <img src="https://via.placeholder.com/40" alt="Avatar">
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>

    <!-- Rest of your HTML content -->

</body>
</html>
