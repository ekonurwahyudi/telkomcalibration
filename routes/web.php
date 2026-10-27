<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Translate

// Verifikasi keaslian sertifikat dari QR code -- publik, tanpa login.
// Path /v/ sengaja pendek: tiap karakter menambah kerapatan QR.
Route::get('/v/{token}', 'VerifyCertificateController@show')->name('verify.certificate');

//Booking Order
Route::get('/BookingOrder', 'BookingController@create')->name('order.create');
Route::post('/order', 'BookingController@store')->name('order.store');
Route::get('/monitoring-booking', 'BookingController@monitoring');
Route::get('/editbooking/{id}','BookingController@edit');
Route::post('/updatebooking/{id}','BookingController@update');
Route::get('/cetak-kup/{id}', 'BookingController@kup');
Route::get('/cetak-pap/{id}', 'BookingController@pap');
Route::get('/formBA/{id}', 'BookingController@formba');
Route::post('/cetak-ATE04/{id}', 'BookingController@ate04');
Route::get('/tracking-order','BerandaController@trackingorder');
Route::get('/check-order','BerandaController@searchorder');
Route::get('/zoomstream','BerandaController@zoom');


// Dashboaord CSS 2023
Route::get('/dashboard-css','CssController@css');
Route::post('/css-input','CssController@input');
Route::get('/hasil-survey-css/{id}/edit','CssController@editHasilSurvey')->name('hasil-survey-css.edit');
Route::post('/hasil-survey-css/{id}/update','CssController@updateHasilSurvey')->name('hasil-survey-css.update');
Route::post('/hasil-survey-css/{id}/delete','CssController@deleteHasilSurvey')->name('hasil-survey-css.delete');
Route::get('/all-list','CssController@list');
Route::get('/check-name', 'CssController@checkName')->name('form.checkName');
Route::post('/check-duplicate', 'UserController@checkDuplicate');
Route::get('/add','CssController@add');
Route::get('/edit/{id}','CssController@edit');
Route::post('/update/{id}','CssController@update');
Route::post('/add-proses','CssController@proses');
Route::post('data/{id}', 'CssController@destroy')->name('data.destroy');
Route::get('/treg1','CssController@treg1');
Route::get('/treg2','CssController@treg2');
Route::get('/treg3','CssController@treg3');
Route::get('/treg4','CssController@treg4');
Route::get('/treg5','CssController@treg5');
Route::get('/treg6','CssController@treg6');
Route::get('/treg7','CssController@treg7');
Route::get('/survey_export', 'CssController@export');
Route::get('/survey_export_filtered', 'CssController@exportFiltered');
Route::get('/all-list/export_excel', 'CssController@export_treg');
Route::get('/treg1/export_excel', 'CssController@export_treg1');
Route::get('/treg2/export_excel', 'CssController@export_treg2');
Route::get('/treg3/export_excel', 'CssController@export_treg3');
Route::get('/treg4/export_excel', 'CssController@export_treg4');
Route::get('/treg5/export_excel', 'CssController@export_treg5');
Route::get('/treg6/export_excel', 'CssController@export_treg6');
Route::get('/treg7/export_excel', 'CssController@export_treg7');
Route::post('/uploadbulk', 'CssController@uploadExcel')->name('upload.excel');
Route::post('/copy-respondents-year', 'CssController@copyRespondentsYear')->name('copy.respondents.year');
Route::get('/timeplan','CssController@timeplan');


//Survey Mitra DSO
Route::get('/SurveyMitraDSO','MitraController@index');
Route::post('/mitra-input','MitraController@input');
Route::get('/monitoringsurvey','MitraController@monitoring');
Route::get('/datamitra','MitraController@datamitra');

//Report Dashboard
Route::get('/analisis2023','ReportController@report23');
Route::get('/analisis2024','ReportController@report24');
Route::get('/analisis2025','ReportController@report25');
Route::get('/analisis-css','ReportController@reportDynamic');

// Route::redirect('/','/id');
Route::group(['prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/','BerandaController@beranda');
    Route::get('/tentang-kami','BerandaController@tentang');
    Route::get('/layanan-kalibrasi','LayananController@layanan');
    Route::get('/ruanglingkup','LayananController@ruanglingkup');
    Route::get('/fiberoptic','LayananController@fiber');
    Route::get('/kelistrikan','LayananController@listrik');
    Route::get('/frekuensiwaktu','LayananController@waktu');
    Route::get('/konsultasi','BerandaController@konsultasi');
    Route::post('/konsultasi-proses','BerandaController@konsultasiproses');
    Route::get('/labjakarta','BerandaController@labjakarta');
    Route::get('/labmedan','BerandaController@labmedan');
    Route::get('/labsurabaya','BerandaController@labsurabaya');
    Route::get('/labmakassar','BerandaController@labmakassar');
    Route::get('/kritik-saran','BerandaController@kritik_saran');
    Route::get('/sertifikat-iso','BerandaController@sertifikat');
    Route::get('/struktur-organisasi','BerandaController@struktur');
    // Route::get('/CSS2024','BerandaController@survey');
    Route::get('/booking','BerandaController@booking');
    Route::get('/hubungi-kami','BerandaController@hubungikami');
    Route::get('artikel/','BerandaController@allartikel');

    Route::get('/CSS-LKTelkom','CssController@survey');
});


//Route Translate

// Route::redirect('artikel','artikel/id');
// Route::redirect('tentang-kami','tentang-kami/id');

//Route Beranda
// Route::get('/{locale}','BerandaController@beranda');
Route::get('artikel/{artikel_id}','BerandaController@artikel');

// Route::get('tentang-kami/{locale}','BerandaController@tentang');
Route::get('chat', function(){
    return view('chat');
});

//Login + Pendaftaran
Auth::routes(['verify' => true]);
Route::get('/newregister','PerusahaanController@daftar');


//Route Untuk akses login
Route::middleware('role:customer')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home','/dashboard');
Route::middleware('role:superadmin')->get('/awanlab', 'HomeController@awanlab')->name('awanlab');
Route::middleware('role:superadmin')->get('/pengaturan-web', 'HomeController@web')->name('pengaturan-web');

//Route Untuk Pengaturan Web
// Route::middleware('role:admin')->get('/pengaturan/artikel', 'PengaturanwebController@artikel')->name('/pengaturan/artikel');
// Route::middleware('role:admin')->get('/pengaturan/tambah-artikel', 'PengaturanwebController@tambah_artikel')->name('/pengaturan/tambah-artikel');

//Route Untuk Artikel
Route::resource('/pengaturan/artikel',ArtikelController::class);
Route::redirect('/pengaturan/artikel/create', '../../pengaturan/tambah-artikel');
Route::get('/pengaturan/tambah-artikel','ArtikelController@create');

//Route Ruang Lingkup Crud
Route::get('/pengaturan/ruanglingkup','RuanglingkupController@index');
Route::get('/pengaturan/tambah-ruanglingkup','RuanglingkupController@tambah');
Route::post('/pengaturan/ruanglingkup-proses', 'RuanglingkupController@proses');
Route::get('/pengaturan/ruanglingkup-hapus/{ruanglingkup_id}', 'RuanglingkupController@delete');
Route::get('/pengaturan/ruanglingkup-edit/{ruanglingkup_id}', 'RuanglingkupController@edit');
Route::post('/pengaturan/ruanglingkup-update/{ruanglingkup_id}', 'RuanglingkupController@update');

//Route Slide Crud
Route::get('/pengaturan/slide','SlideController@index');
Route::get('/pengaturan/tambah-slide','SlideController@tambah');
Route::post('/pengaturan/slide-proses','SlideController@store');
Route::get('/pengaturan-slide-edit/{slide_id}/', 'SlideController@edit');
Route::post('/pengaturan/slide-update/{slide_id}', 'SlideController@update');
Route::get('/pengaturan/slide-hapus/{slide_id}', 'SlideController@destroy');

//Route Faq Crud
Route::get('/pengaturan/faq', 'FaqController@index');
Route::get('/pengaturan/tambah-faq','FaqController@tambah');
Route::post('/pengaturan/faq-proses','FaqController@proses');
Route::get('/pengaturan/faq-hapus/{faq_id}', 'FaqController@destroy');
Route::get('/pengaturan-edit-faq/{faq_id}', 'FaqController@edit');
Route::post('/pengaturan/faq-update/{faq_id}', 'FaqController@update');
Route::get('/pengaturan/pertayaan-customer/','FaqController@pertayaan');

//Route Feedback
Route::post('/feedback-input','FeedbackController@input');
Route::get('/pengaturan/kritik-saran','FeedbackController@index');

//Route Master User
Route::middleware('role:superadmin')->group(function(){
    Route::get('/master-user','SuperadminController@user');
    Route::get('/tambah-user','SuperadminController@tambah');
    Route::post('/tambah-user/proses','SuperadminController@proses');
    Route::post('/hapus-user/{id}','SuperadminController@hapus');
    Route::get('/edit-user/{id}','SuperadminController@edit');
    Route::post('/update-user/{id}','SuperadminController@update');
    Route::get('/monitoring-jakarta','HomeController@monitoring_jakarta');
    Route::get('/monitoring-surabaya','HomeController@monitoring_surabaya');
    Route::get('/monitoring-medan','HomeController@monitoring_medan');
    Route::get('/monitoring-makassar','HomeController@monitoring_makassar');
});
//Tambah Perusahaan
Route::post('/perusahaandaftar-proses','PerusahaanController@proses');

//Halaman Dashboard Customer
Route::middleware('role:customer')->group(function(){
    Route::get('/dashboard','HomeController@cus');
    Route::get('/dashboard-order','OrderController@index');
    Route::post('/order-proses','OrderController@proses');
    Route::get('/dashboard-sph-{user_id}','OrderController@sph');
    Route::post('/status-sph-{user_id}','OrderController@statussph');
    Route::post('/input-po-{user_id}','OrderController@inputpo');
    Route::get('/dashboard-profil','HomeController@profilcus');
    Route::post('/updateuser/{user_id}','HomeController@updateuser');
    Route::get('/feedback','HomeController@feedback');
});

//Halaman Dashboard Customer Service (CS)
Route::middleware('role:cs')->group(function(){
    Route::get('/dashboard-cs','CsController@index');
    Route::get('/order-diproses','CsController@orderdiproses');
    Route::get('/cetak-kup/{user_id}','CsController@kup');
    Route::get('/cetak-pap/{user_id}','CsController@pap');
    Route::post('/statustgl-proses/{order_id}','CsController@statustgl');
    Route::post('/statusccl-proses/{order_id}','CsController@statusccl');
    Route::get('/form-ba-{user_id}','CsController@form_ba');
    Route::post('/cetak-ba-{user_id}','CsController@ba');
    Route::get('/inputsph-{user_id}','CsController@inputsph');
    Route::post('/proses-inputsph/{user_id}','CsController@prosessph');
    Route::post('/proses-revisisph/{user_id}','CsController@revisisph');
    Route::get('/riwayat-order','CsController@riwayatorder');
    Route::get('/profilcs','CsController@profilcs');
    Route::post('/updateprofilcs/{user_id}','CsController@updateprofilcs');
    Route::get('/notifikasi-cs','CsController@notifikasi');
    Route::get('/feedbackcs','CsController@feedback');
});
Route::post('/input-feedback','FeedbackwebController@inputfeedback');

//Halaman Dashboard Koordinator Teknik (Kortek)
Route::middleware('role:kortek')->group(function(){
    Route::get('/dashboard-kortek','KortekController@index');
    Route::get('/monitoring-order','KortekController@monitoring');
    Route::post('/pilihteknisi/{order_id}','KortekController@pilihteknisi');
    Route::get('/feedbackkortek','KortekController@feedback');
});

//Halaman Dashboard Teknisi
Route::middleware('role:teknisi')->group(function(){
    Route::get('/dashboard-teknisi','TeknisiController@index');
    Route::get('/proses-kalibrasi','TeknisiController@proseskalibrasi');
    Route::post('/mulaikalibrasi/{order_id}','TeknisiController@mulaikalibrasi');
    Route::post('/cetaksertifikat/{order_id}','TeknisiController@cetaksertifikat');
    Route::get('/riwayat-kalibrasi','TeknisiController@riwayatkalibrasi');
    Route::get('/feedbackteknisi','TeknisiController@feedback');
});

//Halaman Dahboard Admin
Route::middleware('role:admin')->group(function(){
    Route::get('/dashboard-admin','AdminController@index');
    Route::post('/sertifikatselesai/{order_id}','AdminController@sertifikatselesai');
    Route::get('/feedbackadmin','AdminController@feedback');
});
