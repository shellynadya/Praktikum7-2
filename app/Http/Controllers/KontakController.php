<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller // nama kelas harus sama dengan nama file
{
    public function index() // fungsi default untuk menampilkan data
    {
        $kontaks = Kontak::latest()->paginate(5); // tampilkan data maksimal 5 per halaman
        return view('kontaks.index', compact('kontaks')); // arahkan ke view index
    }

    public function create() // fungsi create
    {
        return view('kontaks.create'); // arahkan ke form tambah data
    }

    public function store(Request $request) // fungsi untuk kirim data ke DB
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Kontak::create($request->all()); // simpan data ke model
        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function show(Kontak $kontak) // fungsi detail data
    {
        return view('kontaks.show', compact('kontak'));
    }

    public function edit(Kontak $kontak) // fungsi edit data
    {
        return view('kontaks.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak) // fungsi update DB
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $kontak->update($request->all());
        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak) // fungsi hapus data
    {
        $kontak->delete();
        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
