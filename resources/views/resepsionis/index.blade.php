<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu Hotel</title>
    <link rel="stylesheet" href="{{ asset('css/resepsionis.css') }}">
</head>

<body>
    @include('component.navbarAdmin')
    @include('component.sidebar')
    <div class="container-table">
        <div class="table-src">
            <form action="" method="get">
                <label for="src-date">Serch by date</label>
                <input type="date" name="" id="">
                <button class="src" type="submit">cari</button>
            </form>
            <div class="table-src-name">
                <form action="" method="get">
                    <label for="nama_depan">Serch by name</label>
                    <input type="text" placeholder="Masukan nama depan">
                    <input type="text" placeholder="Masukan nama belakang">
                    <button class="src" type="submit">cari</button>
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Jumlah Kamar</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Harga / malam</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_depan }}</td>
                        <td>{{ $item->nama_belakang }}</td>
                        <td>{{ $item->tlp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->check_in }}</td>
                        <td>{{ $item->check_out }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>
                            @if ($item->status == 1)
                                Belum check in
                            @elseif($item->status == 2)
                                Sudah check in
                            @elseif($item->status == 0)
                                Sudah check out
                            @endif
                        </td>
                        <td>
                            <div class="btn-tbl-res">
                                <button class="check detail">Detail</button>
                                @if ($item->status == 1)
                                    <button class="check">Check in</button>
                                @elseif($item->status == 2)
                                    <button class="check">Check out</button>
                                @elseif($item->status == 0)
                                    <button class="out" disabled>Sudah check out</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal HTML -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detail Reservasi</h2>
            <p id="detailNamaDepan"></p>
            <p id="detailNamaBelakang"></p>
            <p id="detailTlp"></p>
            <p id="detailAlamat"></p>
            <p id="detailQuantity"></p>
            <p id="detailCheckIn"></p>
            <p id="detailCheckOut"></p>
            <p id="detailHarga"></p>
            <p id="detailStatus"></p>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("detailModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to open the modal and set the details
        function openDetailModal(details) {
            document.getElementById('detailNamaDepan').innerText = 'Nama Depan: ' + details.namaDepan;
            document.getElementById('detailNamaBelakang').innerText = 'Nama Belakang: ' + details.namaBelakang;
            document.getElementById('detailTlp').innerText = 'No Telp: ' + details.tlp;
            document.getElementById('detailAlamat').innerText = 'Alamat: ' + details.alamat;
            document.getElementById('detailQuantity').innerText = 'Jumlah Kamar: ' + details.quantity;
            document.getElementById('detailCheckIn').innerText = 'Check-in: ' + details.checkIn;
            document.getElementById('detailCheckOut').innerText = 'Check-out: ' + details.checkOut;
            document.getElementById('detailHarga').innerText = 'Harga / malam: ' + details.harga;
            document.getElementById('detailStatus').innerText = 'Status: ' + (details.status == 1 ? 'Belum check in' : (
                details.status == 2 ? 'Sudah check in' : 'Sudah check out'));
            modal.style.display = "block";
        }

        // Add event listeners to detail buttons
        document.querySelectorAll('.btn-tbl-res .detail').forEach(button => {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                var details = {
                    namaDepan: row.cells[1].innerText,
                    namaBelakang: row.cells[2].innerText,
                    tlp: row.cells[3].innerText,
                    alamat: row.cells[4].innerText,
                    quantity: row.cells[5].innerText,
                    checkIn: row.cells[6].innerText,
                    checkOut: row.cells[7].innerText,
                    harga: row.cells[8].innerText,
                    status: row.cells[9].innerText === 'Belum check in' ? 1 : (row.cells[9]
                        .innerText === 'Sudah check in' ? 2 : 0)
                };
                openDetailModal(details);
            });
        });
    </script>
</body>

</html>
