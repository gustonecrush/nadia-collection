<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelMekah;

class HotelMekahController extends Controller
{
    public function index()
    {
        $hotelMekahs = HotelMekah::all();
        return view('hotel-mekah.index', compact('hotelMekahs'));
    }

    public function create()
    {
        return view('hotel-mekah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hotel_mekah' => 'required|string|max:255',
        ]);

        HotelMekah::create($request->all());
        return redirect()->route('admin.hotel-mekah')->with('success', 'Hotel Mekah created successfully.');
    }

    public function show(HotelMekah $hotelMekah)
    {
        return view('hotel-mekah.show', compact('hotelMekah'));
    }

    public function edit(HotelMekah $hotelMekah)
    {
        return view('admin.hotel-mekah', compact('hotelMekah'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_hotel_mekah' => 'required|string|max:255',
        ]);
        dd($request);

        $hotelMekah = HotelMekah::where('id', '=', $request->id)->first();
        $hotelMekah->update($request->all());
        return redirect()->route('admin.hotel-mekah')->with('success', 'Hotel Mekah updated successfully.');
    }

    public function destroy(Request $request)
    {
        $hotelMekah = HotelMekah::where('id', '=', $request->id)->first();
        $hotelMekah->delete();
        return redirect()->route('admin.hotel-mekah')->with('success', 'Hotel Mekah deleted successfully.');
    }
}
