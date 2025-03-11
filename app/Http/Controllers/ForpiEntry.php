<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ForpiEntry extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        $entries = Submit::all();
        return view('auth.forpi.pages.section', compact('data', 'entries'));
    }


    public function table()
    {
        if (request()->ajax()) {
            $entries = Submit::query();

            return DataTables::eloquent($entries)
                ->addIndexColumn()
                ->addColumn('status', function ($entry) {
                    $statusClass = $entry->status == 'baru' ? 'bg-label-warning'
                        : ($entry->status == 'sudah print' ? 'bg-label-success' : 'bg-label-danger');

                    return '<span class="badge rounded-pill ' . $statusClass . '">'
                        . ($entry->status ? $entry->status : 'Belum') . '</span>';
                })
                ->addColumn('aksi', function ($entry) {
                    return '<button class="btn btn-sm btn-primary print-btn" 
                            data-nim="' . $entry->nim . '" 
                            data-url="' . route('forpi_entry_print', $entry->nim) . '" 
                            data-doc="' . $entry->dokumen . '">
                            <i class="bx bx-printer"></i> Print
                        </button>';
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }

        return view('auth.forpi.pages.section');
    }

    public function print($nim)
    {
        $forpiEntry = Submit::where('nim', $nim)->first();
        $forpiEntry->update(['status' => 'sudah print']);

        return back();
    }
}
