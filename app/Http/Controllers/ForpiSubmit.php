<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use App\Models\Lapor;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\ForpiSubmit as Submit;
use Illuminate\Http\Request;
use App\Services\GoogleService;

class ForpiSubmit extends Controller
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
            $sudah_mengisi = Mahasiswa::where('nim', session('nim'))->where('skpi', 'SUBMIT')->first();
            $data_submit = Submit::where('nim', session('nim'))->first();

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
                    't_terbit' => Carbon::createFromFormat('Y-m-d', $setting->tanggal_terbit)->translatedFormat('d F Y'),
                    'kaprodi' => $setting->kaprodi,
                    'nik' => $setting->nik,
                    'sudah_mengisi' => $sudah_mengisi,
                    'data_submit' => $data_submit
                ]
            );

            if ($mahasiswa) {
                return view('auth.forpi.pages.section', compact('data', 'mahasiswa'));
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

        $bulanIndonesia = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December'
        ];

        $kejuaraan = $request->input('kejuaraan', []);
        $no_kejuaraan = $request->input('no_kejuaraan', []);

        $sertifikat = $request->input('sertifikat', []);
        $no_sertifikat = $request->input('no_sertifikat', []);

        $beasiswa = $request->input('beasiswa', []);

        $organisasi = $request->input('organisasi', []);
        $jabatan_organisasi = $request->input('jabatan_organisasi', []);

        $kejuaraan_formatted = [];
        foreach ($kejuaraan as $index => $nama_kejuaraan) {
            if (!empty($nama_kejuaraan) && isset($no_kejuaraan[$index]) && !empty($no_kejuaraan[$index])) {
                $kejuaraan_formatted[] = "{$nama_kejuaraan} ({$no_kejuaraan[$index]})";
            }
        }

        $sertifikat_formatted = [];
        foreach ($sertifikat as $index => $nama_sertifikat) {
            if (!empty($nama_sertifikat) && isset($no_sertifikat[$index]) && !empty($no_sertifikat[$index])) {
                $sertifikat_formatted[] = "{$nama_sertifikat} ({$no_sertifikat[$index]})";
            }
        }

        $beasiswa_formatted = [];
        foreach ($beasiswa as $index => $nama_beasiswa) {
            if (!empty($nama_beasiswa)) {
                $beasiswa_formatted[] = "{$nama_beasiswa}";
            }
        }

        $organisasi_formatted = [];
        foreach ($organisasi as $index => $nama_organisasi) {
            if (!empty($nama_organisasi) && isset($jabatan_organisasi[$index]) && !empty($jabatan_organisasi[$index])) {
                $organisasi_formatted[] = "{$nama_organisasi} ({$jabatan_organisasi[$index]})";
            }
        }

        $array_kejuaraan = $kejuaraan_formatted ? implode("\n", $kejuaraan_formatted) : '-';
        $array_sertifikat = $sertifikat_formatted ? implode("\n", $sertifikat_formatted)  : '-';
        $array_beasiswa = $beasiswa_formatted ? implode("\n", $beasiswa_formatted) : '-';
        $array_organisasi = $organisasi_formatted ? implode("\n", $organisasi_formatted) : '-';
        try {


            $bulanAngka = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('m');
            $t_bulan = $romawiBulan[$bulanAngka];
            $t_tahun = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('Y');
            $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();
            $akreditasi = Prodi::where('prodi', $mahasiswa->prodi)->value('akreditasi');
            $no_akreditasi = Prodi::where('prodi', $mahasiswa->prodi)->value('no_akreditasi');

            // $tanggal_formatted = str_replace(array_keys($bulanIndonesia), array_values($bulanIndonesia), $mahasiswa->tanggal_lahir);
            // $tanggal_lahir = Carbon::createFromFormat('d F Y', $tanggal_formatted)->format('Y-m-d');
            // $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $mahasiswa->tanggal_lahir)->locale('id')->format('d F Y');
            $tanggal_lahir = Carbon::parse($mahasiswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y');

            $newDocTitle = "SKPI--" . $mahasiswa->nama . "--" . date('d/m/Y H:i:s');

            $newDocId = $this->googleService->duplicateDocument($newDocTitle, $mahasiswa->prodi);


            Submit::updateOrCreate(
                [
                    'nim' => session('nim')
                ],
                [
                    'nama' => $mahasiswa->nama,
                    'tempat_lahir' => $mahasiswa->tempat_lahir,
                    'tanggal_lahir' => $mahasiswa->tanggal_lahir,
                    'prodi' => ucwords(strtolower($mahasiswa->prodi)),
                    'gelar' => $mahasiswa->gelar,
                    'pisn' => session('pisn'),
                    'masuk' => $request->masuk,
                    'tanggal_yudisium' =>  $mahasiswa->tanggal_yudisium,
                    'judul' => $request->judul,
                    'toefl' => $request->toefl,
                    'kejuaraan' => $array_kejuaraan,
                    'sertifikat' => $array_sertifikat,
                    'beasiswa' => $array_beasiswa,
                    'organisasi' => $array_organisasi,
                    'periode_lulus' => $mahasiswa->periode_lulus,
                    'status' => 'BARU',
                    'dokumen' => 'https://docs.google.com/document/d/' . $newDocId . '/edit?tab=t.0'
                ]
            );

            Mahasiswa::where('nim', session('nim'))->update([
                'skpi' => 'SUBMIT'
            ]);

            $data = [
                'nim' => session('nim'),
                'nama' => $mahasiswa->nama,
                'tempat_lahir' => $mahasiswa->tempat_lahir,
                'tanggal_lahir' => strtoupper($tanggal_lahir),
                'fakultas' => $mahasiswa->fakultas,
                'prodi' => ucwords(strtolower($mahasiswa->prodi)),
                'gelar' => $mahasiswa->gelar,
                'pisn' => session('pisn'),
                'masuk' => $request->masuk,
                'yudisium' =>  Carbon::parse($mahasiswa->tanggal_yudisium)->locale('id')->translatedFormat('d F Y'),
                'judul' => $request->judul,
                'toefl' => $request->toefl,
                'studi' => strval(Carbon::parse($mahasiswa->tanggal_yudisium)->locale('id')->translatedFormat('Y') - $request->masuk),
                'kejuaraan' => $array_kejuaraan,
                'sertifikat' => $array_sertifikat,
                'beasiswa' => $array_beasiswa,
                'organisasi' => $array_organisasi,
                'akreditasi' => $akreditasi,
                'no_akreditasi' => $no_akreditasi,
                't_bulan' => $t_bulan,
                't_tahun' => $t_tahun,
                't_terbit' => session('t_terbit'),
                'kaprodi' => session('kaprodi'),
                'nik' => session('nik'),
            ];

            $t = Carbon::parse($mahasiswa->tanggal_yudisium)->locale('id')->translatedFormat('Y');
            $m = $request->masuk;
            Log::info("DD: {$t} - {$m} = " . ($t - $m));

            $this->googleService->replaceText($newDocId, $data);
            $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');

            return redirect()->back()->with('submit', 'Berhasil kirim!');
        } catch (\Exception $e) {

            Log::error('Gagal mengirim data: ' . $e->getMessage());

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
