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
        display: flex;
        margin-bottom: 20px;
    }

    .form-group label {
        width: 100%;
        margin-right: 10px;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .popup-content .button-container {
        display: flex;
        justify-content: center;
    }

    .popup-content .button-container button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 150px;
        margin-right: 30px;
    }

    .popup-content .button-container .submit-button {
        background-color: #44ff00;
        color: #fff;
    }

    .popup-content .button-container .submit-button:hover {
        background-color: #15b300;
    }

    .popup-content .button-container .cancel-button {
        background-color: #ff0000;
        color: #ffffff;
    }

    .popup-content .button-container .cancel-button:hover {
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
                <div class="form-group" style="flex-direction: column">
                    <div class="label_width">
                        <label>Nama Fasilitas</label>
                    </div>
                    <input type="text" name="nama_fasilitas" required>
                </div>
                <div class="form-group" style="flex-direction: column">
                    <div class="label_width">
                        <label>Deskripsi Fasilitas</label>
                    </div>
                    <input type="text" name="deskripsi_fasilitas" required>
                </div>
                <div class="form-group" style="flex-direction: column">
                    <div class="label_width">
                        <label>Foto Fasilitas</label>
                    </div>
                    <input type="file" name="foto_fasilitas" required>
                </div>
                <div class="btn-container">
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
