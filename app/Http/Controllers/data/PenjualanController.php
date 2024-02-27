<?php

namespace App\Http\Controllers\data;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $terakhirInput = Penjualan::latest()->first()->created_at;
        $penjualan = Penjualan::with('pelanggan')->latest()->get();
        return view('data.penjualan.index',compact('penjualan','terakhirInput','produk'));
    }

    public function transaksi($id)
    {
        $produk = Produk::all();
        $penjualan = Penjualan::find($id);
        return view('data.penjualan.transaksi_produk',compact('produk','penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'produk_id' => 'required',
            'jumlah_produk' => 'required',
        ],[
            'produk_id.required' => 'Produk tidak boleh kosong',
            'jumlah_produk.required' => 'Jumlah Produk tidak boleh kosong',
        ]);

        $data = [
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'sub_total' => $request->sub_total,
            'penjualan_id' => $request->penjualan_id,
        ];
        // dd($data);
        DetailPenjualan::create($data);
        return redirect()->route('detail_penjualan.index')->with('success','Transaksi berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
