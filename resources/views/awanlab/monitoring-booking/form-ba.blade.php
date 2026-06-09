@extends('/awanlab/monitoring-booking/master')
@section('judul', 'Update Booking Order')
@section('konten')
    
                        <!--begin::Content-->                    
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                            <!--begin::Row-->
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                    <!--begin::Card title--> 
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Form ATE-04 untuk "{{ $booking->nomorbooking }}"</h3>
                                        
                                    </div>
                                    <!--end::Card title-->
                                    <div class="card-toolbar">
                                        <button onclick="history.back()" style="text-align: left" class="btn btn-light btn-danger btn-sm">Kembali</button>
                                    </div>
                                </div>
                                <!--begin::Card header-->
                            
                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show">
                                    
                                    <form action="/cetak-ATE04/{{ $booking->id }}"  target="_blank" method="POST">
                                                
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="exampleSelectd">Lab Kalibrasi :</label>
                                                <div class="col-6">
                                                    @if($booking->lab == "AJKT")
                                                    <input name="lab" class="form-control form-control-sm" value="Telkom Infra Maintenance Regional 2" type="text"/>
                                                    @elseif($booking->lab == "AMDN")
                                                    <input name="lab" class="form-control form-control-sm" value="Telkom Infra Maintenance Regional 1" type="text"/>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="exampleSelectd">Alamat Lab :</label>
                                                <div class="col-6">
                                                    @if($booking->lab == "AJKT")
                                                    <input name="alamat" class="form-control form-control-sm" value="Jl. Percetakan Negara No 17-19 Jakarta Pusat" type="text"/>
                                                    @elseif($booking->lab == "AMDN")
                                                    <input name="alamat" class="form-control form-control-sm" value="Jl. Gaharu No.1 Medan" type="text"/>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="exampleSelectd">No. Telp. :</label>
                                                <div class="col-6">
                                                    <input name="telpn" class="form-control form-control-sm" value="021-21480341" type="text"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-2 col-form-label">Nomor :</label>
                                                <div class="col-6">
                                                    <input name="nomor" class="form-control form-control-sm" value="TEL.   /LB-000 / IMT R3 /   / 20 " type="text" id="example-text-input"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-2 col-form-label">Tanggal :</label>
                                                <div class="col-6">
                                                    <input type="date" id="tanggal" class="form-control form-control-sm"  onchange="formatTanggal(this.value)">
                                                    <p class="fs-9">Tanggal: <span name="tanggal" id="tanggalHasil"></span></p>
                                                    <input type="hidden" id="tanggalHidden" name="tanggal">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-2 col-form-label">Siapa yg TTD :</label>
                                                <div class="col-6">
                                                    <input name="ttd" class="form-control form-control-sm" type="text" id="example-text-input" placeholder="contoh: nama Cs"/>
                                                    {{-- <span style="color:red" class="form-text">&nbsp; &nbsp;contoh: nama Cs</span> --}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-2 col-form-label">NIK :</label>
                                                <div class="col-6">
                                                    <input name="nik" class="form-control form-control-sm" type="text" id="example-text-input"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="exampleSelectd">Jenis Berita Acara :</label>
                                                <div class="col-6">
                                                    <select name="ba" class="form-control form-control-sm" id="exampleSelectd">
                                                        <option>Pilih Berita Acara</option>
                                                        <option value="masuk">Berita Acara Penerimaan Barang</option>
                                                        <option value="keluar">Berita Acara Penyerahan Barang</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-3">
                                            </div>
                                            <div class="col-9">
                                            <button type="submit" class="btn btn-primary mr-2 btn-sm">Cetak ATE-04</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Basic info-->
                            </div>
                            <!--end::Row--> 
                        </div>
                        <script>
                          function formatTanggal(inputTanggal) {
                                if (inputTanggal) {
                                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                                    const tanggal = new Date(inputTanggal);
                                    const tanggalFormatted = tanggal.toLocaleDateString('id-ID', options);
                                    document.getElementById("tanggalHasil").textContent = tanggalFormatted;

                                    // Setel nilai input tersembunyi dengan nilai yang sama
                                    document.getElementById("tanggalHidden").value = tanggalFormatted;
                                } else {
                                    document.getElementById("tanggalHasil").textContent = "";

                                    // Setel nilai input tersembunyi menjadi kosong jika tanggal tidak dipilih
                                    document.getElementById("tanggalHidden").value = "";
                                }
                            }
                        </script>

<!--end::Content-->
@endsection