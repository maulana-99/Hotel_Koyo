<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .popup {
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

        .popup-content {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
        }

        .popup-content h1 {
            text-align: left;
        }

        .popup-content label {
            margin-right: 10px;
            font-weight: bold;
            width: 150px;
        }

        .popup-content input,
        .popup-content textarea {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .popup-content .button-container {

            display: flex;
            padding: 16px;
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
            background: rgb(58, 189, 60);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            margin-left: 10px;
        }

        .popup-content .button-container .submit-button:hover {
            background: rgb(31, 175, 33);
        }

        .popup-content .button-container .cancel-button {
            background: red;
            color: white;
            border: none;
            padding: 10px 20px;
            /* Ensure padding is consistent */
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
        }

        .popup-content .button-container .cancel-button:hover {
            background: darkred;
        }
    </style>
</head>



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
