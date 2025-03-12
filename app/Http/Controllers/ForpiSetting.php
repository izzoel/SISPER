<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ForpiSetting extends Controller
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
            $settings = Setting::query();

            return DataTables::eloquent($settings)
                ->addIndexColumn()
                ->addColumn('kaprodi', function ($setting) {
                    return $setting->kaprodi . ' (' . $setting->nik . ')';
                })
                ->addColumn('aksi', function ($setting) {
                    return '<a type="button" class="U_B_setting text-info" data-id="#M_U_setting-' . $setting->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>';
                })
                ->rawColumns(['kaprodi', 'aksi'])
                ->make(true);
        }

        return view('auth.forpi.pages.section');
    }

    function show($id)
    {
        $setting = Setting::where('id', $id)->first();
        return response()->json($setting);
    }

    function update(Request $request, $id)
    {
        try {
            $updateData = [
                'kaprodi' => $request->kaprodi,
                'nik' => $request->nik,
                'tanggal_terbit' => $request->tanggal_terbit,
            ];

            Setting::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Mahasiswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Mahasiswa gagal diperbarui!');
        }
    }
}
