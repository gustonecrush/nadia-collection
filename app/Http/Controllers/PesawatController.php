<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesawat;

class PesawatController extends Controller
{
    public function index()
    {
        $flights = Pesawat::all();
        return view('pesawat.index', compact('flights'));
    }

    public function create()
    {
        return view('pesawat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pesawat' => 'required|string|max:255',
        ]);

        Pesawat::create($request->all());
        return redirect()->route('admin.pesawat')->with('success', 'Pesawat created successfully.');
    }

    public function show(Pesawat $pesawat)
    {
        return view('pesawat.show', compact('pesawat'));
    }

    public function edit(Pesawat $pesawat)
    {
        return view('pesawat.edit', compact('pesawat'));
    }

    public function update(Request $request, Pesawat $pesawat)
    {
        $request->validate([
            'nama_pesawat' => 'required|string|max:255',
        ]);

        $pesawat->update($request->all());
        return redirect()->route('admin.pesawat')->with('success', 'Pesawat updated successfully.');
    }

    public function destroy(Request $request)
    {
        $pesawat = Pesawat::where('id', '=', $request->id)->first();
        $pesawat->delete();
        return redirect()->route('admin.pesawat')->with('success', 'Pesawat deleted successfully.');
    }
}
