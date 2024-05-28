<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{asset('css/fasilitas.css')}}">
</head>
<body>
@include('component.navbar')
<div class="text">
    <h1>Fasilitas</h1>
</div>
    <div class="room-cards">
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/deskripsi_kamar')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                
                </div>
            </a>
        </div>
        <div class="room-card">
            <a href="{{url('/')}}" class="room-link">
                <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                </div>
            </a>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
