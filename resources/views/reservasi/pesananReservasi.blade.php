<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="container-card-reservasi">
        <div class="card-reservasi">
            @if ($reservasi->isEmpty())
                <p>Anda belum memesan/mereservasi kamar.</p>
            @else
                @foreach ($reservasi as $item)
                    <p class="nama_kamar">{{ $item->nama_kamar }}</p>
                    <!-- Jika Anda ingin menampilkan informasi tambahan dari tabel kamar -->

                    <p class="check_in">{{ $item->check_in }}</p>
                    <p class="check_out">{{ $item->check_out }}</p>
                    <p class="tipe_kamar">{{ $item->kamar->tipe_kamar }}</p>
                    <p class="harga_kamar">{{ $item->kamar->harga }}</p>
                    <!-- Tambahan informasi lainnya sesuai kebutuhan -->
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
