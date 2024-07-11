<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\HasilProduksi;
use App\Models\BahanMentah;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

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
}
