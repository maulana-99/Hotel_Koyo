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
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Gaya untuk judul */
h1 {
    text-align: center;
}

/* Gaya untuk tautan create */
.create-link {
    text-decoration: none;
    color: blue;
    display: inline-block;
    margin-bottom: 10px;
}

.create-link:hover {
    text-decoration: underline;
}

/* Gaya untuk alert */
.alert {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

/* Gaya untuk tabel */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Gaya untuk header tabel */
th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Gaya untuk tombol edit dan hapus */
.edit-button, .delete-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 5px 10px;
    cursor: pointer;
    margin-right: 5px;
}

.edit-button:hover, .delete-button:hover {
    background-color: #0056b3;
}
/* Gaya untuk gambar fasilitas */
.fasilitas-image {
    max-width: 10px; /* Sesuaikan dengan ukuran yang diinginkan */
}

    </style>
</head>
@include('component.navbarAdmin')
@include('component.sidebar')
<body>
    <div class="table-container">
        <h1>Daftar Fasilitas</h1>
        <a href="#" id="openPopupCreate">Create</a>
        <div class="alert"> <!-- Contoh menggunakan komponen alert -->
            Pesan alert di sini.
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Fasilitas</th>
                    <th>Deskripsi Fasilitas</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitas as $item)
                    <tr>
                        <td>{{ $item->nama_fasilitas }}</td>
                        <td>{{ $item->deskripsi_fasilitas }}</td>
                        <td>
                            @if ($item->foto_fasilitas)
                                <img src="/storage/{{ $item->foto_fasilitas }}" alt="Foto Fasilitas">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            <a href="#" class="edit-button" data-id="{{ $item->id }}" data-nama="{{ $item->nama_fasilitas }}" data-deskripsi="{{ $item->deskripsi_fasilitas }}" data-foto="{{ $item->foto_fasilitas }}">Edit</a>
                            <form action="{{ route('deleteFasilitas', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');">
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
    
    @include('component.createFas')
    @include('component.updateFas')

</body>

</html>
