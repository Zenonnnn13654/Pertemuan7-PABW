@extends('layouts.parktrack')

@section('content')
<div class="container">
    <h2>Edit Area Parkir</h2>

    <form action="{{ route('area.update', $area->id) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Area</label>
        <input type="text" name="nama_area"
               value="{{ old('nama_area', $area->nama_area) }}">
        @error('nama_area') <p>{{ $message }}</p> @enderror

        <br><br>

        <label>Lokasi</label>
        <input type="text" name="lokasi"
               value="{{ old('lokasi', $area->lokasi) }}">
        @error('lokasi') <p>{{ $message }}</p> @enderror

        <br><br>

        <label>Kapasitas</label>
        <input type="number" name="kapasitas"
               value="{{ old('kapasitas', $area->kapasitas) }}">
        @error('kapasitas') <p>{{ $message }}</p> @enderror

        <br><br>

        <p>Foto saat ini:</p>
        @if($area->foto)
            <img src="{{ asset('storage/'.$area->foto) }}"
                 width="150" alt="Foto area">
        @else
            Belum ada foto.
        @endif

        <br><br>

        <label>Ganti Foto (opsional)</label>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png">
        @error('foto') <p>{{ $message }}</p> @enderror

        <br><br>

        <button type="submit">Perbarui</button>
        <a href="{{ route('area.index') }}">Kembali</a>
    </form>
</div>
@endsection
