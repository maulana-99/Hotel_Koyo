<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" href="{{ asset('css/fasilitas.css') }}">
</head>
<body>
    @include('component.navbar')
    <div class="text">
        <h1>Fasilitas</h1>
    </div>
    <div class="room-cards">
        @foreach($fasilitas as $item)
        <div class="room-card">
            <!-- Button to Open the Modal -->
            <img src="images/{{ $item->foto_fasilitas }}" alt="{{ $item->nama_fasilitas }}" class="room-image">
            <button type="button" class="btn btn-primary" data-target="#myModal{{ $item->id }}">
                {{ $item->nama_fasilitas }}
            </button>

            <!-- The Modal -->
            <div id="myModal{{ $item->id }}" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h4>{{ $item->nama_fasilitas }}</h4>
                    <img src="images/{{ $item->foto_fasilitas }}" alt="{{ $item->nama_fasilitas }}" class="room-image">
                    <p>{{ $item->deskripsi_fasilitas }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script>
        // Get the modal
        var modals = document.querySelectorAll('.modal');

        // Get the button that opens the modal
        var btns = document.querySelectorAll('.btn');

        // Get the <span> element that closes the modal
        var spans = document.querySelectorAll('.close');

        // When the user clicks the button, open the modal
        btns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                modals[index].style.display = "block";
            });
        });

        // When the user clicks on <span> (x), close the modal
        spans.forEach((span, index) => {
            span.addEventListener('click', function() {
                modals[index].style.display = "none";
            });
        });

        // When the user clicks anywhere outside of the modal, close it
        window.addEventListener('click', function(event) {
            modals.forEach((modal) => {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
