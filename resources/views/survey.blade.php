@include('header')
<!-- page-title -->
  @if(session('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('success') }}</strong>
        </div>
 @endif
 @if(session('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">Ã—</button>
            <strong>{{ session('error') }}</strong>
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
     
  <section class="ttm-row pt-0 pb-10 clearfix">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
             <div class="intro-card">
               <div class="intro-header">
                 <h2 class="intro-title">SURVEI KEPUASAN PELANGGAN LAB. KALIBRASI TELKOM</h2>
               </div>
               <div class="intro-content">
                 <p class="intro-welcome">Selamat datang di Survey Kepuasan Pelanggan Jasa Kalibrasi Telkom.</p>
                 
                 <p class="intro-description">
                   Survey Kepuasan Pelanggan ini disediakan bagi para Pelanggan terbaik yang menggunakan Jasa Layanan
                   Kalibrasi Telkom sebagai media bagi Pelanggan dalam memberikan pandangan dan penilaian terhadap
                   layanan kami selama ini. Bagi Lab Kalibrasi Telkom, media ini menjadi alat pengukuran dan monitoring
                   atas Kepuasan Pelanggan terhadap pelayanan kami.
                 </p>
                 
                 <p class="intro-description">
                   Kami sangat berharap Para Pelanggan berpartisipasi dalam survey ini karena hasil yang baik dari
                   survey ini akan kembali kepada Pelanggan dalam bentuk peningkatan kualitas layanan Kalibrasi Telkom
                   secara berkesinambungan.
                 </p>
                 
                 <p class="intro-description">
                   Kuesioner berikut ini terdiri dari Penilaian dari Pelanggan tentang Tingkat Kepentingan/Importance
                   (harapan) dan Tingkat Kinerja/Performance (kenyataan) terhadap pelayanan Kalibrasi Telkom.
                 </p>
                 
                 <p class="intro-description">
                   Demikian para Pelanggan terbaik kami, atas kesediaan dan ketulusannya untuk berpartisipasi dalam
                   pengisian Kuesioner ini, kami ucapkan banyak terima kasih.
                 </p>
                 
                 <div class="intro-signature">
                   <p><strong>Salam hangat dari kami,</strong><br>
                   Manajemen Puncak Laboratorium Kalibrasi Telkom</p>
                   
                   <p class="signature-name">AGUNG WAHONO<br>
                   <strong>SM DC, DEFA Technical Operation Support - TIF</strong></p>
                   
                   <p class="intro-privacy"><em>Semua yang Anda isikan akan dirahasiakan kepada pihak manapun. Selamat mengisi!</em></p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
     
     <section class="ttm-row pt-2 pb-90 clearfix">
          <div class="container">
         <div class="row">
           <div class="col-lg-12">
           <!-- Step Progress Header -->
          <div class="survey-header">
            <div class="step-indicators">
              <div class="step-indicator active" data-step="1">
                <div class="step-circle">
                  <span class="step-number">1</span>
                </div>
                <span class="step-label">Informasi Responden</span>
              </div>
              <div class="step-indicator" data-step="2">
                <div class="step-circle">
                  <span class="step-number">2</span>
                </div>
                <span class="step-label">Survey Harapan</span>
              </div>
              <div class="step-indicator" data-step="3">
                <div class="step-circle">
                  <span class="step-number">3</span>
                </div>
                <span class="step-label">Survey Kenyataan</span>
              </div>
            </div>
          </div>

          <div class="form-container">
          <form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix" method="post" action="/css-input">
               {{csrf_field()}}
               
               <!-- Step 1: Informasi Responden -->
               <div class="form-step active mt-3" id="step1">
                 <!--<div class="step-header">-->
                 <!--  <h5 class="step-title-main">📋 Step 1: Informasi Responden</h5>-->
                 <!--  <p class="step-description">Silahkan lengkapi informasi responden dibawah ini</p>-->
                 <!--</div>-->
                   <div class="row">
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="nama">Nama Responden</label>
                       <select class="text-input respondent-select" id="nama" name="nama">
                           <option value="">Pilih Nama</option>
                           @foreach($usercss as $respondent)
                               <option value="{{ $respondent->nama }}"
                               data-user-id="{{ $respondent->id }}"
                               data-email="{{ $respondent->email }}"
                               data-hp="{{ $respondent->hp }}"
                               data-perusahaan="{{ $respondent->perusahaan }}"
                               data-bidang="{{ $respondent->bidang }}"
                               data-treg="{{ $respondent->treg }}"
                               data-status="{{ $respondent->status }}"
                               data-lab="{{ $respondent->lab }}"
                               >{{ $respondent->nama }}</option>
                           @endforeach
                       </select>
                       <input type="hidden" name="user_css_id" id="user_css_id" value="">
                       <p class="form-instruction">Silahkan pilih nama, jika tidak ada silahkan input manual</p>
                     </div>
                     
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="hp">No. HP (Link Aja)</label>
                       <input class="text-input" id="hp" name="hp" type="text" value="" placeholder="Nomor handpone"
                         required>
                         <p class="form-instruction">Silahkan masukkan No. HP yang terhubung ke App LINK AJA!</p>
                     </div>
                   </div>
                   <div class="row">
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="email">Email</label>
                       <input class="text-input" name="email" type="text" value="" id="email" placeholder="Email" required>
                       <input class="text-input" name="status" type="text" id="status" value="" hidden>
                       <input class="text-input" name="treg" type="text" id="treg" value="" hidden>
                     </div>
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="perusahaan">Nama Perusahaan</label>
                       <input class="text-input" id="perusahaan" name="perusahaan" type="text" value="" placeholder="Nama Perusahaan"
                         required>
                     </div>
                   </div>
                   <div class="row">
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="bidang">Bidang</label>
                       <input class="text-input" name="bidang" type="text" value="" id="bidang" placeholder="Bidang Perusahaan" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label class="mb-1" for="lab" style="color:red"><i>Dilayani oleh Laboratorium Kalibrasi</i></label>
                       <select id="lab" class="text-input" name="lab" required>
                         <option value="" disabled selected>Pilih Laboratorium......</b></option>
                         <option value="Lab Medan">Lab. Kalibrasi Telkom Medan</option>
                         <option value="Lab Jakarta">Lab. Kalibrasi Telkom Jakarta</option>
                         <option value="Lab Surabaya">Lab. Kalibrasi Telkom Surabaya</option>
                         <option value="Lab Makassar">Lab. Kalibrasi Telkom Makassar</option>
                       </select>
                     </div>
                   </div>
               </div>
               
               <!-- Step 2: Tingkat Harapan -->
               <div class="form-step" id="step2">
                 <!--<div class="step-header">-->
                 <!--  <h3 class="step-title-main">⭐ Step 2: Tingkat Kepentingan (Harapan)</h3>-->
                 <!--  <p class="step-description">Berikan penilaian tingkat kepentingan setiap aspek pelayanan sesuai harapan Anda</p>-->
                 <!--</div>-->
                 
                 <div class="table-responsive">
                   <table class="survey-table">
                     <thead>
                       <tr>
                         <th class="question-column">Harapan Anda Terkait Pelayanan Kami.</th>
                         <th class="rating-column">
                           <div class="rating-labels">
                             <span class="rating-label"><br>Tidak<br>Penting</span>
                             <span class="rating-label"><br>Kurang<br>Penting</span>
                             <span class="rating-label"><br>Cukup<br>Penting</span>
                             <span class="rating-label"><br>Penting</span>
                             <span class="rating-label"><br>Sangat<br>Penting</span>
                           </div>
                         </th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td class="question-text">1. Peralatan dan infrastruktur Laboratorium Kalibrasi memadai</td>
                         <td class="rating-cell">
                           <div class="emoji-rating" data-name="h1" data-value="">
                             <span class="emoji-option" data-value="1">😞</span>
                             <span class="emoji-option" data-value="2">😕</span>
                             <span class="emoji-option" data-value="3">😐</span>
                             <span class="emoji-option" data-value="4">😊</span>
                             <span class="emoji-option" data-value="5">😍</span>
                           </div>
                           <input type="hidden" id="ph1" name="h1" value="">
                         </td>
                       </tr>
                       <tr>
                         <td class="question-text">2. Memiliki sistem informasi yang memadai dan mudah diakses</td>
                         <td class="rating-cell">
                           <div class="emoji-rating" data-name="h2" data-value="">
                             <span class="emoji-option" data-value="1">😞</span>
                             <span class="emoji-option" data-value="2">😕</span>
                             <span class="emoji-option" data-value="3">😐</span>
                             <span class="emoji-option" data-value="4">😊</span>
                             <span class="emoji-option" data-value="5">😍</span>
                           </div>
                           <input type="hidden" id="ph2" name="h2" value="">
                         </td>
                       </tr>
                       <tr>
                         <td class="question-text">3. Personel Kalibrasi berpenampilan rapi dan menarik</td>
                         <td class="rating-cell">
                           <div class="emoji-rating" data-name="h3" data-value="">
                             <span class="emoji-option" data-value="1">😞</span>
                             <span class="emoji-option" data-value="2">😕</span>
                             <span class="emoji-option" data-value="3">😐</span>
                             <span class="emoji-option" data-value="4">😊</span>
                             <span class="emoji-option" data-value="5">😍</span>
                           </div>
                           <input type="hidden" id="ph3" name="h3" value="">
                         </td>
                       </tr>
                       <tr>
                         <td class="question-text">4. Ruangan Customer Service representatif dan nyaman</td>
                         <td class="rating-cell">
                           <div class="emoji-rating" data-name="h4" data-value="">
                             <span class="emoji-option" data-value="1">😞</span>
                             <span class="emoji-option" data-value="2">😕</span>
                             <span class="emoji-option" data-value="3">😐</span>
                             <span class="emoji-option" data-value="4">😊</span>
                             <span class="emoji-option" data-value="5">😍</span>
                           </div>
                           <input type="hidden" id="ph4" name="h4" value="">
                         </td>
                       </tr>
                       <tr>
                         <td class="question-text">5. Personel bersikap ramah dan sopan kepada Pelanggan</td>
                         <td class="rating-cell">
                           <div class="emoji-rating" data-name="h5" data-value="">
                             <span class="emoji-option" data-value="1">😞</span>
                             <span class="emoji-option" data-value="2">😕</span>
                             <span class="emoji-option" data-value="3">😐</span>
                             <span class="emoji-option" data-value="4">😊</span>
                             <span class="emoji-option" data-value="5">😍</span>
                           </div>
                           <input type="hidden" id="ph5" name="h5" value="">
                         </td>
                       </tr>
                      <tr>
                        <td class="question-text">6. Personel Lab Kalibrasi peduli terhadap permintaan atau kebutuhan Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h6" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph6" name="h6" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">7. Personel Kalibrasi peduli terhadap keluhan (complain) Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h7" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph7" name="h7" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">8. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h8" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph8" name="h8" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">9. Informasi yang disampaikan oleh Personel Kalibrasi mudah dipahami.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h9" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph9" name="h9" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">10. Personel Kalibrasi mudah dihubungi</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h10" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph10" name="h10" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">11. Personel Kalibrasi cepat tanggap dalam menerima permintaan Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h11" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph11" name="h11" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">12. Personel Kalibrasi cepat tanggap dalam menyelesaikan permintaan Pelanggan</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h12" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph12" name="h12" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">13. Personel Kalibrasi cepat tanggap dalam menangani keluhan (complain) Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h13" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph13" name="h13" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">14. Lab Kalibrasi memberikan layanan yang sesuai dengan standar mutu ISO-17025</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h14" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph14" name="h14" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">15. Lab Kalibrasi memberikan layanan yang tepat sesuai dengan spesifikasi yang diminta oleh Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h15" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph15" name="h15" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">16. Lab Kalibrasi memberikan layanan dengan mekanisme sesuai kontrak/PO.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h16" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph16" name="h16" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">17. Lab Kalibrasi memberikan layanan sesuai dengan jumlah yang diminta Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h17" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph17" name="h17" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">18. Lab Kalibrasi memberikan layanan yang dapat dipertanggungjawabkan secara legal.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h18" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph18" name="h18" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">19. Lab Kalibrasi dapat memberikan kepastian.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h19" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph19" name="h19" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">20. Personel Kalibrasi mempunyai kompetensi yang memadai.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="h20" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="ph20" name="h20" value="">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <!-- Step 3: Tingkat Kenyataan -->
              <div class="form-step" id="step3">
                <!--<div class="step-header">-->
                <!--  <h3 class="step-title-main">🔍 Step 3: Tingkat Kinerja (Kenyataan)</h3>-->
                <!--  <p class="step-description">Berikan penilaian tingkat kinerja setiap aspek pelayanan sesuai kenyataan yang Anda alami</p>-->
                <!--</div>-->
                
                <div class="table-responsive">
                  <table class="survey-table">
                    <thead>
                      <tr>
                        <th class="question-column">Persepsi/Keyataan Layanan kami.</th>
                        <th class="rating-column">
                          <div class="rating-labels">
                            <span class="rating-label"><br>Sangat<br>Buruk</span>
                            <span class="rating-label"><br>Buruk</span>
                            <span class="rating-label"><br>Cukup</span>
                            <span class="rating-label"><br>Baik</span>
                            <span class="rating-label"><br>Sangat<br>Baik</span>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="question-text">1. Peralatan dan infrastruktur Laboratorium Kalibrasi memadai.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k1" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk1" name="k1" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">2. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k2" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk2" name="k2" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">3. Personel Kalibrasi berpenampilan rapi dan menarik.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k3" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk3" name="k3" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">4. Ruangan Customer Service representatif dan nyaman.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k4" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk4" name="k4" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">5. Personel bersikap ramah dan sopan kepada Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k5" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk5" name="k5" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">6. Personel Lab Kalibrasi peduli terhadap permintaan atau kebutuhan Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k6" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk6" name="k6" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">7. Personel Kalibrasi peduli terhadap keluhan (complain) Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k7" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk7" name="k7" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">8. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k8" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk8" name="k8" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">9. Informasi yang disampaikan oleh Personel Kalibrasi mudah dipahami.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k9" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk9" name="k9" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">10. Personel Kalibrasi mudah dihubungi</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k10" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk10" name="k10" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">11. Personel Kalibrasi cepat tanggap dalam menerima permintaan Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k11" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk11" name="k11" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">12. Personel Kalibrasi cepat tanggap dalam menyelesaikan permintaan Pelanggan</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k12" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk12" name="k12" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">13. Personel Kalibrasi cepat tanggap dalam menangani keluhan (complain) Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k13" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk13" name="k13" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">14. Lab Kalibrasi memberikan layanan yang sesuai dengan standar mutu ISO-17025</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k14" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk14" name="k14" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">15. Lab Kalibrasi memberikan layanan yang tepat sesuai dengan spesifikasi yang diminta oleh Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k15" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk15" name="k15" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">16. Lab Kalibrasi memberikan layanan dengan mekanisme sesuai kontrak/PO.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k16" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk16" name="k16" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">17. Lab Kalibrasi memberikan layanan sesuai dengan jumlah yang diminta Pelanggan.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k17" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk17" name="k17" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">18. Lab Kalibrasi memberikan layanan yang dapat dipertanggungjawabkan secara legal.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k18" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk18" name="k18" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">19. Lab Kalibrasi dapat memberikan kepastian.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k19" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk19" name="k19" value="">
                        </td>
                      </tr>
                      <tr>
                        <td class="question-text">20. Personel Kalibrasi mempunyai kompetensi yang memadai.</td>
                        <td class="rating-cell">
                          <div class="emoji-rating" data-name="k20" data-value="">
                            <span class="emoji-option" data-value="1">😞</span>
                            <span class="emoji-option" data-value="2">😕</span>
                            <span class="emoji-option" data-value="3">😐</span>
                            <span class="emoji-option" data-value="4">😊</span>
                            <span class="emoji-option" data-value="5">😍</span>
                          </div>
                          <input type="hidden" id="pk20" name="k20" value="">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
                <!-- Saran Section -->
                <div class="row mt-4 pt-4">
                  <div class="form-group col-md-12">
                    <label class="mb-1"><b>Saran untuk Perbaikan <i>(Optional)</i></b></label>
                    <span><i>Saran yang Pelanggan sampaikan untuk perbaikan pelayanan Laboratorium Kalibrasi Telkom akan sangat Kami hargai.</i></span>
                    <textarea class="text-input" name="saran" rows="6" style="width: 100%;" placeholder="Ketik saranmu disini..."></textarea>
                  </div>
                </div>
                   
                   
                   
                   </br>
               </div>  
               <div class="alert alert-danger" id="nameExistsAlert" style="display: none;">
                Nama ini telah melakukan input sebelumnya.
               </div>
                   <div class="btn-container">
                       <button type="button" class="btn btn-secondary" id="prevBtn" onclick="changeStep(-1)" style="display: none;">
                        👈 Sebelumnya
                       </button>
                       <button type="button" class="btn btn-primary" id="nextBtn" onclick="changeStep(1)">
                        👉 Selanjutnya
                       </button>
                       <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">
                        🚀 Kirim Survey
                       </button>
                   </div>
           </form>
          </div>
             </div>
           </div>
         </div>
       </div>
     </section>

      <!--{{-- Sudah selesai --}}-->
      <!--<section class="ttm-row pt-0 pb-50 clearfix">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-lg-12">-->
      <!--        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white z-index-2 spacing-5 box-shadow">-->
      <!--          <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>-->
                <!-- section title -->
      <!--          <div class="section-title with-desc clearfix">-->
      <!--            <div class="title-header">-->
      <!--              <h2 class="title" style="text-align: center">TERIMA KASIH,</br> SURVEY TELAH DITUTUP!!!!</h2>-->
      <!--            </div>-->
      <!--          </div><!-- section title end -->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div><!-- row end -->
      <!--  </div>-->
      <!--</section>-->
      <!--grid-section end-->
    </div><!--site-main end-->
        
<style>
/* Intro Card */
.intro-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    overflow: hidden;
}

.intro-header {
    background: linear-gradient(135deg, #E53E3E 0%, #C53030 100%);
    color: white;
    text-align: center;
    /*padding: 25px 20px;*/
}

.intro-title {
    font-size: 20px;
    font-weight: 600;
    margin: 0;
    color: white;
    text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

.intro-content {
    padding: 30px;
    color: #4a5568;
    line-height: 1.7;
}

.intro-welcome {
    font-size: 18px;
    font-weight: 600;
    color: #E53E3E;
    margin-bottom: 20px;
    text-align: center;
}

.intro-description {
    font-size: 15px;
    margin-bottom: 18px;
    text-align: justify;
}

.intro-signature {
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
}

.intro-signature p {
    margin-bottom: 12px;
}

.signature-name {
    color: #E53E3E;
    font-weight: 600;
}

.intro-privacy {
    color: #E53E3E;
    font-style: italic;
    font-size: 14px;
    text-align: center;
    margin-top: 15px;
    padding: 15px;
    background: #fef2f2;
    border-left: 4px solid #E53E3E;
    border-radius: 0 8px 8px 0;
}

/* Survey Header */
.survey-header {
    background: linear-gradient(135deg, #E53E3E 0%, #C53030 100%) !important;
    color: white !important;
    text-align: center;
    padding: 10px 3px !important;
    margin: 0 !important;
    border-radius: 12px 12px 0 0;
    box-shadow: none;
}

.survey-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    color: white;
}

.step-indicators {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 120px;
    position: relative;
}

/* Connecting line from step 1 to step 2 */
.step-indicator:first-child::after {
    content: '';
    position: absolute;
    top: 40%;
    left: calc(80% + 2px);
    width: 150px;
    height: 2px;
    background: rgba(255,255,255,0.3);
    transform: translateY(-50%);
    z-index: 1;
    transition: background-color 0.3s ease;
}

/* Connecting line from step 2 to step 3 */
.step-indicator:nth-child(2)::after {
    content: '';
    position: absolute;
    top: 40%;
    left: calc(85% + 2px);
    width: 150px;
    height: 2px;
    background: rgba(255,255,255,0.3);
    transform: translateY(-50%);
    z-index: 1;
    transition: background-color 0.3s ease;
}

/* Active line when step is completed */
.step-indicator.completed::after {
    background: rgba(255,255,255,0.8) !important;
}

.step-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.3s ease;
    position: relative;
    z-index: 3;
}

.step-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1px;
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.3);
}

.step-indicator.active .step-circle {
    background: white;
    color: #E53E3E;
    border-color: white;
    box-shadow: none;
}

.step-indicator.active .step-number {
    color: #E53E3E !important;
    font-weight: 700;
}

.step-indicator.completed .step-circle {
    background: #10b981 !important;
    color: white !important;
    border-color: #10b981 !important;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3) !important;
}

.step-indicator.completed .step-label {
    color: white !important;
    font-weight: 700 !important;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.step-circle i,
.step-number {
    font-size: 18px;
    font-weight: 700;
}

.step-indicator.completed .step-circle .step-number {
    display: none;
}

.step-indicator.completed .step-circle::after {
    content: "✓";
    font-size: 20px;
    font-weight: 700;
}

.step-label {
    font-size: 10px;
    font-weight: 400;
    color: rgba(255,255,255,0.7);
    text-align: center;
}

.step-indicator.active .step-label {
    color: white;
    font-weight: 700;
    
}

/* Step Headers */
.step-header {
    margin-bottom: 25px;
    padding: 7px;
    background: #f8f9fa;
    border-left: 5px solid #E53E3E;
    border-radius: 0 10px 10px 0;
}

.step-title-main {
    color: #E53E3E;
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 1px;
    display: flex;
    align-items: center;
    /*gap: 10px;*/
}

.step-description {
    color: #6c757d;
    font-size: 12px;
    margin-bottom: 0;
    font-style: italic;
}

/* Form Container */
.form-container {
    background: white !important;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    overflow: hidden;
    margin: 0 !important;
    position: relative;
    z-index: 10;
}

.ttm-col-bgcolor-yes.ttm-bg.ttm-bgcolor-white {
    background: transparent !important;
    box-shadow: none !important;
    padding: 0 !important;
}

/* Form Steps */
.form-step {
    display: none;
    animation: fadeIn 0.5s ease;
    padding: 9px;
}

.form-step.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Form Fields */
.form-step .form-group {
    margin-bottom: 25px !important;
}

.form-step .form-group label {
    font-weight: 600 !important;
    color: #4a5568 !important;
    margin-bottom: 8px !important;
    display: block !important;
    font-size: 14px !important;
}

.form-step .text-input,
.form-step input[type="text"],
.form-step select,
.form-step textarea {
    width: 100% !important;
    padding: 12px 16px !important;
    border: 2px solid #e2e8f0 !important;
    border-radius: 10px !important;
    font-size: 16px !important;
    line-height: 1.5 !important;
    transition: all 0.3s ease !important;
    background: #fff !important;
    box-sizing: border-box !important;
    min-height: 50px !important;
    max-height: none !important;
    height: auto !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
    font-family: inherit !important;
}

.form-step .text-input:focus,
.form-step input[type="text"]:focus,
.form-step select:focus,
.form-step textarea:focus {
    border-color: #E53E3E !important;
    box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1) !important;
    outline: none !important;
}

.form-step .text-input::placeholder,
.form-step input[type="text"]::placeholder {
    color: #a0aec0 !important;
}

.form-step .select2-container {
    width: 100% !important;
    display: block !important;
}

.form-step .select2-container .select2-selection--single {
    min-height: 50px !important;
    border: 2px solid #e2e8f0 !important;
    border-radius: 10px !important;
    background: #fff !important;
    display: flex !important;
    align-items: center !important;
}

.form-step .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #2d3748 !important;
    line-height: 48px !important;
    padding-left: 16px !important;
    padding-right: 36px !important;
    font-size: 16px !important;
}

.form-step .select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #a0aec0 !important;
}

.form-step .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 48px !important;
    right: 10px !important;
}

.form-step .select2-container--default.select2-container--focus .select2-selection--single,
.form-step .select2-container--default.select2-container--open .select2-selection--single {
    border-color: #E53E3E !important;
    box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1) !important;
}

.select2-dropdown {
    border: 2px solid #e2e8f0 !important;
    border-radius: 10px !important;
    overflow: hidden !important;
}

.select2-search--dropdown .select2-search__field {
    border: 1px solid #cbd5e0 !important;
    border-radius: 8px !important;
    padding: 8px 10px !important;
    outline: none !important;
}

/* Form Instructions */
.form-instruction {
    font-size: 12px !important;
    color: #E53E3E !important;
    font-style: italic !important;
    margin-top: 5px !important;
}

/* Survey Table */
.table-responsive {
    margin: 20px 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.survey-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: white;
    /*line-height: 8px;*/
    /*font-size: 14px;*/
}

.survey-table thead th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px 15px;
    font-weight: 600;
    border: none;
    position: sticky;
    top: 0;
    z-index: 10;
}

.question-column {
    width: 70%;
    text-align: left;
}

.rating-column {
    width: 30%;
    text-align: center;
}

.rating-labels {
    display: flex;
    justify-content: space-around;
    align-items: center;
    gap: 10px;
}

.rating-label {
    font-size: 12px;
    font-weight: 500;
    text-align: center;
    line-height: 1.2;
}

.survey-table tbody tr {
    transition: all 0.3s ease;
}

.survey-table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.survey-table tbody tr:hover {
    background: #e3f2fd;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.question-text {
    padding: 20px 15px;
    font-weight: 500;
    color: #343a40;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}

.rating-cell {
    padding: 15px 10px;
    text-align: center;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}

/* Emoji Rating */
.emoji-rating {
    display: flex;
    gap: 17px;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
}

.emoji-option {
    font-size: 2em;
    cursor: pointer;
    transition: all 0.2s ease;
    filter: grayscale(100%);
    opacity: 0.4;
    transform: scale(1);
    padding: 0;
    border-radius: 0;
    background: transparent !important;
    box-shadow: none !important;
}

.emoji-option:hover {
    transform: scale(1.2);
    filter: grayscale(0%);
    opacity: 1;
    background: transparent !important;
}

.emoji-option.selected {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.1);
    background: transparent !important;
    box-shadow: none !important;
}

.emoji-option.active-hover {
    filter: grayscale(0%);
    opacity: 1;
    background: transparent !important;
}

/* Navigation Buttons */
.btn-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    /*margin-top: 50px;*/
    padding: 10px;
    background: #f9fafb;
    border-radius: 0 0 12px 12px;
    /*margin-left: -30px;*/
    /*margin-right: -30px;*/
    /*margin-bottom: -30px;*/
    border-top: 1px solid #e2e8f0;
}

.btn-container:has(#prevBtn[style*="none"]) {
    justify-content: flex-end;
}

.btn-container:has(#nextBtn[style*="none"]) {
    justify-content: space-between;
}

.btn {
    padding: 12px 30px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 110px;
}

.btn-primary {
    background: #E53E3E;
    color: white;
    box-shadow: 0 2px 8px rgba(229, 62, 62, 0.2);
}

.btn-primary:hover {
    background: #C53030;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
}

.btn-secondary {
    background: #f1f5f9;
    color: #64748b;
    border: 1px solid #e2e8f0;
}

.btn-secondary:hover {
    background: #e2e8f0;
    color: #475569;
    transform: translateY(-1px);
}

.btn-success {
    background: #10b981;
    color: white;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
}

.btn-success:hover {
    background: #059669;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .intro-card {
        margin: 0 10px 25px 10px;
    }
    
    .intro-header {
        padding: 20px 15px;
    }
    
    .intro-title {
        font-size: 22px;
    }
    
    .intro-content {
        padding: 20px;
    }
    
    .intro-welcome {
        font-size: 16px;
    }
    
    .intro-description {
        font-size: 14px;
        text-align: left;
    }
    
    .intro-privacy {
        font-size: 13px;
        padding: 12px;
    }
    
    .survey-header {
        padding: 10px 3px;
    }
    
    .survey-title {
        font-size: 20px;
        margin-bottom: 20px;
    }
    
    .step-indicators {
        gap: 80px;
    }
    
    .step-indicator:first-child::after,
    .step-indicator:nth-child(2)::after {
        width: 70px;
    }
    
    .step-circle {
        width: 45px;
        height: 45px;
    }
    
    .step-circle i {
        font-size: 16px;
    }
    
    .step-label {
        font-size: 11px;
    }
    
    .form-step {
        padding: 20px;
    }
    
    .step-header {
        padding: 2px;
        margin-bottom: 2px;
    }
    
    .step-title-main {
        font-size: 18px;
    }
    
    .step-description {
        font-size: 14px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    /* Mobile Table Layout - Stack Questions */
    .survey-table {
        display: block !important;
    }
    
    .survey-table thead {
        display: none;
    }
    
    .survey-table tbody {
        display: block !important;
    }
    
    .survey-table tbody tr {
        display: block !important;
        margin-bottom: 25px;
        background: #f9fafb !important;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .survey-table tbody tr:hover {
        transform: none;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .question-text {
        display: block !important;
        padding: 0 0 15px 0 !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        border-bottom: 1px solid #e5e7eb !important;
        margin-bottom: 15px;
    }
    
    .rating-cell {
        display: block !important;
        padding: 0 !important;
        text-align: center !important;
        border-bottom: none !important;
    }
    
    .emoji-option {
        font-size: 2.2em !important;
    }
    
    .btn-container {
        flex-direction: row;
        gap: 15px;
        padding: 25px 20px;
        margin-top: 40px;
        margin-left: -20px;
        margin-right: -20px;
        margin-bottom: -20px;
    }
    
    .btn {
        flex: 1;
        justify-content: center;
    }
    
}

/* Custom Alert Styling */
.custom-alert {
    margin: 0 0 20px 0;
    padding: 15px 20px;
    border-radius: 8px;
    animation: slideDown 0.3s ease;
    position: relative;
    z-index: 1000;
}

.custom-alert-error {
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #dc2626;
}

.custom-alert-success {
    background: #d1fae5;
    border: 1px solid #a7f3d0;
    color: #059669;
}

.custom-alert-info {
    background: #dbeafe;
    border: 1px solid #93c5fd;
    color: #2563eb;
}

.alert-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.alert-message {
    flex: 1;
    font-size: 14px;
    font-weight: 500;
}

.alert-close {
    background: none;
    border: none;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    color: inherit;
    padding: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.alert-close:hover {
    background: rgba(0,0,0,0.1);
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Additional Overrides for Better Styling */
.ttm-col-wrapper-bg-layer {
    display: none !important;
}

.spacing-5 {
    padding: 0 !important;
}

.form-step .row {
    margin: 0 !important;
}

.form-step .col-md-6 {
    padding: 0 15px !important;
}

/* Reset existing styles that might interfere */
.wrap-form {
    background: none !important;
    padding: 0 !important;
    box-shadow: none !important;
}

/* Ensure proper container styling */
.ttm-row .container .row .col-lg-12 {
    /*padding: 20px;*/
}

/* Fix step header styling */
.step-header {
    margin: 0 0 25px 0 !important;
    padding: 7px !important;
    background: #f8f9fa !important;
    border-left: 5px solid #E53E3E !important;
    border-radius: 0 10px 10px 0 !important;
}

/* Ensure survey header visibility */
.survey-header * {
    /*color: white !important;*/
}

.step-indicators .step-indicator {
    color: white !important;
}

.step-indicators .step-indicator.active .step-circle {
    background: white !important;
    color: #E53E3E !important;
    border-color: white !important;
}

/* Form field improvements */
.form-step select option {
    background: white !important;
    color: #333 !important;
    padding: 8px !important;
}

/* Button styling improvements */
.btn-container .btn {
    border: none !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
}

@media (max-width: 576px) {
    .survey-table {
        font-size: 12px;
    }
    
    .question-column {
        width: 55%;
    }
    
    .rating-column {
        width: 45%;
    }
    
    .emoji-option {
        font-size: 1.5em;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize emoji rating functionality
    const emojiRatings = document.querySelectorAll('.emoji-rating');
    
    emojiRatings.forEach(function(rating) {
        const options = rating.querySelectorAll('.emoji-option');
        const hiddenInput = rating.parentElement.querySelector('input[type="hidden"]');
        const currentValue = parseInt(rating.dataset.value);
        
        // Set initial state
        updateRatingDisplay(rating, currentValue);
        
        options.forEach(function(option, index) {
            option.addEventListener('click', function() {
                const value = parseInt(this.dataset.value);
                hiddenInput.value = value;
                rating.dataset.value = value;
                updateRatingDisplay(rating, value);
                
                // Debug logging
                console.log(`Rating updated: ${rating.dataset.name} = ${value}`);
            });
            
            option.addEventListener('mouseenter', function() {
                const hoverValue = parseInt(this.dataset.value);
                updateHoverState(rating, hoverValue);
            });
        });
        
        rating.addEventListener('mouseleave', function() {
            const currentValue = parseInt(this.dataset.value);
            updateRatingDisplay(rating, currentValue);
        });
    });
    
    function updateRatingDisplay(rating, value) {
        const options = rating.querySelectorAll('.emoji-option');
        options.forEach(function(option) {
            const optionValue = parseInt(option.dataset.value);
            option.classList.remove('selected', 'active-hover');
            if (optionValue <= value) {
                option.classList.add('selected');
            }
        });
    }
    
    function updateHoverState(rating, hoverValue) {
        const options = rating.querySelectorAll('.emoji-option');
        options.forEach(function(option) {
            const optionValue = parseInt(option.dataset.value);
            option.classList.remove('active-hover');
            if (optionValue <= hoverValue) {
                option.classList.add('active-hover');
            }
        });
    }
});

// Step navigation functionality
let currentStep = 1;
const totalSteps = 3;

function changeStep(direction) {
    const currentStepElement = document.getElementById(`step${currentStep}`);
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    // Validate current step before moving forward
    if (direction === 1 && !validateCurrentStep()) {
        return;
    }
    
    // Update step number
    currentStep += direction;
    
    // Ensure step is within bounds
    if (currentStep < 1) currentStep = 1;
    if (currentStep > totalSteps) currentStep = totalSteps;
    
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(step => {
        step.classList.remove('active');
    });
    
    // Show current step
    document.getElementById(`step${currentStep}`).classList.add('active');
    
    // Update progress bar
    updateProgressBar();
    
    // Update button visibility
    updateButtonVisibility();
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateProgressBar() {
    // Update step indicators
    document.querySelectorAll('.step-indicator').forEach((step, index) => {
        const stepNumber = index + 1;
        step.classList.remove('active', 'completed');
        
        if (stepNumber === currentStep) {
            step.classList.add('active');
        } else if (stepNumber < currentStep) {
            step.classList.add('completed');
        }
    });
    
    // Lines will be styled automatically based on completed class
}

function updateButtonVisibility() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    // Force hide all buttons first with important
    prevBtn.style.setProperty('display', 'none', 'important');
    nextBtn.style.setProperty('display', 'none', 'important');
    submitBtn.style.setProperty('display', 'none', 'important');
    
    // Show appropriate buttons based on current step
    if (currentStep === 1) {
        // Step 1: Only show Next button
        nextBtn.style.setProperty('display', 'inline-flex', 'important');
    } else if (currentStep === totalSteps) {
        // Final step: Show Back + Submit
        prevBtn.style.setProperty('display', 'inline-flex', 'important');
        submitBtn.style.setProperty('display', 'inline-flex', 'important');
    } else {
        // Middle steps: Show Back + Next
        prevBtn.style.setProperty('display', 'inline-flex', 'important');
        nextBtn.style.setProperty('display', 'inline-flex', 'important');
    }
}

function isRespondentAlreadyFilled() {
    const nama = document.getElementById('nama') ? document.getElementById('nama').value : '';
    const hp = document.getElementById('hp') ? document.getElementById('hp').value : '';
    const userCssId = document.getElementById('user_css_id') ? document.getElementById('user_css_id').value : '';
    let duplicateResult = { duplicate: false, nama: null };
    const params = new URLSearchParams({
        nama: nama,
        hp: hp,
        user_css_id: userCssId
    });

    const request = new XMLHttpRequest();
    request.open('GET', "{{ route('form.checkName') }}?" + params.toString(), false);
    request.setRequestHeader('Accept', 'application/json');

    try {
        request.send(null);

        if (request.status >= 200 && request.status < 300) {
            duplicateResult = JSON.parse(request.responseText);
        }
    } catch (error) {
        console.warn('Validasi responden gagal dijalankan.', error);
    }

    return duplicateResult;
}

function validateCurrentStep() {
    if (currentStep === 1) {
        // Validate step 1 (Informasi Responden)
        const requiredFields = ['nama', 'hp', 'email', 'perusahaan', 'bidang', 'lab'];
        
        for (let fieldName of requiredFields) {
            const field = document.getElementsByName(fieldName)[0];
            if (!field || !field.value.trim()) {
                showAlert(`⚠️ Field "${getFieldLabel(fieldName)}" wajib diisi!`, 'error');
                field && field.focus();
                return false;
            }
        }

        const duplicateCheck = isRespondentAlreadyFilled();
        if (duplicateCheck.duplicate) {
            const respondentName = duplicateCheck.nama || document.getElementById('nama').value;
            showAlert(`Responden "${respondentName}" sudah pernah mengisi survey tahun ini.`, 'error');
            const namaField = document.getElementById('nama');
            if (namaField) {
                namaField.focus();
            }
            return false;
        }
    } else if (currentStep === 2) {
        // Validate step 2 (Harapan) - check all h1-h20 fields
        const missingFields = [];
        for (let i = 1; i <= 20; i++) {
            const field = document.getElementsByName(`h${i}`)[0];
            if (!field || !field.value.trim()) {
                missingFields.push(`Pertanyaan ${i}`);
            }
        }
        
        if (missingFields.length > 0) {
            showAlert(`⚠️ Mohon berikan penilaian pada: ${missingFields.join(', ')}`, 'error');
            return false;
        }
    } else if (currentStep === 3) {
        // Validate step 3 (Kenyataan) - check all k1-k20 fields
        const missingFields = [];
        for (let i = 1; i <= 20; i++) {
            const field = document.getElementsByName(`k${i}`)[0];
            if (!field || !field.value.trim()) {
                missingFields.push(`Pertanyaan ${i}`);
            }
        }
        
        if (missingFields.length > 0) {
            showAlert(`⚠️ Mohon berikan penilaian pada: ${missingFields.join(', ')}`, 'error');
            return false;
        }
    }
    
    return true;
}

function getFieldLabel(fieldName) {
    const labels = {
        'nama': 'Nama Responden',
        'hp': 'No. HP',
        'email': 'Email',
        'perusahaan': 'Nama Perusahaan',
        'bidang': 'Bidang',
        'lab': 'Laboratorium Kalibrasi'
    };
    return labels[fieldName] || fieldName;
}

function showAlert(message, type = 'info') {
    console.log('showAlert called with:', message, type);
    
    // Remove existing custom alerts
    const existingAlerts = document.querySelectorAll('.custom-alert');
    existingAlerts.forEach(alert => alert.remove());
    
    // Create custom alert
    const customAlert = document.createElement('div');
    customAlert.className = `custom-alert custom-alert-${type}`;
    customAlert.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        max-width: 400px;
        margin: 0;
        padding: 15px 20px;
        border-radius: 8px;
        z-index: 9999;
        font-family: Arial, sans-serif;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        ${type === 'error' ? 'background: #fee2e2; border: 1px solid #fecaca; color: #dc2626;' : ''}
        ${type === 'success' ? 'background: #d1fae5; border: 1px solid #a7f3d0; color: #059669;' : ''}
        ${type === 'info' ? 'background: #dbeafe; border: 1px solid #93c5fd; color: #2563eb;' : ''}
    `;
    
    customAlert.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 15px;">
            <span style="flex: 1; font-size: 14px; font-weight: 500;">${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; font-size: 18px; font-weight: bold; cursor: pointer; color: inherit; padding: 0; width: 20px; height: 20px;">×</button>
        </div>
    `;
    
    // Append to body for fixed positioning
    document.body.appendChild(customAlert);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (customAlert.parentNode) {
            customAlert.remove();
        }
    }, 5000);
}

// Form submission validation
document.getElementById('ttm-contactform-2').addEventListener('submit', function(e) {
    // Prevent default submission
    e.preventDefault();
    
    // Validate all steps before final submission
    let allValid = true;
    
    // Check Step 1 fields
    const step1Fields = ['nama', 'hp', 'email', 'perusahaan', 'bidang', 'lab'];
    for (let fieldName of step1Fields) {
        const field = document.getElementsByName(fieldName)[0];
        if (!field || !field.value.trim()) {
            showAlert(`⚠️ Field "${getFieldLabel(fieldName)}" wajib diisi!`, 'error');
            allValid = false;
            break;
        }
    }
    
    // Check Step 2 (Harapan) fields
    if (allValid) {
        const missingHarapan = [];
        for (let i = 1; i <= 20; i++) {
            const field = document.getElementsByName(`h${i}`)[0];
            console.log(`Checking h${i}:`, field ? field.value : 'field not found');
            if (!field || !field.value.trim() || field.value === '') {
                missingHarapan.push(`Harapan ${i}`);
            }
        }
        if (missingHarapan.length > 0) {
            showAlert(`⚠️ Mohon lengkapi penilaian: ${missingHarapan.join(', ')}`, 'error');
            allValid = false;
        }
    }
    
    // Check Step 3 (Kenyataan) fields
    if (allValid) {
        const missingKenyataan = [];
        for (let i = 1; i <= 20; i++) {
            const field = document.getElementsByName(`k${i}`)[0];
            console.log(`Checking k${i}:`, field ? field.value : 'field not found');
            if (!field || !field.value.trim() || field.value === '') {
                missingKenyataan.push(`Kenyataan ${i}`);
            }
        }
        if (missingKenyataan.length > 0) {
            showAlert(`⚠️ Mohon lengkapi penilaian: ${missingKenyataan.join(', ')}`, 'error');
            allValid = false;
        }
    }
    
    // If all validation passes, submit the form
    if (allValid) {
        showAlert('✅ Survey berhasil divalidasi, sedang mengirim...', 'success');
        
        // Wait a bit then submit
        setTimeout(() => {
            this.submit();
        }, 1000);
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateProgressBar();
    updateButtonVisibility();
    
    // Test alert after page loads
    setTimeout(() => {
        console.log('Testing alert system...');
        testAlert();
    }, 2000);
});
</script>

@include('footer')
