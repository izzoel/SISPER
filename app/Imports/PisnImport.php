<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PisnImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $mahasiswa = Mahasiswa::where('nim', $row['nim'])->first();

        if ($mahasiswa) {
            $mahasiswa->update([
                'nim' => $row['nim'],
                'password' => bcrypt($row['pisn']),
                'pisn' => $row['pisn'],
            ]);
        } else {
            return null;
        }
    }
}
