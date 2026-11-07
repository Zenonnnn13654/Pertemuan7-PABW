<h2>Data Laporan Banjir</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Lokasi</th>
        <th>Tinggi Air</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($laporans as $laporan)
    <tr>
        <td>{{ $laporan->nama_pelapor }}</td>
        <td>{{ $laporan->lokasi }}</td>
        <td>{{ $laporan->tinggi_air }} cm</td>

        <td>
            <img src="{{ asset('storage/'.$laporan->foto) }}"
                 width="80">
        </td>

        <td>{{ $laporan->status }}</td>

        <td>
            <a href="{{ route('laporan.show', $laporan->id) }}">
                Detail
            </a>

            <a href="{{ route('laporan.edit', $laporan->id) }}">
                Edit
            </a>

            <form action="{{ route('laporan.destroy', $laporan->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $laporans->links() }}