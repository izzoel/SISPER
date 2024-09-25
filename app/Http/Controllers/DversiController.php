<?php

namespace App\Http\Controllers;

use App\Models\Dversi;
use App\Models\DversiVerifikasi;
use Illuminate\Http\Request;

class DversiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $admin_dversi = DversiVerifikasi::all();
        return view('/dversi/dversi_ijazah_admin', compact('admin_dversi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DversiVerifikasi::updateOrCreate(
            ['nim' => $request->input('nim'), 'nik' => $request->input('nik')],
            $request->all()
        );
        return redirect('/landing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dversi  $dversi
     * @return \Illuminate\Http\Response
     */
    public function show(Dversi $dversi, $nim, $nik)
    {
        $data_dversi = Dversi::where('nim', $nim)->where('nik', $nik)->get();
        return view('/layout/content', compact('data_dversi'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dversi  $dversi
     * @return \Illuminate\Http\Response
     */
    public function edit(Dversi $dversi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dversi  $dversi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dversi $dversi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dversi  $dversi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dversi $dversi)
    {
        //
    }
}
