<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TempatKursus;
use App\Transaksi;

class Paket extends Model
{
    protected $table = "paket";
    protected $fillable = ['tempat_kursus_id', 'nama', 'deskripsi', 'harga'];

    public function tempat_kursus() {
      return $this->belongsTo(TempatKursus::class);
    }

    public function transaksi() {
      return $this->hasMany(Transaksi::class);
    }
}
