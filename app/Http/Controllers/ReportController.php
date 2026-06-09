<?php

namespace App\Http\Controllers;

use App\Models\Css;
use App\Models\Usercss;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Exports\UsercssExport;
use App\Exports\Treg1Export;
use App\Exports\Treg2Export;
use App\Exports\Treg3Export;
use App\Exports\Treg4Export;
use App\Exports\Treg5Export;
use App\Exports\Treg6Export;
use App\Exports\Treg7Export;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function report23(){
        $hasilsurveys = Css::whereYear('created_at', "2023")->get();
        $internal = Css::where('status', 'Telkom')->whereYear('created_at', "2023")->get();
        $external = Css::where('status', 'Non-Telkom')->whereYear('created_at', "2023")->get();
        $responden = UserCss::whereYear('created_at', "2023")->get();
        $datainternal = UserCss::where('status', 'Telkom')->whereYear('created_at', "2023")->get();
        $dataexternal = UserCss::where('status', 'Non-Telkom')->whereYear('created_at', "2023")->get();
        $surveymedan = Css::where('lab', 'Lab Medan')->whereYear('created_at', "2023")->get();
        $respondenmedan = UserCss::where('lab', 'Lab Medan')->whereYear('created_at', "2023")->get();
        $surveyjakarta = Css::where('lab', 'Lab Jakarta')->whereYear('created_at', "2023")->get();
        $respondenjakarta = UserCss::where('lab', 'Lab Jakarta')->whereYear('created_at', "2023")->get();
        $surveysurabaya = Css::where('lab', 'Lab Surabaya')->whereYear('created_at', "2023")->get();
        $respondensurabaya = UserCss::where('lab', 'Lab Surabaya')->whereYear('created_at', "2023")->get();
        $surveymakassar = Css::where('lab', 'Lab Makassar')->whereYear('created_at', "2023")->get();
        $respondenmakassar = UserCss::where('lab', 'Lab Makassar')->whereYear('created_at', "2023")->get();
        
//COde untuk All lab
        // Code untuk MIS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamis = [];
        $mis = [];
        $wfs = [];

        foreach ($lokasi as $lokasiItem) {
            $averages = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'h' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2023")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamis[$lokasiItem] = $averages;
            $mis[$lokasiItem] = array_sum($averages);

            // Menghitung wf untuk setiap kolom
            $wf = [];
            for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
                $kolomWF = 'h' . $i;
                $wf[$kolomWF] = ($ratamis[$lokasiItem][$kolomWF] / $mis[$lokasiItem]) * 100;
            }

            $wfs[$lokasiItem] = $wf;
        }


        //Code Untuk MSS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamss = [];
        $mss = [];
        foreach ($lokasi as $lokasiItem) {
            $averages = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'k' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2023")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamss[$lokasiItem] = $averages;
            $mss[$lokasiItem] = array_sum($averages);
        }

        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan','Lab Makassar'];
        $kolom = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WS = [];

        foreach ($lokasi as $lokasiItem) {
            foreach ($kolom as $col) {
                $namaKolom = 'h' . $col;
                $WS[$lokasiItem][$namaKolom] = ($wfs[$lokasiItem][$namaKolom] * $ratamss[$lokasiItem]['k' . $col]) / 100;
            }
        }

        $totalWS = [];

        foreach ($lokasi as $lokasiItem) {
            $totalWS[$lokasiItem] = array_sum($WS[$lokasiItem]);
        }
//End code untuk ALL Lab

//Code untuk Nasional
        $ratamisnas = [];
        $misnas = [];
        $wfsnas = [];

        for ($i = 1; $i <= 20; $i++) {
            $kolomnas = 'h' . $i;
            $averagenas = Css::whereYear('created_at', "2023")->avg($kolomnas);
            $averagesnas[$kolomnas] = $averagenas ?? 0;
        }

        $misnas = array_sum($averagesnas);

        // Menghitung wf untuk setiap kolom
        $wfnas = [];
        for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
            $kolomWFnas = 'h' . $i;
            if($misnas != 0){
                $wfnas[$kolomWFnas] = ($averagesnas[$kolomWFnas] / $misnas) * 100;
            }else{
                $wfnas[$kolomWFnas] = 0;
            }
        }

        $wfsnas = $wfnas;


        $kolomall = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        // Menghitung rata-rata MSS
        $averagesall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'k' . $colall;
            $averageall = Css::whereYear('created_at', "2023")->avg($namaKolomall);
            $averagesall[$namaKolomall] = $averageall ?? 0;
        }

        $mssall = array_sum($averagesall);

        // Menghitung WS
        $WSall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'h' . $colall;
            $WSall[$namaKolomall] = ($wfsnas[$namaKolomall] * $averagesall['k' . $colall]) / 100;
        }

        $totalWSnas = array_sum($WSall);
// end code untuk Nasional

//COde untuk Telkom Non Telkom
        // Code untuk MIS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamistnt = [];
        $mistnt = [];
        $wfstnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'h' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2023")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamistnt[$lokasiItemtnt] = $averagestnt;
            $mistnt[$lokasiItemtnt] = array_sum($averagestnt);

            // Menghitung wf untuk setiap kolom
            $wftnt = [];
            for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
                $kolomWFtnt = 'h' . $i;
                $wftnt[$kolomWFtnt] = ($ratamistnt[$lokasiItemtnt][$kolomWFtnt] / $mistnt[$lokasiItemtnt]) * 100;
            }

            $wfstnt[$lokasiItemtnt] = $wftnt;
        }


        //Code Untuk MSS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamsstnt = [];
        $msstnt = [];
        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'k' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2023")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamsstnt[$lokasiItemtnt] = $averagestnt;
            $msstnt[$lokasiItemtnt] = array_sum($averagestnt);
        }

        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $kolomtnt = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            foreach ($kolomtnt as $coltnt) {
                $namaKolomtnt = 'h' . $coltnt;
                $WStnt[$lokasiItemtnt][$namaKolomtnt] = ($wfstnt[$lokasiItemtnt][$namaKolomtnt] * $ratamsstnt[$lokasiItemtnt]['k' . $coltnt]) / 100;
            }
        }

        $totalWStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $totalWStnt[$lokasiItemtnt] = array_sum($WStnt[$lokasiItemtnt]);
        }
//End code untuk Telkom Non Telkom

        return view('/awanlab/css/analisis23',compact(
            'hasilsurveys',
            'internal',
            'external',
            'responden',
            'datainternal',
            'dataexternal',
            'surveymedan',
            'respondenmedan',
            'surveyjakarta',
            'respondenjakarta',
            'surveysurabaya',
            'respondensurabaya',
            'surveymakassar',
            'respondenmakassar',
            'mss',
            'ratamss',
            'mis',
            'ratamis',
            'wfs',
            'WS',
            'totalWS',
            'misnas',
            'totalWSnas',
            'mssall',
            'mistnt',
            'msstnt',
            'totalWStnt',
            'ratamistnt',
            'ratamsstnt',
            'averagesnas',
            'averagesall'
            
        ));
    }



    public function report24(){
        $hasilsurveys = Css::whereYear('created_at', "2024")->get();
        $internal = Css::where('status', 'Telkom')->whereYear('created_at', "2024")->get();
        $external = Css::where('status', 'Non-Telkom')->whereYear('created_at', "2024")->get();
        $responden = UserCss::where('tahun', "2024")->get();
        $datainternal = UserCss::where('status', 'Telkom')->where('tahun', "2024")->get();
        $dataexternal = UserCss::where('status', 'Non-Telkom')->where('tahun', "2024")->get();
        $surveymedan = Css::where('lab', 'Lab Medan')->whereYear('created_at', "2024")->get();
        $respondenmedan = UserCss::where('lab', 'Lab Medan')->where('tahun', "2024")->get();
        $surveyjakarta = Css::where('lab', 'Lab Jakarta')->whereYear('created_at', "2024")->get();
        $respondenjakarta = UserCss::where('lab', 'Lab Jakarta')->where('tahun', "2024")->get();
        $surveysurabaya = Css::where('lab', 'Lab Surabaya')->whereYear('created_at', "2024")->get();
        $respondensurabaya = UserCss::where('lab', 'Lab Surabaya')->where('tahun', "2024")->get();
        $surveymakassar = Css::where('lab', 'Lab Makassar')->whereYear('created_at', "2024")->get();
        $respondenmakassar = UserCss::where('lab', 'Lab Makassar')->where('tahun', "2024")->get();
        
//COde untuk All lab
        // Code untuk MIS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamis = [];
        $mis = [];
        $wfs = [];

        foreach ($lokasi as $lokasiItem) {
            $averages = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'h' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2024")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamis[$lokasiItem] = $averages;
            $mis[$lokasiItem] = array_sum($averages);

            // Menghitung wf untuk setiap kolom
            $wf = [];
            for ($i = 1; $i <= 20; $i++) {
                $kolomWF = 'h' . $i;
        
                // Cek jika $mis[$lokasiItem] tidak 0 untuk menghindari pembagian dengan 0
                if ($mis[$lokasiItem] != 0) {
                    $wf[$kolomWF] = ($ratamis[$lokasiItem][$kolomWF] / $mis[$lokasiItem]) * 100;
                } else {
                    // Jika $mis[$lokasiItem] = 0, atur wf ke 0
                    $wf[$kolomWF] = 0;
                }
            }

            $wfs[$lokasiItem] = $wf;
        }


        //Code Untuk MSS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamss = [];
        $mss = [];
        foreach ($lokasi as $lokasiItem) {
            $averages = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'k' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2024")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamss[$lokasiItem] = $averages;
            $mss[$lokasiItem] = array_sum($averages);
        }

        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan','Lab Makassar'];
        $kolom = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WS = [];

        foreach ($lokasi as $lokasiItem) {
            foreach ($kolom as $col) {
                $namaKolom = 'h' . $col;
                $WS[$lokasiItem][$namaKolom] = ($wfs[$lokasiItem][$namaKolom] * $ratamss[$lokasiItem]['k' . $col]) / 100;
            }
        }

        $totalWS = [];

        foreach ($lokasi as $lokasiItem) {
            $totalWS[$lokasiItem] = array_sum($WS[$lokasiItem]);
        }
//End code untuk ALL Lab

//Code untuk Nasional
        $ratamisnas = [];
        $misnas = [];
        $wfsnas = [];

        for ($i = 1; $i <= 20; $i++) {
            $kolomnas = 'h' . $i;
            $averagenas = Css::whereYear('created_at', "2024")->avg($kolomnas);
            $averagesnas[$kolomnas] = $averagenas ?? 0;
        }

        $misnas = array_sum($averagesnas);

        // Menghitung wf untuk setiap kolom
        $wfnas = [];
        for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
            $kolomWFnas = 'h' . $i;
            
            if ($misnas != 0){
                $wfnas[$kolomWFnas] = ($averagesnas[$kolomWFnas] / $misnas) * 100;
            }else{
                $wfnas[$kolomWFnas] = 0;
            }
            
        }

        $wfsnas = $wfnas;


        $kolomall = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        // Menghitung rata-rata MSS
        $averagesall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'k' . $colall;
            $averageall = Css::whereYear('created_at', "2024")->avg($namaKolomall);
            $averagesall[$namaKolomall] = $averageall ?? 0;
        }

        $mssall = array_sum($averagesall);

        // Menghitung WS
        $WSall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'h' . $colall;
            $WSall[$namaKolomall] = ($wfsnas[$namaKolomall] * $averagesall['k' . $colall]) / 100;
        }

        $totalWSnas = array_sum($WSall);
// end code untuk Nasional

//COde untuk Telkom Non Telkom
        // Code untuk MIS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamistnt = [];
        $mistnt = [];
        $wfstnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'h' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2024")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamistnt[$lokasiItemtnt] = $averagestnt;
            $mistnt[$lokasiItemtnt] = array_sum($averagestnt);

            // Menghitung wf untuk setiap kolom
            $wftnt = [];
            for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
                $kolomWFtnt = 'h' . $i;
                if($mistnt[$lokasiItemtnt] != 0){
                    $wftnt[$kolomWFtnt] = ($ratamistnt[$lokasiItemtnt][$kolomWFtnt] / $mistnt[$lokasiItemtnt]) * 100;
                }else{
                    $wftnt[$kolomWFtnt] = 0;
                }
                
            }

            $wfstnt[$lokasiItemtnt] = $wftnt;
        }


        //Code Untuk MSS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamsstnt = [];
        $msstnt = [];
        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'k' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2024")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamsstnt[$lokasiItemtnt] = $averagestnt;
            $msstnt[$lokasiItemtnt] = array_sum($averagestnt);
        }

        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $kolomtnt = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            foreach ($kolomtnt as $coltnt) {
                $namaKolomtnt = 'h' . $coltnt;
                $WStnt[$lokasiItemtnt][$namaKolomtnt] = ($wfstnt[$lokasiItemtnt][$namaKolomtnt] * $ratamsstnt[$lokasiItemtnt]['k' . $coltnt]) / 100;
            }
        }

        $totalWStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $totalWStnt[$lokasiItemtnt] = array_sum($WStnt[$lokasiItemtnt]);
        }
//End code untuk Telkom Non Telkom

        return view('/awanlab/css/analisis24',compact(
            'hasilsurveys',
            'internal',
            'external',
            'responden',
            'datainternal',
            'dataexternal',
            'surveymedan',
            'respondenmedan',
            'surveyjakarta',
            'respondenjakarta',
            'surveysurabaya',
            'respondensurabaya',
            'surveymakassar',
            'respondenmakassar',
            'mss',
            'ratamss',
            'mis',
            'ratamis',
            'wfs',
            'WS',
            'totalWS',
            'misnas',
            'totalWSnas',
            'mssall',
            'mistnt',
            'msstnt',
            'totalWStnt',
            'ratamistnt',
            'ratamsstnt',
            'averagesnas',
            'averagesall'
            
        ));
    }
    


    public function report25(){
        $hasilsurveys = Css::whereYear('created_at', "2025")->get();
        $internal = Css::where('status', 'Telkom')->whereYear('created_at', "2025")->get();
        $external = Css::where('status', 'Non-Telkom')->whereYear('created_at', "2025")->get();
        $responden = UserCss::where('tahun', "2025")->get();
        $datainternal = UserCss::where('status', 'Telkom')->where('tahun', "2025")->get();
        $dataexternal = UserCss::where('status', 'Non-Telkom')->where('tahun', "2025")->get();
        $surveymedan = Css::where('lab', 'Lab Medan')->whereYear('created_at', "2025")->get();
        $respondenmedan = UserCss::where('lab', 'Lab Medan')->where('tahun', "2025")->get();
        $surveyjakarta = Css::where('lab', 'Lab Jakarta')->whereYear('created_at', "2025")->get();
        $respondenjakarta = UserCss::where('lab', 'Lab Jakarta')->where('tahun', "2025")->get();
        $surveysurabaya = Css::where('lab', 'Lab Surabaya')->whereYear('created_at', "2025")->get();
        $respondensurabaya = UserCss::where('lab', 'Lab Surabaya')->where('tahun', "2025")->get();
        $surveymakassar = Css::where('lab', 'Lab Makassar')->whereYear('created_at', "2025")->get();
        $respondenmakassar = UserCss::where('lab', 'Lab Makassar')->where('tahun', "2025")->get();
        
//COde untuk All lab
        // Code untuk MIS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamis = [];
        $mis = [];
        $wfs = [];

        foreach ($lokasi as $lokasiItem) {
            $averages = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'h' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2025")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamis[$lokasiItem] = $averages;
            $mis[$lokasiItem] = array_sum($averages);

            // Menghitung wf untuk setiap kolom
            $wf = [];
            for ($i = 1; $i <= 20; $i++) {
                $kolomWF = 'h' . $i;
        
                // Cek jika $mis[$lokasiItem] tidak 0 untuk menghindari pembagian dengan 0
                if ($mis[$lokasiItem] != 0) {
                    $wf[$kolomWF] = ($ratamis[$lokasiItem][$kolomWF] / $mis[$lokasiItem]) * 100;
                } else {
                    // Jika $mis[$lokasiItem] = 0, atur wf ke 0
                    $wf[$kolomWF] = 0;
                }
            }

            $wfs[$lokasiItem] = $wf;
        }


        //Code Untuk MSS
        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $ratamss = [];
        $mss = [];
        foreach ($lokasi as $lokasiItem) {
            $averages = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolom = 'k' . $i;
                $average = Css::where('lab', $lokasiItem)->whereYear('created_at', "2025")->avg($kolom);
                $averages[$kolom] = $average ?? 0;
            }

            $ratamss[$lokasiItem] = $averages;
            $mss[$lokasiItem] = array_sum($averages);
        }

        $lokasi = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan','Lab Makassar'];
        $kolom = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WS = [];

        foreach ($lokasi as $lokasiItem) {
            foreach ($kolom as $col) {
                $namaKolom = 'h' . $col;
                $WS[$lokasiItem][$namaKolom] = ($wfs[$lokasiItem][$namaKolom] * $ratamss[$lokasiItem]['k' . $col]) / 100;
            }
        }

        $totalWS = [];

        foreach ($lokasi as $lokasiItem) {
            $totalWS[$lokasiItem] = array_sum($WS[$lokasiItem]);
        }
//End code untuk ALL Lab

//Code untuk Nasional
        $ratamisnas = [];
        $misnas = [];
        $wfsnas = [];

        for ($i = 1; $i <= 20; $i++) {
            $kolomnas = 'h' . $i;
            $averagenas = Css::whereYear('created_at', "2025")->avg($kolomnas);
            $averagesnas[$kolomnas] = $averagenas ?? 0;
        }

        $misnas = array_sum($averagesnas);

        // Menghitung wf untuk setiap kolom
        $wfnas = [];
        for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
            $kolomWFnas = 'h' . $i;
            
            if ($misnas != 0){
                $wfnas[$kolomWFnas] = ($averagesnas[$kolomWFnas] / $misnas) * 100;
            }else{
                $wfnas[$kolomWFnas] = 0;
            }
            
        }

        $wfsnas = $wfnas;


        $kolomall = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        // Menghitung rata-rata MSS
        $averagesall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'k' . $colall;
            $averageall = Css::whereYear('created_at', "2025")->avg($namaKolomall);
            $averagesall[$namaKolomall] = $averageall ?? 0;
        }

        $mssall = array_sum($averagesall);

        // Menghitung WS
        $WSall = [];

        foreach ($kolomall as $colall) {
            $namaKolomall = 'h' . $colall;
            $WSall[$namaKolomall] = ($wfsnas[$namaKolomall] * $averagesall['k' . $colall]) / 100;
        }

        $totalWSnas = array_sum($WSall);
// end code untuk Nasional

//COde untuk Telkom Non Telkom
        // Code untuk MIS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamistnt = [];
        $mistnt = [];
        $wfstnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];

            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'h' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2025")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamistnt[$lokasiItemtnt] = $averagestnt;
            $mistnt[$lokasiItemtnt] = array_sum($averagestnt);

            // Menghitung wf untuk setiap kolom
            $wftnt = [];
            for ($i = 1; $i <= 20; $i++) { // Anda dapat mengubah 3 sesuai dengan jumlah kolom wf yang diinginkan
                $kolomWFtnt = 'h' . $i;
                if($mistnt[$lokasiItemtnt] != 0){
                    $wftnt[$kolomWFtnt] = ($ratamistnt[$lokasiItemtnt][$kolomWFtnt] / $mistnt[$lokasiItemtnt]) * 100;
                }else{
                    $wftnt[$kolomWFtnt] = 0;
                }
                
            }

            $wfstnt[$lokasiItemtnt] = $wftnt;
        }


        //Code Untuk MSS
        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $ratamsstnt = [];
        $msstnt = [];
        foreach ($lokasitnt as $lokasiItemtnt) {
            $averagestnt = [];
            
            for ($i = 1; $i <= 20; $i++) {
                $kolomtnt = 'k' . $i;
                $averagetnt = Css::where('status', $lokasiItemtnt)->whereYear('created_at', "2025")->avg($kolomtnt);
                $averagestnt[$kolomtnt] = $averagetnt ?? 0;
            }

            $ratamsstnt[$lokasiItemtnt] = $averagestnt;
            $msstnt[$lokasiItemtnt] = array_sum($averagestnt);
        }

        $lokasitnt = ['Telkom', 'Non-Telkom'];
        $kolomtnt = range(1, 20); // Kolom-kolom yang ingin dihitung (h1, h2, ..., h20)

        $WStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            foreach ($kolomtnt as $coltnt) {
                $namaKolomtnt = 'h' . $coltnt;
                $WStnt[$lokasiItemtnt][$namaKolomtnt] = ($wfstnt[$lokasiItemtnt][$namaKolomtnt] * $ratamsstnt[$lokasiItemtnt]['k' . $coltnt]) / 100;
            }
        }

        $totalWStnt = [];

        foreach ($lokasitnt as $lokasiItemtnt) {
            $totalWStnt[$lokasiItemtnt] = array_sum($WStnt[$lokasiItemtnt]);
        }
//End code untuk Telkom Non Telkom

        return view('/awanlab/css/analisis25',compact(
            'hasilsurveys',
            'internal',
            'external',
            'responden',
            'datainternal',
            'dataexternal',
            'surveymedan',
            'respondenmedan',
            'surveyjakarta',
            'respondenjakarta',
            'surveysurabaya',
            'respondensurabaya',
            'surveymakassar',
            'respondenmakassar',
            'mss',
            'ratamss',
            'mis',
            'ratamis',
            'wfs',
            'WS',
            'totalWS',
            'misnas',
            'totalWSnas',
            'mssall',
            'mistnt',
            'msstnt',
            'totalWStnt',
            'ratamistnt',
            'ratamsstnt',
            'averagesnas',
            'averagesall'
            
        ));
    }

    public function reportDynamic(Request $request)
    {
        $year = (int) $request->input('year', Carbon::now()->year);
        $reportData = $this->buildCssAnalysisData($year);

        return view('/awanlab/css/analisis-dinamis', $reportData);
    }

    private function buildCssAnalysisData(int $year): array
    {
        $locations = ['Lab Surabaya', 'Lab Jakarta', 'Lab Medan', 'Lab Makassar'];
        $customerTypes = ['Telkom', 'Non-Telkom'];
        $columns = range(1, 20);

        $hasilsurveys = Css::whereYear('created_at', $year)->get();
        $internal = Css::where('status', 'Telkom')->whereYear('created_at', $year)->get();
        $external = Css::where('status', 'Non-Telkom')->whereYear('created_at', $year)->get();

        $responden = Usercss::where('tahun', $year)->get();
        $datainternal = Usercss::where('status', 'Telkom')->where('tahun', $year)->get();
        $dataexternal = Usercss::where('status', 'Non-Telkom')->where('tahun', $year)->get();

        $surveymedan = Css::where('lab', 'Lab Medan')->whereYear('created_at', $year)->get();
        $respondenmedan = Usercss::where('lab', 'Lab Medan')->where('tahun', $year)->get();
        $surveyjakarta = Css::where('lab', 'Lab Jakarta')->whereYear('created_at', $year)->get();
        $respondenjakarta = Usercss::where('lab', 'Lab Jakarta')->where('tahun', $year)->get();
        $surveysurabaya = Css::where('lab', 'Lab Surabaya')->whereYear('created_at', $year)->get();
        $respondensurabaya = Usercss::where('lab', 'Lab Surabaya')->where('tahun', $year)->get();
        $surveymakassar = Css::where('lab', 'Lab Makassar')->whereYear('created_at', $year)->get();
        $respondenmakassar = Usercss::where('lab', 'Lab Makassar')->where('tahun', $year)->get();

        $ratamis = [];
        $mis = [];
        $wfs = [];
        foreach ($locations as $location) {
            foreach ($columns as $column) {
                $field = 'h' . $column;
                $ratamis[$location][$field] = Css::where('lab', $location)->whereYear('created_at', $year)->avg($field) ?? 0;
            }

            $mis[$location] = array_sum($ratamis[$location]);
            foreach ($columns as $column) {
                $field = 'h' . $column;
                $wfs[$location][$field] = $mis[$location] != 0 ? ($ratamis[$location][$field] / $mis[$location]) * 100 : 0;
            }
        }

        $ratamss = [];
        $mss = [];
        foreach ($locations as $location) {
            foreach ($columns as $column) {
                $field = 'k' . $column;
                $ratamss[$location][$field] = Css::where('lab', $location)->whereYear('created_at', $year)->avg($field) ?? 0;
            }

            $mss[$location] = array_sum($ratamss[$location]);
        }

        $WS = [];
        $totalWS = [];
        foreach ($locations as $location) {
            foreach ($columns as $column) {
                $hField = 'h' . $column;
                $kField = 'k' . $column;
                $WS[$location][$hField] = ($wfs[$location][$hField] * $ratamss[$location][$kField]) / 100;
            }

            $totalWS[$location] = array_sum($WS[$location]);
        }

        $averagesnas = [];
        foreach ($columns as $column) {
            $field = 'h' . $column;
            $averagesnas[$field] = Css::whereYear('created_at', $year)->avg($field) ?? 0;
        }

        $misnas = array_sum($averagesnas);
        $wfsnas = [];
        foreach ($columns as $column) {
            $field = 'h' . $column;
            $wfsnas[$field] = $misnas != 0 ? ($averagesnas[$field] / $misnas) * 100 : 0;
        }

        $averagesall = [];
        foreach ($columns as $column) {
            $field = 'k' . $column;
            $averagesall[$field] = Css::whereYear('created_at', $year)->avg($field) ?? 0;
        }

        $mssall = array_sum($averagesall);
        $WSall = [];
        foreach ($columns as $column) {
            $hField = 'h' . $column;
            $kField = 'k' . $column;
            $WSall[$hField] = ($wfsnas[$hField] * $averagesall[$kField]) / 100;
        }

        $totalWSnas = array_sum($WSall);

        $ratamistnt = [];
        $mistnt = [];
        $wfstnt = [];
        foreach ($customerTypes as $customerType) {
            foreach ($columns as $column) {
                $field = 'h' . $column;
                $ratamistnt[$customerType][$field] = Css::where('status', $customerType)->whereYear('created_at', $year)->avg($field) ?? 0;
            }

            $mistnt[$customerType] = array_sum($ratamistnt[$customerType]);
            foreach ($columns as $column) {
                $field = 'h' . $column;
                $wfstnt[$customerType][$field] = $mistnt[$customerType] != 0 ? ($ratamistnt[$customerType][$field] / $mistnt[$customerType]) * 100 : 0;
            }
        }

        $ratamsstnt = [];
        $msstnt = [];
        foreach ($customerTypes as $customerType) {
            foreach ($columns as $column) {
                $field = 'k' . $column;
                $ratamsstnt[$customerType][$field] = Css::where('status', $customerType)->whereYear('created_at', $year)->avg($field) ?? 0;
            }

            $msstnt[$customerType] = array_sum($ratamsstnt[$customerType]);
        }

        $WStnt = [];
        $totalWStnt = [];
        foreach ($customerTypes as $customerType) {
            foreach ($columns as $column) {
                $hField = 'h' . $column;
                $kField = 'k' . $column;
                $WStnt[$customerType][$hField] = ($wfstnt[$customerType][$hField] * $ratamsstnt[$customerType][$kField]) / 100;
            }

            $totalWStnt[$customerType] = array_sum($WStnt[$customerType]);
        }

        $previousYear = $year - 1;
        $previousTrendMetrics = $this->buildCssTrendMetrics($previousYear);

        return compact(
            'year',
            'previousYear',
            'previousTrendMetrics',
            'hasilsurveys',
            'internal',
            'external',
            'responden',
            'datainternal',
            'dataexternal',
            'surveymedan',
            'respondenmedan',
            'surveyjakarta',
            'respondenjakarta',
            'surveysurabaya',
            'respondensurabaya',
            'surveymakassar',
            'respondenmakassar',
            'mss',
            'ratamss',
            'mis',
            'ratamis',
            'wfs',
            'WS',
            'totalWS',
            'misnas',
            'totalWSnas',
            'mssall',
            'mistnt',
            'msstnt',
            'totalWStnt',
            'ratamistnt',
            'ratamsstnt',
            'averagesnas',
            'averagesall'
        );
    }

    private function buildCssTrendMetrics(int $year): array
    {
        $locations = ['Lab Medan', 'Lab Jakarta', 'Lab Surabaya', 'Lab Makassar'];
        $customerTypes = ['Telkom', 'Non-Telkom'];
        $columns = range(1, 20);

        $result = [
            'hasData' => Css::whereYear('created_at', $year)->exists(),
            'labs' => [],
            'customerTypes' => [],
            'national' => [
                'mis' => 0,
                'mss' => 0,
                'ws' => 0,
                'csi' => 0,
            ],
        ];

        foreach ($locations as $location) {
            $ratamis = [];
            $ratamss = [];

            foreach ($columns as $column) {
                $ratamis['h' . $column] = Css::where('lab', $location)->whereYear('created_at', $year)->avg('h' . $column) ?? 0;
                $ratamss['k' . $column] = Css::where('lab', $location)->whereYear('created_at', $year)->avg('k' . $column) ?? 0;
            }

            $mis = array_sum($ratamis);
            $mss = array_sum($ratamss);
            $ws = 0;

            foreach ($columns as $column) {
                $wf = $mis != 0 ? ($ratamis['h' . $column] / $mis) * 100 : 0;
                $ws += ($wf * $ratamss['k' . $column]) / 100;
            }

            $result['labs'][$location] = [
                'mis' => $mis,
                'mss' => $mss,
                'ws' => $ws,
                'csi' => ($ws / 5) * 100,
            ];
        }

        $nationalMisValues = [];
        $nationalMssValues = [];
        foreach ($columns as $column) {
            $nationalMisValues['h' . $column] = Css::whereYear('created_at', $year)->avg('h' . $column) ?? 0;
            $nationalMssValues['k' . $column] = Css::whereYear('created_at', $year)->avg('k' . $column) ?? 0;
        }

        $nationalMis = array_sum($nationalMisValues);
        $nationalMss = array_sum($nationalMssValues);
        $nationalWs = 0;
        foreach ($columns as $column) {
            $wf = $nationalMis != 0 ? ($nationalMisValues['h' . $column] / $nationalMis) * 100 : 0;
            $nationalWs += ($wf * $nationalMssValues['k' . $column]) / 100;
        }

        $result['national'] = [
            'mis' => $nationalMis,
            'mss' => $nationalMss,
            'ws' => $nationalWs,
            'csi' => ($nationalWs / 5) * 100,
        ];

        foreach ($customerTypes as $customerType) {
            $ratamis = [];
            $ratamss = [];

            foreach ($columns as $column) {
                $ratamis['h' . $column] = Css::where('status', $customerType)->whereYear('created_at', $year)->avg('h' . $column) ?? 0;
                $ratamss['k' . $column] = Css::where('status', $customerType)->whereYear('created_at', $year)->avg('k' . $column) ?? 0;
            }

            $mis = array_sum($ratamis);
            $mss = array_sum($ratamss);
            $ws = 0;

            foreach ($columns as $column) {
                $wf = $mis != 0 ? ($ratamis['h' . $column] / $mis) * 100 : 0;
                $ws += ($wf * $ratamss['k' . $column]) / 100;
            }

            $result['customerTypes'][$customerType] = [
                'mis' => $mis,
                'mss' => $mss,
                'ws' => $ws,
                'csi' => ($ws / 5) * 100,
            ];
        }

        return $result;
    }
}
