<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ForpiLapor extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        return view('auth.forpi.pages.section', compact('data'));
    }
    public function table()
    {
        if (request()->ajax()) {
            $lapor = Lapor::query();
            $mahasiswas = Mahasiswa::all();

            return DataTables::eloquent($lapor)
                ->addIndexColumn()
                ->addColumn('nim', function ($lapor) use ($mahasiswas) {
                    foreach ($mahasiswas as $mahasiswa) {
                        if ($lapor->nim == $mahasiswa->nim) {
                            return $mahasiswa->nim . ' -- ' . $mahasiswa->nama;
                        }
                    }
                })
                ->addColumn('status', function ($lapor) {
                    $statusClass = $lapor->status === 'baru' ? 'bg-label-primary' : 'bg-label-success';
                    $statusText = $lapor->status ?: 'selesai';

                    return '<span class="badge rounded-pill ' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('aksi', function ($lapor) {
                    $checked = $lapor->status === 'selesai' ? 'checked' : '';
                    return '<div class="form-switch">
                <input class="status-btn form-check-input" type="checkbox" data-id="' . $lapor->id . '" ' . $checked . '>
            </div>';
                })
                ->rawColumns(['nim', 'status', 'aksi'])
                ->make(true);
        }

        return view('auth.forpi.pages.section');
    }

    public function status(Request $request)
    {

        $lapor = Lapor::find($request->id);

        if ($lapor) {
            $lapor->status = $request->status ? 'selesai' : 'baru';
            $lapor->save();
            return response()->json(['success' => 'Status berhasil diperbarui!']);
        }

        return response()->json(['error' => 'Gagal memperbarui status.'], 400);
        // $statusLapor = Lapor::where('id', $id)->first();
        // $statusLapor->update(['status' => 'selesai']);

        // return back();
    }
}
