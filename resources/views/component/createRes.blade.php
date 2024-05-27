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

    .popup-content .button-container {
        display: flex;
        justify-content: space-between;
    }

    .popup-content .button-container button {
        width: 48%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .popup-content .button-container .submit-button {
        background-color: #007bff;
        color: #fff;
    }

    .popup-content .button-container .submit-button:hover {
        background-color: #0056b3;
    }

    .popup-content .button-container .cancel-button {
        background-color: #ccc;
        color: #333;
    }

    .popup-content .button-container .cancel-button:hover {
        background-color: #aaa;
    }
</style>

<body>
    <div class="popup" id="popupFormCreate" style="{{ $errors->any() ? 'display:flex;' : '' }}">
        <div class="popup-content">
            <h2>Create Resepsionis</h2>
            @include('component.error')
            <form action="{{ route('createResepsionis') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Nama Resepsionis</label>
                    <input type="text" placeholder="Your Name" id="name" name="name" required>
                </div>

                <div>
                    <label>Email Resepsionis</label>
                    <input type="email" placeholder="Your Email" id="email" name="email" required>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" id="password" name="password" required placeholder="Password">
                </div>

                <div>
                    <label>Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="Password Confirm">
                </div>

                <div class="button-container">
                    <button type="button" class="cancel-button" id="closePopupCreate">Cancel</button>
                    <button type="submit" class="submit-button">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('openPopupCreate').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('popupFormCreate').style.display = 'flex';
        });

        document.getElementById('closePopupCreate').addEventListener('click', function() {
            document.getElementById('popupFormCreate').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popupFormCreate')) {
                document.getElementById('popupFormCreate').style.display = 'none';
            }
        });
    </script>
</body>


</html>
