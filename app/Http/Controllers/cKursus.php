<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TempatKursus;
use App\Paket;
use Auth;
use File;
use App\Kota;

class cKursus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tempatkursus = TempatKursus::where('user_id', Auth::user()->id)->get();
      return view('vendor.index', compact('tempatkursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $kota = Kota::all();
        return view('vendor.tambahtempat', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('foto');

        $this->validate($request, [
          'nama' => 'required',
          'foto' => 'required|image|mimes:png,jpg,jpeg,bmp|max:2000',
          'jenis' => 'required',
          'kota_id' => 'required',
          'no_telepon' => 'required|min:5|max:13',
          'alamat' => 'required',
          'deskripsi' => 'required',
        ]);

        $image1=$request->foto;
        $location="images/".Auth::user()->id."/fototempat/";
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
            $imageName1=$image1->getClientOriginalName();
            $image1->move($location, $imageName1);
            $formInput['foto']=$imageName1;
        }
        $formInput['user_id'] = Auth::user()->id;

        TempatKursus::create($formInput);

        return redirect()->route('vendor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempatkursus = TempatKursus::find($id);
        $kota = Kota::all();
        return view('vendor.edittempat', compact('tempatkursus', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $tempatkursus = TempatKursus::find($id);

      $this->validate($request, [
        'nama' => 'required',
        'foto' => 'image|mimes:png,jpg,jpeg,bmp|max:2000',
        'kota_id' => 'required',
        'jenis' => 'required',
        'no_telepon' => 'required|min:5|max:13',
        'alamat' => 'required',
        'deskripsi' => 'required',
      ]);

      $tempatkursus->nama = $request->nama;
      $tempatkursus->jenis = $request->jenis;
      $tempatkursus->no_telepon = $request->no_telepon;
      $tempatkursus->alamat = $request->alamat;
      $tempatkursus->deskripsi = $request->deskripsi;

      $image1=$request->foto;
      $location="images/".Auth::user()->id."/fototempat/";
      File::makeDirectory($location, 0777, true, true);
      if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $tempatkursus->foto=$imageName1;
      }

      $tempatkursus->save();

      return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tempatkursus=TempatKursus::find($id);
      $tempatkursus->delete();

      return redirect()->route('vendor.index');
    }

    public function all() {
      $tempatkursus = TempatKursus::where('acc', 1)->paginate(12);
      return view('halaman.tempatkursus', compact('tempatkursus'));
    }

    public function kategori($kategori) {
      $tempatkursus = TempatKursus::where('jenis', $kategori)->where('acc', 1)->paginate(12);
      return view('halaman.kategoritempat', compact('tempatkursus', 'kategori'));
    }

    public function kota($id) {
      $tempatkursus = TempatKursus::where('kota_id', $id)->where('acc', 1)->paginate(12);
      $kota = Kota::find($id);
      return view('halaman.kotatempat', compact('tempatkursus', 'kategori', 'kota'));
    }

    public function find(Request $request)
    {
      $search = \Request::get('search');
      $tempatkursus = TempatKursus::where('nama', 'like', '%'.$search.'%')->where('acc', 1)->paginate(12);

      return view('halaman.pencarian', compact('search', 'tempatkursus'));
    }

    public function paketcreate($id) {
      $tempatkursus = TempatKursus::find($id);
      return view('vendor.tambahpaket', compact('tempatkursus'));
    }

    public function paketstore(Request $request, $id) {
      $tempatkursus = TempatKursus::find($id);
      $formInput = $request->all();

      $this->validate($request, [
        'nama' => 'required',
        'harga' => 'required|min:4|max:15',
        'deskripsi' => 'required',
      ]);

      $formInput['tempat_kursus_id'] = $tempatkursus->id;

      Paket::create($formInput);

      return redirect()->route('vendor.index');
    }

    public function paketedit($id)
    {
        $paket = Paket::find($id);
        return view('vendor.editpaket', compact('paket'));
    }

    public function paketupdate(Request $request, $id)
    {
      $paket = Paket::find($id);

      $this->validate($request, [
        'nama' => 'required',
        'harga' => 'required|min:4|max:15',
        'deskripsi' => 'required',
      ]);

      $paket->nama = $request->nama;
      $paket->harga = $request->harga;
      $paket->deskripsi = $request->deskripsi;

      $paket->save();

      return redirect()->route('vendor.index');
    }

    public function paketdestroy($id)
    {
      $paket=Paket::find($id);
      $paket->delete();

      return redirect()->route('vendor.index');
    }

    public function status($id) {
      $tempatkursus = TempatKursus::find($id);
      if ($tempatkursus->acc==1) {
        $tempatkursus->acc=0;
      } else {
        $tempatkursus->acc=1;
      }
      $tempatkursus->save();

      return redirect('admin');
    }
}
