<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        li img {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <body>
        <div class="container">
            <h1>Daftar Fasilitas</h1>
            <a href="#" id="openPopup">Tambah Fasilitas</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <ul>
                @foreach ($fasilitas as $fasilita)
                    <li>
                        <h2>{{ $fasilita->nama_fasilitas }}</h2>
                        <p>{{ $fasilita->deskripsi_fasilitas }}</p>
                        @if ($fasilita->foto_fasilitas)
                            <img src="{{ asset('storage/' . $fasilita->foto_fasilitas) }}"
                                alt="{{ $fasilita->nama_fasilitas }}" width="100">
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @include('component.createFas')

    </body>

</html>
