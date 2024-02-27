<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'penjualan';
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI

    // Translate Formate ke INdonesia
    protected $appends = ['tanggal_penjualan_indo'];
    public function getTanggalPenjualanINdoAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_penjualan'])->translatedFormat('d F Y');
    }

    //Relasi
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailpenjualan()
    {
        return $this->hasOne(DetailPenjualan::class);
    }
}
