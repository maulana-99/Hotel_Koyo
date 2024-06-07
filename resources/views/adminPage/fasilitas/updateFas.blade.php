<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .popup-content h2 {
            text-align: center;
            padding: 20px;
        }

        .popup-content .input-container {
            display: flex;
            align-items: center;
            /* Mengatur input agar berada di tengah vertikal */
            margin-bottom: 20px;
        }

        /* Gaya CSS untuk elemen-elemen dalam struktur HTML */
        label {
            display: block;
            /* Membuat label menjadi blok agar tampil di baris baru */
            margin-bottom: 5px;
            /* Menambahkan jarak bawah antara label dan input */
            color: #333;
            /* Warna teks label */
            text-align: left;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 400px;
            /* Mengisi lebar maksimal */
            padding: 10px;
            /* Padding untuk input */
            border: 1px solid #ccc;
            /* Garis tepi input */
            border-radius: 5px;
            /* Sudut input */
            box-sizing: border-box;
            /* Ukuran kotak total termasuk padding dan border */
            margin-bottom: 10px;
            /* Jarak bawah antara input */
        }

        textarea {
            resize: vertical;
            /* Memungkinkan pemosisian vertikal input */
        }

        .button-container {
            display: flex;
            /* Menampilkan tombol dalam baris */
            justify-content: center;
            /* Menempatkan tombol di tengah */
            align-items: center;
            margin-top: 20px;
            /* Menambahkan jarak atas */
        }

        .submit-button,
        .cancel-button {
            padding: 10px 20px;
            /* Padding tombol */
            border: none;
            /* Tanpa batas */
            border-radius: 5px;
            /* Sudut tombol */
            cursor: pointer;
            /* Mengubah kursor saat mengarah ke tombol */
        }

        .submit-button {
            background-color: #44ff00;
            /* Warna latar belakang tombol submit */
            color: #fff;
            /* Warna teks tombol submit */
        }

        .cancel-button {
            background-color: #ff0000;
            /* Warna latar belakang tombol cancel */
            color: #fff;
            /* Warna teks tombol cancel */
        }

        .submit-button:hover {
            background-color: #15b300;
            /* Warna latar belakang tombol submit saat dihover */
        }

        .cancel-button:hover {
            background-color: #fb3d3d;
            /* Warna latar belakang tombol cancel saat dihover */
        }

        .submit-button:hover {
            background-color: #15b300;
            /* Warna latar belakang tombol submit saat dihover */
        }

        .cancel-button:hover {
            background-color: #fb3d3d;
            /* Warna latar belakang tombol cancel saat dihover */
        }
    </style>
</head>

<body>
    <!-- Update Fasilitas Modal -->
    <div id="updateFasilitasModal" class="popup">
        <div class="popup-content">
            <form id="updateFasilitasForm" action="{{ route('fasilitas.update', ['id' => 0]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2>Update Fasilitas</h2>
                <input type="hidden" name="id" id="updateFasilitasId">
                <div>
                    <label for="nama_fasilitas">Nama Fasilitas:</label>
                    <input type="text" id="nama_fasilitas" name="nama_fasilitas" required>
                </div>
                <div>
                    <label for="deskripsi_fasilitas">Deskripsi Fasilitas:</label>
                    <textarea id="deskripsi_fasilitas" name="deskripsi_fasilitas" required></textarea>
                </div>
                <div>
                    <label for="foto_fasilitas">Foto Fasilitas:</label>
                    <input type="file" id="foto_fasilitas" name="foto_fasilitas" accept="image/*">
                </div>
                <div class="btn-container">
                    <button type="button" class="cancel-button" onclick="closeUpdateModal()">Cancel</button>
                    <button type="submit" class="submit-button">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const deskripsi = this.getAttribute('data-deskripsi');
                const foto = this.getAttribute('data-foto');

                document.getElementById('updateFasilitasId').value = id;
                document.getElementById('nama_fasilitas').value = nama;
                document.getElementById('deskripsi_fasilitas').value = deskripsi;

                const form = document.getElementById('updateFasilitasForm');
                // form.action = {{ url('admin/fasilitas') }}/${id};
                form.action = "{{ url('admin/fasilitas') }}/" + id;

                document.getElementById('updateFasilitasModal').style.display = 'flex';
            });
        });

        function closeUpdateModal() {
            document.getElementById('updateFasilitasModal').style.display = 'none';
        }
    </script>
</body>

</html>
