<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'detail_penjualan';
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    //Relasi 
    public function penjualan()
    {
        return $this->belongsTo(penjualan::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
