<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Resepsionis</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    button {
        margin: 20px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        visibility: hidden;
    }

    .popup {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
        position: relative;
    }

    .popup form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .popup .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0;
        width: 100%;
    }

    .popup .form-group label {
        flex: 1;
        text-align: center;
        margin-right: 10px;
    }

    .popup .form-group input,
    .popup .form-group textarea {
        flex: 2;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .close-btn {
        background: red;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .close-btn:hover {
        background: darkred;
    }

    .submit-btn {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    .submit-btn:hover {
        background: #218838;
    }

    .overlay.active {
        visibility: visible;
    }
</style>

<body>

    <div class="overlay" id="popupFormCreate" style="{{ $errors->any() ? 'visibility: visible;' : '' }}">
        <div class="popup">
            <h2>Create Resepsionis</h2>
            @include('component.error')
            <form action="{{ route('createResepsionis') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Resepsionis</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Resepsionis</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="form-btn">
                    <button type="button" class="close-btn" id="closePopupCreate">Cancel</button>
                    <button type="submit" class="submit-btn">Simpan</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('openPopupCreate').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('popupFormCreate').style.visibility = 'visible';
        });

        document.getElementById('closePopupCreate').addEventListener('click', function() {
            document.getElementById('popupFormCreate').style.visibility = 'hidden';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popupFormCreate')) {
                document.getElementById('popupFormCreate').style.visibility = 'hidden';
            }
        });
    </script>
</body>

</html>
