<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    public $table = "data_mitra";
    protected $primarykey = 'data_mitra';
    protected $fillable = [
        'id',
        'bidang',
        'judul',
        'kontrak',
        'perusahaan',
        'PIC'
    ];
}
