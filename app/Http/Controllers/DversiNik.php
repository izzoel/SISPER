<?php

namespace App\Http\Controllers;

use App\Imports\NikImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DversiNik extends Controller
{
    function import(Request $request)
    {
        try {
            Excel::import(new NikImport, $request->file('file'));

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Import Gagal!');
        }
    }
}
