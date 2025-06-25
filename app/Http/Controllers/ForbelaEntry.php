<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\ForbelaMail;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\ForbelaSubmit as Submit;
use Illuminate\Support\Facades\Storage;
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

    public function email(Request $request)
    {
        $entry = Submit::find($request->id);

        $data = [
            'nama' => $request->input('nama', $entry->nama),
        ];

        $url = $entry->surat;
        $response = Http::get($url);

        if ($response->successful()) {
            // Simpan sementara di storage (misal: storage/app/temp/)
            $nama = $data['nama'];
            $tanggal = now()->locale('id')->translatedFormat('d F Y');

            $filename = 'temp/' . Str::random(10) . '.pdf';
            Storage::put($filename, $response->body());

            // Path absolut untuk attachment
            $path = storage_path('app/private/' . $filename);
            $attachment = strtoupper("FORBELA -- {$nama} -- {$tanggal}.pdf");
            // Kirim email dengan attachment (nama lampiran disesuaikan)
            Mail::to($entry->email)->send(
                (new ForbelaMail($data))->attach($path, [
                    'as' => $attachment,
                    'mime' => 'application/pdf',
                ])
            );
            Storage::delete($filename);

            return response()->json(['success' => 'Email dengan berhasil dikirim!']);
        } else {
            return response()->json(['error' => 'Gagal mengunduh lampiran.'], 500);
        }
    }

    public function table()
    {
        if (request()->ajax()) {
            $user = Auth::user();
            if ($user->name != 'verifikator') {
                $entries = Submit::query()->where(function ($query) {
                    $query->where('status', 'DITINJAU')
                        ->orWhere('status', 'BARU')
                        ->orWhere('status', 'VALID')
                        ->orWhere('status', 'RESUBMIT');
                });
            } else {
                $entries = Submit::query()->where(function ($query) {
                    $query->where('status', 'DITINJAU')
                        ->orWhere('status', 'VALID');
                });
            }

            return DataTables::eloquent($entries)
                ->editColumn('status', function ($entry) {
                    $statusClass = $entry->status == 'BARU' ? 'bg-label-danger'
                        : ($entry->status == 'DITINJAU' ? 'bg-label-warning'
                            : ($entry->status == 'RESUBMIT' ? 'bg-label-secondary' : 'bg-label-success'));

                    return '<span class="badge rounded-pill ' . $statusClass . '">'
                        . ($entry->status ?: 'Ditinjau') . '</span>';
                })
                ->editColumn('email', function ($entry) {
                    $statusClass = $entry->status == 'BARU' ? 'bg-label-danger'
                        : ($entry->status == 'DITINJAU' ? 'bg-label-warning'
                            : ($entry->status == 'RESUBMIT' ? 'bg-label-secondary' : 'bg-label-success'));

                    return '<span class="badge rounded-pill ' . $statusClass . ' text-lowercase">'
                        . $entry->email . '</span>';
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
                        : '<span class="badge rounded-pill bg-label-primary"><i>Non Eksperimen</i></span>';
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

                    $resubmitButton = '';
                    if ($user->name != 'verifikator') {
                        $resubmitButton = '
                            <button class="btn btn-sm btn-info resubmit-btn" data-nim="' . $entry->nim . '" 
                                data-url="' . route('forbela_entry_resubmit', $entry->nim) . '">
                                <i class="bx bx-refresh"></i>
                            </button>';
                    }

                    return '
                        <td class="align-middle">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                ' . $resubmitButton . '
                                <div class="form-switch m-0 d-flex align-items-center">
                                    <input 
                                        class="' . $inputClass . ' form-check-input" 
                                        type="checkbox" 
                                        data-id="' . $entry->id . '" 
                                        ' . ($entry->status !== 'RESUBMIT' ? $checked : '') . '>
                                </div>
                            </div>
                        </td>';
                })

                ->rawColumns(['status', 'email', 'pembayaran', 'aksi'])
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

    public function resubmit($nim)
    {
        $resubmit = Submit::where('nim', $nim)->first();

        $resubmit->update(['status' => 'RESUBMIT']);
        return redirect()->back()->with('submit', 'Mengubah status ke resubmit!');
    }
}
