<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img/tch_lingkaran.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{asset('css/tamu_reservasi.css')}}">
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
        <div class="room-card" onclick="openModal('single-room')">
            <img src="{{asset('img/kamar.png')}}" alt="Single Room" class="room-image">
            <div class="room-info">
                <h3>Single Room</h3>
                <p>Rp. 500,000 / night</p>
                <img src="{{asset('img/room-info-image.png')}}" alt="Room Info Image"> <!-- Add image here -->
            </div>
        </div>
        <!-- Repeat for other room cards -->
    </div>

    <div id="room-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-body">
                <div class="modal-left">
                    <img src="{{asset('img/kamar.png')}}" alt="kamar" class="kamar">
                    <div class="deskripsi-kamar">
                        <h2>Deskripsi Kamar</h2>
                        <p>Deskripsi lengkap kamar di sini...</p>
                    </div>
                </div>
                <div class="modal-right">
                    <div class="harga">
                        <h2>Tipe Kamar</h2>
                        <p>Rp 500,000 per malam</p>
                        <h2>Kamar</h2>
                        <p>Rp 500,000 per malam</p>
                        <h2>Harga Kamar</h2>
                        <p>Rp 500,000 per malam</p>
                        <button class="reservasi-button">Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("room-modal");

        // Function to open the modal
        function openModal(roomType) {
            // Customize modal content based on roomType if needed
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Close the modal when the user clicks outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
