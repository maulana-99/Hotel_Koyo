<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .popup {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        justify-content: center;
        /* Center the popup */
        align-items: center;
        /* Center the popup */
    }

    .popup-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
        max-width: 600px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    h2 {
        text-align: center;
    }

    .form-i {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button.create-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button.delete-button {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button.create-button:hover,
    button.delete-button:hover {
        opacity: 0.8;
    }

    img {
        display: block;
        margin-top: 10px;
        max-width: 100%;
        /* Ensure the image is responsive */
        height: auto;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
    }
</style>

<body>
    <div class="popup" id="editPopup">
        <div class="popup-content">
            <h2>Edit Kamar</h2>
            <form id="editForm" action="{{ route('kamar.update', ['kamar' => $item->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="form-i">
                    <div>
                        <label for="editNamaKamar">Nama Kamar:</label>
                        <input type="text" name="nama_kamar" id="editNamaKamar" required>
                    </div>
                    <div>
                        <label for="editTipeKamar">Tipe Kamar:</label>
                        <select name="tipe_kamar" id="editTipeKamar" required>
                            <option value="regular">Regular</option>
                            <option value="delux">Delux</option>
                        </select>
                    </div>
                    <div>
                        <label for="editKapasitas">Kapasitas Kamar:</label>
                        <select name="kapasitas" id="editKapasitas" required>
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                        </select>
                    </div>
                    <div>
                        <label for="editJenisKasur">Jenis Kasur:</label>
                        <select name="jenis_kasur" id="editJenisKasur" required>
                            <option value="twin">Twin</option>
                            <option value="king">King</option>
                        </select>
                    </div>
                    <div>
                        <label for="editHarga">Harga:</label>
                        <input type="number" name="harga" id="editHarga" required>
                    </div>
                    <div>
                        <label for="editFoto">Foto Kamar:</label>
                        <input type="file" name="foto_kamar" id="editFoto">
                        <img id="editFotoPreview" src="" alt="Foto Kamar" width="100">
                    </div>
                    <div class="btn-form">
                        <button type="submit" class="create-button">Update</button>
                        <button type="button" class="delete-button" id="closeEditPopup">Cancel</button>
                    </div>
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
