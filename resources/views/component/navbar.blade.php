<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #C30000;
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
    font-size: 24px;
}

.navbar-links a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    transition: background-color 0.3s;
}

.navbar-links a:hover {
    background-color: #ff0000;
    border-radius: 7px;
}

.navbar-profile {
    position: relative;
    color: #fff;
    font-size: 16px; /* Reduced font size */
}

.profile-link {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
    padding: 0.3rem 4rem; /* Reduced padding */
    transition: background-color 0.3s;
    font-size: 16px; /* Reduced font size */
}

.profile-link img {
    width: 30px; /* Adjust the width as needed */
    height: 30px; /* Ensure the height is proportionate */
    border-radius: 50%; /* Keep the avatar circular */
    margin-right: 0.5rem; /* Space between image and text */
}
 
.profile-link:hover {
    background-color: #ff0000;
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
    background-color: #C30000;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 7px;
}

.dropdown-menu a {
    color: #fff;
    padding: 20px 24px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3 s;
    font-size: 16px;
}

.dropdown-menu a:hover {
    background-color: #ff0000;
}

.navbar-profile:hover .dropdown-menu {
    display: block;
}

@media (max-width: 768px) {
    .navbar-links {
        display: none;
        flex-direction: column;
        width: 100%;
        background-color: #ff0000;
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
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <img src="{{asset('img/image.png')}}" alt="Logo" class="logo">
            <span>TopCinangkaHotel</span>
        </div>
        <ul class="navbar-links">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li><a href="{{url('/tamu_reservasi')}}">Reservasi</a></li>
            <li><a href="#facilities">Fasilitas</a></li>
        </ul>
        <div class="navbar-profile">
            @if (Auth::check())
                <a href="#" class="profile-link">
                    <img src="{{ $avatar }}" alt="Avatar {{ $user->name }}">
                    <h2>{{ Auth::user()->name }}</h2>
                </a>
                <div class="dropdown-menu">
                    <a href="{{ url('/logoutAkun') }}">Logout</a>
                </div>
            @else
                <a href="#" class="profile-link">
                    <img src="{{asset('img/guest.png')}}" alt="Guest Profile" class="profile-pic"> Masuk/Daftar
                </a>
                <div class="dropdown-menu">
                    <a href="{{url('/login')}}">Login</a>
                    <a href="{{url('/register')}}">Register</a>
                </div>
            @endif
        </div>
     
    </nav>
</body>
<script src="{{ asset('js/menu.js') }}"></script>

</html>