<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ForpiMahasiswa extends Controller
{
    function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        $mahasiswas = Mahasiswa::all();
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data', 'mahasiswas'));
    }

    public function table()
    {
        if (request()->ajax()) {
            $mahasiswas = Mahasiswa::query();

            return DataTables::eloquent($mahasiswas)
                ->addIndexColumn()
                ->addColumn('nik', function ($mahasiswa) {
                    $statusClass = $mahasiswa->nik ? 'bg-label-primary' : 'bg-label-danger';
                    $statusText = $mahasiswa->nik ?: 'Belum';

                    return '<span class="badge rounded-pill ' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('pisn', function ($mahasiswa) {
                    $statusClass = $mahasiswa->pisn ? 'bg-label-primary' : 'bg-label-danger';
                    $statusText = $mahasiswa->pisn ?: 'Belum';

                    return '<span class="badge rounded-pill ' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('tanggal_yudisium', function ($mahasiswa) {
                    return \Carbon\Carbon::createFromFormat('Y-m-d', $mahasiswa->tanggal_yudisium)->translatedFormat('d F Y');
                })
                ->addColumn('aksi', function ($mahasiswa) {
                    return '<a type="button" class="U_B_mahasiswa text-info" data-nim="#M_U_mahasiswa-' . $mahasiswa->nim . '">
                        <span class="tf-icons bx bx-edit"></span> Edit
                    </a>

                    <span class="mx-1">|</span>

                    <a type="button" class="D_B_mahasiswa text-danger" data-nim="' . $mahasiswa->nim . '">
                        <span class="tf-icons bx bxs-x-square"></span>
                    </a>';
                })
                ->orderColumn('nik', function ($query, $direction) {
                    $query->orderBy('nik', $direction);
                })
                ->orderColumn('pisn', function ($query, $direction) {
                    $query->orderBy('pisn', $direction);
                })
                ->rawColumns(['nik', 'pisn', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    function store(Request $request)
    {
        try {
            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'password' => Hash::make($request->nim),
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'prodi' => strtoupper($request->prodi),
                'pisn' => $request->pisn,
                'periode_lulus' => $request->periode_lulus
            ]);

            return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Gagal menambahkan mahasiswa!');
        }
    }

    function import(Request $request)
    {
        try {
            Excel::import(new MahasiswaImport, $request->file('file'));

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Import Gagal!');
        }
    }

    function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return response()->json($mahasiswa);
    }

    function update(Request $request, $nim)
    {
        try {
            $updateData = [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelamin' => $request->kelamin,
                'prodi' => $request->prodi,
                'no_hp' => $request->hp,
                'alamat' => $request->alamat,
                'nik' => $request->nik,
                'pisn' => $request->pisn,
                'periode_lulus' => $request->periode_lulus
            ];

            if ($request->pisn) {
                $updateData['password'] = Hash::make($request->pisn);
            }

            Mahasiswa::where('nim', $nim)->update($updateData);

            return redirect()->back()->with('success', 'Mahasiswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Mahasiswa gagal diperbarui!');
        }
    }

    function destroy($nim)
    {
        try {
            Mahasiswa::where('nim', $nim)->delete();

            return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Mahasiswa gagal dihapus!');
        }
    }
}
