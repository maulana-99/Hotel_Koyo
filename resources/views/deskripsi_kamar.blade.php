<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deskripsi_kamar</title>
    <link rel="stylesheet" href="{{asset('css/deskripsi_kamar.css')}}">
</head>
<body>
    @include('component.navbar')
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
