<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/createKam.css') }}">
    <title>Create Kamar</title>
</head>

<body>

    @include('component.sidebar')

    <h1>Create Kamar</h1>

    <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nama_kamar">Nama Kamar:</label>
            <input type="text" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}" required>
            @error('nama_kamar')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="tipe_kamar">Tipe Kamar:</label>
            <select id="tipe_kamar" name="tipe_kamar" required>
                <option value="" disabled selected>Pilih Tipe Kamar</option>
                <option value="regular" {{ old('tipe_kamar') == 'regular' ? 'selected' : '' }}>Regular</option>
                <option value="delux" {{ old('tipe_kamar') == 'delux' ? 'selected' : '' }}>Delux</option>
            </select>
            @error('tipe_kamar')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="jenis_kasur">Jenis Kasur:</label>
            <select id="jenis_kasur" name="jenis_kasur" required>
                <option value="" disabled selected>Pilih Tipe Kamar</option>
                <option value="king" {{ old('jenis_kasur') == 'kign' ? 'selected' : '' }}>King Bed</option>
                <option value="twin" {{ old('jenis_kasur') == 'twin' ? 'selected' : '' }}>Twin Bed</option>
            </select> 
            @error('jenis_kasur')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="kapasitas">Kapasitas:</label>
            <select id="kapasitas" name="kapasitas" required>
                <option value="" disabled selected>Pilih Kapasitas orang</option>
                <option value="1" {{ old('kapasitas') == '1' ? 'selected' : '' }}>1 orang</option>
                <option value="2" {{ old('kapasitas') == '2' ? 'selected' : '' }}>2 orang</option>
            </select>
            @error('kapasitas')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="foto_kamar">Foto Kamar:</label>
            <input type="file" id="foto_kamar" name="foto_kamar" required>
            @error('foto_kamar')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>

</body>

</html>
