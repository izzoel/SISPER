<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\DversiSubmit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NikImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $mahasiswa = Mahasiswa::where('nim', $row['nim'])->first();
        // $DversiEntry = DversiSubmit::where('nim', $row['nim'])->first();

        if ($mahasiswa) {
            $mahasiswa->update([
                'nim' => $row['nim'],
                'nik' => $row['nik'],
            ]);
            // $DversiEntry->update([
            //     'nim' => $row['nim'],
            //     'nik' => $row['nik'],
            // ]);
        } else {
            return null;
        }
    }
}
