<?php

namespace App\Http\Controllers;

use App\Models\BahanMentah;
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
        $bahanMentah = BahanMentah::where('id', '=', $request->id_bahan_mentah)->first();
        $bahanMentah->stok = $bahanMentah->stok - $request->kuantitas;
        $bahanMentah->save();
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
        $bahanMentah = BahanMentah::where('id', '', $request->id_bahan_mentah);
        $bahanMentah->stok = $bahanMentah->kuantitas + $request->kuantitas;
        $bahanMentah->save();
        $bahanProduksi->delete();

        return redirect()->back()->with('success', 'Bahan Hasil Produksi deleted successfully.');
    }
}
