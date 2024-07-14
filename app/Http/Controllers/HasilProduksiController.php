<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HasilProduksiController extends Controller
{
    public function index()
    {
        $hasilProduksis = HasilProduksi::with('admin')->get();
        return view('hasil-produksi.index', compact('hasilProduksis'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'tanggal_produksi' => 'required|string',
            'stok' => 'required|string',
            'file_foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();
        $data['id_admin'] = Auth::guard('admin')->user()->id;

        if ($request->hasFile('file_foto_produk')) {
            $path = $request->file('file_foto_produk')->store('hasil_produksi_images', 'public');
            $data['file_foto_produk'] = $path;
        }

        HasilProduksi::create($data);


        return redirect()->route('admin.hasil-produksi')->with('success', 'Hasil Produksi created successfully.');
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal_produksi' => 'required|date',
            'stok' => 'required|numeric',
            'file_foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the production result record by its ID
        $hasilProduksi = HasilProduksi::findOrFail($request->id);

        // Update the record with the new data
        $hasilProduksi->nama_produk = $request->input('nama_produk');
        $hasilProduksi->harga = $request->input('harga');
        $hasilProduksi->tanggal_produksi = $request->input('tanggal_produksi');
        $hasilProduksi->stok = $request->input('stok');

        // Handle the file upload if a new file is provided
        if ($request->hasFile('file_foto_produk')) {
            // Delete the old file if it exists
            if ($hasilProduksi->file_foto_produk) {
                Storage::delete('public/' . $hasilProduksi->file_foto_produk);
            }

            // Store the new file and get its path
            $filePath = $request->file('file_foto_produk')->store('produksi_foto', 'public');

            // Update the record with the new file path
            $hasilProduksi->file_foto_produk = $filePath;
        }

        // Save the updated record to the database
        $hasilProduksi->save();

        // Redirect back with a success message
        return redirect()->route('admin.hasil-produksi')->with('success', 'Data hasil produksi berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $hasilProduksi = HasilProduksi::findOrFail($request->id);
        $hasilProduksi->delete();

        return redirect()->route('admin.hasil-produksi')->with('success', 'Hasil Produksi deleted successfully.');
    }
}
