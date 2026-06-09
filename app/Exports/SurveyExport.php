<?php

namespace App\Exports;

use App\Models\Css;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveyExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithCustomStartCell
{
    protected $year;
    protected $data;

    public function __construct($year, $data = null)
    {
        $this->year = $year;
        $this->data = $data;
    }

    public function collection()
    {
        if ($this->data) {
            return $this->data;
        }
        
        return Css::whereYear('created_at', $this->year)->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'TREG',
            'Lokasi',
            'Nama Responden',
            'No. HP',
            'Email',
            'Perusahaan',
            'Status',
            'Harapan 1',
            'Harapan 2',
            'Harapan 3',
            'Harapan 4',
            'Harapan 5',
            'Harapan 6',
            'Harapan 7',
            'Harapan 8',
            'Harapan 9',
            'Harapan 10',
            'Harapan 11',
            'Harapan 12',
            'Harapan 13',
            'Harapan 14',
            'Harapan 15',
            'Harapan 16',
            'Harapan 17',
            'Harapan 18',
            'Harapan 19',
            'Harapan 20',
            'Kenyataan 1',
            'Kenyataan 2',
            'Kenyataan 3',
            'Kenyataan 4',
            'Kenyataan 5',
            'Kenyataan 6',
            'Kenyataan 7',
            'Kenyataan 8',
            'Kenyataan 9',
            'Kenyataan 10',
            'Kenyataan 11',
            'Kenyataan 12',
            'Kenyataan 13',
            'Kenyataan 14',
            'Kenyataan 15',
            'Kenyataan 16',
            'Kenyataan 17',
            'Kenyataan 18',
            'Kenyataan 19',
            'Kenyataan 20',
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function map($survey): array
    {
        static $no = 0;
        $no++;
        
        return [
            $no,
            $survey->treg ?? '-',
            $survey->lab,
            $survey->nama,
            $survey->hp,
            $survey->email,
            $survey->perusahaan,
            $survey->status,
            $survey->h1,
            $survey->h2,
            $survey->h3,
            $survey->h4,
            $survey->h5,
            $survey->h6,
            $survey->h7,
            $survey->h8,
            $survey->h9,
            $survey->h10,
            $survey->h11,
            $survey->h12,
            $survey->h13,
            $survey->h14,
            $survey->h15,
            $survey->h16,
            $survey->h17,
            $survey->h18,
            $survey->h19,
            $survey->h20,
            $survey->k1,
            $survey->k2,
            $survey->k3,
            $survey->k4,
            $survey->k5,
            $survey->k6,
            $survey->k7,
            $survey->k8,
            $survey->k9,
            $survey->k10,
            $survey->k11,
            $survey->k12,
            $survey->k13,
            $survey->k14,
            $survey->k15,
            $survey->k16,
            $survey->k17,
            $survey->k18,
            $survey->k19,
            $survey->k20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
