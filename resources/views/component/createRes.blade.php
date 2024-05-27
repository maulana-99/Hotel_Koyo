<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Style for the overlay background */
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

        /* Style for the pop-up form */
        .popup {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
        }

        /* Style for the form elements */
        .popup form {
            display: flex;
            flex-direction: column;
        }

        .popup input,
        .popup textarea {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            margin-right: 10px;
            font-weight: bold;
            width: 150px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            justify-content: space-between;
            text-align: center;
        }

        .form-group input {
            flex: 1;
        }
        .form-btn {
    display: flex;
    padding: 16px;
    justify-content: space-between;
}

/* Ensure both buttons have the same height */
.submit-btn, .close-btn {
    height: 40px;
}

/* Add spacing between the buttons */
.submit-btn {
    background: rgb(58, 189, 60);
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    margin-left: 10px; /* Adjust this value to increase/decrease spacing */
}

.submit-btn:hover {
    background: rgb(31, 175, 33);
}

.close-btn {
    background: red;
    color: white;
    border: none;
    padding: 10px 20px; /* Ensure padding is consistent */
    cursor: pointer;
    border-radius: 4px;
    margin-right: 10px; /* Adjust this value to increase/decrease spacing */
}

.close-btn:hover {
    background: darkred;
}

        .overlay.active {
            visibility: visible;
        }

        .password-container {
            position: relative;
            flex: 1;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="overlay" id="popupOverlay">
        <div class="popup">
            <h2>Tambah Data Resepsionis</h2>
            <div id="alertContainer" class="alert alert-danger" style="display: none;">
                <ul id="errorList"></ul>
            </div>
            <form id="createForm" method="post" action="{{ route('create') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="name" id="name" name="name" required class="popup">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required class="popup">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required class="popup">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">&#128065;</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="password-container">
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="popup">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">&#128065;</span>
                    </div>
                </div>
                <div class="form-btn">
    <button type="button" class="close-btn" onclick="togglePopup()">Batal</button>
    <button type="submit" id="submitBtn" class="submit-btn">Konfirmasi</button>
</div>

            </form>
        </div>
    </div>

    <script>
        function togglePopup() {
            var overlay = document.getElementById('popupOverlay');
            overlay.classList.toggle('active');
        }

        document.getElementById('createForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var alertContainer = document.getElementById('alertContainer');
            var errorList = document.getElementById('errorList');
            errorList.innerHTML = '';
            alertContainer.style.display = 'none';

            var formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) {
                            var errors = data.errors[key];
                            errors.forEach(function(error) {
                                var h5 = document.createElement('h5');
                                h5.textContent = error;
                                errorList.appendChild(h5);
                            });
                        }
                    }
                    alertContainer.style.display = 'block';
                } else if (data.success) {
                    togglePopup();
                    alert('Receptionist created successfully.');

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while creating the receptionist.');
            });
        });

        function togglePasswordVisibility(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
    </script>
</body>

</html>
