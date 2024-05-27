<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
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
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
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
    }

    .popup button {
        padding: 10px;
        font-size: 16px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .popup button:hover {
        background: #218838;
    }

    .form-btn {
        display: flex;
    }

    .close-btn {
        background: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    .close-btn:hover {
        background: darkred;
    }

    /* Show the overlay when active */
    .overlay.active {
        visibility: visible;
    }
</style>

<body>
    <div class="overlay" id="popupOverlay">
        <div class="popup">
            <h2>Create</h2>
            <div id="alertContainer" class="alert alert-danger" style="display: none;">
                <ul id="errorList"></ul>
            </div>
            <form id="createForm" method="post" action="{{ route('createResepsionis') }}">
                @csrf
                <input type="text" placeholder="Your Name" id="name" name="name" required>
                <input type="email" placeholder="Your Email" id="email" name="email" required>
                <input type="password" id="password" name="password" required placeholder="Password">
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    placeholder="Password Confirm">
                <div class="form-btn">
                    <button type="submit" id="submitBtn">Submit</button>
                    <button type="button" class="close-btn" onclick="togglePopup()">Cancel</button>
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
            event.preventDefault(); // Prevent automatic form submission

            // Clear previous errors
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
                        // Show validation errors
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

                        // Show the success alert and then refresh the page after a short delay
                        setTimeout(function() {
                            location.reload(); // Refresh the page
                        }, 2000); // Delay for 2 seconds
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while creating the receptionist.');
                });
        });
    </script>
</body>


</html>
