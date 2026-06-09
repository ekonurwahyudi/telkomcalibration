<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Surveymitra;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MitraController extends Controller
{
    public function index(){
        $mitra = Mitra::orderBy('bidang', 'asc')->get();
        return view('/survey-mitra/survey',compact('mitra'));
    }

    public function input(Request $request){
        $pesan = [
            'required' => 'Wajib Diisi'
        ];
        $this->validate($request,[
            'kelompok' => 'nullable|string|max:255',
            'PIC' => 'nullable|string|max:255',
            'saran' => 'nullable'
        ], $pesan);
        
        $now = Carbon::now();
        $css = Surveymitra::insert([
            'created_at' => $now,
            'updated_at' => $now,
            'bidang' => $request->bidang,
            'kelompok' => $request->has('kelompok') ? $request->kelompok : null,
            'judul' => $request->judul,
            'perusahaan' => $request->perusahaan,
            'kontrak' => $request->kontrak,
            'PIC' => $request->has('PIC') ? $request->PIC : null,
            'saran' => $request->has('saran') ? $request->saran : null,
            'p1' => $request->p1,
            'p2' => $request->p2,
            'p3' => $request->p3,
            'p4' => $request->p4,
            'p5' => $request->p5,
            'p6' => $request->p6,
            'p7' => $request->p7,
            'p8' => $request->p8,
            'p9' => $request->p9,
            'p10' => $request->p10,
            'p11' => $request->p11,
            'p12' => $request->p12,
            'p13' => $request->p13,
            'p14' => $request->p14,
            'p15' => $request->p15,
            'p16' => $request->p16,
            'p17' => $request->p17
        ]);
        session()->flash('success', 'Survey telah diinput.');
        return redirect('/SurveyMitraDSO');
    }

    public function monitoring(){
        $hasilsurveys = Surveymitra::orderBy('created_at', 'desc')->get();
        $saran1 = Surveymitra::whereNotNull('saran')->orderBy('created_at', 'desc')->get();
        $hasil = Surveymitra::pluck('bidang')->toArray();
        $datamitra = Mitra::all();
        $belum = Mitra::whereNotIn('bidang', $hasil)->get();
        return view('/survey-mitra/monitoring',compact('hasilsurveys','saran1','belum','datamitra'));
    }

    public function datamitra(){
        $list = Mitra::all();
        $hasil = Surveymitra::pluck('bidang')->toArray();
        $belum = Mitra::whereNotIn('bidang', $hasil)->get();
        return view('/survey-mitra/datamitra')->with(compact(array('list','belum')));
    }
}
