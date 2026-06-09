<?php

namespace App\Exports;

use App\Models\Usercss;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class Treg5Export implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $year;
     /**
     * Constructor untuk menerima parameter tahun.
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->year = $year;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Usercss::query()
        ->where('treg', 'TREG 5')
        ->where('tahun', $this->year)
        ->select('nama','hp','email','treg','status','perusahaan','bidang','lab','tahun');
    }
    public function headings(): array
    {
        return [
            'No', 'Nama Responden', 'HP','Email','TREG','Status','Perusahaan','Bidang','Lab','Tahun'
        ];
    }
    public function map($user): array
    {
        static $row = 0;
        $row++;
        
        return [
            $row,
            $user->nama,
            $user->hp,
            $user->email,
            $user->treg,
            $user->status,
            $user->perusahaan,
            $user->bidang,
            $user->lab,
            $user->tahun,
        ];
    }
}
