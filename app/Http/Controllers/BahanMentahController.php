<?php

namespace App\Http\Controllers;

use App\Models\BahanMentah;
use Illuminate\Http\Request;
use App\Models\PaketUmrah;
use App\Models\HotelMekah;
use App\Models\HotelMadinah;
use App\Models\Pesawat;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

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
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'kuantitas' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'file_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the Bahan Mentah record by its ID
        $bahanMentah = BahanMentah::findOrFail($request->id);

        // Update the record with the new data
        $bahanMentah->nama = $request->input('nama');
        $bahanMentah->kuantitas = $request->input('kuantitas');
        $bahanMentah->satuan = $request->input('satuan');
        $bahanMentah->harga = $request->input('harga');
        $bahanMentah->supplier_id = $request->input('supplier_id');

        // Handle the file upload if a new file is provided
        if ($request->hasFile('file_gambar')) {
            // Delete the old file if it exists
            if ($bahanMentah->file_gambar) {
                Storage::delete('public/' . $bahanMentah->file_gambar);
            }

            // Store the new file and get its path
            $filePath = $request->file('file_gambar')->store('bahan_mentah_gambar', 'public');

            // Update the record with the new file path
            $bahanMentah->file_gambar = $filePath;
        }

        // Save the updated record to the database
        $bahanMentah->save();

        // Redirect back with a success message
        return redirect()->route('admin.bahan-mentah')->with('success', 'Data bahan mentah berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $bahanMentah = BahanMentah::where('id', '=', $request->id)->first();
        $bahanMentah->delete();
        return redirect()->route('admin.bahan-mentah')->with('success', 'Bahan Mentah deleted successfully.');
    }
}
