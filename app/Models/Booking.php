<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $table = "booking";
    protected $primarykey = 'booking';
    protected $fillable = ['nomorbooking','perusahaan','nama','email','hp','lab','keterangan','status','teknisi','layanan'];

    public function alatukur()
    {
        return $this->hasMany(Alatukur::class);
    }
}
