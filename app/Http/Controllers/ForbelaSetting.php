<?php

namespace App\Http\Controllers;

use App\Models\Laboran;
use Illuminate\Http\Request;
use App\Models\Kalaboratorium;
use Yajra\DataTables\Facades\DataTables;

class ForbelaSetting extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function kalaboratorium()
    {
        if (request()->ajax()) {
            $kalaboratoriums = Kalaboratorium::query();

            return DataTables::eloquent($kalaboratoriums)
                ->addColumn('aksi', function ($setting) {
                    return '<a type="button" class="U_B_kalaboratorium text-info" data-kalaboratorium="#M_U_kalaboratorium-' . $setting->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    function show_kalaboratorium($id)
    {
        $kalaboratoriums = Kalaboratorium::where('id', $id)->first();
        return response()->json($kalaboratoriums);
    }

    function update_kalaboratorium(Request $request, $id)
    {
        try {
            $updateData = [
                'nama' => $request->nama,
                'nik' => $request->nik,
            ];

            Kalaboratorium::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Kepala Laboratorium berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Kepala Laboratorium gagal diperbarui!');
        }
    }
}
