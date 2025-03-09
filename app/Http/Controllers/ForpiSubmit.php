<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Submit;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Services\GoogleService;

class ForpiSubmit extends Controller
{
    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    function doc(Request $request)
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
        if (count($sertifikat) > 1) {
            $i = 1;
            foreach ($sertifikat as $index => $nama_sertifikat) {
                if (!empty($nama_sertifikat) && isset($no_sertifikat[$index]) && !empty($no_sertifikat[$index])) {
                    $sertifikat_formatted[] = "{$i}. {$nama_sertifikat} ({$no_sertifikat[$index]})";
                    $i++;
                }
            }
        } else {
            foreach ($sertifikat as $index => $nama_sertifikat) {
                if (!empty($nama_sertifikat) && isset($no_sertifikat[$index]) && !empty($no_sertifikat[$index])) {
                    $sertifikat_formatted[] = "{$nama_sertifikat} ({$no_sertifikat[$index]})";
                }
            }
        }

        $beasiswa_formatted = [];
        if (count($beasiswa) > 1) {
            $i = 1;
            foreach ($beasiswa as $index => $nama_beasiswa) {
                if (!empty($nama_beasiswa)) {
                    $beasiswa_formatted[] = "{$i}. {$nama_beasiswa}";
                    $i++;
                }
            }
        } else {
            foreach ($beasiswa as $index => $nama_beasiswa) {
                if (!empty($nama_beasiswa)) {
                    $beasiswa_formatted[] = "{$nama_beasiswa}";
                }
            }
        }

        $organisasi_formatted = [];
        if (count($kejuaraan) > 1) {
            $i = 1;
            foreach ($organisasi as $index => $nama_organisasi) {
                if (!empty($nama_organisasi) && isset($jabatan_organisasi[$index]) && !empty($jabatan_organisasi[$index])) {
                    $organisasi_formatted[] = "{$i}. {$nama_organisasi} ({$jabatan_organisasi[$index]})";
                    $i++;
                }
            }
        } else {
            foreach ($organisasi as $index => $nama_organisasi) {
                if (!empty($nama_organisasi) && isset($jabatan_organisasi[$index]) && !empty($jabatan_organisasi[$index])) {
                    $organisasi_formatted[] = "{$nama_organisasi} ({$jabatan_organisasi[$index]})";
                }
            }
        }

        $array_kejuaraan = $kejuaraan_formatted ? implode("\n", $kejuaraan_formatted) : '-';
        $array_sertifikat = $sertifikat_formatted ? implode("\n", $sertifikat_formatted)  : '-';
        $array_beasiswa = $beasiswa_formatted ? implode("\n", $beasiswa_formatted) : '-';
        $array_organisasi = $organisasi_formatted ? implode("\n", $organisasi_formatted) : '-';

        // dd($array_kejuaraan, $array_sertifikat, $array_beasiswa, $array_organisasi);
        //  if (count($kejuaraan) > 1) {
        // }
        // dd(count($kejuaraan) > 1 ?  $this->formatNumberedList($kejuaraan_formatted) : $array_kejuaraan);
        // dd(count($kejuaraan) > 1 ?  $this->formatNumberedList($kejuaraan_formatted) : $array_kejuaraan);
        try {
            Submit::updateOrCreate(
                [
                    'nim' => session('nim')
                ],
                [
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->translatedFormat('Y-m-d'),
                    'prodi' => session('prodi'),
                    'gelar' => session('gelar'),
                    'pisn' => session('pisn'),
                    'masuk' => $request->masuk,
                    'yudisium' => Carbon::createFromFormat('d/m/Y', $request->yudisium)->translatedFormat('Y-m-d'),
                    'judul' => $request->judul,
                    'toefl' => $request->toefl,
                    'kejuaraan' => $array_kejuaraan,
                    'sertifikat' => $array_sertifikat,
                    'beasiswa' => $array_beasiswa,
                    'organisasi' => $array_organisasi,
                    'status' => 'baru'
                ]
            );

            $newDocTitle = "SKPI--" . $request->nama . "--" . date('d/m/Y H:i:s');
            $newDocId = $this->googleService->duplicateDocument($newDocTitle);

            $bulanAngka = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('m');
            $t_bulan = $romawiBulan[$bulanAngka];
            $t_tahun = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('Y');

            $data = [
                'nim' => session('nim'),
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => strtoupper(Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->translatedFormat('d F Y')),
                'fakultas' => session('fakultas'),
                'prodi' => ucwords(strtolower(session('prodi'))),
                'gelar' => session('gelar'),
                'pisn' => session('pisn'),
                'masuk' => $request->masuk,
                'yudisium' =>  Carbon::createFromFormat('d/m/Y', $request->yudisium)->translatedFormat('d F Y'),
                'judul' => $request->judul,
                'toefl' => $request->toefl,
                'studi' => (string)((int)substr($request->yudisium, -4) - (int)($request->masuk)),
                'kejuaraan' => $array_kejuaraan,
                'sertifikat' => $array_sertifikat,
                'beasiswa' => $array_beasiswa,
                'organisasi' => $array_organisasi,
                't_bulan' => $t_bulan,
                't_tahun' => $t_tahun
            ];

            $this->googleService->replaceText($newDocId, $data);
            $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');
            return redirect()->back()->with('submit', 'Berhasil kirim!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('fail', 'Gagal kirim! ' . $e->getMessage());
        }
    }

    function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];
        $mahasiswa = Mahasiswa::where('nim', session('nim'))->first();

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
            'DIPLOMA TIGA ANALIS KESEHATAN' => 'Ilmu Kesehatan dan Sains Teknologi',
            'SARJANA FARMASI' => 'Farmasi',
            'SARJANA ADMINISTRASI RUMAH SAKIT' => 'Ilmu Kesehatan dan Sains Teknologi',
            'SARJANA GIZI' => 'Ilmu Kesehatan dan Sains Teknologi',
            'SARJANA HUKUM' => 'Ilmu Sosial dan Humaniora',
            'SARJANA MANAJEMEN' => 'Ilmu Sosial dan Humaniora',
            'SARJANA PENDIDIKAN GURU SEKOLAH DASAR' => 'Ilmu Sosial dan Humaniora',
        };

        session(['prodi' => $mahasiswa->prodi, 'gelar' => $gelar, 'fakultas' => $fakultas]);


        if ($mahasiswa) {
            return view('auth.forpi.pages.section', compact('data', 'mahasiswa', 'gelar'));
        } else {
            return redirect()->route('logout');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $kejuaraan = $request->input('kejuaraan', []);
        $no_kejuaraan = $request->input('no_kejuaraan', []);

        $sertifikat = $request->input('sertifikat', []);
        $no_sertifikat = $request->input('no_sertifikat', []);

        $beasiswa = $request->input('beasiswa', []);
        $no_beasiswa = $request->input('beasiswa', []);

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
            Submit::updateOrCreate(
                [
                    'nim' => session('nim')
                ],
                [
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->translatedFormat('Y-m-d'),
                    'prodi' => session('prodi'),
                    'gelar' => session('gelar'),
                    'pisn' => session('pisn'),
                    'masuk' => $request->masuk,
                    'yudisium' => Carbon::createFromFormat('d/m/Y', $request->yudisium)->translatedFormat('Y-m-d'),
                    'judul' => $request->judul,
                    'toefl' => $request->toefl,
                    'kejuaraan' => $array_kejuaraan,
                    'sertifikat' => $array_sertifikat,
                    'beasiswa' => $array_beasiswa,
                    'organisasi' => $array_organisasi,
                    'status' => 'baru'
                ]
            );

            $newDocTitle = "SKPI--" . $request->nama . "--" . date('d/m/Y H:i:s');
            $newDocId = $this->googleService->duplicateDocument($newDocTitle);

            $bulanAngka = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('m');
            $t_bulan = $romawiBulan[$bulanAngka];
            $t_tahun = Mahasiswa::where('nim', session('nim'))->first()->created_at->format('Y');

            $data = [
                'nim' => session('nim'),
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => strtoupper(Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->translatedFormat('d F Y')),
                'fakultas' => session('fakultas'),
                'prodi' => ucwords(strtolower(session('prodi'))),
                'gelar' => session('gelar'),
                'pisn' => session('pisn'),
                'masuk' => $request->masuk,
                'yudisium' =>  Carbon::createFromFormat('d/m/Y', $request->yudisium)->translatedFormat('d F Y'),
                'judul' => $request->judul,
                'toefl' => $request->toefl,
                'studi' => (string)((int)substr($request->yudisium, -4) - (int)($request->masuk)),
                'kejuaraan' => $array_kejuaraan,
                'sertifikat' => $array_sertifikat,
                'beasiswa' => $array_beasiswa,
                'organisasi' => $array_organisasi,
                't_bulan' => $t_bulan,
                't_tahun' => $t_tahun
            ];

            $this->googleService->replaceText($newDocId, $data);
            $this->googleService->shareDocumentWithEmail($newDocId, 'skpi.unbl@gmail.com');

            return redirect()->back()->with('submit', 'Berhasil kirim!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('fail', 'Gagal kirim! ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForpiSubmit $forpiSubmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForpiSubmit $forpiSubmit)
    {
        //
    }
}
