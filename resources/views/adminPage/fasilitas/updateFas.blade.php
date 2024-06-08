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
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            text-align: left;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        textarea {
            resize: vertical;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .submit-button,
        .cancel-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button {
            background-color: #4caf50;
            color: #fff;
        }

        .cancel-button {
            background-color: #ff0000;
            color: #fff;
        }

        .submit-button:hover {
            background-color: #388e3c;
        }

        .cancel-button:hover {
            background-color: #fb3d3d;
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
