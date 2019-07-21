<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TempatKursus;
use App\BuktiPembayaran;
use App\Paket;

class Transaksi extends Model
{
  protected $table = 'transaksi';
  protected $fillable = ['user_id', 'tempat_kursus_id', 'total_harga', 'paket_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function tempat_kursus() {
        return $this->belongsTo(TempatKursus::class);
  }

  public function bukti_pembayaran() {
        return $this->hasOne(BuktiPembayaran::class);
  }

  public function paket() {
    return $this->belongsTo(Paket::class);
  }
}
