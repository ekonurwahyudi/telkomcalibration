<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    public $table = "katalog";
    protected $primarykey = 'katalog';

    protected $fillable = [
        'id',
        'item_id',
        'namaalat',
        'merk',
        'type'
    ];
    
     protected $guarded = [];
}
