<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\ForpiSubmit as Submit;
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
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data', 'entries'));
    }


    public function table()
    {
        if (request()->ajax()) {
            $entries = Submit::query();

            return DataTables::eloquent($entries)
                ->addIndexColumn()
                ->editColumn('status', function ($entry) {
                    $statusClass = $entry->status == 'BARU' ? 'bg-label-warning'
                        : ($entry->status == 'SUDAH PRINT' ? 'bg-label-success' : 'bg-label-danger');

                    return '<span class="badge rounded-pill ' . $statusClass . '">'
                        . ($entry->status ? $entry->status : 'Belum') . '</span>';
                })
                ->editColumn('aksi', function ($entry) {
                    return '<button class="btn btn-sm btn-info resubmit-btn" data-nim="' . $entry->nim . '" 
                            data-url="' . route('forpi_entry_resubmit', $entry->nim) . '"><i class="bx bx-refresh"></i>
                        </button>
                    <button class="btn btn-sm btn-primary print-btn" 
                            data-nim="' . $entry->nim . '" 
                            data-url="' . route('forpi_entry_print', $entry->nim) . '" 
                            data-doc="' . $entry->dokumen . '">
                            <i class="bx bx-printer"></i> Print
                        </button>';
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function print($nim)
    {
        $forpiEntry = Submit::where('nim', $nim)->first();
        $forpiEntry->update(['status' => 'SUDAH PRINT']);

        return back();
    }
    public function resubmit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $resubmit = Submit::where('nim', $nim)->first();

        $mahasiswa->update(['skpi' => 'RESUBMIT']);
        $resubmit->update(['status' => 'RESUBMIT']);
        return redirect()->back()->with('submit', 'Mengubah status ke resubmit!');
    }
}
