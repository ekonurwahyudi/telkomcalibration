<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Css extends Model
{
    use HasFactory;
    public $table = "hasil_survey";
    protected $primarykey = 'hasil_survey';

    protected $fillable = [
        'id',
        'nama',
        'bidang',
        'email',
        'hp',
        'perusahaan',
        'lab',
        'status',
        'treg',
        'saran',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'h7',
        'h8',
        'h9',
        'h10',
        'h11',
        'h12',
        'h13',
        'h14',
        'h15',
        'h16',
        'h17',
        'h18',
        'h19',
        'h20',
        'k1',
        'k2',
        'k3',
        'k4',
        'k5',
        'k6',
        'k7',
        'k8',
        'k9',
        'k10',
        'k11',
        'k12',
        'k13',
        'k14',
        'k15',
        'k16',
        'k17',
        'k18',
        'k19',
        'k20'
    ];
    
     protected $guarded = [];
     public $timestamps = true;
}
