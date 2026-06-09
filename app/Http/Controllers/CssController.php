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
use App\Exports\SurveyExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class CssController extends Controller
{
    // public function ruanglingkup(){
    //     $ruanglingkups = Ruanglingkup::all();
    //     return view('RL/master', compact('ruanglingkups'));
    // }

    public function css(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $hasilsurveys = Css::whereYear('created_at', $year)->get();
        $treg1 = Usercss::where('treg', 'TREG 1')->whereYear('created_at', $year)->get();
        $treg2 = Usercss::where('treg', 'TREG 2')->whereYear('created_at', $year)->get();
        $treg3 = Usercss::where('treg', 'TREG 3')->whereYear('created_at', $year)->get();
        $treg4 = Usercss::where('treg', 'TREG 4')->whereYear('created_at', $year)->get();
        $treg5 = Usercss::where('treg', 'TREG 5')->whereYear('created_at', $year)->get();
        $treg6 = Usercss::where('treg', 'TREG 6')->whereYear('created_at', $year)->get();
        $treg7 = Usercss::where('treg', 'TREG 7')->whereYear('created_at', $year)->get();
        $hasil1 = Css::where('treg', 'TREG 1')->whereYear('created_at', $year)->get();
        $hasil2 = Css::where('treg', 'TREG 2')->whereYear('created_at', $year)->get();
        $hasil3 = Css::where('treg', 'TREG 3')->whereYear('created_at', $year)->get();
        $hasil4 = Css::where('treg', 'TREG 4')->whereYear('created_at', $year)->get();
        $hasil5 = Css::where('treg', 'TREG 5')->whereYear('created_at', $year)->get();
        $hasil6 = Css::where('treg', 'TREG 6')->whereYear('created_at', $year)->get();
        $hasil7 = Css::where('treg', 'TREG 7')->whereYear('created_at', $year)->get();
        $saran1 = Css::whereNotNull('saran')->where('lab', 'Lab Jakarta')->orderBy('created_at', 'desc')->whereYear('created_at', $year)->get();
        $saran2 = Css::whereNotNull('saran')->where('lab', 'Lab Medan')->orderBy('created_at', 'desc')->whereYear('created_at', $year)->get();
        $saran3 = Css::whereNotNull('saran')->where('lab', 'Lab Surabaya')->orderBy('created_at', 'desc')->whereYear('created_at', $year)->get();
        $saran4 = Css::whereNotNull('saran')->where('lab', 'Lab Makassar')->orderBy('created_at', 'desc')->whereYear('created_at', $year)->get();
        $currentDate = Carbon::now()->format('d F');
        return view('/awanlab/css/css',compact('year','currentDate','hasilsurveys','treg1','treg2','treg3','treg4','treg5','treg6','treg7','hasil1','hasil2','hasil3','hasil4','hasil5','hasil6','hasil7','saran1','saran2','saran3','saran4'));
    }
    
    public function survey(){
        $currentYear = Carbon::now()->year;
        $usercss = Usercss::orderBy('nama', 'asc')->where('tahun', $currentYear)->get();
        return view('survey',compact('usercss'));
    }

    public function surveymitra(){
        $usercss = Usercss::orderBy('nama', 'asc')->get();
        return view('/survey-mitra/survey',compact('usercss'));
    }
    
    public function checkName(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $respondent = $this->findSurveyRespondent($request, $currentYear);
        $candidate = (object) [
            'nama' => $respondent ? $respondent->nama : $request->input('nama'),
            'hp' => $respondent ? $respondent->hp : $request->input('hp'),
        ];
        $existingData = $this->findSimilarSurveyResponse($candidate, $currentYear);

        return response()->json([
            'duplicate' => (bool) $existingData,
            'nama' => $existingData ? $existingData->nama : null,
        ]);
    }

    
    public function input(Request $request){
        $pesan = [
            'required' => 'Wajib Diisi'
        ];
        $this->validate($request,[
            'treg' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'user_css_id' => 'nullable|integer',
            'saran' => 'nullable'
        ], $pesan);
        
        $now = Carbon::now();
        $currentYear = Carbon::now()->year;
        $matchedRespondent = $this->findSurveyRespondent($request, $currentYear);
        $surveyName = $matchedRespondent ? $matchedRespondent->nama : $request->nama;

        $duplicateSurvey = $this->findSimilarSurveyResponse((object) [
            'nama' => $surveyName,
            'hp' => $matchedRespondent ? $matchedRespondent->hp : $request->hp,
        ], $currentYear);

        if ($duplicateSurvey) {
            return redirect()->back()->with('error', "Responden {$duplicateSurvey->nama} sudah mengisi survey tahun {$currentYear}.");
        }

        $css = Css::insert([
            'created_at' => $now,
            'updated_at' => $now,
            'nama' => $surveyName,
            'bidang' => $matchedRespondent ? $matchedRespondent->bidang : $request->bidang,
            'perusahaan' => $matchedRespondent ? $matchedRespondent->perusahaan : $request->perusahaan,
            'treg' => $matchedRespondent ? $matchedRespondent->treg : ($request->has('treg') ? $request->treg : null),
            'status' => $matchedRespondent ? $matchedRespondent->status : ($request->has('status') ? $request->status : null),
            'lab' => $matchedRespondent ? $matchedRespondent->lab : $request->lab,
            'hp' => $matchedRespondent ? $matchedRespondent->hp : $request->hp,
            'email' => $matchedRespondent ? $matchedRespondent->email : $request->email,
            'saran' => $request->has('saran') ? $request->saran : null,
            'h1' => $request->h1,
            'h2' => $request->h2,
            'h3' => $request->h3,
            'h4' => $request->h4,
            'h5' => $request->h5,
            'h6' => $request->h6,
            'h7' => $request->h7,
            'h8' => $request->h8,
            'h9' => $request->h9,
            'h10' => $request->h10,
            'h11' => $request->h11,
            'h12' => $request->h12,
            'h13' => $request->h13,
            'h14' => $request->h14,
            'h15' => $request->h15,
            'h16' => $request->h16,
            'h17' => $request->h17,
            'h18' => $request->h18,
            'h19' => $request->h19,
            'h20' => $request->h20,
            'k1' => $request->k1,
            'k2' => $request->k2,
            'k3' => $request->k3,
            'k4' => $request->k4,
            'k5' => $request->k5,
            'k6' => $request->k6,
            'k7' => $request->k7,
            'k8' => $request->k8,
            'k9' => $request->k9,
            'k10' => $request->k10,
            'k11' => $request->k11,
            'k12' => $request->k12,
            'k13' => $request->k13,
            'k14' => $request->k14,
            'k15' => $request->k15,
            'k16' => $request->k16,
            'k17' => $request->k17,
            'k18' => $request->k18,
            'k19' => $request->k19,
            'k20' => $request->k20
        ]);
        session()->flash('success', 'Data berhasil diinput.');
        return redirect('/CSS-LKTelkom');
    }

    private function findSurveyRespondent(Request $request, int $year)
    {
        $respondentId = (int) $request->input('user_css_id');

        if ($respondentId > 0) {
            $respondent = Usercss::where('id', $respondentId)
                ->where('tahun', $year)
                ->first();

            if ($respondent) {
                return $respondent;
            }
        }

        $candidate = (object) [
            'nama' => $request->input('nama'),
            'hp' => $request->input('hp'),
        ];

        return Usercss::where('tahun', $year)
            ->get()
            ->first(function ($respondent) use ($candidate) {
                return $this->isSimilarRespondent($candidate, $respondent);
            });
    }

    private function findSimilarSurveyResponse($candidate, int $year)
    {
        return Css::whereYear('created_at', $year)
            ->get()
            ->first(function ($survey) use ($candidate) {
                return $this->isSimilarRespondent($candidate, $survey);
            });
    }
    
    public function list(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('status', 'Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('status', 'Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil =  Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    
    public function treg1(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 1')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 1')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 1')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil =  Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 1')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    
    public function treg2(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 2')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 2')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 2')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 2')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    
    public function treg3(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 3')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 3')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 3')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 3')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    
    public function treg4(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 4')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 4')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 4')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 4')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    public function treg5(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 5')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 5')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 5')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 5')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    public function treg6(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 6')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 6')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 6')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 6')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    public function treg7(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $all = Usercss::where('treg','TREG 7')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $list = Usercss::where('treg','TREG 7')->where('status','Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $non = Usercss::where('treg','TREG 7')->where('status','Non-Telkom')->orderBy('updated_at', 'desc')->where('tahun', $year)->get();
        $hasil = Css::whereYear('created_at', $year)->pluck('nama')->toArray();
        $belum = Usercss::whereNotIn('nama', $hasil)->where('treg','TREG 7')->where('tahun', $year)->get();
        return view('/awanlab/css/list')->with(compact(array('all','list','non','belum','year')));
    }
    
    public function export_treg(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssAll-{$year}.xlsx";
        return Excel::download(new UsercssExport($year), $fileName);
    }
    public function export(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "Hasil-Survey-{$year}.xlsx";
        return Excel::download(new SurveyExport($year), $fileName);
    }
    
    public function exportFiltered(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $searchTerm = $request->input('search', '');
        
        // Query data dengan filter search
        $query = Css::whereYear('created_at', $year);
        
        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('treg', 'like', '%' . $searchTerm . '%')
                  ->orWhere('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('lab', 'like', '%' . $searchTerm . '%')
                  ->orWhere('perusahaan', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('hp', 'like', '%' . $searchTerm . '%')
                  ->orWhere('status', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $data = $query->get();
        
        $fileName = "Hasil-Survey-Filtered-{$year}.xlsx";
        return Excel::download(new SurveyExport($year, $data), $fileName);
    }
    public function export_treg1(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG1-{$year}.xlsx";
        return Excel::download(new Treg1Export($year), $fileName);
    }
    public function export_treg2(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG2-{$year}.xlsx";
        return Excel::download(new Treg2Export($year), $fileName);
    }
    public function export_treg3(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG3-{$year}.xlsx";
        return Excel::download(new Treg3Export($year), $fileName);
    }
    public function export_treg4(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG4-{$year}.xlsx";
        return Excel::download(new Treg4Export($year), $fileName);
    }
    public function export_treg5(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG5-{$year}.xlsx";
        return Excel::download(new Treg5Export($year), $fileName);
    }
    public function export_treg6(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG6-{$year}.xlsx";
        return Excel::download(new Treg6Export($year), $fileName);
    }
    public function export_treg7(Request $request){
        $year = $request->input('year', Carbon::now()->year);
        $fileName = "UsercssTREG7-{$year}.xlsx";
        return Excel::download(new Treg7Export($year), $fileName);
    }
    
    public function add(){
        return view('/awanlab/css/tambah-responden');
    }
    public function analisis(){
        return view('/awanlab/css/analisis');
    }
    public function timeplan(){
        $year = 0;
        return view('/awanlab/css/timeplan',compact('year'));
    }
    
    public function checkDuplicate(Request $request)
    {
        $nama = $request->input('nama');

        $isDuplicate = Usercss::where('nama', $nama)->exists();

        return response()->json(['duplicate' => $isDuplicate]);
    }

    
    
    public function proses(Request $request){
        $pesan = [
            'required' => 'Wajib Diisi'
        ];
        $validatedData = $request->validate([
            'lab' => 'required',
            'treg' => 'required',
            'status' => 'required'
        ],$pesan);
        $now = Carbon::now();
        $currentYear = Carbon::now()->year;
        
        $add = Usercss::insert([
            'nama' => $request->nama,
            'lab' => $request->lab,
            'treg' => $request->treg,
            'hp' => $request->hp,
            'email' => $request->email,
            'bidang' => $request->bidang,
            'perusahaan' => $request->perusahaan,
            'status' => $request->status,
            'tahun' => $currentYear,
            'created_at' => $now,
            'updated_at' => $now
            ]);
            return redirect('/all-list');
    }
    
    public function destroy($id)
    {
        $data = Usercss::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function editHasilSurvey($id)
    {
        $survey = Css::findOrFail($id);
        return view('/awanlab/css/edit-hasil-survey', compact('survey'));
    }

    public function updateHasilSurvey(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['Telkom', 'Non-Telkom'])],
            'treg' => ['required', Rule::in(['TREG 1', 'TREG 2', 'TREG 3', 'TREG 4', 'TREG 5', 'TREG 6', 'TREG 7'])],
        ]);

        $survey = Css::findOrFail($id);
        $data = $request->only([
            'nama',
            'bidang',
            'email',
            'hp',
            'perusahaan',
            'lab',
            'status',
            'treg',
        ]);

        $survey->update($data);

        return redirect('/dashboard-css?year=' . $survey->created_at->format('Y'))->with('success', 'Hasil survey berhasil diupdate.');
    }

    public function deleteHasilSurvey($id)
    {
        $survey = Css::findOrFail($id);
        $year = $survey->created_at->format('Y');
        $survey->delete();

        return redirect('/dashboard-css?year=' . $year)->with('success', 'Hasil survey berhasil dihapus.');
    }
    
    
    public function edit($id){
        $user = Usercss::find($id);
        return view('/awanlab/css/edit',compact('user'));
        
    }
    
    public function update(Request $request){
        $now = Carbon::now();
        $currentYear = Carbon::now()->year;
        $userUpdate = DB::table('user_css')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'lab' => $request->lab,
            'treg' => $request->treg,
            'hp' => $request->hp,
            'email' => $request->email,
            'bidang' => $request->bidang,
            'perusahaan' => $request->perusahaan,
            'status' => $request->status,
            'tahun' => $currentYear,
            'updated_at' => $now
            ]);
        session()->flash('success', 'Data berhasil diupdate.');
        return redirect('/all-list');
    }

    public function copyRespondentsYear(Request $request)
    {
        $targetYear = (int) $request->input('target_year', Carbon::now()->year);
        $sourceYear = (int) $request->input('source_year', $targetYear - 1);

        if ($targetYear <= $sourceYear) {
            return redirect()->back()->with('error', 'Tahun tujuan harus lebih besar dari tahun sumber.');
        }

        $sourceRespondents = Usercss::where('tahun', $sourceYear)->get();
        if ($sourceRespondents->isEmpty()) {
            return redirect()->back()->with('error', "Data responden tahun {$sourceYear} tidak ditemukan.");
        }

        $now = Carbon::now();
        $inserted = 0;
        $skipped = 0;
        $skippedExamples = [];
        $knownRespondents = Usercss::where('tahun', $targetYear)->get()->all();

        foreach ($sourceRespondents as $respondent) {
            $similarRespondent = null;
            foreach ($knownRespondents as $knownRespondent) {
                if ($this->isSimilarRespondent($respondent, $knownRespondent)) {
                    $similarRespondent = $knownRespondent;
                    break;
                }
            }

            if ($similarRespondent) {
                $skipped++;
                if (count($skippedExamples) < 5) {
                    $skippedExamples[] = "{$respondent->nama} mirip dengan {$similarRespondent->nama}";
                }
                continue;
            }

            Usercss::create([
                'nama' => $respondent->nama,
                'lab' => $respondent->lab,
                'treg' => $respondent->treg,
                'hp' => $respondent->hp,
                'email' => $respondent->email,
                'bidang' => $respondent->bidang,
                'perusahaan' => $respondent->perusahaan,
                'status' => $respondent->status,
                'tahun' => $targetYear,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $knownRespondents[] = $respondent;
            $inserted++;
        }

        $message = "Berhasil menyalin responden dari {$sourceYear} ke {$targetYear}. Total data baru: {$inserted}. Data mirip dilewati: {$skipped}.";
        if (!empty($skippedExamples)) {
            $message .= ' Contoh: ' . implode('; ', $skippedExamples) . '.';
        }

        return redirect()->back()->with('success', $message);
    }

    private function isSimilarRespondent($candidate, $existing)
    {
        if (!$this->isSimilarPhone($candidate->hp, $existing->hp)) {
            return false;
        }

        return $this->isSimilarText(
            $this->normalizeText($candidate->nama),
            $this->normalizeText($existing->nama),
            2
        );
    }

    private function normalizeText($value)
    {
        $value = strtolower(trim((string) $value));
        $value = preg_replace('/[^a-z0-9]+/', '', $value);
        return $value ?? '';
    }

    private function normalizePhone($value)
    {
        $phone = preg_replace('/\D+/', '', (string) $value);
        $phone = preg_replace('/^62/', '0', $phone);
        return ltrim($phone ?? '', '0');
    }

    private function isSimilarPhone($left, $right)
    {
        $left = $this->normalizePhone($left);
        $right = $this->normalizePhone($right);

        if ($left === '' || $right === '') {
            return false;
        }

        if ($left === $right) {
            return true;
        }

        $leftTail = substr($left, -8);
        $rightTail = substr($right, -8);

        if (strlen($leftTail) >= 8 && $leftTail === $rightTail) {
            return true;
        }

        return levenshtein($left, $right) <= 1;
    }

    private function isSimilarText($left, $right, $maxDistance = 1)
    {
        if ($left === '' || $right === '') {
            return false;
        }

        if ($left === $right) {
            return true;
        }

        if (strlen($left) <= 4 || strlen($right) <= 4) {
            return levenshtein($left, $right) <= 1;
        }

        return levenshtein($left, $right) <= $maxDistance;
    }
    

    public function uploadExcel(Request $request)
    {
        $tregValue = '';
        if($request->input('treg') === 'treg1'){
            $tregValue = 'TREG 1';
        }elseif($request->input('treg') === 'treg2'){
            $tregValue = 'TREG 2';
        }elseif($request->input('treg') === 'treg3'){
            $tregValue = 'TREG 3';
        }elseif($request->input('treg') === 'treg4'){
            $tregValue = 'TREG 4';
        }elseif($request->input('treg') === 'treg5'){
            $tregValue = 'TREG 5';
        }elseif($request->input('treg') === 'treg6'){
            $tregValue = 'TREG 6';
        }elseif($request->input('treg') === 'treg7'){
            $tregValue = 'TREG 7';
        }
        
        $currentYear = Carbon::now()->year;
        
        if($request->input('pilihan') === 'YA'){
            // Usercss::truncate();
            Usercss::where('treg', $tregValue)->where('tahun', $currentYear)->delete();
            $file = $request->file('excelFile');
            Excel::import(new UserImport, $file);

            return redirect()->back()->with('success', 'Update Data Responden secara massal telah Berhasil.');
        }else{
            $file = $request->file('excelFile');
            Excel::import(new UserImport, $file);

            return redirect()->back()->with('success', 'Update Data Responden secara massal telah Berhasil.');
        }

            
    }
}
