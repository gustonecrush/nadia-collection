<?php

namespace App\Http\Controllers;

use App\Models\BahanMentahProduksi;
use App\Models\HasilProduksi;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BahanMentahProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bahanMentahProduksi = new BahanMentahProduksi();
        $hasilProduksi = HasilProduksi::where('id', '=', $request->id_hasil_produksi)->first();
        $hasilProduksi->stok = $hasilProduksi->stok - $request->kuantitas;
        $hasilProduksi->save();
        $bahanMentahProduksi->id_hasil_produksi = $request->id_hasil_produksi;
        $bahanMentahProduksi->id_bahan_mentah = $request->id_bahan_mentah;
        $bahanMentahProduksi->kuantitas = $request->kuantitas;
        $bahanMentahProduksi->harga = (int)$bahanMentahProduksi->kuantitas * (int)$bahanMentahProduksi->harga;
        $bahanMentahProduksi->save();
        return redirect()->back()->with('success', 'Bahan Mentah created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $bahanProduksi = BahanMentahProduksi::findOrFail($request->id);
        $hasilProduksi = HasilProduksi::where('id', '', $bahanProduksi->id_hasil_produksi);
        $hasilProduksi->stok = $hasilProduksi->stok + $request->kuantitas;
        $hasilProduksi->save();
        $bahanProduksi->delete();

        return redirect()->route('admin.hasil-produksi')->with('success', 'Hasil Produksi deleted successfully.');
    }
}
