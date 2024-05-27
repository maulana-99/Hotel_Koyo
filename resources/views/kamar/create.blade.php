<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
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
            <input type="text" id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar') }}" required>
            @error('tipe_kamar')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required>
            @error('harga')
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
        
        <button type="submit">Submit</button>
    </form>

</body>
</html>
