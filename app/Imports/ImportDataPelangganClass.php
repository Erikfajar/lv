<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Pelanggan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

HeadingRowFormatter::default('none');


class ImportDataPelangganClass implements ToCollection, WithCalculatedFormulas
{
    /**
     * @param Collection $rows
     * @return MsHdCashflow
     */

    public  $insert;
    public  $edit;
    public  $gagal;
    public  $listgagal;

    // public function __construct(){
    //     $this->Tanggal = new Tanggal();
    //     $this->Konversi = new Konversi();
    // }

    public function collection(Collection $rows)
    {
        $trDt = [];
        $this->insert = 0;
        $this->edit = 0; 
        $this->gagal = 0; 
        $this->listgagal = "";

        foreach ($rows as $idx => $row) {
            if ($idx > 0) {
                //DECLARE REQUEST
                $no=isset($row[0])?($row[0]):'';
                // $judul = isset($row[1][4]) ? $row[1][4] : '';
                // $alamat = isset($row[2][4]) ? $row[2][4] : '';
                // $nomor_telepon = isset($row[3][4]) ? $row[3][4] : '';
                // $tahun_terbit = isset($row[4][4]) ? $row[4][4] : '';
                $nama_pelanggan=isset($row[1])?($row[1]):'';
                $alamat=isset($row[2])?($row[2]):'';
                $nomor_telepon=isset($row[3])?($row[3]):'';
      
                //READY REQUEST
                $trDt[$idx]['nama_pelanggan'] = $nama_pelanggan;
                $trDt[$idx]['alamat'] = $alamat;
                $trDt[$idx]['nomor_telepon'] = $nomor_telepon;

                $data = Pelanggan::where('nama_pelanggan', '=',''.$trDt[$idx]['nama_pelanggan'].'')->first();
                if ($data) {//UPDATE DATA
                    $data->nama_pelanggan         = $trDt[$idx]['nama_pelanggan'];
                    $data->alamat         = $trDt[$idx]['alamat'];
                    $data->nomor_telepon         = $trDt[$idx]['nomor_telepon'];
                    // SAVE THE DATA
                    if ($data->save()) {
                        // SUCCESS
                        ++$this->edit;
                    }
                } else {//INSERT DATA
                    if($trDt[$idx]['nama_pelanggan']){
                        $data =  new Pelanggan();
                        $data->nama_pelanggan         = $trDt[$idx]['nama_pelanggan'];
                        $data->alamat         = $trDt[$idx]['alamat'];
                        $data->nomor_telepon         = $trDt[$idx]['nomor_telepon'];
                        // SAVE THE DATA
                        if ($data->save()) {
                            // SUCCESS
                            ++$this->insert;
                        }
                    }else{
                        // FAILED
                        ++$this->gagal;
                        $this->listgagal.="(".$trDt[$idx]['nama_pelanggan']." - ".$trDt[$idx]['nama_pelanggan']."),<br>";
                    }
                }
            }
        }
    }


}
