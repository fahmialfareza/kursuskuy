<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaksi;

class BuktiPembayaran extends Model
{
    protected $table = 'bukti_pembayaran';
    protected $fillable = ['transaksi_id', 'konfirmasi', 'nominal', 'status'];

    public function transaksi() {
      return $this->belongsTo(Transaksi::class);
    }
}
