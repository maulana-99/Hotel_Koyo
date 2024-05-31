<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    a {
        text-decoration: none;
        color: #007BFF;
    }

    a:hover {
        text-decoration: underline;
    }

    p {
        color: green;
        font-weight: bold;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
    }

    table thead {
        background-color: #007BFF;
        color: #fff;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Image Styles */
    img {
        display: block;
        margin: 0 auto;
        border-radius: 5px;
        width: 300px;
    }

    /* Button Styles */
    .create-button,
    .edit-button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px 0;
        text-align: center;
        display: inline-block;
    }

    .create-button:hover,
    .edit-button:hover {
        background-color: #218838;
    }

    /* Delete Button Styles */
    .delete-button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 5px;
    }

    .delete-button:hover {
        background-color: #c82333;
    }

    .popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 90%;
        max-width: 500px;
        text-align: left;
    }
</style>

<body>
    <h1>Kamar List</h1>
    <a href="#" id="openPopupCreate">Create</a>
    @include('component.alert')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kamar</th>
                <th>Tipe Kamar</th>
                <th>Kapasitas Kamar</th>
                <th>Jenis Kasur</th>
                <th>Harga</th>
                <th>Foto Kamar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamar as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_kamar }}</td>
                    <td>{{ $item->tipe_kamar }}</td>
                    <td>{{ $item->jenis_kasur }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td>{{ $item->harga }}</td>
                    <td><img src="/images/{{ $item->foto_kamar }}" width="100"></td>
                    <td>
                        <button type="button" class="edit-button" data-id="{{ $item->id }}"
                            data-nama="{{ $item->nama_kamar }}" data-tipe="{{ $item->tipe_kamar }}"
                            data-kapasitas="{{ $item->kapasitas }}" data-jenis="{{ $item->jenis_kasur }}"
                            data-harga="{{ $item->harga }}" data-foto="/images/{{ $item->foto_kamar }}">Edit</button>

                        <form action="{{ route('kamar.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('adminPage.kamar.createKam')
    @if ($kamar->isEmpty()) 
        {{-- @include('kamar.editKam') --}}
    @else
        @include('adminPage.kamar.editKam')
    @endif
</body>

</html>
