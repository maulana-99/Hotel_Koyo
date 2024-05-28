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
            display: flex;
            justify-content: space-between;
        }

        li img {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Fasilitas</h1>
        <a href="#" id="openPopupCreate">Create</a>
        @include('component.alert')
        <ul>
            @foreach ($fasilitas as $item)
                <li>
                    <div class="text-fas">
                        <h2>{{ $item->nama_fasilitas }}</h2>
                        <p>{{ $item->deskripsi_fasilitas }}</p>
                    </div>

                    @if ($item->foto_fasilitas)
                        <img class="mb-3" src="asset/storage/{{ $item->foto_fasilitas }}" style="width: 150px;">
                    @else
                        Tidak ada foto
                    @endif

                    <div class="btn-action">
                        <a href="#" class="edit-button" data-id="{{ $item->id }}"
                            data-nama="{{ $item->nama_fasilitas }}" data-deskripsi="{{ $item->deskripsi_fasilitas }}"
                            data-foto="{{ $item->foto_fasilitas }}">Edit
                        </a>
                        <form action="{{ route('deleteFasilitas', $item->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @include('component.createFas')
    @include('component.updateFas')

</body>

</html>
