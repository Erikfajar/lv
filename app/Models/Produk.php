<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'produk';
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    // RELASI
    public function detailpenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
