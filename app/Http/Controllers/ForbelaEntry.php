<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForbelaSubmit as Submit;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ForbelaEntry extends Controller
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
            $user = Auth::user();
            if ($user->name != 'verifikator') {
                $entries = Submit::query()->where(function ($query) {
                    $query->where('status', 'DITINJAU')
                        ->orWhere('status', 'BARU')
                        ->orWhere('status', 'VALID');
                });
            } else {
                $entries = Submit::query()->where(function ($query) {
                    $query->where('status', 'DITINJAU')
                        ->orWhere('status', 'VALID');
                });
            }

            return DataTables::eloquent($entries)
                ->addIndexColumn()
                ->addColumn('status', function ($entry) {
                    $statusClass = $entry->status == 'BARU' ? 'bg-label-danger'
                        : ($entry->status == 'DITINJAU' ? 'bg-label-warning' : 'bg-label-success');

                    return '<span class="badge rounded-pill ' . $statusClass . '">'
                        . ($entry->status ? $entry->status : 'Ditinjau') . '</span>';
                })
                ->addColumn('pembayaran', function ($entry) use ($user) {
                    // Tentukan URL dan label link
                    if ($user->name === 'verifikator') {
                        $url = $entry->surat;
                        $label = 'Download';
                        $icon = "<i class='bx bxs-download'></i> ";
                    } else {
                        $url = $entry->pembayaran;
                        $label = 'Lihat';
                        $icon = "<i class='bx bx-show'></i>";
                    }

                    return $url
                        ? '<a href="' . $url . '" target="_blank"><button type="button" class="btn btn-sm btn-primary">' . $icon . ' ' . $label . '</button></a>'
                        : '-';
                })


                ->addColumn('aksi', function ($entry) use ($user) {
                    // Tentukan class input berdasarkan user
                    $inputClass = $user->name === 'verifikator' ? 'validasi-btn' : 'status-btn';

                    // Atur checkbox checked sesuai kondisi
                    $checked = 'checked'; // default dicentang

                    if (
                        ($user->name === 'verifikator' && $entry->status === 'DITINJAU') ||
                        ($user->name !== 'verifikator' && $entry->status === 'BARU')
                    ) {
                        $checked = ''; // tidak dicentang
                    }

                    // Atur jika harus disabled (user bukan verifikator dan status VALID)
                    $disabled = ($user->name !== 'verifikator' && $entry->status === 'VALID') ? 'disabled' : '';

                    return '<div class="form-switch">
                        <input class="' . $inputClass . ' form-check-input" type="checkbox" data-id="' . $entry->id . '" ' . $checked . ' ' . $disabled . '>
                    </div>';
                })


                ->rawColumns(['status', 'pembayaran', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function status(Request $request)
    {

        $submit = Submit::find($request->id);

        if ($submit) {
            $submit->status = $request->status ? 'DITINJAU' : 'BARU';
            $submit->save();
            return response()->json(['success' => 'Status berhasil diperbarui!']);
        }

        return response()->json(['error' => 'Gagal memperbarui status.'], 400);
    }

    public function validasi(Request $request)
    {
        $submit = Submit::find($request->id);

        if ($submit) {
            $submit->status = $request->status ? 'VALID' : 'DITINJAU';
            $submit->save();

            return response()->json(['success' => 'Status berhasil diperbarui!']);
        }

        return response()->json(['error' => 'Gagal memperbarui status.'], 400);
    }
}
