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
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            width: fit-content;
            height: 100%;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            overflow-y: auto;
            /* Tambahkan ini */
            overflow-x: hidden;
            height: 80%;
        }

        .popup-title {
            margin-top: 0;
            text-align: center;
        }

        .popup-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            align-items: left;
            justify-content: left;
            text-align: left;
        }

        .form-item8 img {
            width: 150px;
            margin-right: 20px;
            text-align: center;
            overflow: hidden;
        }

        .form-item label {
            width: 150px;
            margin-right: 100px;
            text-align: right;
            overflow: hidden;
            /* Tambahkan ini */
            white-space: nowrap;
            /* Tambahkan ini */
            text-overflow: ellipsis;
            /* Tambahkan ini */
        }

        .form-item input,
        .form-item select {
            flex: 1;
        }

        .foto-preview {
            display: block;
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


        select {
            box-sizing: border-box;
            text-align: left;
        }

        select {
            margin-right: 200px;
        }

        input {
            margin-right: 200px;
        }

        input #editfoto {
            margin-left: 700px;
        }

        textarea {
            margin-right: 200px;
        }

        .from-item #editkamar {}

        .btn-container {
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .form-group input{
            max-width: 77%;
        }

        .label_width{
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="popup" id="editPopup">
        <div class="popup-content">
            <h2 class="popup-title">Edit Kamar</h2>
            <form class="popup-form" id="editForm" action="{{ route('kamar.update', ['kamar' => $item]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="form-group">
                    <div class="label_width">
                        <label for="editNamaKamar">Nama Kamar:</label>
                    </div>
                    <input type="text" name="nama_kamar" id="editNamaKamar" required>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="editTipeKamar">Tipe Kamar:</label>
                    </div>
                    <select name="tipe_kamar" id="editTipeKamar" required>
                        <option value="regular">Regular</option>
                        <option value="delux">Delux</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="editKapasitas">Kapasitas Kamar:</label>
                    </div>
                    <select name="kapasitas" id="editKapasitas" required>
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="editJenisKasur">Jenis Kasur:</label>
                    </div>
                    <select name="jenis_kasur" id="editJenisKasur" required>
                        <option value="twin">Twin</option>
                        <option value="king">King</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="quantity">Quantity:</label>
                    </div>
                    <input type="number" name="quantity" id="editQuantity" required>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="editHarga">Harga:</label>
                    </div>
                    <input type="number" name="harga" id="editHarga" required>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="deskripsi">Deskripsi:</label>
                    </div>
                    <input type="text" name="deskripsi" id="editDeskripsi" ols="30" rows="10" required>
                </div>
                <div class="form-group">
                    <div class="label_width">
                        <label for="editFoto" class="label-right">Foto Kamar:</label>
                    </div>
                    <input type="file" name="foto_kamar" id="editFoto">
                    <img class="foto-preview" id="editFotoPreview" src="" alt="Foto Kamar">
                </div>
                <div class="btn-container">
                    <button type="button" class="cancel-button" id="closeEditPopup">Cancel</button>
                    <button type="submit" class="update-button">Update</button>
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
                    const quantity = button.getAttribute('data-quantity');
                    const deskripsi = button.getAttribute('data-deskripsi');
                    const harga = button.getAttribute('data-harga');
                    const foto = button.getAttribute('data-foto');

                    document.getElementById('editId').value = id;
                    document.getElementById('editNamaKamar').value = nama;
                    document.getElementById('editTipeKamar').value = tipe;
                    document.getElementById('editKapasitas').value = kapasitas;
                    document.getElementById('editJenisKasur').value = jenis;
                    document.getElementById('editQuantity').value = quantity;
                    document.getElementById('editDeskripsi').value = deskripsi;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
