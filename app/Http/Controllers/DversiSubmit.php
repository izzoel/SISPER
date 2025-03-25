<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lapor;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\DversiSubmit as Submit;
use Illuminate\Http\Request;
use App\Services\GoogleService;

class DversiSubmit extends Controller
{
    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        try {
            $mahasiswa = Submit::where('nim', session('nim'))->first();
            $sudah_mengisi = Submit::where('nim', session('nim'))->where('status', 'DIVERIFIKASI')->first();

            $gelar = match ($mahasiswa->prodi) {
                'DIPLOMA TIGA FARMASI' => 'Ahli Madya Farmasi (A.Md.Farm.)',
                'DIPLOMA TIGA ANALIS KESEHATAN' => 'Ahli Madya Analis Kesehatan (A.Md.A.K.)',
                'SARJANA FARMASI' => 'Sarjana Farmasi (S.Farm.)',
                'SARJANA ADMINISTRASI RUMAH SAKIT' => 'Sarjana Kesehatan (S.Kes.)',
                'SARJANA GIZI' => 'Sarjana Gizi (S.Gz.)',
                'SARJANA HUKUM' => 'Sarjana Hukum (S.H.)',
                'SARJANA MANAJEMEN' => 'Sarjana Manajemen (S.M.)',
                'SARJANA PENDIDIKAN GURU SEKOLAH DASAR' => 'Sarjana Pendidikan (S.Pd.)',
            };
            $fakultas = match ($mahasiswa->prodi) {
                'DIPLOMA TIGA FARMASI' => 'Farmasi',
                'DIPLOMA TIGA ANALIS KESEHATAN' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA FARMASI' => 'Farmasi',
                'SARJANA ADMINISTRASI RUMAH SAKIT' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA GIZI' => 'Ilmu Kesehatan Dan Sains Teknologi',
                'SARJANA HUKUM' => 'Ilmu Sosial Dan Humaniora',
                'SARJANA MANAJEMEN' => 'Ilmu Sosial Dan Humaniora',
                'SARJANA PENDIDIKAN GURU SEKOLAH DASAR' => 'Ilmu Sosial Dan Humaniora',
            };
            $setting = match (ucwords(strtolower($mahasiswa->prodi))) {
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

            session(
                [
                    'prodi' => $mahasiswa->prodi,
                    'gelar' => $gelar,
                    'fakultas' => $fakultas,
                    't_terbit' => Carbon::createFromFormat('Y-m-d', $setting->tanggal_terbit)->translatedFormat('d F Y'),
                    'kaprodi' => $setting->kaprodi,
                    'nik' => $setting->nik,
                    'sudah_mengisi' => $sudah_mengisi
                ]
            );

            if ($mahasiswa) {
                return view('auth.forpi.pages.section', compact('data', 'mahasiswa', 'gelar'));
            } else {
                return redirect()->route('logout');
            }
        } catch (\Exception $e) {
            return redirect()->route('logout');
        }
    }

    function show($nim)
    {
        $mahasiswa = Submit::where('nim', $nim)->first();
        return response()->json($mahasiswa);
    }

    public function store(Request $request)
    {
        try {
            $url = Submit::where('nim', session('nim'))->value('dokumen');

            preg_match('/\/document\/d\/([^\/]+)/', $url, $matches);

            $documentId = $matches[1] ?? null;
            if ($documentId) {
                $this->googleService->removeWatermark($documentId);
            }

            Submit::where('nim', session('nim'))->update([
                'status' => 'DIVERIFIKASI'
            ]);

            Mahasiswa::where('nim', session('nim'))->update([
                'ijazah' => 'DIVERIFIKASI'
            ]);

            return redirect()->back()->with('submit', 'Berhasil kirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Gagal kirim! ' . $e->getMessage());
        }
    }

    public function lapor(Request $request, $menu)
    {
        try {
            Lapor::create([
                'nim' => $request->nim,
                'lapor' => $request->lapor,
                'menu' => $menu,
                'status' => 'baru'
            ]);

            return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Gagal mengirim laporan!');
        }
    }
}
