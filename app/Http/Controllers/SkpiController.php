<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Skpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;




class SkpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function d()
    {
        $filename = 'a.pdf';
        $path = storage_path('app/' . $filename); // Ensure the correct path

        if (!file_exists($path)) {
            abort(404); // Handle the case where the file doesn't exist
        }

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);

        // return view('/layout/content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Carbon::setLocale('id');
        $bulan = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ];

        $bulan_angka   = [
            "01",
            "02",
            "03",
            "04",
            "05",
            "06",
            "07",
            "08",
            "09",
            "10",
            "11",
            "12"
        ];

        $convert_tanggal_lahir = str_replace($bulan, $bulan_angka, $request->input('tanggal_lahir'));
        $convert_tanggal_lulus = str_replace($bulan, $bulan_angka, $request->input('tanggal_lulus'));

        $tanggal_lahir = Carbon::createFromFormat('d m yy', $convert_tanggal_lahir)->format('Y-m-d');
        $tanggal_lulus = Carbon::createFromFormat('d m yy', $convert_tanggal_lulus)->format('Y-m-d');

        // Fungsi untuk mengonversi angka ke angka Romawi
        function numberToRoman($number)
        {
            $map = [
                'M'  => 1000,
                'CM' => 900,
                'D'  => 500,
                'CD' => 400,
                'C'  => 100,
                'XC' => 90,
                'L'  => 50,
                'XL' => 40,
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1
            ];

            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if ($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }

        // Mengonversi bulan ke angka Romawi
        $terbit_bulan = numberToRoman((int)Carbon::now()->isoFormat('M'));
        $terbit_tahun = Carbon::now()->isoFormat('Y');

        $ttd = Carbon::now()->isoFormat('D MMMM YYYY');

        // if (Skpi::where('nim', $request->input('nim'))->exists()) {
        //     dd("sudah ada")
        // }

        Skpi::updateOrCreate([
            'nama' => strtoupper($request->input('nama')),
            'tempat_lahir' => ucfirst($request->input('tempat_lahir')),
            'tanggal_lahir' => $tanggal_lahir,
            'program_studi' => $request->input('program_studi'),
            'nim' => $request->input('nim'),
            'lama_studi' => $request->input('lama_studi'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'tanggal_lulus' => $tanggal_lulus,
            'judul' => strtoupper($request->input('judul')),
            'ijazah' => strtoupper($request->input('ijazah')),
            'toefl' => $request->input('toefl'),
            'pencapaian' => implode("\n", ($request->input('pencapaian'))),
            'sertifikasi' => implode("\n", ($request->input('sertifikasi'))),
            'beasiswa' => implode("\n", ($request->input('beasiswa'))),
            'organisasi' => implode("\n", ($request->input('organisasi'))),
            'status_warna' => 'warning',
            'status_keterangan' => 'new'
        ]);

        if ($request->input('program_studi') == "Sarjana Farmasi") {
            $path = 'template/S1_Farmasi.docx';
        } elseif ($request->input('program_studi') == "Sarjana Administrasi Rumah Sakit") {
            $path = 'template/S1_ARS.docx';
        } elseif ($request->input('program_studi') == "Diploma Tiga Farmasi") {
            $path = 'template/D3_Farmasi.docx';
        } elseif ($request->input('program_studi') == "Diploma Tiga Analis Kesehatan") {
            $path = 'template/D3_TLM.docx';
        }

        $templateProcessor = new TemplateProcessor(storage_path($path));
        $templateProcessor->setValue('nama', strtoupper($request->input('nama')));
        $templateProcessor->setValue('tempat_lahir', $request->input('tempat_lahir'));
        $templateProcessor->setValue('tanggal_lahir', $request->input('tanggal_lahir'));
        $templateProcessor->setValue('program_studi', $request->input('program_studi'));
        $templateProcessor->setValue('nim', $request->input('nim'));
        $templateProcessor->setValue('lama_studi', $request->input('lama_studi'));
        $templateProcessor->setValue('tahun_masuk', $request->input('tahun_masuk'));
        $templateProcessor->setValue('tanggal_lulus', $request->input('tanggal_lulus'));
        $templateProcessor->setValue('judul', strtoupper($request->input('judul')));
        $templateProcessor->setValue('ijazah', $request->input('ijazah'));
        $templateProcessor->setValue('toefl', $request->input('toefl'));
        $templateProcessor->setValue('gelar', $request->input('gelar'));
        $templateProcessor->setValue('ttd', $request->input('ttd'));
        $templateProcessor->setValue('terbit_bulan', $terbit_bulan);
        $templateProcessor->setValue('terbit_tahun', $terbit_tahun);

        $templateProcessor->cloneBlock('block_name', count($request->input('pencapaian')), true, true);
        $templateProcessor->cloneBlock('block_name2', count($request->input('sertifikasi')), true, true);
        $templateProcessor->cloneBlock('block_name3', count($request->input('beasiswa')), true, true);
        $templateProcessor->cloneBlock('block_name4', count($request->input('organisasi')), true, true);

        $i = 0;
        foreach ($request->input('pencapaian') as $key => $value) {
            if (empty($value) || $value == '-') {
                $templateProcessor->setValue('no#' . $i + 1, '-');
                $templateProcessor->setValue('pencapaian#' . $i + 1, '');
            } else {
                if (count($request->input('pencapaian')) > 1) {
                    $templateProcessor->setValue('no#' . $i + 1,  $i + 1 . '&#8228; ');
                    $templateProcessor->setValue('pencapaian#' . $i + 1,  $value . '&#8228;');
                } else {
                    $templateProcessor->setValue('no#' . $i + 1, '');
                    $templateProcessor->setValue('pencapaian#' . $i + 1,  $value . '&#8228;');
                }
            }
            $i++;
        }
        $i = 0;
        foreach ($request->input('sertifikasi') as $key => $value) {
            if (empty($value) || $value == '-') {
                $templateProcessor->setValue('no2#' . $i + 1, '-');
                $templateProcessor->setValue('sertifikasi#' . $i + 1, '');
            } else {
                if (count($request->input('sertifikasi')) > 1) {
                    $templateProcessor->setValue('no2#' . $i + 1,  $i + 1 . '&#8228; ');
                    $templateProcessor->setValue('sertifikasi#' . $i + 1,  $value . '&#8228;');
                } else {
                    $templateProcessor->setValue('no2#' . $i + 1, '');
                    $templateProcessor->setValue('sertifikasi#' . $i + 1,  $value . '&#8228;');
                }
            }
            $i++;
        }
        $i = 0;
        foreach ($request->input('beasiswa') as $key => $value) {
            if (empty($value) || $value == '-') {
                $templateProcessor->setValue('no3#' . $i + 1, '-');
                $templateProcessor->setValue('beasiswa#' . $i + 1, '');
            } else {
                if (count($request->input('beasiswa')) > 1) {
                    $templateProcessor->setValue('no3#' . $i + 1,  $i + 1 . '&#8228; ');
                    $templateProcessor->setValue('beasiswa#' . $i + 1,  $value . '&#8228;');
                } else {
                    $templateProcessor->setValue('no3#' . $i + 1, '');
                    $templateProcessor->setValue('beasiswa#' . $i + 1,  $value . '&#8228;');
                }
            }
            $i++;
        }
        $i = 0;
        foreach ($request->input('organisasi') as $key => $value) {
            if (empty($value) || $value == '-') {
                $templateProcessor->setValue('no4#' . $i + 1, '-');
                $templateProcessor->setValue('organisasi#' . $i + 1, '');
            } else {
                if (count($request->input('organisasi')) > 1) {
                    $templateProcessor->setValue('no4#' . $i + 1,  $i + 1 . '&#8228; ');
                    $templateProcessor->setValue('organisasi#' . $i + 1,  $value . '&#8228;');
                } else {
                    $templateProcessor->setValue('no4#' . $i + 1, '');
                    $templateProcessor->setValue('organisasi#' . $i + 1,  $value . '&#8228;');
                }
            }
            $i++;
        }

        $fileName = $request->input('nim') . '_' . strtoupper($request->input('nama')) . '_' . $request->input('program_studi') . '_SKPI.docx';

        ob_start();

        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        $templateProcessor->saveAs($temp_file);

        header("Content-Disposition: attachment;");
        readfile($temp_file);
        unlink($temp_file);

        $content = ob_get_contents();
        ob_end_clean();

        Storage::disk('google')->put($fileName, $content);
        // dd('done');
        // Alert::success('Sipp', 'Data udah kekirim..!');
        // return back();
        return redirect('/landing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function show(Skpi $skpi, $nim, $pisn)
    {
        $data_skpi = ['nim' => $nim, 'ijazah' => $pisn];
        if (Skpi::where('nim', $nim)->get('nama')->first()) {
            return redirect()->back()->with('info', 'Kamu sudah pernah ngirim..!');
        }

        return view('/layout/content', compact('data_skpi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function edit(Skpi $skpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Skpi $skpi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skpi  $skpi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skpi $skpi)
    {
        //
    }

    public function admin(Skpi $skpi)
    {

        $data_skpi = Skpi::all();

        return view('/skpi/admin')->with('data_skpi', $data_skpi);
    }

    public function cek($id)
    {
        $data_skpi = Skpi::find($id);
        $fileName = $data_skpi->nim . '_' . strtoupper($data_skpi->nama) . '_' . $data_skpi->program_studi . '_SKPI.docx';

        $url = Storage::disk('google')->url($fileName);

        // ekstrak file id di google drive
        $starting_word = 'https://drive.google.com/uc?id=';
        $ending_word = '&export=media';
        $subtring_start = strpos($url, $starting_word);
        $subtring_start += strlen($starting_word);
        $size = strpos($url, $ending_word, $subtring_start) - $subtring_start;

        $fileid = substr($url, $subtring_start, $size);
        // 

        $gdoc = 'https://docs.google.com/document/d/' . $fileid . '/edit';
        // dd($gdoc);

        $update_status = Skpi::find($id);
        $update_status->update([
            'status_warna' => 'success',
            'status_keterangan' => 'done'
        ]);
        return redirect()->away($gdoc);
    }
}
