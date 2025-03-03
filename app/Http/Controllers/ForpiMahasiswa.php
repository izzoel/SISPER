<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ForpiMahasiswa extends Controller
{
    function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        $mahasiswas = Mahasiswa::all();
        return view('auth.forpi.pages.section', compact('data', 'mahasiswas'));
    }

    function store(Request $request)
    {
        try {
            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'password' => Hash::make($request->nim),
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'prodi' => strtoupper($request->prodi),
                'pisn' => $request->pisn,
                'periode' => $request->periode
            ]);

            return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Gagal menambahkan mahasiswa!');
        }
    }

    function import(Request $request)
    {
        try {
            Excel::import(new MahasiswaImport, $request->file('file'));

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Import Gagal!');
        }
    }

    function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return response()->json($mahasiswa);
    }

    function update(Request $request, $nim)
    {
        try {
            $updateData = [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'prodi' => $request->prodi,
                'no_hp' => $request->hp,
                'alamat' => $request->alamat,
                'pisn' => $request->pisn,
                'periode' => $request->periode
            ];

            if ($request->pisn) {
                $updateData['password'] = Hash::make($request->pisn);
            }

            Mahasiswa::where('nim', $nim)->update($updateData);

            return redirect()->back()->with('success', 'Mahasiswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Mahasiswa gagal diperbarui!');
        }
    }

    function destroy($nim)
    {
        try {
            Mahasiswa::where('nim', $nim)->delete();

            return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Mahasiswa gagal dihapus!');
        }
    }
}
