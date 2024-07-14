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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
        ]);

        $supplier = Supplier::where('id', '=', $request->id)->first();
        $supplier->update($request->all());

        return redirect()->route('admin.supplier')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Request $request)
    {
        $supplier = Supplier::where('id', '=', $request->id)->first();
        $supplier->delete();
        return redirect()->route('admin.supplier')->with('success', 'Supplier deleted successfully.');
    }
}
