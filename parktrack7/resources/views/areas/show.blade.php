@extends('layouts.parktrack')

@section('content')
<div class="container">
    <h2>Detail Area Parkir</h2>

    <p>Nama Area: {{ $area->nama_area }}</p>
    <p>Lokasi: {{ $area->lokasi }}</p>
    <p>Kapasitas: {{ $area->kapasitas }}</p>

    <p>Foto Area:</p>

    @if($area->foto)
        <img src="{{ asset('storage/'.$area->foto) }}"
             width="250" alt="Foto area parkir">
        <br>
        <a href="{{ asset('storage/'.$area->foto) }}" target="_blank">
            Lihat atau unduh foto
        </a>
    @else
        Belum ada foto.
    @endif

    <br><br>
    <a href="{{ route('area.edit', $area->id) }}">Edit</a>
    <a href="{{ route('area.index') }}">Kembali</a>
</div>
@endsection
