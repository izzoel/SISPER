<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ForbelaLapor extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table()
    {
        if (request()->ajax()) {
            $lapor = Lapor::where('menu', 'FORBELA');
            $mahasiswas = Mahasiswa::all();

            return DataTables::eloquent($lapor)
                ->filter(function ($query) use ($mahasiswas) {
                    if ($search = request()->get('search')['value']) {
                        $query->where(function ($q) use ($search, $mahasiswas) {
                            $q->where('nim', 'like', "%{$search}%");
                            foreach ($mahasiswas as $mahasiswa) {
                                if (stripos($mahasiswa->nama, $search) !== false) {
                                    $q->orWhere('nim', $mahasiswa->nim);
                                }
                            }
                            $q->orWhere('lapor', 'like', "%{$search}%");
                            $q->orWhere('status', 'like', "%{$search}%");
                        });
                    }
                })
                ->addIndexColumn()
                ->addColumn('nim', function ($lapor) use ($mahasiswas) {
                    foreach ($mahasiswas as $mahasiswa) {
                        if ($lapor->nim == $mahasiswa->nim) {
                            return $mahasiswa->nim . ' -- ' . $mahasiswa->nama;
                        }
                    }
                    return '-';
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
                ->orderColumn('status', function ($query, $order) {
                    // Urutkan: "baru" dulu, "selesai" berikutnya
                    $query->orderByRaw("CASE WHEN status='baru' THEN 0 ELSE 1 END {$order}");
                })
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
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
    }
}
