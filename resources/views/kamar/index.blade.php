<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Kamar List</h1>
    <a href="{{ route('kamar.create') }}">Create New Kamar</a>
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kamar</th>
                <th>Tipe Kamar</th>
                <th>Harga</th>
                <th>Foto Kamar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamar as $item)
                <tr>
                    <td>{{ $item->id_kamar }}</td>
                    <td>{{ $item->nama_kamar }}</td>
                    <td>{{ $item->tipe_kamar }}</td>
                    <td>{{ $item->harga }}</td>
                    <td><img src="/images/{{ $item->foto_kamar }}" width="100"></td>
                    <td>
                        <a href="{{ route('kamar.edit', $item->id_kamar) }}">Edit</a>
                        <form action="{{ route('kamar.destroy', $item->id_kamar) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
