<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            width: 100%;
            height: 100%;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            margin: 0 auto;
        }

        .popup-title {
            margin-top: 0;
            text-align: center;
        }

        .popup-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .form-item 
        .form-item label {
            width: 150px; /* Adjust as needed */
            margin-right: 10px;
        }

        .form-item input,
        .form-item select {
            flex: 1;
        }

        .foto-preview {
            display: block;
            margin-top: 5px;
            max-width: 100px;
        }

        .btn-container {
            margin-top: 20px;
            text-align: right;
        }

        .update-button,
        .cancel-button {
            padding: 8px 20px;
            margin-left: 10px;
        }

        .update-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .cancel-button {
            background-color: #f44336;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .label-right {
    text-align: right;
    margin-right: 10px; /* Adjust as needed */
    width: 10px; /* Adjust as needed */
}

    </style>
</head>

<body>
    <div class="popup" id="editPopup">
        <div class="popup-content">
            <h2 class="popup-title">Edit Kamar</h2>
            <form class="popup-form" id="editForm" action="{{ route('kamar.update', ['kamar' => $item->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="form-item">
                    <label for="editNamaKamar">Nama Kamar:</label>
                    <input type="text" name="nama_kamar" id="editNamaKamar" required>
                </div>
                <div class="form-item">
                    <label for="editTipeKamar">Tipe Kamar:</label>
                    <select name="tipe_kamar" id="editTipeKamar" required>
                        <option value="regular">Regular</option>
                        <option value="delux">Delux</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="editKapasitas">Kapasitas Kamar:</label>
                    <select name="kapasitas" id="editKapasitas" required>
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="editJenisKasur">Jenis Kasur:</label>
                    <select name="jenis_kasur" id="editJenisKasur" required>
                        <option value="twin">Twin</option>
                        <option value="king">King</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="editHarga">Harga:</label>
                    <input type="number" name="harga" id="editHarga" required>
                </div>
                <div class="form-item">
                    <label for="editFoto" class="label-right">Foto Kamar:</label>
                    <input type="file" name="foto_kamar" id="editFoto">
                    <img class="foto-preview" id="editFotoPreview" src="" alt="Foto Kamar">
                </div>
                <div class="btn-container">
                    <button type="submit" class="update-button">Update</button>
                    <button type="button" class="cancel-button" id="closeEditPopup">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const editPopup = document.getElementById('editPopup');
            const closeEditPopupButton = document.getElementById('closeEditPopup');
            const editForm = document.getElementById('editForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = button.getAttribute('data-id');
                    const nama = button.getAttribute('data-nama');
                    const tipe = button.getAttribute('data-tipe');
                    const kapasitas = button.getAttribute('data-kapasitas');
                    const jenis = button.getAttribute('data-jenis');
                    const harga = button.getAttribute('data-harga');
                    const foto = button.getAttribute('data-foto');

                    editForm.action = `/kamar/${id}`;
                    document.getElementById('editId').value = id;
                    document.getElementById('editNamaKamar').value = nama;
                    document.getElementById('editTipeKamar').value = tipe;
                    document.getElementById('editKapasitas').value = kapasitas;
                    document.getElementById('editJenisKasur').value = jenis;
                    document.getElementById('editHarga').value = harga;
                    document.getElementById('editFotoPreview').src = foto;

                    editPopup.style.display = 'flex';
                });
            });

            closeEditPopupButton.addEventListener('click', function() {
                editPopup.style.display = 'none';
            });
        });
    </script>
</body>

</html>
