<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deskripsi_kamar</title>
    <link rel="stylesheet" href="{{asset('css/deskripsi_kamar.css')}}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo">
            <span>CompanyName</span>
        </div>
        <ul class="navbar-links">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#reservations">Reservasi</a></li>
            <li><a href="#facilities">Fasilitas</a></li>
        </ul>
        <div class="navbar-profile">
            <a href="#login.blade.php" class="profile-link">
                <img src="{{asset('img/guest.png')}}" alt="Guest Profile" class="profile-pic"> Setelan
            </a>
            <div class="dropdown-menu">
                <a href="#edit-profile">Edit Profile</a>
                <a href="#logout">Logout</a>
            </div>
        </div>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <div class="kamar">
        <img src="{{asset('img/kamar.png')}}" alt="kamar" class="kamar">
    </div>
    <div class="room-info">
        <div class="deskripsi-kamar">
            <h2>Deskripsi Kamar</h2>
            <p>Deskripsi lengkap kamar di sini...</p>
        </div>
        <div class="harga">
            <h2>Tipe Kamar</h2>
            <p>Rp 500,000 per malam</p>
            <h2>Kamar</h2>
            <p>Rp 500,000 per malam</p>
            <h2>Harga Kamar</h2>
            <p>Rp 500,000 per malam</p>
            <button class="reservasi-button">Reservasi</button>
        </div>
    </div>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
