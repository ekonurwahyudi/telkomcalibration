<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alatukur extends Model
{
    use HasFactory;
    public $table = "alatukur";
    protected $primarykey = 'alatukur';
    protected $fillable = ['namaalat', 'merk', 'type','serial','namasertifikat', 'booking_id','item_id'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
