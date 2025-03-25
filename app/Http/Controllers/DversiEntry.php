<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\Rektor;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Illuminate\Support\Facades\Log;
use App\Models\DversiSubmit as Submit;
use Yajra\DataTables\Facades\DataTables;

class DversiEntry extends Controller
{

    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }


    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        $entries = Mahasiswa::whereNotNull('nik')->whereNotNull('pisn')->get();
        foreach ($entries as $entry) {
            if (is_null($entry->ijazah)) {
                $entry->update(['ijazah' => 'ELIGIBLE']);
            }
        }
        return view('auth.' . request()->segment(1) . '.pages.section', compact('data'));
    }

    public function table()
    {
        if (request()->ajax()) {
            $entries = Mahasiswa::query()
                ->leftJoin('dversi_submits as submits', 'submits.nim', '=', 'mahasiswas.nim')
                ->select('mahasiswas.*', 'submits.status as submit_status', 'submits.dokumen as submit_dokumen')
                ->orderByRaw("
                    CASE 
                        WHEN mahasiswas.ijazah = 'ELIGIBLE' THEN 1
                        WHEN mahasiswas.ijazah = 'MENUNGGU VERIFIKASI' THEN 2
                        WHEN submits.status = 'DIVERIFIKASI' THEN 3
                        WHEN (mahasiswas.nik IS NULL OR mahasiswas.nik = '') 
                            AND (mahasiswas.pisn IS NULL OR mahasiswas.pisn = '') THEN 4
                        WHEN mahasiswas.nik IS NULL OR mahasiswas.nik = '' THEN 5
                        WHEN mahasiswas.pisn IS NULL OR mahasiswas.pisn = '' THEN 6
                        ELSE 7
                    END
                ");

            return DataTables::eloquent($entries)
                ->addIndexColumn()
                ->addColumn('status', function ($entry) {
                    $statusOrder = 7; // Default jika tidak ada status
                    $statusText = '<span class="badge rounded-pill bg-label-secondary">Lainnya</span>';

                    if (!empty($entry->ijazah)) {
                        if ($entry->ijazah == 'ELIGIBLE') {
                            $statusOrder = 1;
                            $statusText = '<span class="badge rounded-pill bg-label-primary">Eligible</span>';
                        } elseif ($entry->ijazah == "MENUNGGU VERIFIKASI") {
                            $statusOrder = 2;
                            $statusText = '<span class="badge rounded-pill bg-label-info">Menunggu Verifikasi</span>';
                        } elseif ($entry->submit_status == "DIVERIFIKASI") {
                            $statusOrder = 3;
                            $statusText = '<span class="badge rounded-pill bg-label-success">Diverifikasi</span>';
                        }
                    } elseif (empty($entry->nik) && empty($entry->pisn)) {
                        $statusOrder = 4;
                        $statusText = '<span class="badge rounded-pill bg-label-danger">NIK & PISN belum</span>';
                    } elseif (empty($entry->nik)) {
                        $statusOrder = 5;
                        $statusText = '<span class="badge rounded-pill bg-label-warning">NIK belum</span>';
                    } elseif (empty($entry->pisn)) {
                        $statusOrder = 6;
                        $statusText = '<span class="badge rounded-pill bg-label-warning">PISN belum</span>';
                    }

                    return '<span data-order="' . $statusOrder . '">' . $statusText . '</span>';
                })

                ->addColumn('tanggal_yudisium', function ($mahasiswa) {
                    return \Carbon\Carbon::createFromFormat('Y-m-d', $mahasiswa->tanggal_yudisium)->translatedFormat('d F Y');
                })
                ->addColumn('aksi', function ($entry) {
                    $orderValue = 4; // Default jika tidak ada aksi
                    $buttons = '';

                    if ($entry->ijazah == "ELIGIBLE") {
                        $orderValue = 1;
                        $buttons = '<button class="btn btn-sm btn-primary pdf-btn" data-nim="' . $entry->nim . '" 
        data-url="' . route('dversi_entry_pdf', $entry->nim) . '" >
        <i class="bx bx-cloud-upload"></i> Buat Ijazah
    </button>';
                    } elseif ($entry->ijazah == "MENUNGGU VERIFIKASI") {
                        $orderValue = 2;
                        $buttons = '<button class="btn btn-sm btn-info pdf-btn me-1" data-nim="' . $entry->nim . '" 
        data-url="' . route('dversi_entry_pdf', $entry->nim) . '">
        <i class="bx bx-refresh"></i>
    </button>';

                        if (!empty($entry->submit_dokumen)) {
                            $buttons .= '<a class="btn btn-sm btn-info text-white" href="' . $entry->submit_dokumen . '" target="_blank">
            <i class="bx bx-show "></i> Lihat
        </a>';
                        }
                    } elseif ($entry->ijazah == "DIVERIFIKASI") {
                        $orderValue = 3;
                        if (!empty($entry->submit_dokumen)) {
                            $buttons .= '<a class="btn btn-sm btn-success text-white" href="' . $entry->submit_dokumen . '" target="_blank">
            <i class="bx bx-printer"></i> Print
        </a>';
                        }
                    } else {
                        $buttons = '<button class="btn btn-sm btn-primary" disabled>
        <i class="bx bx-cloud-upload"></i> Buat Ijazah
    </button>';
                    }

                    return '<span data-order="' . $orderValue . '">' . $buttons . '</span>';
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }

        return view('auth.' . request()->segment(1) . '.pages.section');
    }

    public function show()
    {
        $data = Mahasiswa::select('periode_lulus', 'tanggal_yudisium')->distinct()->get();
        return response()->json($data);
    }

    public function ijazah($periode_lulus, $tanggal_yudisium)
    {
        try {
            $periode_lulus = str_replace('-', '/', $periode_lulus);
            $mahasiswas = Mahasiswa::where('ijazah', 'ELIGIBLE')
                ->where('periode_lulus', $periode_lulus)
                ->where('tanggal_yudisium', $tanggal_yudisium)
                ->get();

            // Jika tidak ada data, kirim response kosong
            if ($mahasiswas->isEmpty()) {
                return response()->json(['status' => 'empty'], 200);
            }

            // Kirim data jumlah mahasiswa ke frontend untuk SweetAlert2
            return response()->json([
                'status' => 'processing',
                'total' => $mahasiswas->count(),
                'data' => $mahasiswas // Kirim daftar mahasiswa agar bisa diproses AJAX
            ], 200);
        } catch (\Exception $e) {
            session()->flash('fail', 'Gagal membuat ijazah!');
            return response()->json(['status' => 'error', 'message' => 'Gagal dibuat!'], 500);
        }
    }

    public function proses($nim)
    {
        try {
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();

            if (!$mahasiswa) {
                return response()->json(['status' => 'error', 'message' => 'Mahasiswa tidak ditemukan'], 404);
            }

            // Ambil data fakultas dan prodi dengan validasi
            $setting_fakultas = Fakultas::where('fakultas', $mahasiswa->fakultas)->first();
            if (!$setting_fakultas) {
                return response()->json(['status' => 'error', 'message' => 'Fakultas tidak ditemukan'], 404);
            }

            $prodiFormatted = ucwords(strtolower($mahasiswa->prodi));
            $setting_prodi = Prodi::where('prodi', $prodiFormatted)->first();
            if (!$setting_prodi) {
                return response()->json(['status' => 'error', 'message' => 'Program Studi tidak ditemukan'], 404);
            }

            // Ambil Rektor hanya sekali
            $rektor = Rektor::first();

            // Mapping data setting ijazah
            $setting = [
                'prodi' => trim(str_replace(['Sarjana', 'Diploma Tiga'], '', $setting_prodi->prodi)),
                'akreditasi' => trim(str_replace('Program Studi :', '', $setting_prodi->akreditasi)),
                'no_akreditasi' => $setting_prodi->no_akreditasi,
                'jenjang' => preg_match('/\b(Sarjana|Diploma Tiga)\b/', $setting_prodi->prodi, $matches) ? $matches[0] : '',
                't_terbit' => Carbon::createFromFormat('Y-m-d', $setting_fakultas->tanggal_terbit)->translatedFormat('d F Y'),
                'dekan' => $setting_fakultas->dekan,
                'nik_dekan' => $setting_fakultas->nik,
                'rektor' => $rektor->nama,
                'nik_rektor' => $rektor->nik,
            ];

            // Update status mahasiswa
            $mahasiswa->update(['ijazah' => 'MENUNGGU VERIFIKASI']);

            // Generate dokumen di Google Docs
            try {
                $newDocTitle = "IJAZAH--" . $mahasiswa->nama . "--" . now()->format('d/m/Y H:i:s');
                $newDocId = $this->googleService->ijazah($newDocTitle);
            } catch (\Exception $e) {
                Log::error("Gagal membuat Google Docs: " . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal membuat dokumen ijazah'], 500);
            }

            // Simpan atau update Submit
            $ijazah = Submit::updateOrCreate(
                ['nim' => $mahasiswa->nim],
                [
                    'nama' => $mahasiswa->nama,
                    'tempat_lahir' => strtoupper($mahasiswa->tempat_lahir),
                    'tanggal_lahir' => $mahasiswa->tanggal_lahir,
                    'nik' => $mahasiswa->nik,
                    'fakultas' => strtoupper($mahasiswa->fakultas),
                    'prodi' => $mahasiswa->prodi,
                    'gelar' => $mahasiswa->gelar,
                    'pisn' => $mahasiswa->pisn,
                    'periode_lulus' => $mahasiswa->periode_lulus,
                    'dokumen' => "https://docs.google.com/document/d/$newDocId/edit?tab=t.0",
                    'tanggal_yudisium' => $mahasiswa->tanggal_yudisium,
                    'status' => 'MENUNGGU VERIFIKASI'
                ]
            );

            // Mapping data untuk pengisian dokumen
            $data = [
                'pisn' => $ijazah->pisn,
                'nama' => $ijazah->nama,
                'tempat_lahir' => strtoupper($ijazah->tempat_lahir),
                'tanggal_lahir' => strtoupper(Carbon::createFromFormat('Y-m-d', $ijazah->tanggal_lahir)->translatedFormat('d F Y')),
                'nim' => $ijazah->nim,
                'nik' => $ijazah->nik,
                'fakultas' => strtoupper($ijazah->fakultas),
                'prodi' => strtoupper($setting['prodi']),
                'jenjang' => strtoupper($setting['jenjang']),
                'akreditasi' => $setting['akreditasi'],
                'no_akreditasi' => $setting['no_akreditasi'],
                'tanggal_yudisium' => strtoupper(Carbon::createFromFormat('Y-m-d', $ijazah->tanggal_yudisium)->translatedFormat('d F Y')),
                'gelar' => $ijazah->gelar,
                't_terbit' => $setting['t_terbit'],
                'dekan' => $setting['dekan'],
                'nik_dekan' => $setting['nik_dekan'],
                'rektor' => $setting['rektor'],
                'nik_rektor' => $setting['nik_rektor'],
            ];

            // Replace content di Google Docs dan share ke email
            try {
                $this->googleService->replaceIjazah($newDocId, $data);
                $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');

                // Generate PDF dari dokumen yang sudah diisi
                $pdfUrl = $this->googleService->exportPdf($newDocId, ucwords(strtolower($ijazah->prodi)), $ijazah->periode_lulus, $ijazah->nama);
                Submit::where('nim', $ijazah->nim)->update(['pdf' => str_replace('/view', '/preview', $pdfUrl)]);
            } catch (\Exception $e) {
                Log::error("Gagal mengganti teks di Google Docs atau share dokumen: " . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal mengolah dokumen ijazah'], 500);
            }

            Log::info("Ijazah $nim berhasil diproses");
            return response()->json(['status' => 'success', 'message' => 'Ijazah berhasil diproses'], 200);
        } catch (\Exception $e) {
            Log::error("Terjadi kesalahan saat memproses ijazah $nim: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan'], 500);
        }
    }

    public function pdf($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $setting_fakultas = match ($mahasiswa->fakultas) {
            'Farmasi',
            'Ilmu Kesehatan Dan Sains Teknologi',
            'Ilmu Sosial Dan Humaniora' => Fakultas::where('fakultas', $mahasiswa->fakultas)->first(),
            default => null,
        };

        $setting_prodi = match (ucwords(strtolower($mahasiswa->prodi))) {
            'Diploma Tiga Farmasi',
            'Diploma Tiga Analis Kesehatan',
            'Sarjana Farmasi',
            'Sarjana Administrasi Rumah Sakit',
            'Sarjana Gizi',
            'Sarjana Hukum',
            'Sarjana Manajemen',
            'Sarjana Pendidikan Guru Sekolah Dasar' => Prodi::where('prodi', ucwords(strtolower($mahasiswa->prodi)))->first(),
            default => null,
        };

        $setting = [
            'prodi' => trim(str_replace(['Sarjana', 'Diploma Tiga'], '', $setting_prodi->prodi)),
            'akreditasi' => trim(str_replace('Program Studi :', '', $setting_prodi->akreditasi)),
            'no_akreditasi' => $setting_prodi->no_akreditasi,
            'jenjang' => ($setting_prodi && preg_match('/\b(Sarjana|Diploma Tiga)\b/', $setting_prodi->prodi, $matches)) ? $matches[0] : '',
            't_terbit' => Carbon::createFromFormat('Y-m-d', $setting_fakultas->tanggal_terbit)->translatedFormat('d F Y'),
            'dekan' => $setting_fakultas->dekan,
            'nik_dekan' => $setting_fakultas->nik,
            'rektor' => Rektor::first()->nama,
            'nik_rektor' => Rektor::first()->nik,
        ];

        $mahasiswa->update(['ijazah' => 'MENUNGGU VERIFIKASI']);

        $newDocTitle = "IJAZAH--" . $mahasiswa->nama . "--" . date('d/m/Y H:i:s');
        $newDocId = $this->googleService->ijazah($newDocTitle);

        try {
            Submit::updateOrCreate(
                [
                    'nim' => $nim
                ],
                [
                    'nama' => $mahasiswa->nama,
                    'tempat_lahir' => strtoupper($mahasiswa->tempat_lahir),
                    'tanggal_lahir' => $mahasiswa->tanggal_lahir,
                    'nik' => $mahasiswa->nik,
                    'fakultas' => strtoupper($mahasiswa->fakultas),
                    'prodi' => $mahasiswa->prodi,
                    'gelar' => $mahasiswa->gelar,
                    'pisn' => $mahasiswa->pisn,
                    'periode_lulus' => $mahasiswa->periode_lulus,
                    'dokumen' => 'https://docs.google.com/document/d/' . $newDocId . '/edit?tab=t.0',
                    'tanggal_yudisium' => $mahasiswa->tanggal_yudisium,
                    'status' => 'MENUNGGU VERIFIKASI'
                ]
            );

            $ijazah = Submit::where('nim', $nim)->first();
            $data = [
                'pisn' => $ijazah->pisn,
                'nama' => $ijazah->nama,
                'tempat_lahir' => strtoupper($ijazah->tempat_lahir),
                'tanggal_lahir' => strtoupper(Carbon::createFromFormat('Y-m-d', $ijazah->tanggal_lahir)->translatedFormat('d F Y')),
                'nim' => $ijazah->nim,
                'nik' => $ijazah->nik,
                'fakultas' => strtoupper($ijazah->fakultas),
                'prodi' => strtoupper($setting['prodi']),
                'jenjang' => strtoupper($setting['jenjang']),
                'akreditasi' => $setting['akreditasi'],
                'no_akreditasi' => $setting['no_akreditasi'],
                'tanggal_yudisium' => strtoupper(Carbon::createFromFormat('Y-m-d', $ijazah->tanggal_yudisium)->translatedFormat('d F Y')),
                'gelar' => $ijazah->gelar,
                'pisn' => $ijazah->pisn,
                't_terbit' => $setting['t_terbit'],
                'dekan' => $setting['dekan'],
                'nik_dekan' => $setting['nik_dekan'],
                'rektor' => $setting['rektor'],
                'nik_rektor' => $setting['nik_rektor'],
            ];

            $this->googleService->replaceIjazah($newDocId, $data);
            $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');

            Submit::where('nim', $nim)->update(['pdf' =>  str_replace('/view', '/preview', $this->googleService->exportPdf($newDocId, ucwords(strtolower($ijazah->prodi)), $ijazah->periode_lulus, $ijazah->nama))]);

            return redirect()->back()->with('submit', 'Berhasil diterbitkan!');
        } catch (\Exception $e) {
            Log::error("Error dalam membuat ijazah: " . $e->getMessage());
            // Log::error("Error dalam membuat ijazah: " . $mahasiswa);
            return redirect()->back()->with('fail', 'Gagal dibuat!');
        }
    }
}
