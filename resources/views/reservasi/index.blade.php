<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar Hotel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* General styles */
    body {
        font-family: Arial, sans-serif;
    }

    .container-card {
        display: flex;
        justify-content: center;
        margin: 20px;
    }

    .card {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        width: 300px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .card .harga {
        font-weight: bold;
        color: #e74c3c;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>
    <h1>Create Reservation</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @foreach ($kamar as $item)
        <div class="container-card">
            <div class="card">
                <h2 class="nama_kamar">{{ $item->nama_kamar }}</h2>
                <p class="tipe_kamar">{{ $item->tipe_kamar }}</p>
                <p class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}/malam</p>
                <p class="tipe_kamar">Tersisa {{ $item->quantity }} kamar</p>
                <button class="btn btn-primary" onclick="openModal('modal{{ $item->id }}')">Book</button>
            </div>
        </div>

        <!-- Modal -->
        <div id="modal{{ $item->id }}" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('modal{{ $item->id }}')">&times;</span>
                <h2 class="nama_kamar">{{ $item->nama_kamar }}</h2>
                <p class="tipe_kamar">Tipe kamar: {{ $item->tipe_kamar }}</p>
                <p class="tipe_kamar">Tipe kasur: {{ $item->jenis_kasur }} bed</p>
                <p class="tipe_kamar">Kapasitas: {{ $item->kapasitas }} orang</p>
                <p class="tipe_kamar">Tersisa {{ $item->quantity }} kamar</p>
                <p class="tipe_kamar">{{ $item->deskripsi }}</p>
                <h2 class="harga">Rp {{ number_format($item->harga, 0, ',', '.') }}/malam</h2>

                <form action="{{ route('reservasi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kamar_id" value="{{ $item->id }}">

                    <label for="quantity">Kamar:</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required><br>

                    <label for="check_in">Check-in Date:</label>
                    <input type="date" id="check_in" name="check_in" value="{{ old('check_in') }}" required><br>

                    <label for="check_out">Check-out Date:</label>
                    <input type="date" id="check_out" name="check_out" value="{{ old('check_out') }}" required><br>

                    <button type="submit">Create Reservation</button>
                </form>
            </div>
        </div>
    @endforeach
</body>

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
</script>


</html>
