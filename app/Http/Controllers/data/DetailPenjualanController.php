<?php

namespace App\Http\Controllers\data;

use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Http\Controllers\Controller;
use App\Models\Penjualan;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terakhirInput = DetailPenjualan::latest()->first()->created_at;
        $detailPenjualan = DetailPenjualan::with('penjualan', 'produk')->latest()->get();
        return view('data.detail_penjualan.index', compact('detailPenjualan', 'terakhirInput', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function transaksi_user($id)
    {
        $pelanggan = Pelanggan::find($id);
        $produk = Produk::all();
        return view('data_detail_penjualan.form_create', compact('produk', 'pelanggan'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_produk' => 'required|numeric'
        ], [
            'jumlah_produk.required' => 'Jumlah Produk harus di isi',
            'jumlah_produk.numeric' => 'Jumlah Produk harus berupa angka'
        ]);

        // Ambil data dari request
        $subTotal = $request->input('sub_total');


        // Format angka dengan tiga angka di belakang koma
        $formattedSubTotal = number_format($subTotal, 3, '.', '');

        $simpanPenjualan = [
            'tanggal_penjualan' => now(),
            'total_harga' => $formattedSubTotal,
            'pelanggan_id' => $request->pelanggan_id
        ];

       $newPenjualan = Penjualan::create($simpanPenjualan);

       // Ambil id yang sudah di buat
       $idPenjualan = $newPenjualan->id;
       
        $simpanDetailPenjualan = [
            'penjualan_id' => $idPenjualan,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'sub_total' => $request->sub_total
        ];
        
        DetailPenjualan::create($simpanDetailPenjualan);
        return redirect()->route('detail_penjualan.index')
        ->with('success','Data detail penjualan berhasil tersimpan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPenjualan = DetailPenjualan::with('penjualan', 'produk')->where('penjualan_id',$id)->get();
        return view('data.detail_penjualan.index',compact('detailPenjualan'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
