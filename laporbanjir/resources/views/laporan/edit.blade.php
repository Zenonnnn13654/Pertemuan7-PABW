<h2>Edit Laporan Banjir</h2>

<form action="{{ route('laporan.update', $laporan->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <label>Nama Pelapor</label><br>
    <input type="text" name="nama_pelapor"
           value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}">
    @error('nama_pelapor') <p>{{ $message }}</p> @enderror
    <br>

    <label>No HP</label><br>
    <input type="text" name="no_hp"
           value="{{ old('no_hp', $laporan->no_hp) }}">
    @error('no_hp') <p>{{ $message }}</p> @enderror
    <br>

    <label>Lokasi</label><br>
    <input type="text" name="lokasi"
           value="{{ old('lokasi', $laporan->lokasi) }}">
    @error('lokasi') <p>{{ $message }}</p> @enderror
    <br>

    <label>Kecamatan</label><br>
    <input type="text" name="kecamatan"
           value="{{ old('kecamatan', $laporan->kecamatan) }}">
    @error('kecamatan') <p>{{ $message }}</p> @enderror
    <br>

    <label>Tinggi Air (cm)</label><br>
    <input type="number" name="tinggi_air"
           value="{{ old('tinggi_air', $laporan->tinggi_air) }}">
    @error('tinggi_air') <p>{{ $message }}</p> @enderror
    <br>

    <label>Keterangan</label><br>
    <textarea name="keterangan">{{ old('keterangan', $laporan->keterangan) }}</textarea>
    @error('keterangan') <p>{{ $message }}</p> @enderror
    <br>

    <label>Status Penanganan</label><br>
    <select name="status">
        @foreach(['Menunggu', 'Diproses', 'Selesai'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $laporan->status) == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
    @error('status') <p>{{ $message }}</p> @enderror
    <br>

    <label>Foto Lama</label><br>
    <img src="{{ asset('storage/'.$laporan->foto) }}" width="120">
    <br>

    <label>Ganti Foto</label><br>
    <input type="file" name="foto" accept=".jpg,.jpeg,.png">
    @error('foto') <p>{{ $message }}</p> @enderror
    <br><br>

    <button type="submit">Simpan Perubahan</button>

</form>