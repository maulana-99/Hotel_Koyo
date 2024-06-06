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
            <form action="{{ route('resepsionis.index') }}" method="get">
                <label for="src-date">Search by date</label>
                <input type="date" name="src-date" id="src-date">
                <button class="src" type="submit">cari</button>
            </form>
            <div class="table-src-name">
                <form action="{{ route('resepsionis.index') }}" method="get">
                    <label for="nama_depan">Search by name</label>
                    <input type="text" name="nama_depan" placeholder="Masukan nama depan">
                    <input type="text" name="nama_belakang" placeholder="Masukan nama belakang">
                    <button class="src" type="submit">cari</button>
                </form>
            </div>
        </div>
        @include('component.alert')
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $item)
                    @if ($kamar->isEmpty())
                        <tr>
                            <td colspan="9">No Data</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_depan }}</td>
                            <td>{{ $item->nama_belakang }}</td>
                            <td>{{ $item->tlp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->check_in }}</td>
                            <td>{{ $item->check_out }}</td>
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
                                    <button class="check detail"
                                        onclick="showModal({{ $item->id }})">Detail</button>
                                    @if ($item->status == 1)
                                        <form action="{{ route('resepsionis.checkin', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button class="check" type="submit">Check in</button>
                                        </form>
                                    @elseif($item->status == 2)
                                        <form action="{{ route('resepsionis.checkout', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button class="check" type="submit">Check out</button>
                                        </form>
                                    @elseif($item->status == 0)
                                        <button class="out" disabled>Sudah check out</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detail Pemesan</h2>
            <p class="nama_depan"></p>
            <p class="nama_belakang"></p>
            <p class="alamat"></p>
            <p class="tlp"></p>
            <h2>Detail Kamar</h2>
            <p class="nama_kamar"></p>
            <p class="tipe_kamar"></p>
            <p class="jenis_kasur"></p>
            <p class="kapasitas"></p>
            <p class="harga"></p>
        </div>
    </div>

    <script>
        // Get modal elements
        var modal = document.getElementById("detailModal");
        var span = document.getElementsByClassName("close")[0];

        // Function to show modal with details
        function showModal(id) {
            var reservasi = @json($reservasi);
            var item = reservasi.find(res => res.id === id);
            if (item) {
                document.querySelector('.modal-content .nama_depan').innerText = "Nama Depan: " + item.nama_depan;
                document.querySelector('.modal-content .nama_belakang').innerText = "Nama Belakang: " + item.nama_belakang;
                document.querySelector('.modal-content .alamat').innerText = "Alamat: " + item.alamat;
                document.querySelector('.modal-content .tlp').innerText = "Nomor Telpon: " + item.tlp;
                document.querySelector('.modal-content .nama_kamar').innerText = "Nama Kamar: " + item.nama_kamar;
                document.querySelector('.modal-content .tipe_kamar').innerText = "Tipe Kamar: " + item.tipe_kamar;
                document.querySelector('.modal-content .jenis_kasur').innerText = "Jenis Kasur: " + item.jenis_kasur +
                    " bed";
                document.querySelector('.modal-content .kapasitas').innerText = "Kapasitas Orang: " + item.kapasitas +
                    " orang";
                document.querySelector('.modal-content .harga').innerText = "Harga /malam: " + item.harga;
            }
            modal.style.display = "block";
        }

        // Close the modal when the user clicks on <span> (x)
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
