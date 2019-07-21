<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaksi;
use App\Paket;
use App\Kota;

class TempatKursus extends Model
{
    protected $table = 'tempat_kursus';
    protected $fillable = ['user_id', 'nama', 'jenis', 'no_telepon', 'alamat', 'foto', 'deskripsi', 'acc', 'kota_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
      return $this->hasMany(Transaksi::class);
    }

    public function paket() {
      return $this->hasMany(Paket::class);
    }

    public function kota() {
      return $this->belongsTo(Kota::class);
    }
}
