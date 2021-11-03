<?php

namespace App\Http\Controllers;

use App\Models\RuangLingkup;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;

class LayananController extends Controller
{
    public function ruanglingkup(){
        $ruanglingkups = Ruanglingkup::all();
        return view('RL/master', compact('ruanglingkups'));
    }

    public function layanan(){
        return view('RL/layanan');
    }

    public function fiber(){
        $ruanglingkups = Ruanglingkup::where('ruanglingkup_kelompokukur','fiber optic')->get();
        return view('RL/fiber_optic', compact('ruanglingkups'));
    }
    public function listrik(){
        $ruanglingkups = Ruanglingkup::where('ruanglingkup_kelompokukur','kelistrikan')->get();
        return view('RL/kelistrikan', compact('ruanglingkups'));
    }
    public function waktu(){
        $ruanglingkups = Ruanglingkup::where('ruanglingkup_kelompokukur','frekuensi dan Waktu')->get();
        return view('RL/frekuensi_waktu', compact('ruanglingkups'));
    }
}
