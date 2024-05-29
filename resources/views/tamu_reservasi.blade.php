<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{ asset('css/tamu_reservasi.css') }}">
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
            max-width: 800px;
            display: flex;
            flex-direction: row;
        }

        .popup-content .left {
            width: 60%;
            padding-right: 20px;
        }

        .popup-content .right {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .popup-content img {
            width: 100%;
            border-radius: 5px;
        }

        .popup-content h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 30%;
            margin-right: 10px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
        }

        .submit-button {
            background-color: #44ff00;
            color: #fff;
        }

        .submit-button:hover {
            background-color: #15b300;
        }

        .cancel-button {
            background-color: #ff0000;
            color: #ffffff;
        }

        .cancel-button:hover {
            background-color: #fb3d3d;
        }
    </style>
</head>

<body>
    @include('component.navbar')
    <div class="search-navbar">
        <form class="search-form">
            <div class="form-group">
                <label for="room-type">Room Type:</label>
                <select id="room-type" name="room-type" required>
                    <option value="">Cari Kamar</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <button type="submit" class="btn-search">Cari</button>
        </form>
    </div>
    <div class="room-cards">
        <div class="room-card" onclick="openModal('Single Room', 'Rp. 500,000 / night', '{{ asset('img/kamar.png') }}', 'Deskripsi untuk Single Room')">
            <a href="#" class="room-link">
                <img src="{{ asset('img/kamar.png') }}" alt="Single Room" class="room-image">
                <div class="room-info">
                    <h3>Single Room</h3>
                    <p>Rp. 500,000 / night</p>
                </div>
            </a>
        </div>
        <!-- Repeat for other room cards -->
    </div>

    <!-- Modal Popup -->
    <div class="popup" id="room-modal">
        <div class="popup-content">
            <div class="left">
                <img id="modal-room-image" src="" alt="Room Image">
                <h1 id="modal-room-type">Room Type</h1>
                <p id="modal-room-description">Room Description</p>
            </div>
            <div class="right">
                <h1 id="modal-room-price">Room Price</h1>
                <form>
                    <div class="form-group">
                        <label for="check-in">Check-In:</label>
                        <input type="date" id="check-in" name="check-in" required>
                    </div>
                    <div class="form-group">
                        <label for="check-out">Check-Out:</label>
                        <input type="date" id="check-out" name="check-out" required>
                    </div>
                    <div class="button-container">
                        <button type="button" class="cancel-button" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="submit-button">Reservasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script>
        var modal = document.getElementById("room-modal");

        function openModal(roomType, roomPrice, roomImage, roomDescription) {
            document.getElementById('modal-room-type').textContent = roomType;
            document.getElementById('modal-room-price').textContent = roomPrice;
            document.getElementById('modal-room-image').src = roomImage;
            document.getElementById('modal-room-description').textContent = roomDescription;
            modal.style.display = "flex";
        }

        function closeModal() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
