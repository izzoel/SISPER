<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Portal extends Controller
{
    public function forpi(Request $request)
    {
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->pisn]) || Auth::attempt(['name' => $request->nim, 'password' => $request->pisn])) {
            Session::put('nim', $request->nim);
            Session::put('pisn', $request->pisn);
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }
    public function forbela(Request $request)
    {
        // if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->nik]) || Auth::attempt(['name' => $request->nim, 'password' => $request->nik])) {
        //     Session::put('nim', $request->nim);
        //     Session::put('nik', $request->nik);
        //     return response()->json(['success' => true, 'message' => 'Sukses']);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Gagal']);
        // }
        // Coba autentikasi mahasiswa tanpa hash password
        $mahasiswa = Mahasiswa::where('nim', $request->nim)
            ->where('nik', $request->nik)
            ->first();

        if ($mahasiswa) {
            Auth::guard('mahasiswa')->login($mahasiswa);
            Session::put('nim', $mahasiswa->nim);
            Session::put('nik', $mahasiswa->nik);
            return response()->json(['success' => true, 'message' => 'Login mahasiswa berhasil']);
        }

        // Jika gagal, coba autentikasi default (admin/dosen) pakai password hashed
        if (Auth::attempt(['name' => $request->nim, 'password' => $request->nik])) {
            return response()->json(['success' => true, 'message' => 'Login pengguna berhasil']);
        }

        // Jika keduanya gagal
        return response()->json(['success' => false, 'message' => 'Login gagal, periksa NIM/NIK Anda']);
    }
    public function dversi(Request $request)
    {
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->pisn]) || Auth::attempt(['name' => $request->nim, 'password' => $request->pisn])) {
            Session::put('nim', $request->nim);
            Session::put('pisn', $request->pisn);
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('landing');
    }
}
