@extends('layouts.parktrack')

@section('content')
<div class="container">
    <h2>Tambah Area Parkir</h2>

    <form action="{{ route('area.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf

        <label>Nama Area</label>
        <input type="text" name="nama_area"
               value="{{ old('nama_area') }}">
        @error('nama_area') <p>{{ $message }}</p> @enderror

        <br><br>

        <label>Lokasi</label>
        <input type="text" name="lokasi"
               value="{{ old('lokasi') }}">
        @error('lokasi') <p>{{ $message }}</p> @enderror

        <br><br>

        <label>Kapasitas</label>
        <input type="number" name="kapasitas"
               value="{{ old('kapasitas') }}">
        @error('kapasitas') <p>{{ $message }}</p> @enderror

        <br><br>

        <label>Foto Area (JPG, JPEG, PNG maksimal 2 MB)</label>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png">
        @error('foto') <p>{{ $message }}</p> @enderror

        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('area.index') }}">Kembali</a>
    </form>
</div>
@endsection
