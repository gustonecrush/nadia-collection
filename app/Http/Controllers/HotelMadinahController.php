<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelMadinah;

class HotelMadinahController extends Controller
{
    public function index()
    {
        $hotelMadinahs = HotelMadinah::all();
        return view('hotel-madinah.index', compact('hotelMadinahs'));
    }

    public function create()
    {
        return view('hotel-madinah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hotel_madinah' => 'required|string|max:255',
        ]);

        HotelMadinah::create($request->all());
        return redirect()->route('admin.hotel-madinah')->with('success', 'Hotel Madinah created successfully.');
    }

    public function show(HotelMadinah $hotelMadinah)
    {
        return view('hotel-madinah.show', compact('hotelMadinah'));
    }

    public function edit(HotelMadinah $hotelMadinah)
    {
        return view('hotel-madinah.edit', compact('hotelMadinah'));
    }

    public function update(Request $request, HotelMadinah $hotelMadinah)
    {
        $request->validate([
            'nama_hotel_madinah' => 'required|string|max:255',
        ]);

        $hotelMadinah->update($request->all());
        return redirect()->route('admin.hotel-madinah')->with('success', 'Hotel Madinah updated successfully.');
    }

    public function destroy(HotelMadinah $hotelMadinah)
    {
        $hotelMadinah->delete();
        return redirect()->route('admin.hotel-madinah')->with('success', 'Hotel Madinah deleted successfully.');
    }
}
