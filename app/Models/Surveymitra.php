<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveymitra extends Model
{
    use HasFactory;
    public $table = "survey_mitra";
    protected $primarykey = 'survey_mitra';
    protected $fillable = [
        'id',
        'bidang',
        'kelompok',
        'judul',
        'kontrak',
        'perusahaan',
        'PIC',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
        'p9',
        'p10',
        'p11',
        'p12',
        'p13',
        'p14',
        'p15',
        'p16',
        'p17',
        'saran',
    ];
}
