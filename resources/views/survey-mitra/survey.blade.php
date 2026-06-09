@include('/survey-mitra/header')
<!-- page-title -->
  @if(session('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('success') }}</strong>
        </div>
 @endif
<div class="ttm-page-title-row">
            <div class="ttm-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>                    
        </div>

        <!--site-main start-->
    <div class="site-main">
      <!--grid-section-->
      <section class="ttm-row pt-0 pb-50 clearfix">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white z-index-2 spacing-5 box-shadow">
                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                <!-- section title -->
                <div class="section-title with-desc clearfix">
                  <div class="title-header">
                    <h2 class="title">SURVEY PERFORMASI MITRA DSO</h2></br>
                    <span><b>Selamat datang di Survey Performasi Mitra DSO Telkom. </b></span></br>
                    <span>Survey Perfomasrsi Mitra DSO bertujuan menilai tingkat kepuasan user DSO terkait Mitra DSO</span>
                    </br>
                    <span>Kami sangat berharap Para User DSO berpartisipasi dalam survey ini karena hasil yang baik dari
                      survey ini akan kembali kepada user dalam bentuk peningkatan kualitas Mitra DSO. </span>
                    </Span>
                  </div>
                </div><!-- section title end -->
              </div>
            </div>
          </div><!-- row end -->
        </div>
      </section>
      <section class="ttm-row pt-2 pb-50 clearfix">
        <div class="container">
                <!--<div class="alert alert-custom alert-warning fade show mb-5" style="background-color:#fcb42a; border:#fcb42a" role="alert">-->
                <!--    <div class="row mb-10">-->
                <!--        <div class="mb-40"><img src="/images/tesa.png"/></div>-->
                            <!--<div class="alert-text col-md-8">-->
                            <!--    <h4 class="fw-semibold">Saldo Link Aja!</h4>-->
                            <!--    <p><b>200 Responden</b> pertama akan mendapatkan saldo Link Aja!</p>-->
                            <!--</div>-->
                <!--    </div>-->
                <!--</div>-->
          <div class="row">
            <div class="col-lg-12">
              <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white z-index-2 spacing-5 box-shadow">
                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
            <form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix" method="post" action="/mitra-input">
                {{csrf_field()}}
                <div class="form-step active" id="step1">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="mb-1" for="bidang">Bidang DSO</label>
                        <select class="text-input" id="bidang" name="bidang">
                            <option value="">Pilih Bidang</option>
                            @foreach($mitra as $mitra)
                                <option value="{{ $mitra->bidang }}"
                                data-judul="{{ $mitra->judul }}"
                                data-kontrak="{{ $mitra->kontrak }}"
                                data-perusahaan="{{ $mitra->perusahaan }}"
                                data-kelompok="{{ $mitra->kelompok }}"
                                data-PIC="{{ $mitra->PIC }}"
                                >{{ $mitra->bidang }}</option>
                            @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label class="mb-1" for="kontrak">No. Kontrak</label>
                        <input class="text-input" id="kontrak" name="kontrak" type="text" value="" placeholder="No. Kontrak"
                          required>
                          <input class="text-input" id="kelompok" name="kelompok" type="text" value=""
                          required hidden>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label class="mb-1" for="judul">Judul Kontrak</label>
                        <input class="text-input" name="judul" type="text" value="" id="judul" placeholder="Judul kontrak" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="mb-1" for="perusahaan">Nama Perusahaan</label>
                        <input class="text-input" id="perusahaan" name="perusahaan" type="text" value="" placeholder="Nama Perusahaan"
                          required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="mb-1" for="PIC">PIC Telkom <span style="color: brown"><i>(Wajib)</i></span></label>
                        <input class="text-input" name="PIC" type="text" value="" placeholder="Nama / NIK" id="PIC">
                      </div>
                    </div>
                </div>
                <div class="form-step" id="step2">
                    <div class="row">
                      <div class="form-group col-md-8" style="display: table; width: 100%; solid #ccc;">
                        <span style="display: table-cell; vertical-align: middle;"><b>Bagian I. Claim Teguran Mitra<span style="color:red"> *</span></b></span>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="grid-container" style="text-align:center">
                          <div class="grid-item">Ya</div>
                          <div class="grid-item">Tidak</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p1">1. Apakah Anda pernah melakukan Teguran kepada Mitra Baik NDE/Surat/Lisan.</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-3">
                            <input class="form-check-input" type="radio" name="p1" id="p1" value="ya" data-toggle="tooltip"
                              data-placement="top" title="Tidak Penting">
                          </div>
                          <div class="col-3 ml-4">
                            <input class="form-check-input" type="radio" name="p1" id="p1" value="tidak" data-toggle="tooltip"
                              data-placement="top" title="Kurang Penting" >
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p2">2. Apakah ada kejadian incident / Melanggar K3 selama kontrak dengan Mitra ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-3">
                            <input class="form-check-input" type="radio" name="p2" id="p2" value="ya" data-toggle="tooltip"
                              data-placement="top" title="Tidak Penting">
                          </div>
                          <div class="col-3 ml-4">
                            <input class="form-check-input" type="radio" name="p2" id="p2" value="tidak" data-toggle="tooltip"
                              data-placement="top" title="Kurang Penting" >
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p3">3. Apakah ada kejadian incident gangguan pada perangkat yang relatif baru?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-3">
                            <input class="form-check-input" type="radio" name="p3" id="p3" value="ya" data-toggle="tooltip"
                              data-placement="top" title="Tidak Penting">
                          </div>
                          <div class="col-3 ml-4">
                            <input class="form-check-input" type="radio" name="p3" id="p3" value="tidak" data-toggle="tooltip"
                              data-placement="top" title="Kurang Penting" >
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                    
                    <!--Pertayaan Kenyataan-->
                    <div class="row mt-4 pt-4">
                      <div class="form-group col-md-8" style="display: table; width: 100%; solid #ccc;">
                        <span style="display: table-cell; vertical-align: middle;"><b>Bagian II. Ketepatan waktu penyelesaian Mitra <span style="color:red">*</span></b></span>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="grid-container" style="text-align:center">
                          <div class="grid-item">Sangat Lambat</div>
                          <div class="grid-item">Lambat</div>
                          <div class="grid-item">Cukup Cepat</div>
                          <div class="grid-item">Cepat</div>
                          <div class="grid-item">Sangat Cepat</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p4">1. Kecepatan memenuhi permintaan dalam kondisi emergency ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p4" id="p4" value="Sangat Lambat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Lambat">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p4" id="p4" value="Lambat" data-toggle="tooltip"
                              data-placement="top" title="Lambat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p4" id="p4" value="Cukup Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cukup Cepat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p4" id="p4" value="Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cepat">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p4" id="p4" value="Sangat Cepat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Cepat" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p5">2. Respond time mitra ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p5" id="p5" value="Sangat Lambat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Lambat">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p5" id="p5" value="Lambat" data-toggle="tooltip"
                              data-placement="top" title="Lambat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p5" id="p5" value="Cukup Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cukup Cepat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p5" id="p5" value="Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cepat">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p5" id="p5" value="Sangat Cepat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Cepat" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p6">3. Kecepatan pemenuhan permintaan ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p6" id="p6" value="Sangat Lambat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Lambat">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p6" id="p6" value="Lambat" data-toggle="tooltip"
                              data-placement="top" title="Lambat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p6" id="p6" value="Cukup Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cukup Cepat">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p6" id="p6" value="Cepat" data-toggle="tooltip"
                              data-placement="top" title="Cepat">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p6" id="p6" value="Sangat Cepat" data-toggle="tooltip"
                              data-placement="top" title="Sangat Cepat" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Pertayaan Kenyataan-->
                    <div class="row mt-4 pt-4">
                      <div class="form-group col-md-8" style="display: table; width: 100%; solid #ccc;">
                        <span style="display: table-cell; vertical-align: middle;"><b>Bagian III. Performansi Mitra DSO <span style="color:red">*</span></b></span>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="grid-container" style="text-align:center">
                          <div class="grid-item">Sangat Buruk</div>
                          <div class="grid-item">  Buruk</div>
                          <div class="grid-item">  Cukup Baik</div>
                          <div class="grid-item">  Baik</div>
                          <div class="grid-item">  Sangat Baik</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p7">1. Kesesuaian memenuhi permintaan dalam kondisi emergency ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p7" id="p7" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p7" id="p7" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p7" id="p7" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p7" id="p7" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p7" id="p7" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p8">2. Jasa MS/MO dapat digunakan dengan baik ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p8" id="p8" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p8" id="p8" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p8" id="p8" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p8" id="p8" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p8" id="p8" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p9">3. Kesesuaian antara permintaan dan yang diterima ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p9" id="p9" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p9" id="p9" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p9" id="p9" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p9" id="p9" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p9" id="p9" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p10">4. Inisiatif komunikasi dengan para stakeholder ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p10" id="p10" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p10" id="p10" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p10" id="p10" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p10" id="p10" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p10" id="p10" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p11">5. Mitra mampu melakukan koordinasi dengan pihak diluar Telkom ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p11" id="p11" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p11" id="p11" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p11" id="p11" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p11" id="p11" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p11" id="p11" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p12">6. Ketepatan waktu pemenuhan dokumen BAPP dan laporan terkait ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p12" id="p12" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p12" id="p12" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p12" id="p12" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p12" id="p12" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p12" id="p12" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p13">7. Kecepatan waktu sirkulir tanda tangan BAPP ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p13" id="p13" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p13" id="p13" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p13" id="p13" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p13" id="p13" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p13" id="p13" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p14">8. Kesesuaian dokumen BAPP dan laporan terkait sesuai standard ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p14" id="p14" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p14" id="p14" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p14" id="p14" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p14" id="p14" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p14" id="p14" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p15">9. Kerapihan pemenuhan dokumen ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p15" id="p15" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p15" id="p15" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p15" id="p15" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p15" id="p15" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p15" id="p15" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <label for="p16">10. Dalam pelaksanaan proyek, Mitra selalu taat kepada perjanjian kontrak yang ada. ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-4 ml-2">
                            <input class="form-check-input" type="radio" name="p16" id="p16" value="Sangat Buruk" data-toggle="tooltip"
                              data-placement="top" title="Sangat Buruk">
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" type="radio" name="p16" id="p16" value="Buruk" data-toggle="tooltip"
                              data-placement="top" title="Buruk">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p16" id="p16" value="Cukup Baik" data-toggle="tooltip"
                              data-placement="top" title="Cukup Baik">
                          </div>
                          <div class="col-3 ml-1">
                            <input class="form-check-input" type="radio" name="p16" id="p16" value="Baik" data-toggle="tooltip"
                              data-placement="top" title="Baik">
                          </div>
                          <div class="col-4">
                            <input class="form-check-input" type="radio" name="p16" id="p16" value="Sangat Baik" data-toggle="tooltip"
                              data-placement="top" title="Sangat Baik" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-8">
                        <span>  </span>
                        <label for="p17">11. Banyaknya revisi berulang ?</label>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-check form-check-inline">
                          <div class="col-2 ml-2">
                            <span>>3x</span></br>
                            <input class="form-check-input" type="radio" name="p17" id="p17" value=">3x" data-toggle="tooltip"
                              data-placement="top" title=">3x">
                          </div>
                          <div class="col-2">
                            <span>3x</span></br>
                            <input class="form-check-input" type="radio" name="p17" id="p17" value="3x" data-toggle="tooltip"
                              data-placement="top" title="3x">
                          </div>
                          <div class="col-2 ml-1">
                            <span>2x</span></br>
                            <input class="form-check-input" type="radio" name="p17" id="p17" value="2x" data-toggle="tooltip"
                              data-placement="top" title="2x">
                          </div>
                          <div class="col-2">
                            <span>1x</span></br>
                            <input class="form-check-input" type="radio" name="p17" id="p17" value="1x" data-toggle="tooltip"
                              data-placement="top" title="1x">
                          </div>
                          <div class="col-6">
                            <span>  Tidak Pernah</span></br>
                            <input class="form-check-input ml-5" type="radio" name="p17" id="p17" value="Tidak Ada Revisi" data-toggle="tooltip"
                              data-placement="top" title="Tidak Ada Revisi" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!--Saran-->
                    <div class="row mt-4 pt-4">
                      <div class="form-group col-md-12">
                        <label class="mb-1"><b>Saran untuk Perbaikan <i>(Optional)</i></b></label>
                        <span><i>Saran yang User sampaikan untuk perbaikan pelayanan Mitra DSO akan sangat Kami hargai.</i></span>
                        <textarea class="text-input" name="saran" rows="6" style="width: 100%;" placeholder="Ketik saranmu disini..."></textarea>
                      </div>
                    </div>
                    </br>
                </div>  
                <div class="alert alert-danger" id="nameExistsAlert" style="display: none;">
                 Bidang ini telah melakukan input sebelumnya.
                </div>
                    <div class="btn-container">
                        <button type="button" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" id="prevBtn" onclick="changeStep(-1)">Back</button>
                        <button type="button" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" id="nextBtn" onclick="changeStep(1)">Next</button>
                        <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" id="submitBtn" style="display: none;">Submit</button>
                    </div>
            </form>
              </div>
            </div>
          </div><!-- row end -->
        </div>
      </section>
      <!--grid-section end-->
    </div><!--site-main end-->
        
@include('/survey-mitra/footer')