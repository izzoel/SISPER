<?php

namespace App\Http\Controllers;

use App\Models\Rektor;
use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DversiSetting extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function fakultas()
    {
        if (request()->ajax()) {
            $settings = Fakultas::query();

            return DataTables::eloquent($settings)
                ->addIndexColumn()
                ->addColumn('dekan', function ($setting) {
                    return $setting->dekan . ' (' . $setting->nik . ')';
                })
                ->addColumn('aksi', function ($setting) {
                    return '<a type="button" class="U_B_fakultas text-info" data-fakultas="#M_U_fakultas-' . $setting->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>';
                })
                ->rawColumns(['dekan', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }
    public function prodi()
    {
        if (request()->ajax()) {
            $prodis = Prodi::query();

            return DataTables::eloquent($prodis)
                ->addIndexColumn()
                ->addColumn('kaprodi', function ($setting) {
                    return $setting->kaprodi . ' (' . $setting->nik . ')';
                })
                ->addColumn('aksi', function ($setting) {
                    return '<a type="button" class="U_B_prodi text-info" data-prodi="#M_U_prodi-' . $setting->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>';
                })
                ->rawColumns(['kaprodi', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function rektor()
    {
        if (request()->ajax()) {
            $rektors = Rektor::query();

            return DataTables::eloquent($rektors)
                ->addColumn('aksi', function ($setting) {
                    return '<a type="button" class="U_B_rektor text-info" data-rektor="#M_U_rektor-' . $setting->id . '">
                                <span class="tf-icons bx bx-edit"></span> Edit
                            </a>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    function show_fakultas($id)
    {
        $setting = Fakultas::where('id', $id)->first();
        return response()->json($setting);
    }
    function show_prodi($id)
    {
        $prodi = Prodi::where('id', $id)->first();
        return response()->json($prodi);
    }
    function show_rektor($id)
    {
        $rektor = Rektor::where('id', $id)->first();
        return response()->json($rektor);
    }

    function update_fakultas(Request $request, $id)
    {
        try {
            $updateData = [
                'dekan' => $request->dekan,
                'nik' => $request->nik,
                'tanggal_terbit' => $request->tanggal_terbit,
            ];

            Fakultas::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Fakultas berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Fakultas gagal diperbarui!');
        }
    }
    function update_prodi(Request $request, $id)
    {
        try {
            $updateData = [
                'kaprodi' => $request->kaprodi,
                'nik' => $request->nik,
                'tanggal_terbit' => $request->tanggal_terbit,
                'akreditasi' => $request->akreditasi,
                'no_akreditasi' => $request->no_akreditasi
            ];

            Prodi::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Prodi berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Prodi gagal diperbarui!');
        }
    }
    function update_rektor(Request $request, $id)
    {
        try {
            $updateData = [
                'nama' => $request->nama,
                'nik' => $request->nik,
            ];

            Rektor::where('id', $id)->update($updateData);

            return redirect()->back()->with('success', 'Rektor berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Rektor gagal diperbarui!');
        }
    }
}
