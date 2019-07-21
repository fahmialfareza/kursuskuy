<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TempatKursus;
use App\Transaksi;
use App\Paket;

class cDaftar extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function createredirect(Request $request, $id)
     {
         $url = 'daftar/'.$id.'/'.$request->paket;
         return redirect($url);
     }

    public function create($id, $paket)
    {
        $tempat = TempatKursus::find($id);
        $paket = Paket::find($paket);
        $user = Auth::user();
        return view('user.daftar', compact('tempat', 'paket', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('paket', 'nama');

        $this->validate($request, [
          'tempat_kursus_id' => 'required',
          'paket_id' => 'required',
          'total_harga' => 'required|min:5|max:15',
        ]);
        $formInput['user_id'] = Auth::user()->id;

        Transaksi::create($formInput);

        return redirect('home');
    }
}
