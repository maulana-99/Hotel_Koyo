<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopCinangkaHotel</title>
    <link rel="stylesheet" href="{{asset('css/guest.css')}}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <img src="{{asset('img/image.png')}}" alt="Logo" class="logo">
            <span>TopCinangkaHotel</span>
        </div>
        <ul class="navbar-links">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#reservations">Reservasi</a></li>
            <li><a href="#facilities">Fasilitas</a></li>
        </ul>
        <div class="navbar-profile">
            <a href="#login.blade.php" class="profile-link">
                <img src="{{asset('img/guest.png')}}" alt="Guest Profile" class="profile-pic"> Masuk/Daftar
            </a>
        </div>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
<div class="background">
    <img src="{{asset('img/background.png')}}" alt="background" class="background">
</div>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
