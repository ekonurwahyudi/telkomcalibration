<?php

namespace App\Imports;

use App\Models\Usercss;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class UserImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Usercss([
            'nama' => $row['1'],
            'hp' => $row['2'],
            'email' => $row['3'],
            'treg' => $row['4'],
            'status' => $row['5'],
            'perusahaan' => $row['6'],
            'bidang' => $row['7'],
            'lab' => $row['8'],
            'tahun' => Carbon::now()->year,
        ]);
    }
    
    public function startRow(): int
    {
        return 2; // Mulai membaca dari baris ke-2 (melewati header)
    }
}
