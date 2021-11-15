<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Slide;
use App\Models\konsultasi;
use App\Models\Faq;
use App\Models\Orderkalibrasi;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;
use Illuminate\Contracts\Support\Jsonable;
use App;

class BerandaController extends Controller
{
    public function beranda(){
        $slides = Slide::all();
        $artikels = Artikel::all();
        return view('index',['slides'=>$slides],['artikels'=>$artikels]);
    }

    public function sertifikat(){
        return view('sertifikat_iso');
    }

    public function artikel($artikel_id){
        $artikels = Artikel::find($artikel_id);
        $post = Artikel::all();
        return view('bacaartikel',['artikels'=>$artikels], ['post' => $post]);
    }
    public function allartikel(){
        $artikels = Artikel::paginate(3);
        return view('artikel',['artikels'=>$artikels]);
    }

    public function struktur(){
        return view('struktur-organisasi');
    }

    public function survey(){
        return view('survey');
    }

    Public function booking(){
        return view('booking');
    }

    public function hubungikami(){
        return view('hubungi-kami');
    }

    public function tentang(){
        // App::setLocale($locale);
        return view('tentang-kami');
    }
    public function konsultasi(){
        $faq = Faq::all();
        return view('konsultasi',['faq'=>$faq]);
    }
    public function konsultasiproses(Request $request){
        $pesan = [
            'required' => 'Wajib di isi'
        ];
        $this->validate($request,[
            'konsultasi_nama' => 'required',
            'konsultasi_hp' => 'required',
            'konsultasi_email' => 'required',
            'konsultasi_pesan' => 'required',
        ], $pesan);

        $konsultasi = Konsultasi::insert([
            'konsultasi_nama' => $request->konsultasi_nama,
            'konsultasi_hp' => $request->konsultasi_hp,
            'konsultasi_email' => $request->konsultasi_email,
            'konsultasi_pesan' => $request->konsultasi_pesan
        ]);
        $nama = $_POST['konsultasi_nama'];
        $pesan = $_POST['konsultasi_pesan'];

        return redirect('https://api.whatsapp.com/send?phone=+628987088921&text=Halo,%20perkenalkan%20saya%20'.$nama.'%20saya%20ingin%20konsultasi%20tentang%20'.$pesan.'?');
    }
    public function labjakarta(){
        return view('labjakarta');
    }
    public function labmedan(){
        return view('labmedan');
    }
    public function labsurabaya(){
        return view('labsurabaya');
    }
    public function labmakassar(){
        return view('labmakassar');
    }
    public function kritik_saran(){
        return view('kritik-saran');
    }

    // Controller Tracking Order 
    public function trackingorder(){
        $orders = Orderkalibrasi::paginate(5);
        return view('/tracking-order',['orders' => $orders]);
    }

    public function searchorder(Request $request){
        $orders = Orderkalibrasi::paginate(5);
        $hasils = Order::where('order_ccl', $request->order_ccl)->get();
        $noccl = $request->order_ccl;
        return view('/result-tracking',['hasils' => $hasils],['orders' => $orders])->with('noccl', $noccl);
    }
}
