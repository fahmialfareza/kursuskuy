<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TempatKursus;

class Kota extends Model
{
  protected $table = "kota";
  protected $fillable = ['kota'];

  public function tempat_kursus() {
    return $this->hasMany(TempatKursus::class);
  }
}
