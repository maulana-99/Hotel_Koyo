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

        .popup-content h2 {
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
                <div class="button-container">
                    <button type="submit" class="submit-button">Update</button>
                    <button type="button" class="cancel-button" onclick="closeUpdateModal()">Cancel</button>
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
                form.action = `{{ url('admin/fasilitas') }}/${id}`;

                document.getElementById('updateFasilitasModal').style.display = 'flex';
            });
        });

        function closeUpdateModal() {
            document.getElementById('updateFasilitasModal').style.display = 'none';
        }
    </script>
</body>

</html>
