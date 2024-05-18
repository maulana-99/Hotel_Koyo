<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{asset('css/tamu_reservasi.css')}}">
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

    <div class="search-navbar">
        <form class="search-form">
            <div class="form-group">
                <label for="check-in-date">Reservasi:</label>
                <input type="date" id="check-in-date" name="check-in-date" required>
            </div>
            <div class="form-group">
                <label for="room-type">Room Type:</label>
                <select id="room-type" name="room-type" required>
                    <option value="">Cari Kamar</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <button type="submit" class="btn-search">Cari</button>
        </form>
    </div>

    <div class="room-cards">
        <div class="room-card" onclick="window.location.href='#single-room';">
            <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
            <div class="room-info">
                <h3>Single Room</h3>
                <p>Rp. 500,000 / night</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
