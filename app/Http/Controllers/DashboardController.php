<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dtKeuangan = DetailPenjualan::sum('sub_total');
        $dtPenjualan = Penjualan::count();
        $dtProduk = Produk::count();
        $dtPelanggan = Pelanggan::count();
        $dtUserAdmin = User::where('role','administrator')->count();
        $dtUserPetugas = User::where('role','petugas')->count();
        $dtTerakhirUser = User::latest()->paginate(5);
        return view('dashboard.index',
        compact('dtPelanggan','dtProduk','dtPenjualan','dtKeuangan','dtUserAdmin','dtUserPetugas','dtTerakhirUser'));
    }
}
