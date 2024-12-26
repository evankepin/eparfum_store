<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produks = Produk::all();
        return view('produk.parfum', compact('produks'));
    }

    public function showParfum()
    {
        // Retrieve all products or paginate them as needed
        $produks = Produk::all(); // or you can use pagination if preferred

        // Return the view with the products
        return view('produk.parfum', compact('produks'));
    }


    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('admin.dataproduk.create');
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'berat' => 'required|integer',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Menyimpan foto
        $fotoPath = $request->file('foto')->store('produk', 'public');

        Produk::create([
            'foto' => $fotoPath,
            'nama' => $request->nama,
            'berat' => $request->berat,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataproduk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.dataproduk.edit', compact('produk'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'berat' => 'required|integer',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::delete('public/' . $produk->foto);
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->foto = $fotoPath;
        }

        $produk->update([
            'nama' => $request->nama,
            'berat' => $request->berat,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dataproduk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/' . $produk->foto);
        $produk->delete();

        return redirect()->route('dataproduk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
