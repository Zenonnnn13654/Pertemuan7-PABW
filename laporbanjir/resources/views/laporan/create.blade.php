<!DOCTYPE html>
<html>
<head>
    <title>Form Lapor Banjir</title>
</head>
<body>

    <h2>Form Pelaporan Banjir</h2>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('laporan.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <label>Nama Pelapor</label><br>
        <input type="text" name="nama_pelapor"
               value="{{ old('nama_pelapor') }}">
        @error('nama_pelapor')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Nomor HP</label><br>
        <input type="text" name="no_hp"
               value="{{ old('no_hp') }}">
        @error('no_hp')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi"
               value="{{ old('lokasi') }}">
        @error('lokasi')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Kecamatan</label><br>
        <input type="text" name="kecamatan"
               value="{{ old('kecamatan') }}">
        @error('kecamatan')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Tinggi Air (cm)</label><br>
        <input type="number" name="tinggi_air"
               value="{{ old('tinggi_air') }}">
        @error('tinggi_air')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Keterangan</label><br>
        <textarea name="keterangan">{{ old('keterangan') }}</textarea>
        @error('keterangan')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br>

        <label>Foto Bukti Banjir</label><br>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png">
        @error('foto')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Kirim Laporan</button>

    </form>

</body>
</html>