<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Fasilitas</title>
    <style>
        /* Gaya untuk container tabel */
        .table-container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: calc(100% - 240px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 100%;
            overflow-y: scroll;
            margin-left: 250px;
            position: fixed;
        }

        /* Gaya untuk judul */
        .table-container h1 {
            text-align: center;
            padding: 70px;
        }

        .button-container {
            padding: 10px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            float: right;
            margin-right: 20px;
            /* Tambahkan ini */
        }

        #openPopupCreate {
            text-decoration: none;
            color: rgb(255, 255, 255);
            background-color: #36b300;
            padding: 10px 20px;
            border-radius: 3px;
            /* Menyesuaikan tombol ke kanan */
        }

        #openPopupCreate:hover {
            text-decoration: none;
            background-color: #1cd616;
        }

        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Gaya untuk header tabel */
        th,
        td {
            background-color: #f5f5f5;
            border: 1px solid #D9D9D9;
            padding: 8px;
            text-align: center;
            /* Default alignment */
        }

        th {
            background-color: #979797;
            font-size: 16px;
        }

        /* Gaya untuk tombol edit dan hapus */
        .edit-button {
            background-color: #f8b626;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 5px 14px;
            cursor: pointer;
            margin-right: 5px;
            text-decoration: none;
        }

        .delete-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 6px 10px;
            cursor: pointer;
            margin-right: 5px;
            text-decoration: none;
        }

        .edit-button:hover {
            background-color: #fdbf39;
        }

        .delete-button:hover {
            background-color: #f63030;
        }

        /* Table Image Max Width */
        .table_max_width {
            max-width: 15rem;
        }
    </style>
</head>
<body>
    @include('component.navbarAdmin')
    @include('component.sidebar')
    <div class="table-container">
        <h1>Daftar Fasilitas</h1>
        <div class="button-container">
            <a href="#" id="openPopupCreate">Create</a>
        </div>
        @include('component.alert')
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Fasilitas</th>
                    <th>Deskripsi Fasilitas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <div class="table_max_width">
                                <img style="max-width: 100%" src="/images/{{ $item->foto_fasilitas }}"
                                    alt="Foto Fasilitas">
                            </div>
                        </td>
                        <td>{{ $item->nama_fasilitas }}</td>
                        <td>{{ $item->deskripsi_fasilitas }}</td>
                        <td>
                            <button type="button" class="edit-button" data-id="{{ $item->id }}"
                                data-nama="{{ $item->nama_fasilitas }}"
                                data-deskripsi="{{ $item->deskripsi_fasilitas }}"
                                data-foto="/images/{{ $item->foto_fasilitas }}">Edit</button>

                            <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('adminPage.fasilitas.createFas')
    
    @if ($fasilitas->isEmpty())
        {{-- @include('adminPage.fasilitas.updateFas') --}}
    @else
        @include('adminPage.fasilitas.updateFas')
    @endif
</body>
</html>
