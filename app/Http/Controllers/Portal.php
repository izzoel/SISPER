<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Portal extends Controller
{
    public function forpi(Request $request)
    {
        if (Auth::attempt(['name' => $request->nim, 'password' => $request->pisn])) {
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
