<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #C39D7A;
            padding: 25px 30px;
            position: relative;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-brand span {
            font-size: 20px;
        }

        .navbar-brand .logo {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .navbar-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar-links li {
            margin-left: 40px;
            font-size: 20px;
        }

        .navbar-links a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .navbar-links a:hover {
            background-color: #c6a98d;
            border-radius: 7px;
        }

        .navbar-profile {
            position: relative;
            color: #fff;
            font-size: 16px;
        }

        .profile-link {
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            padding: 0.3rem 4rem;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .profile-link img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .profile-link:hover {
            background-color: #c6a98d;
            border-radius: 7px;
        }

        .profile-pic {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #C39D7A;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 7px;
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
        }

        @media (max-width: 768px) {
            .navbar-links {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #C39D7A;
            }

            .navbar-links li {
                text-align: center;
                margin: 0;
            }

            .navbar-profile {
                display: none;
            }

            .navbar-links.active {
                display: flex;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <img src="{{ asset('img/image.png') }}" alt="Logo" class="logo">
            <span>TopCinangkaHotel</span>
        </div>
        <ul class="navbar-links">
            <li>
                @auth
                    <a href="{{ url('/dashboard') }}">Beranda</a>
                @else
                    <a href="{{ url('/') }}">Beranda</a>
                @endauth
            </li>
            <li><a href="{{ url('/tamu_reservasi') }}">Reservasi</a></li>
            <li><a href="{{ url('/fasilitas') }}">Fasilitas</a></li>
        </ul>
        <div class="navbar-profile">
            @auth
                <a href="#" class="profile-link" id="profileLink">
                    <img src="{{ $avatar }}" alt="Avatar {{ $user->name }}">
                    <h2>{{ Auth::user()->name }}</h2>
                </a>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="{{ url('/logout') }}">Logout</a>
                </div>
            @else
                <a href="#" class="profile-link" id="profileLink">
                    <img src="{{ asset('img/guest.png') }}" alt="Guest Profile" class="profile-pic"> Masuk/Daftar
                </a>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endauth
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileLink = document.getElementById('profileLink');
            const dropdownMenu = document.getElementById('dropdownMenu');

            profileLink.addEventListener('click', function(event) {
                event.preventDefault();
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function(event) {
                if (!profileLink.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
