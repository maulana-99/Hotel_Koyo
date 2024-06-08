<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar Hotel</title>
    <link rel="stylesheet" href="{{ asset('css/reservasih.css') }}">
</head>

<body>
    @include('component.alert')
    @include('component.navbar')

    <div class="text">
        <h1>Reservation</h1>
    </div>
    <div class="room-list">
        @if ($kamar->isEmpty())
            <tr>
                <h2 colspan="5">No Data No Room</h2>
            </tr>
        @else
            @foreach ($kamar as $item)
                <div class="room-card">
                    <img src="/images/{{ $item->foto_kamar }}" alt="Room Image" width="300">
                    <div class="room-info">
                        <h2 class="room-name">{{ $item->nama_kamar }}</h2>
                        <p class="room-type">{{ $item->tipe_kamar }}</p>
                        <p class="room-price">Rp {{ number_format($item->harga, 0, ',', '.') }}/malam</p>
                        <p class="room-availability">Tersisa {{ $item->quantity }} kamar</p>
                        @if ($item->quantity > 0)
                            <button class="btn btn-primary"
                                onclick="openModal('modal{{ $item->id }}')">Book</button>
                        @else
                            <button class="btn-primary" disabled>Out of Stock</button>
                        @endif
                    </div>
                </div>
                <!-- Modal -->
                @if ($item->quantity > 0)
                    <div id="modal{{ $item->id }}" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('modal{{ $item->id }}')">&times;</span>

                            <div class="modal-content-lft">
                                <img src="/images/{{ $item->foto_kamar }}" alt="Room Image" class="room-image">
                                <h1>Deskripsi</h1>
                                <p class="room-description">{{ $item->deskripsi }}</p>
                            </div>
                            <div class="modal-content-rgt">
                                <h2>Tipe kamar</h2>
                                <p class="room-type"> {{ $item->tipe_kamar }}</p>
                                <h2>Tipe kasur</h2>
                                <p class="room-type"> {{ $item->jenis_kasur }} bed</p>
                                <p class="room-type">Kapasitas: {{ $item->kapasitas }} orang</p>
                                <p class="room-availability">Tersisa {{ $item->quantity }} kamar</p>
                                <h2 class="room-price">Rp {{ number_format($item->harga, 0, ',', '.') }}/malam</h2>
                                <form action="{{ route('reservasi.store') }}" method="POST" class="reservation-form">
                                    @csrf
                                    <input type="hidden" name="kamar_id" value="{{ $item->id }}">
                                    <div class="form-group flex">
                                        <div class="form-group-inner">
                                            <label for="nama_depan">Nama depan:</label>
                                            <input type="text" id="nama_depan" name="nama_depan"
                                                value="{{ old('nama_depan') }}" required>
                                        </div>
                                        <div class="form-group-inner">
                                            <label for="nama_belakang">Nama Belakang:</label>
                                            <input type="text" id="nama_belakang" name="nama_belakang"
                                                value="{{ old('nama_belakang') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat:</label>
                                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                                            required>
                                    </div>
                                    <div class="form-group flex">
                                        <div class="form-group-inner">
                                            <label for="quantity">Jumlah Kamar:</label>
                                            <input type="number" id="quantity" name="quantity"
                                                value="{{ old('quantity') }}" required max="{{ $item->quantity }}"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        </div>
                                        <div class="form-group-inner">
                                            <label for="tlp">Nomor Telpon:</label>
                                            <input type="text" id="tlp" name="tlp"
                                                value="{{ old('tlp') }}" pattern="\d*" required
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        </div>
                                    </div>
                                    <div class="form-group flex">
                                        <div class="form-group-inner">
                                            <label for="check_in">Check-in Date:</label>
                                            <input type="date" id="check_in" name="check_in"
                                                value="{{ old('check_in') }}" required>
                                        </div>
                                        <div class="form-group-inner">
                                            <label for="check_out">Check-out Date:</label>
                                            <input type="date" id="check_out" name="check_out"
                                                value="{{ old('check_out') }}" required>
                                        </div>
                                    </div>
                                    @auth
                                        <button type="submit" class="submit-btn">Create Reservation</button>
                                    @else
                                        <a href="{{ route('login') }}" class="submit-btn">Create Reservation</a>
                                    @endauth
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        }

        function setTodayDate() {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const dd = String(today.getDate()).padStart(2, '0');

            const todayDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('check_in').value = todayDate;
        }
        // Function to set the value of the check-out date input to tomorrow's date
        function setTomorrowDate() {
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(today.getDate() + 1);

            const yyyy = tomorrow.getFullYear();
            const mm = String(tomorrow.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const dd = String(tomorrow.getDate()).padStart(2, '0');

            const tomorrowDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('check_out').value = tomorrowDate;
        }

        // Event listener to set the dates when the document is loaded
        document.addEventListener('DOMContentLoaded', (event) => {
            const checkInInput = document.getElementById('check_in');
            const checkOutInput = document.getElementById('check_out');

            if (!checkInInput.value) {
                setTodayDate();
            }

            if (!checkOutInput.value) {
                setTomorrowDate();
            }
        });
    </script>
</body>

</html>
