@extends('layouts.parktrack')

@section('content')
<div class="container">
    <h2>Data Area Parkir</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('area.create') }}">+ Tambah Area</a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Area</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($areas as $area)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $area->nama_area }}</td>
                    <td>{{ $area->lokasi }}</td>
                    <td>{{ $area->kapasitas }}</td>
                    <td>
                        @if($area->foto)
                            <img src="{{ asset('storage/'.$area->foto) }}"
                                 width="100" alt="Foto area">
                        @else
                            Belum ada foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('area.show', $area->id) }}">Detail</a>
                        <a href="{{ route('area.edit', $area->id) }}">Edit</a>

                        <form action="{{ route('area.destroy', $area->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus area ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data area parkir.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $areas->links() }}
</div>
@endsection
