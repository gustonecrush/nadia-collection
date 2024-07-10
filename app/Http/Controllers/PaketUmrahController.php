<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketUmrah;
use App\Models\HotelMekah;
use App\Models\HotelMadinah;
use App\Models\Pesawat;

class PaketUmrahController extends Controller
{
    public function index()
    {
        $paketUmrahs = PaketUmrah::with(['hotelMekah', 'hotelMadinah', 'pesawat'])->get();
        $pesawats = Pesawat::all();
        $hotelMekahs = HotelMekah::all();
        $hotelMadinahs = HotelMadinah::all();
        return view('paket-umrah.index', compact('paketUmrahs', 'hotelMekahs', 'hotelMadinahs', 'pesawats'));
    }

    public function create()
    {
        $hotelMekahs = HotelMekah::all();
        $hotelMadinahs = HotelMadinah::all();
        $pesawats = Pesawat::all();
        return view('paket-umrah.create', compact('hotelMekahs', 'hotelMadinahs', 'pesawats'));
    }

    public function store(Request $request)
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

        PaketUmrah::create($request->all());
        return redirect()->route('admin.paket-umrah')->with('success', 'Paket Umrah created successfully.');
    }

    public function show(PaketUmrah $paketUmrah)
    {
        return view('paket-umrah.show', compact('paketUmrah'));
    }

    public function edit(PaketUmrah $paketUmrah)
    {
        $hotelMekahs = HotelMekah::all();
        $hotelMadinahs = HotelMadinah::all();
        $pesawats = Pesawat::all();
        return view('paket-umrah.edit', compact('paketUmrah', 'hotelMekahs', 'hotelMadinahs', 'pesawats'));
    }

    public function update(Request $request, PaketUmrah $paketUmrah)
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

        $paketUmrah->update($request->all());
        return redirect()->route('admin.paket-umrah')->with('success', 'Paket Umrah updated successfully.');
    }

    public function destroy(Request $request)
    {
        $paketUmrah = PaketUmrah::where('id', '=', $request->id)->first();
        $paketUmrah->delete();
        return redirect()->route('admin.paket-umrah')->with('success', 'Paket Umrah deleted successfully.');
    }
}
