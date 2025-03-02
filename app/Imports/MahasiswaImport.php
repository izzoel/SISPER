<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nim'  => $row['nim'],
            'nama' => $row['nama'],
            'password' => bcrypt($row['nim']),
            'tempat_lahir' => $row['tempat_lahir'],
            'kelamin' => $row['kelamin'],
            'tanggal_lahir' => \Carbon\Carbon::createFromFormat('d/m/Y', $row['tanggal_lahir'])->format('Y-m-d'),
            'prodi' => $row['prodi'],
            'no_hp' => $row['no_hp'],
            'status' => $row['status'],
            'alamat' => $row['alamat'],
            'pisn' => $row['pisn'],
            'periode' => $row['periode'],
            'foto' => rand(0, 11),
        ]);
    }
}
