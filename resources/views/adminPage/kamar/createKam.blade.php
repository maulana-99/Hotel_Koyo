<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/createKam.css') }}">
    <title>Create Kamar</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.popup {
    display: none;
    position: fixed;
    top: 10px;
    left: 0;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    border-radius: 10px;
    width: 600px;
    padding: 20px;
}

.popup-content h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="file"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.form-group textarea {
    height: 100px;
    resize: none;
}

.button-group {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.button-group button {
    width: 48%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.button-group .cancel-button {
    background-color: #dc3545;
    color: white;
}

.button-group #submitButton {
    background-color: #28a745;
    color: white;
}

.error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

    </style>

<body>
    <div class="popup" id="popupFormCreate" style="{{ $errors->any() ? 'display:flex;' : '' }}">
        <div class="popup-content">
            <h1>Tambah Data Kamar</h1>
            <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container-form-group">
                    <div class="form-group">
                        <label for="nama_kamar">Kamar:</label>
                        <input type="text" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}" required>
                        @error('nama_kamar')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipe_kamar">Tipe Kamar:</label>
                        <input type="text" id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar') }}" required>
                        @error('tipe_kamar')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="number" id="harga" name="harga" min=0 value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_kamar">Foto:</label>
                        <input type="file" id="foto_kamar" name="foto_kamar" required>
                        @error('foto_kamar')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-group">
                        <button type="button" class="cancel-button" id="closePopupCreate">Batal</button>
                        <button type="submit" id="submitButton">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openPopupCreate').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('popupFormCreate').style.display = 'flex';
        });

        document.getElementById('closePopupCreate').addEventListener('click', function() {
            document.getElementById('popupFormCreate').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popupFormCreate')) {
                document.getElementById('popupFormCreate').style.display = 'none';
            }
        });
    </script>
</body>

</html>
