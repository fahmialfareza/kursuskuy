<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;

class cKota extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahkota');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $formInput = $request->all();

          $this->validate($request, [
            'kota' => 'required',
          ]);

          Kota::create($formInput);

          return redirect('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $kota = Kota::find($id);
          return view('admin.editkota', compact('kota'));
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
        $kota = Kota::find($id);

        $this->validate($request, [
          'kota' => 'required',
        ]);

        $kota->kota = $request->kota;
        $kota->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::find($id);
        $kota->delete();

        return redirect('admin');
    }
}
