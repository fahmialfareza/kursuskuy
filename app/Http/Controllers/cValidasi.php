<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuktiPembayaran;
use App\Transaksi;
use Auth;
use File;

class cValidasi extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $transaksi = Transaksi::find($id);
      return view('user.validasi', compact('transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $formInput = $request->except('konfirmasi');

      $this->validate($request, [
        'transaksi_id' => 'required',
        'konfirmasi' => 'required|image|mimes:png,jpg,jpeg|max:2000',
        'nominal' => 'required',
      ]);

      $image1=$request->konfirmasi;
      $location="images/".Auth::user()->id."/konfirmasi/";
      File::makeDirectory($location, 0777, true, true);
      if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $formInput['konfirmasi']=$imageName1;
      }

      BuktiPembayaran::create($formInput);

      return redirect('home');
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
        $bukti = BuktiPembayaran::find($id);
        if ($bukti->status==0) {
          $bukti->status=1;
        } else {
          $bukti->status=0;
        }
        $bukti->save();

        return redirect('admin');
    }

    public function cetak($id) {
      $trans = Transaksi::find($id);
      $pdf = \PDF::loadView('pdf', compact('trans'));
      $name = "buktipemesanan-".$trans->id.".pdf";
      return $pdf->download($name);
    }
}
