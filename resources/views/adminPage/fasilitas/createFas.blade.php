<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
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

.popup-content h1 {
    padding: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;

}

.form-group label {
    display: block;
    color: #333;
    text-align: left;
    margin-left: 50px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: calc(100% - 20px); /* Menyesuaikan lebar dengan padding */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.button-container {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.button-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.submit-button {
    background-color: #44ff00;
    color: #fff;
}

.submit-button:hover {
    background-color: #74fe62;
}

.cancel-button {
    background-color: #ff0000;
    color: #ffffff;
}

.cancel-button:hover {
    background-color: #fb3d3d;
}

</style>

<body>
    <div class="popup" id="popupFormCreate" style="{{ $errors->any() ? 'display:flex;' : '' }}">
        <div class="popup-content">
            <h1>Tambah Fasilitas</h1>
            @include('component.error')
            <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" id="nama_fasilitas" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_fasilitas">Deskripsi Fasilitas</label>
                    <textarea name="deskripsi_fasilitas" id="deskripsi_fasilitas" required></textarea>
                </div>
                <div class="form-group">
                    <label for="foto_fasilitas">Foto Fasilitas</label>
                    <input type="file" name="foto_fasilitas" id="foto_fasilitas" required>
                </div>
                <div class="button-container">
                    <button type="button" class="cancel-button" id="closePopupCreate">Cancel</button>
                    <button type="submit" class="submit-button">Simpan</button>
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
