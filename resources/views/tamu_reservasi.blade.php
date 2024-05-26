<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{asset('css/tamu_reservasi.css')}}">
</head>
<body>
@include('component.navbar')
    <div class="search-navbar">
        <form class="search-form">
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
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                    <p>Rp. 500,000 / night</p>
                </div>
            </a>
        </div>
    </div>
    <div class="room-cards">
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                    <p>Rp. 500,000 / night</p>
                </div>
            </a>
        </div>
    </div>
    <div class="room-cards">
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                    <p>Rp. 500,000 / night</p>
                </div>
            </a>
        </div>
    </div>
    <div class="room-cards">
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                    <p>Rp. 500,000 / night</p>
                </div>
            </a>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
