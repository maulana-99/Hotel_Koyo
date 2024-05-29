<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Kamar</h1>
<form action="{{ route('kamar.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="nama_kamar">Nama Kamar:</label>
        <input type="text" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar', $kamar->nama_kamar) }}" required>
    </div>
    <div>
        <label for="tipe_kamar">Tipe Kamar:</label>
        <select id="tipe_kamar" name="tipe_kamar" required>
            <option value="regular" {{ old('tipe_kamar', $kamar->tipe_kamar) == 'regular' ? 'selected' : '' }}>Regular</option>
            <option value="delux" {{ old('tipe_kamar', $kamar->tipe_kamar) == 'delux' ? 'selected' : '' }}>Delux</option>
        </select>
    </div>
    <div>
        <label for="kapasitas">Kapasitas:</label>
        <select id="kapasitas" name="kapasitas" required>
            <option value="1" {{ old('kapasitas', $kamar->kapasitas) == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('kapasitas', $kamar->kapasitas) == 2 ? 'selected' : '' }}>2</option>
        </select>
    </div>
    <div>
        <label for="jenis_kasur">Jenis Kasur:</label>
        <select id="jenis_kasur" name="jenis_kasur" required>
            <option value="twin" {{ old('jenis_kasur', $kamar->jenis_kasur) == 'twin' ? 'selected' : '' }}>Twin</option>
            <option value="king" {{ old('jenis_kasur', $kamar->jenis_kasur) == 'king' ? 'selected' : '' }}>King</option>
        </select>
    </div>
    <div>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="{{ old('harga', $kamar->harga) }}" required>
    </div>
    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
    </div>
    <div>
        <label for="foto_kamar">Foto Kamar:</label>
        <input type="file" id="foto_kamar" name="foto_kamar">
        @if ($kamar->foto_kamar)
            <img src="/images/{{ $kamar->foto_kamar }}" width="100">
        @endif
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>