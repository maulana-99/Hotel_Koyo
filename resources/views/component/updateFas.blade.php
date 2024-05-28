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
        text-align: left;
    }

    .popup-content label {
        display: block;
        margin-bottom: 10px;
        color: #333;
    }

    .popup-content input,
    .popup-content textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
    }

    .button-container button {
        width: 48%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button-container .submit-button {
        background-color: #007bff;
        color: #fff;
    }

    .button-container .submit-button:hover {
        background-color: #0056b3;
    }

    .button-container .cancel-button {
        background-color: #ccc;
        color: #333;
    }

    .button-container .cancel-button:hover {
        background-color: #aaa;
    }
</style>

<body>
    <div class="popup" id="popupFormEdit">
        <div class="popup-content">
            <h1>Edit Fasilitas</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div>
                    <label>Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" id="editNama" required>
                </div>
                <div>
                    <label>Deskripsi Fasilitas</label>
                    <textarea name="deskripsi_fasilitas" id="editDeskripsi" required></textarea>
                </div>
                <div>
                    <label>Foto Fasilitas</label>
                    <input type="file" name="foto_fasilitas">
                    <input type="hidden" name="existing_foto" id="editFoto">
                </div>
                <div class="button-container">
                    <button type="button" class="cancel-button" id="closePopupEdit">Cancel</button>
                    <button type="submit" class="submit-button">Update</button>
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

        // Edit button click handler
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const deskripsi = this.getAttribute('data-deskripsi');
                const foto = this.getAttribute('data-foto');

                document.getElementById('editId').value = id;
                document.getElementById('editNama').value = nama;
                document.getElementById('editDeskripsi').value = deskripsi;
                document.getElementById('editFoto').value = foto;

                document.getElementById('popupFormEdit').style.display = 'flex';
            });
        });

        document.getElementById('closePopupEdit').addEventListener('click', function() {
            document.getElementById('popupFormEdit').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popupFormEdit')) {
                document.getElementById('popupFormEdit').style.display = 'none';
            }
        });
    </script>
</body>

</html>
