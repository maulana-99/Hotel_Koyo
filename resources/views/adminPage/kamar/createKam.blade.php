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

    .popup-content h2 {
        text-align: center;
        font-size: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
        width: 100%;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="file"],
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .container-form-group {
        width: 100%
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

    .no_padding_margin {
        padding: 0;
        margin: 0;
    }
</style>

<body>
    <div class="popup" id="popupFormCreate" style="{{ $errors->any() ? 'display:flex;' : '' }}">
        <div class="popup-content">
            <h2>Tambah Data Kamar</h2>
            <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data"
                style="justify-content: center">
                @csrf
                @include('component.error')
                <div class="container-form-group">
                    <div class="form-group">
                        <div class="label_width">
                            <label for="nama_kamar">Nama Kamar:</label>
                        </div>
                        <input type="text" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="tipe_kamar">Tipe Kamar:</label>
                        </div>
                        <input type="text" id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="jenis_kasur">Pilih Jenis Kasur:</label>
                        </div>
                        <select id="jenis_kasur" name="jenis_kasur">
                            <option value="twin">Twin</option>
                            <option value="king">King</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="kapasitas">Pilih Kapasitas Orang:</label>
                        </div>
                        <select id="kapasitas" name="kapasitas">
                            <option value="1">1 orang</option>
                            <option value="2">2 Orang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="quantity">Jumlah Kamar:</label>
                        </div>
                        <input type="number" id="quantity" name="quantity" min=0 value="{{ old('quantity') }}" required>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="deskripsi">Deskripsi:</label>
                        </div>
                        <input type="text" name="deskripsi" required>{{ old('deskripsi') }}
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="harga">Harga:</label>
                        </div>
                        <input type="number" id="harga" name="harga" min=0 value="{{ old('harga') }}" required>
                    </div>
                    <div class="form-group">
                        <div class="label_width">
                            <label for="foto_kamar">Foto:</label>
                        </div>
                        <input type="file" id="foto_kamar" name="foto_kamar" required>
                    </div>
                    <div class="btn-container">
                        <button type="button" class="cancel-button" id="closePopupCreate">Cancel</button>
                        <button type="submit" class="update-button" id="submitButton">Simpan</button>
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
