<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lapor;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kalaboratorium;
use App\Services\GoogleService;
use Illuminate\Support\Facades\Log;
use App\Models\ForbelaSubmit as Submit;
use Illuminate\Support\Facades\Storage;

class ForbelaSubmit extends Controller
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
            $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();
            $sudah_mengisi = Submit::where('nim', session('nim'))->whereIn('status', ['BARU', 'DITINJAU'])->first();
            $data_submit = Submit::where('nim', session('nim'))->first();

            session(
                [
                    'sudah_mengisi' => $sudah_mengisi,
                    'data_submit' => $data_submit
                ]
            );
            return view('auth.forbela.pages.section', compact('data', 'mahasiswa'));
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
            $romawiBulan = [
                '01' => 'I',
                '02' => 'II',
                '03' => 'III',
                '04' => 'IV',
                '05' => 'V',
                '06' => 'VI',
                '07' => 'VII',
                '08' => 'VIII',
                '09' => 'IX',
                '10' => 'X',
                '11' => 'XI',
                '12' => 'XII',
            ];

            $bulanAngka = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('m');
            $t_bulan = $romawiBulan[$bulanAngka];
            $t_tahun = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('Y');

            $today = Carbon::today();

            $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();
            $tanggal_lahir = Carbon::parse($mahasiswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y');

            $newDocTitle = "[FORBELA] -- " . $mahasiswa->nama . " -- " . Carbon::now()->locale('id')->translatedFormat('d F Y H:i');
            $newDocId = $this->googleService->duplicateForbela($newDocTitle);

            $existingSubmit = Submit::where('nim', session('nim'))->first();
            $kalaboratorium = Kalaboratorium::first();

            if ($existingSubmit) {
                $no_surat = (int) $existingSubmit->no_surat;
            } else {
                if ($t_bulan === 'I' && $today->day === 1) {
                    $no_surat = 1;
                } else {
                    $lastSurat = Submit::orderBy('id', 'desc')->first();
                    $no_surat = $lastSurat ? ((int) $lastSurat->no_surat + 1) : 1;
                }
            }

            $no_surat_padded = str_pad($no_surat, 3, '0', STR_PAD_LEFT);

            if ($request->hasFile('pembayaran')) {
                $file = $request->file('pembayaran');
                $filename = "[FORBELA][PEMBAYARAN] -- " . $mahasiswa->nama . " -- " . Carbon::now()->locale('id')->translatedFormat('d F Y H:i');

                $folderId = env('GOOGLE_DRIVE_FOLDER_FORBELA_PEMBAYARAN');
                $uploadResult = $this->googleService->uploadFileToDrive($file, $filename, $folderId, true);

                $filenameSaved = ($uploadResult && isset($uploadResult['url'])) ? $uploadResult['url'] : null;
            } else {
                $filenameSaved = null;
            }

            $suratUrl = "https://docs.google.com/document/d/$newDocId/export?format=pdf";

            Submit::updateOrCreate(
                ['nim' => session('nim')],
                [
                    'nama' => $mahasiswa->nama,
                    'tempat_lahir' => $mahasiswa->tempat_lahir,
                    'tanggal_lahir' => $mahasiswa->tanggal_lahir,
                    'nik' => $mahasiswa->nik,
                    'jenis' => $request->jenis,
                    'no_surat' => $no_surat_padded,
                    'tanggal_penelitian' => $request->tanggal_penelitian,
                    'email' => $request->email,
                    'pembayaran' => $filenameSaved,
                    'surat' => $suratUrl,
                    'judul' => $request->judul,
                    'fakultas' => $mahasiswa->fakultas,
                    'prodi' => ucwords(strtolower($mahasiswa->prodi)),
                    'status' => 'BARU'
                ]
            );

            $data = [
                'no_surat' => "Nomor: $no_surat_padded/SAR/LAB/$t_bulan/$t_tahun",
                'nim' => session('nim'),
                'nama' => $mahasiswa->nama,
                'tempat_lahir' => $mahasiswa->tempat_lahir,
                'tanggal_lahir' => strtoupper($tanggal_lahir),
                'tanggal_penelitian' => $request->tanggal_penelitian,
                'judul' => $request->judul,
                'jabatan_kalaboratorium' => $kalaboratorium->jabatan,
                'nama_kalaboratorium' => $kalaboratorium->nama,
                'nik' => $kalaboratorium->nik,
                't_bulan' => $t_bulan,
                't_tahun' => $t_tahun,
            ];

            $this->googleService->replaceForbela($newDocId, $data);
            $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data FORBELA', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Terjadi kesalahan saat memproses data. Silakan coba lagi.');
        }

        return back()->with('success', 'Data berhasil disimpan dan surat berhasil dibuat.');
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
            Log::error($e->getMessage());
            return redirect()->back()->with('fail', 'Gagal mengirim laporan!');
        }
    }
}
