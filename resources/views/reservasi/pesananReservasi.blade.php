<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding:0;
        }

        .container-card-reservasi {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-reservasi {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            padding: 20px;
            margin: 10px;
            transition: transform 0.2s;
            flex: 1;
            min-width: 250px;
            cursor: pointer;
        }

        .card-reservasi:hover {
            transform: scale(1.05);
        }

        .card-reservasi p {
            margin: 10px 0;
            color: #333;
        }

        .nama_kamar {
            font-size: 16px;
        }

        .check_in,
        .check_out {
            color: #555;
        }

        .tipe_kamar {
            font-size: 1em;
            color: #007bff;
        }

        .harga_kamar {
            font-size: 1.1em;
            color: #28a745;
            font-weight: bold;
        }

        /* Tambahan style untuk mobile */
        @media (max-width: 600px) {
            .container-card-reservasi {
                flex-direction: column;
                align-items: center;
            }

            .card-reservasi {
                max-width: 100%;
            }
        }

        .alrt-p {
            background: #555;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
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
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            position: relative;
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

        .hidden-button {
            display: none;
        }

        .modal-invoice h1 {
            margin: 0 0 10px;
            padding: 0;
            text-align: center;
        }

        .modal-invoice h2 {
            margin: 0 0 10px;
            padding: 0;
        }

        .modal-invoice p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    @include('component.navbar')

    @if ($reservasi->isEmpty())
        <div class="alrt-p">
            <p>Anda belum memesan/mereservasi kamar.</p>
        </div>
    @else
        <div class="container-card-reservasi">
            @include('component.alert')
            @foreach ($reservasi as $item)
                <div class="card-reservasi">
                    <p class="nama_kamar"><b>Nama kamar:</b> {{ $item->nama_kamar }}</p>
                    <p class="tipe_kamar"><b>Tipe Kamar:</b> {{ $item->tipe_kamar }}</p>
                    <p class="check_in">Check in: {{ $item->check_in }}</p>
                    <p class="check_out">Check out: {{ $item->check_out }}</p>
                    <p class="quantity">Jumlah kamar: {{ $item->quantity }}</p>
                    <button
                        onclick="showDetail('{{ $item->nama_depan }}','{{ $item->nama_belakang }}',
                        '{{ $item->alamat }}','{{ $item->tlp }}', '{{ $item->nama_kamar }}', 
                        '{{ $item->tipe_kamar }}', '{{ $item->check_in }}', 
                        '{{ $item->check_out }}', '{{ $item->quantity }}', 
                        '{{ number_format($item->harga, 0, ',', '.') }}')">Detail</button>
                </div>
            @endforeach
        </div>
    @endif

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content" id="modalContent">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-invoice">
                <h1>Invoice</h1>
                <h2>Detail Pemesan</h2>
                <p id="modal-nama_depan"></p>
                <p id="modal-nama_belakang"></p>
                <p id="modal-alamat"></p>
                <p id="modal-tlp"></p>
                <h2>Detail Kamar</h2>
                <p id="modal-nama_kamar"></p>
                <p id="modal-tipe_kamar"></p>
                <p id="modal-check_in"></p>
                <p id="modal-check_out"></p>
                <p id="modal-quantity"></p>
                <p id="modal-harga_kamar"></p>
            </div>
            <button id="printButton" onclick="printPDF()">Print PDF</button>
        </div>
    </div>

    <script>
        function showDetail(nama_depan, nama_belakang, alamat, tlp, nama_kamar, tipe_kamar, check_in, check_out, quantity,
            harga_kamar) {
            document.getElementById('modal-nama_depan').innerText = 'Nama depan: ' + nama_depan;
            document.getElementById('modal-nama_belakang').innerText = 'Nama belakang: ' + nama_belakang;
            document.getElementById('modal-alamat').innerText = 'Alamat: ' + alamat;
            document.getElementById('modal-tlp').innerText = 'Nomor telpon: ' + tlp;
            document.getElementById('modal-nama_kamar').innerText = 'Nama kamar: ' + nama_kamar;
            document.getElementById('modal-tipe_kamar').innerText = 'Tipe Kamar: ' + tipe_kamar;
            document.getElementById('modal-check_in').innerText = 'Check in: ' + check_in;
            document.getElementById('modal-check_out').innerText = 'Check out: ' + check_out;
            document.getElementById('modal-quantity').innerText = 'Jumlah kamar: ' + quantity;
            document.getElementById('modal-harga_kamar').innerText = 'Harga: Rp ' + harga_kamar;
            document.getElementById('myModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }

        async function printPDF() {
            const printButton = document.getElementById('printButton');
            printButton.classList.add('hidden-button');
            const modalContent = document.getElementById('modalContent');

            const canvas = await html2canvas(modalContent, {
                scale: 2
            });

            const imgData = canvas.toDataURL('image/png');
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('p', 'mm', 'a4');

            doc.addImage(imgData, 'PNG', 10, 10, 190, 0);
            doc.save('reservation-details.pdf');

            printButton.classList.remove('hidden-button');
        }
    </script>
</body>

</html>
