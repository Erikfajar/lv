<?php

namespace App\Http\Controllers\data;

use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Exports\DataProdukExportView;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // FUNGSI UNTUK MENAMPILKAN HALAMAN DAN DATA
    public function index()
    {
        $terakhirInput = Produk::latest()->first()->created_at;
        $produk = Produk::with('detailpenjualan')->orderBy('nama_produk','asc')->get();
        return view('data.produk.index',compact('produk','terakhirInput'));
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

    // FUNGSI UNTUK PROSES MENYIMPAN DATA KE KE DB
    public function store(Request $request)
    {
        // VALIDASI DATA YANG MASUK SESUAI KEBUTUHAN
        $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required|integer'
            ],

            // FUNGSI UNTUK MEMBERI TAU KALO ADA YANG TIDAK SESUAI WAKTU VALIDASI
            [
                'nama_produk.required' => 'Nama Produk harus di isi',
                'harga.required' => 'Harga harus di isi',
                'stok.integer' => 'Stok harus berupa Angka',
                'stok.required' => 'Harga harus di isi',
            ]
        );

        // VARIABEL UNTUK MENAMPUNG REQUEST
        $isiRequest = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        // PROSES SIMPAN KE DB MELALUI MODEL
        Produk::create($isiRequest);
        // PROSES MELEMPAR HALAMAN KALO SUDAH BERHASIL TERSIMPAN
        return back()->with('success','Data Produk berhasil tersimpan');

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

    // FUNGSI UPDATE/EDIT DATA KE DB
    public function update(Request $request, $id)
    {
        // VALIDASI DATA YANG MASUK SESUAI KEBUTUHAN
        $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required|integer'
            ],

            // FUNGSI UNTUK MEMBERI TAU KALO ADA YANG TIDAK SESUAI WAKTU VALIDASI
            [
                'nama_produk.required' => 'Nama Produk harus di isi',
                'harga.required' => 'Harga harus di isi',
                'stok.integer' => 'Stok harus berupa Angka',
                'stok.required' => 'Harga harus di isi',
            ]
        );

        // VARIABEL UNTUK MENAMPUNG REQUEST
        $isiRequest = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        // PROSES UPDATE/EDIT KE DB MELALUI MODEL
        Produk::where('id',$id)->update($isiRequest);
        // PROSES MELEMPAR HALAMAN KALO SUDAH BERHASIL UPDATE/EDIT
        return back()->with('success','Data Produk berhasil ter update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // FUNGSI DELETE DATA
    public function destroy($id)
    {
        // CARI DULU ID(PK) YANG DI PILIH
        Produk::where('id',$id)->delete();
        // PROSES MELEMPAR HALAMAN KALO SUDAH TERDELETE
        return back()->with('success','Data Produk berhasil di hapus');
    }

     // EXPORT PDF
     public function export_pdf()
     {
         $data = Produk::orderBy('nama_produk','asc');
         $data = $data->get();
 
         // Pass parameters to the export view
         $pdf = PDF::loadview('data.produk.exportPdf', ['data'=>$data]);
         $pdf->setPaper('a4', 'portrait');
         $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
         // SET FILE NAME
         $filename = date('YmdHis') . '_data_produk';
         // Download the Pdf file
         return $pdf->download($filename.'.pdf');
     }

       // EXPORT EXCEL
    public function export_excel(Request $request)
    {
        //QUERY
        $data = Produk::orderBy('nama_produk','asc');
        $data = $data->get();

        // Pass parameters to the export class
        $export = new DataProdukExportView($data);
        
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_produk';
        
        // Download the Excel file
        return Excel::download($export, $filename . '.xlsx');
    }
}
