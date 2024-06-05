<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kamar List</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* Content Styles */
        .content {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: calc(100% - 240px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 100%;
            overflow-y: auto;
            margin-left: 230px;
            padding: 20px;
            position: fixed;
        }

        .content h1 {
            padding: 50px;
            text-align: center;
        }

        .button_create {
            padding: 10px;
            background-color: #3dd229;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            float: right;
            margin-right: 30px;
        }

        .button_create:hover {
            background-color: #3fe02a;
        }

        /* Table Styles */
        .crud-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .crud-table th,
        .crud-table td {
            border: 1px solid #D9D9D9;
            padding: 8px;
            text-align: center;
        }

        .crud-table th {
            background-color: #9a9a9a;
            color: white;
        }

        .crud-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .crud-table tr:hover {
            background-color: #f1f1f1;
        }

        .crud-table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .crud-table td .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-right: 20px;
        }

        /* Edit Button Styles */
        .crud-table button.edit-btn {
            background-color: #f8b626;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .crud-table button.edit-btn:hover {
            background-color: #c4cc2c;
        }

        /* Delete Button Styles */
        .crud-table button.delete-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .crud-table button.delete-btn:hover {
            background-color: #bd2130;
        }

        /* Form Styles */
        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        form div {
            display: flex;
            align-items: center;
        }

        form input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #c3c3c3;
            border-radius: 4px;
            margin-right: 10px;
        }

        form button {
            padding: 10px;
            background-color: #5d91cd;
            color: #fff;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('component.navbarAdmin')
    @include('component.sidebar')
    <div class="content">
        <h1>Kamar List</h1>
        <a href="#" id="openPopupCreate" class="button_create">Create</a>
        @include('component.alert')
        <table class="crud-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Jenis Kasur</th>
                    <th>Kapasitas</th>
                    <th>Jumlah Kamar</th>
                    <th>Harga /malam</th>
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
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->harga }}</td>
                        <td hidden>{{ $item->deskripsi }}</td>
                        <td><img src="/images/{{ $item->foto_kamar }}" width="100"></td>
                        <td>
                            <div class="action-buttons">
                                <button type="button" class="edit-btn" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama_kamar }}" data-tipe="{{ $item->tipe_kamar }}"
                                    data-kapasitas="{{ $item->kapasitas }}" data-quantity="{{ $item->quantity }}"
                                    data-deskripsi="{{ $item->deskripsi }}" data-jenis="{{ $item->jenis_kasur }}"
                                    data-harga="{{ $item->harga }}"
                                    data-foto="/images/{{ $item->foto_kamar }}">Edit</button>

                                <form action="{{ route('kamar.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </div>
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
    </div>
</body>

</html>
