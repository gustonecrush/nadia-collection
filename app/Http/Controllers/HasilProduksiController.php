<?php

namespace App\Http\Controllers;

use App\Models\HasilProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy(Request $request)
    {
        $hasilProduksi = HasilProduksi::findOrFail($request->id);
        $hasilProduksi->delete();

        return redirect()->route('admin.hasil-produksi')->with('success', 'Hasil Produksi deleted successfully.');
    }
}
