<?php

use App\Transaksi;
use App\TempatKursus;
use App\Paket;
use App\BuktiPembayaran;
use App\Kota;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('halaman.index');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function() {
  Route::get('/admin', function(){
    $transaksi = Transaksi::all();
    $tempatkursus = TempatKursus::all();
    $kota = Kota::all();
    return view('admin.index', compact('transaksi', 'tempatkursus', 'kota'));
  });
  ROute::resource('admin/kota', 'cKota');
  Route::put('admin/status/{id}', 'cKursus@status')->name('tempat.status');
  Route::put('/valid/{id}', 'cValidasi@update')->name('validasi.update');
});

Route::group(['middleware' => ['auth', 'vendor']], function() {
  Route::resource('vendor' ,'cKursus');
  Route::get('/vendor/paket/create/{id}', 'cKursus@paketcreate')->name('paket.create');
  Route::post('/vendor/paket/{id}', 'cKursus@paketstore')->name('paket.store');
  Route::get('/vendor/paket/{id}/edit', 'cKursus@paketedit')->name('paket.edit');
  Route::put('/vendor/paket/{id}', 'cKursus@paketupdate')->name('paket.update');
  Route::delete('/vendor/paket/{id}', 'cKursus@paketdestroy')->name('paket.destroy');
});

Route::group(['middleware' => ['auth', 'user']], function() {
  Route::get('/home', function(){
    $transaksi = Transaksi::where('user_id', Auth::user()->id)->get();
    return view('user.index', compact('transaksi'));
  });
  Route::post('/daftar/{id}', 'cDaftar@createredirect')->name('daftarredirect');
  Route::get('/daftar/{id}/{paket}', 'cDaftar@create')->name('daftar');
  Route::post('daftar', 'cDaftar@store')->name('daftar.store');
  Route::get('/validasi/{id}', 'cValidasi@create')->name('validasi');
  Route::post('/validasi', 'cValidasi@store')->name('validasi.store');
  Route::get('/cetak/{id}', 'cValidasi@cetak')->name('cetak');
});

Route::get('/tempatkursus', 'cKursus@all');
Route::get('/pencarian', 'cKursus@find')->name('pencarian');
Route::get('/kota/{id}', 'cKursus@kota')->name('kota');
Route::get('/detail/{id}', function($id){
  $tempat = TempatKursus::find($id);
  return view('halaman.detail', compact('tempat'));
});
Route::get('/{kategori}', 'cKursus@kategori');
