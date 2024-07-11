<?php

namespace App\Http\Controllers;

use App\Models\BahanMentah;
use Illuminate\Http\Request;
use App\Models\PaketUmrah;
use App\Models\HotelMekah;
use App\Models\HotelMadinah;
use App\Models\Pesawat;
use App\Models\Supplier;

class BahanMentahController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with(['bahanMentah'])->get();
        $bahanMentahs = BahanMentah::with(['supplier'])->get();

        return view('bahan-mentah.index', compact('suppliers', 'bahanMentahs',));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'nama' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'satuan' => 'required|string',
            'kuantitas' => 'required|string',
            'file_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_gambar')) {
            $path = $request->file('file_gambar')->store('bahan_mentah_images', 'public');
            $data['file_gambar'] = $path;
        }

        BahanMentah::create($data);

        return redirect()->route('admin.bahan-mentah')->with('success', 'Bahan Mentah created successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'durasi_umrah' => 'required|string|max:255',
            'id_hotel_mekah' => 'required|exists:hotel_mekahs,id',
            'id_hotel_madinah' => 'required|exists:hotel_madinahs,id',
            'bonus_paket' => 'required|string|max:255',
            'id_jenis_pesawat' => 'required|exists:pesawats,id',
            'bandara_keberangkatan' => 'required|string|max:255',
        ]);

        $bahanMentah = BahanMentah::where('id', '=', $request->id)->first();
        $bahanMentah->update($request->all());
        return redirect()->route('admin.bahan-mentah')->with('success', 'Bahan Mentah updated successfully.');
    }

    public function destroy(Request $request)
    {
        $bahanMentah = BahanMentah::where('id', '=', $request->id)->first();
        $bahanMentah->delete();
        return redirect()->route('admin.bahan-mentah')->with('success', 'Bahan Mentah deleted successfully.');
    }
}
