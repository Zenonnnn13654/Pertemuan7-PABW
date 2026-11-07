<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    // Menampilkan semua data area
    public function index()
    {
        $areas = Area::latest()->paginate(5);

        return view('areas.index', compact('areas'));
    }

    // Menampilkan form tambah area
    public function create()
    {
        return view('areas.create');
    }

    // Menyimpan data area dan foto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_area' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['foto'] = $request->file('foto')
            ->store('areas', 'public');

        Area::create($validated);

        return redirect()->route('area.index')
            ->with('success', 'Data area berhasil ditambahkan.');
    }

    // Menampilkan detail area
    public function show(Area $area)
    {
        return view('areas.show', compact('area'));
    }

    // Menampilkan form edit
    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    // Memperbarui data dan foto
    public function update(Request $request, Area $area)
    {
        $validated = $request->validate([
            'nama_area' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoBaru = $request->file('foto')
                ->store('areas', 'public');

            if ($area->foto) {
                Storage::disk('public')->delete($area->foto);
            }

            $validated['foto'] = $fotoBaru;
        }

        $area->update($validated);

        return redirect()->route('area.index')
            ->with('success', 'Data area berhasil diperbarui.');
    }

    // Menghapus data dan foto
    public function destroy(Area $area)
    {
        if ($area->foto) {
            Storage::disk('public')->delete($area->foto);
        }

        $area->delete();

        return redirect()->route('area.index')
            ->with('success', 'Data area berhasil dihapus.');
    }
}
