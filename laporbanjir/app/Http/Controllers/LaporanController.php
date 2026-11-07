<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);
        return view('laporan.index', compact('laporans'));
    }

    // Form laporan warga
    public function create()
    {
        return view('laporan.create');
    }

    // Menyimpan laporan warga
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:100',
            'tinggi_air' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');
        $data['foto'] = $request->file('foto')
            ->store('laporan', 'public');

        Laporan::create($data);

        return back()->with('success', 'Laporan berhasil dikirim!');
    }

    // Detail laporan
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    // Form edit laporan
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    // Memperbarui laporan
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'lokasi' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:100',
            'tinggi_air' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'status' => 'required|in:Menunggu,Diproses,Selesai',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $fotoLama = $laporan->foto;

            $data['foto'] = $request->file('foto')
                ->store('laporan', 'public');

            Storage::disk('public')->delete($fotoLama);
        }

        $laporan->update($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui!');
    }

    // Menghapus laporan
    public function destroy(Laporan $laporan)
    {
        Storage::disk('public')->delete($laporan->foto);

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}