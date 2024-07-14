<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\HasilProduksi;
use App\Models\BahanMentah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    // public function exportSuppliers()
    // {
    //     $suppliers = Supplier::all();
    //     $pdf = PDF::loadView('exports.suppliers', compact('suppliers'));
    //     return $pdf->download('suppliers.pdf');
    // }

    // public function exportRawMaterials()
    // {
    //     $rawMaterials = BahanMentah::all();
    //     $pdf = PDF::loadView('exports.raw_materials', compact('rawMaterials'));
    //     return $pdf->download('raw_materials.pdf');
    // }

    // public function exportProductionResults()
    // {
    //     $hasilProduksis = HasilProduksi::all();
    //     $pdf = PDF::loadView('exports.production_results', compact('hasilProduksis'));
    //     return $pdf->download('production_results.pdf');
    // }

    public function getData()
    {
        $suppliers = Supplier::all();
        $hasilProduksis = HasilProduksi::all();
        $bahanMentahs = BahanMentah::all();

        return response()->json([
            'suppliers' => $suppliers,
            'hasilProduksis' => $hasilProduksis,
            'bahanMentahs' => $bahanMentahs,
        ]);
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:admins',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Admin::create([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin->update([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.admins')->with('success', 'Admin updated successfully.');
    }

    public function destroy(Request $request)
    {
        $admin = Admin::findOrFail($request->id);
        $admin->delete();
        return redirect()->route('admin.admins')->with('success', 'Admin deleted successfully.');
    }
}