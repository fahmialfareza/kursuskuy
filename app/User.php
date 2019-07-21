<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\TempatKursus;
use App\Transaksi;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'alamat', 'no_telepon', 'vendor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tempat_kursus() {
          return $this->hasMany(TempatKursus::class);
    }

    public function transaksi() {
          return $this->hasMany(Transaksi::class);
    }
}
