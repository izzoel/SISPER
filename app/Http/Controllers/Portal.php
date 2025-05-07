<?php

namespace App\Http\Controllers;

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
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->nik]) || Auth::attempt(['name' => $request->nim, 'password' => $request->nik])) {
            Session::put('nim', $request->nim);
            Session::put('nik', $request->nik);
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
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
