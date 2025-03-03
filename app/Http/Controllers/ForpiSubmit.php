<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ForpiSubmit extends Controller
{
    function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];
        $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();
        if ($mahasiswa) {
            return view('auth.forpi.pages.section', compact('data', 'mahasiswa'));
        } else {
            return redirect()->route('logout');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kejuaraan = $request->input('kejuaraan', []);
        $no_kejuaraan = $request->input('no_kejuaraan', []);

        $sertifikat = $request->input('sertifikat', []);
        $no_sertifikat = $request->input('no_sertifikat', []);

        $beasiswa = $request->input('beasiswa', []);

        $organisasi = $request->input('organisasi', []);
        $jabatan_organisasi = $request->input('jabatan_organisasi', []);

        $kejuaraan_formatted = [];
        foreach ($kejuaraan as $index => $nama_kejuaraan) {
            if (!empty($nama_kejuaraan) && isset($no_kejuaraan[$index]) && !empty($no_kejuaraan[$index])) {
                $kejuaraan_formatted[] = "{$nama_kejuaraan} ({$no_kejuaraan[$index]})";
            }
        }

        $sertifikat_formatted = [];
        foreach ($sertifikat as $index => $nama_sertifikat) {
            if (!empty($nama_sertifikat) && isset($no_sertifikat[$index]) && !empty($no_sertifikat[$index])) {
                $sertifikat_formatted[] = "{$nama_sertifikat} ({$no_sertifikat[$index]})";
            }
        }

        $beasiswa_formatted = array_filter($beasiswa, fn($nama) => !empty($nama));

        $organisasi_formatted = [];
        foreach ($organisasi as $index => $nama_organisasi) {
            if (!empty($nama_organisasi) && isset($jabatan_organisasi[$index]) && !empty($jabatan_organisasi[$index])) {
                $organisasi_formatted[] = "{$nama_organisasi} ({$jabatan_organisasi[$index]})";
            }
        }
        try {
            Submit::updateOrCreate(
                [
                    'nim' => session('nim')
                ],
                [
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'prodi' => $request->prodi,
                    'pisn' => session('pisn'),
                    'studi' => $request->studi,
                    'judul' => $request->judul,
                    'toefl' => $request->toefl,
                    'kejuaraan' => implode("\n", $kejuaraan_formatted),
                    'sertifikat' => implode("\n", $sertifikat_formatted),
                    'beasiswa' => implode("\n", $beasiswa_formatted),
                    'organisasi' => implode("\n", $organisasi_formatted),
                    'status' => 'baru'
                ]
            );

            return redirect()->back()->with('success', 'Berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Gagal kirim!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForpiSubmit $forpiSubmit)
    {
        //
    }
}
