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

    .popup-content button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .popup-content button:hover {
        background-color: #0056b3;
    }

    .popup-close {
        display: block;
        text-align: right;
        color: #333;
        font-size: 20px;
        cursor: pointer;
    }
</style>

<body>
    <div class="popup" id="popupForm" style="{{ $errors->any() ? 'display:flex;' : '' }}">
        <div class="popup-content">
            <span class="popup-close" id="closePopup">&times;</span>
            <h1>Tambah Fasilitas</h1>

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('createFasilitas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" required>
                </div>
                <div>
                    <label>Deskripsi Fasilitas</label>
                    <textarea name="deskripsi_fasilitas" required></textarea>
                </div>
                <div>
                    <label>Foto Fasilitas</label>
                    <input type="file" name="foto_fasilitas" required>
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openPopup').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('popupForm').style.display = 'flex';
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('popupForm').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popupForm')) {
                document.getElementById('popupForm').style.display = 'none';
            }
        });
    </script>
</body>

</html>
