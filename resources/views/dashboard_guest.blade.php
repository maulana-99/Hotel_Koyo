<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopCinangkaHotel</title>
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">

</head>
<body>
    @include('component.navbar')
    <div class="background-container">
        <img src="{{ asset('img/background.png') }}" alt="background" class="background">
        <div class="hover-text">
            <h1><b>Tentang Kami</b></h1>
            <p>Top Cinangka Hotel adalah sebuah hotel mewah yang terletak di Cinangka,<p> sebuah tempat yang dikenal karena
                keindahan alamnya di Indonesia. Dengan </p><p>desain yang elegan dan modern, hotel ini menawarkan pengalaman
                menginap </p>yang nyaman dan mewah bagi para tamunya.</p>
        </div>
    </div>
</body>

</html>
