<h2>Detail Laporan Banjir</h2>

<p>Nama: {{ $laporan->nama_pelapor }}</p>
<p>No HP: {{ $laporan->no_hp }}</p>
<p>Lokasi: {{ $laporan->lokasi }}</p>
<p>Kecamatan: {{ $laporan->kecamatan }}</p>
<p>Tinggi Air: {{ $laporan->tinggi_air }} cm</p>
<p>Keterangan: {{ $laporan->keterangan }}</p>
<p>Status: {{ $laporan->status }}</p>

<img src="{{ asset('storage/'.$laporan->foto) }}" width="300">

<br><br>

<a href="{{ route('laporan.index') }}">Kembali</a>