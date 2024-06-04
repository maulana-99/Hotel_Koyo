<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container-card-reservasi {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-reservasi {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            padding: 20px;
            margin: 10px;
            transition: transform 0.2s;
            flex: 1;
            min-width: 250px;
            cursor: pointer;
        }

        .card-reservasi:hover {
            transform: scale(1.05);
        }

        .card-reservasi p {
            margin: 10px 0;
            color: #333;
        }

        .nama_kamar {
            font-size: 1.2em;
            font-weight: bold;
        }

        .check_in,
        .check_out {
            color: #555;
        }

        .tipe_kamar {
            font-size: 1em;
            color: #007bff;
        }

        .harga_kamar {
            font-size: 1.1em;
            color: #28a745;
            font-weight: bold;
        }

        /* Tambahan style untuk mobile */
        @media (max-width: 600px) {
            .container-card-reservasi {
                flex-direction: column;
                align-items: center;
            }

            .card-reservasi {
                max-width: 100%;
            }
        }
        .alrt-p{
            background: #555
        }
    </style>
</head>

<body>

    @if ($reservasi->isEmpty())
        <div class="alrt-p">
            <p>Anda belum memesan/mereservasi kamar.</p>
        </div>
    @else
        <div class="container-card-reservasi">
            @foreach ($reservasi as $item)
                <div class="card-reservasi" onclick="showDetails({{ json_encode($item) }})">
                    <p class="nama_kamar">Nama kamar: {{ $item->nama_kamar }}</p>
                    <p class="check_in">Check in: {{ $item->check_in }}</p>
                    <p class="check_out">Check out: {{ $item->check_out }}</p>
                    <p class="tipe_kamar">Tipe: {{ $item->tipe_kamar }}</p>
                    <p class="quantity">Banyak kamar: {{ $item->quantity }}</p>
                    <p class="harga_kamar">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    @endif
    <script>
        function showDetails(item) {
            alert(
                `Nama kamar: ${item.nama_kamar}\n` +
                `Check in: ${item.check_in}\n` +
                `Check out: ${item.check_out}\n` +
                `Tipe: ${item.tipe_kamar}\n` +
                `Banyak kamar: ${item.quantity}\n` +
                `Harga: Rp ${item.harga}`
            );
        }
    </script>
</body>

</html>
