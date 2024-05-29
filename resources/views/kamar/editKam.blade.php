<h1>Edit Kamar</h1>
    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kamar">Nama Kamar:</label>
            <input type="text" id="nama_kamar" name="nama_kamar" value="{{ $kamar->nama_kamar }}" required>
        </div>
        <div>
            <label for="tipe_kamar">Tipe Kamar:</label>
            <input type="text" id="tipe_kamar" name="tipe_kamar" value="{{ $kamar->tipe_kamar }}" required>
        </div>
        <div>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="{{ $kamar->harga }}" required>
        </div>
        <div>
            <label for="foto_kamar">Foto Kamar:</label>
            <input type="file" id="foto_kamar" name="foto_kamar">
            <img src="/images/{{ $kamar->foto_kamar }}" width="100">
        </div>
        <button type="submit">Submit</button>
    </form>
