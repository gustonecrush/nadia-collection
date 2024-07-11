<?php

namespace App\Http\Controllers;

use App\Models\BahanMentah;
use Illuminate\Http\Request;
use App\Models\PaketUmrah;
use App\Models\HotelMekah;
use App\Models\HotelMadinah;
use App\Models\Pesawat;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with(['bahanMentah'])->get();

        return view('supplier.index', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telpon' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('admin.supplier')->with('success', 'Supplier created successfully.');
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
        $supplier = Supplier::where('id', '=', $request->id)->first();
        $supplier->delete();
        return redirect()->route('admin.supplier')->with('success', 'Supplier deleted successfully.');
    }
}
