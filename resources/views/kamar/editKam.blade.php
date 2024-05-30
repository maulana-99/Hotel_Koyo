<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="popup" id="editPopup">
        <div class="popup-content">
            <h2>Edit Kamar</h2>
            {{-- <form id="editForm" action="{{ route('kamar.update', ['kamar' => $item->id]) }}" method="POST" --}}
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
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
                <button type="submit" class="create-button">Update</button>
                <button type="button" class="delete-button" id="closeEditPopup">Cancel</button>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');
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
