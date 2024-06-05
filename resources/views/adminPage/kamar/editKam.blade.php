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
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            width: fit-content;
            height: 100%;
        }
        .popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 100%;
    overflow-y: auto; /* Tambahkan ini */
    overflow-x: hidden;
    height: 80%;
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

        .form-item1 {
    margin-right: 200px;
    display: flex;
    width: fit-content;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
    text-align: right;
}
        .form-item2 {
    margin-right: 10px;
    display: flex;
    width: 500px;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
    text-align: right;
}
        .form-item3 {
    margin-right: 10px;
    display: flex;
    width: 500px;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
    text-align: right;
}
        .form-item4 {
    margin-right: 10px;
    display: flex;
    width: 500px;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
}
        .form-item5 {
    margin-right: 10px;
    display: flex;
    width: 500px;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
}
        .form-item6 {
    margin-right: 10px;
    display: flex;
    width: 500px;
    align-items: center;
    overflow: hidden; /* Tambahkan ini */
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
    overflow: hidden; /* Tambahkan ini */
    white-space: nowrap; /* Tambahkan ini */
    text-overflow: ellipsis; /* Tambahkan ini */
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
        
   
        select{
            box-sizing: border-box;
            text-align: left;
        }
        select{
            margin-right: 200px;
        }
        input{
            margin-right: 200px;
        }
        input #editfoto{
            margin-left: 700px;
        }
        textarea{
            margin-right: 200px;
        }
        .from-item #editkamar{
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
                <div class="form-item1">
                    <label for="editNamaKamar">Nama Kamar:</label>
                    <input type="text" name="nama_kamar" id="editNamaKamar" required>
                </div>
                <div class="form-item2">
                    <label for="editTipeKamar">Tipe Kamar:</label>
                    <select name="tipe_kamar" id="editTipeKamar" required>
                        <option value="regular">Regular</option>
                        <option value="delux">Delux</option>
                    </select>
                </div>
                <div class="form-item3">
                    <label for="editKapasitas">Kapasitas Kamar:</label>
                    <select name="kapasitas" id="editKapasitas" required>
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                    </select>
                </div>
                <div class="form-item4">
                    <label for="editJenisKasur">Jenis Kasur:</label>
                    <select name="jenis_kasur" id="editJenisKasur" required>
                        <option value="twin">Twin</option>
                        <option value="king">King</option>
                    </select>
                </div>
                <div class="form-item5">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="editQuantity" required>
                </div>
                <div class="form-item6">
                    <label for="editHarga">Harga:</label>
                    <input type="number" name="harga" id="editHarga" required>
                </div>
                <div class="form-item7">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea type="text" name="deskripsi" id="editDeskripsi" ols="30" rows="10" required></textarea>
                </div>
                <div class="form-item8">
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
</body>

</html>
