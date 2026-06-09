<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercss extends Model
{
    use HasFactory;
    public $table = "user_css";
    protected $primarykey = 'user_css';
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'nama',
        'hp',
        'email',
        'treg',
        'status',
        'perusahaan',
        'bidang',
        'lab',
        'tahun'
    ];
    
    public $timestamps = true;
}
