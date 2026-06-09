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
                                        <h3 class="fw-bold m-0">Update Booking "{{ $bookingupdate->nomorbooking }}"
                                                @if($bookingupdate->layanan == 'InLab')
                                                <div class="badge badge-light-danger">InHouse</div>  
                                                @else  
                                                <div class="badge badge-light-warning">{{ $bookingupdate->layanan }}</div>
                                                @endif
                                        </h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                            
                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show">
                                    <!--begin::Form-->
                                    <form action="/updatebooking/{{$bookingupdate->id}}" method="POST">
                                        @csrf
                                        <!--begin::Card body-->
                                        <div class="card-body border-top p-9">
                                            
                                            <div class="row mb-3">
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="nomorbooking">No. Booking</label>
                                                    <input class="form-control form-control-lg" id="nomorbooking" name="nomorbooking" type="text" value="{{ $bookingupdate->nomorbooking }}" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="perusahaan">Nama Perusahaan</label>
                                                    <input class="form-control form-control-lg" name="perusahaan" type="text" value="{{ $bookingupdate->perusahaan }}" id="perusahaan">
                                                </div>
                                            </div>
                                            <div class="row pt-3 mb-3">
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="nama">Nama PIC</label>
                                                    <input class="form-control form-control-lg" id="nama" name="nama" type="text" value="{{ $bookingupdate->nama }}" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="hp">No. Handphone</label>
                                                    <input class="form-control form-control-lg" name="hp" type="text" value="{{ $bookingupdate->hp }}" id="hp">
                                                </div>
                                            </div>
                                            <div class="row pt-3 mb-3">
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="email">Email</label>
                                                    <input class="form-control form-control-lg" id="email" name="email" type="text" value="{{ $bookingupdate->email }}" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="lab">Lokasi Laboratorium</label>
                                                    @if($bookingupdate->lab == "AJKT")
                                                    <input class="form-control form-control-lg" name="lab" type="text" value="Lab. Kalibrasi Jakarta" id="lab" disabled>    
                                                    @else
                                                    <input class="form-control form-control-lg" name="lab" type="text" value="{{ $bookingupdate->lab }}" id="lab" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row pt-3 mb-3">
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="created_at">Tanggal Booking</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <span class="svg-icon btn-icon svg-icon-2 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16"> <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/> </svg>
                                                            </span>
                                                        </span>
                                                        <input type="text" class="form-control" aria-label="Username"  value="{{ \Carbon\Carbon::parse($bookingupdate->created_at)->format('d F Y') }}" aria-describedby="basic-addon1"disabled />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="teknisi">Layanan</label>
                                                    <select class="form-select" name="layanan">
                                                        <option value="{{ $bookingupdate->layanan }}">{{ $bookingupdate->layanan }}</option>
                                                        <option value="InLab">InHouse</option>
                                                        <option value="Onsite">Onsite</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row pt-3 mb-4">
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="created_at">Status</label>
                                                        <select class="form-select" name="status" data-placeholder="Pilih Teknisi..">
                                                            <option value="{{ $bookingupdate->status }}">{{ $bookingupdate->status }}</option>
                                                            <option value="Open">Open</option>
                                                            <option value="SPH Dikirim">SPH Dikirim</option>
                                                            <option value="progres">Proses Kalibrasi</option>
                                                            <option value="close">Selesai</option>
                                                            <option value="cancel">cancel</option>
                                                        </select>
                                                        <label class="mb-2 fw-semibold fs-5 text-gray-800 pt-3">Cetak: 
                                                            <a href="/cetak-kup/{{ $bookingupdate->id }}" class="btn btn-success btn-sm">KUP</a>
                                                            <a href="/cetak-pap/{{ $bookingupdate->id }}" class="btn btn-warning btn-sm">PAP</a>
                                                            <a href="/formBA/{{ $bookingupdate->id }}" class="btn btn-info btn-sm">ATE-04</a>
                                                        </label>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2 fw-semibold fs-6 text-gray-800" for="keterangan">Keterangan</label>
                                                    <textarea class="form-control" name="keterangan" style="height: 100px">{{ $bookingupdate->keterangan }}</textarea>
                                                </div>
                                            </div>
                                            
                                            {{-- table alat ukur --}}
                                            {{-- <div class="row" style="color: white; padding-top:1cm">
                                                <div class="form-group col-md-4" style="background-color: #F64E60;border-top-left-radius: 10px;">
                                                    <label class="mb-2 mt-2" >Nama Alat</label>
                                                </div>
                                                <div class="form-group col-md-1" style="background-color: #F64E60">
                                                    <label class="mb-2 mt-2">Merk </label>
                                                </div>
                                                <div class="form-group col-md-2" style="background-color: #F64E60">
                                                    <label class="mb-2 mt-2">Type</label>
                                                </div>
                                                <div class="form-group col-md-2" style="background-color: #F64E60">
                                                    <label class="mb-2 mt-2" >Serial Number</label>
                                                </div>
                                                <div class="form-group col-md-2" style="background-color: #F64E60">
                                                    <label class="mb-2 mt-2">Nama Pada Sertifikat</label>
                                                </div>
                                                <div class="form-group col-md-1" style="background-color: #F64E60;border-top-right-radius: 10px;">
                                                    <label class="mb-2 mt-2">Aksi</label>
                                                </div>
                                            </div> 
                                            @foreach($bookingupdate->alatukur as $alatukur)
                                            <div class="row pt-3">
                                                <div class="form-group col-md-4">
                                                    <input class="form-control form-control-sm" name="namaalat" type="text" value="{{$alatukur->namaalat}}">
                                                </div>
                                                <div class="form-group col-md-1" >
                                                    <input class="form-control form-control-sm" name="merk" type="text" value="{{$alatukur->merk}}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input class="form-control form-control-sm" name="type" type="text" value="{{$alatukur->type}}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input class="form-control form-control-sm" name="serial" type="text" value="{{$alatukur->serial}}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input class="form-control form-control-sm" name="namasertifikat" type="text" value="{{$alatukur->namasertifikat}}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </div>
                                            </div>
                                            @endforeach   --}}
                                            
                                            {{-- Tabel Selesai --}}

                                            <div class="row pt-4 mb-4">
                                                <h4 class="mb-4">
                                                    <span class="svg-icon svg-icon-2 svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                            <path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="currentColor"/>
                                                        </g>
                                                    </svg>
                                                </span>  Alat Ukur yang dikalibrasi</h4>
                                                <div class="form-group col-md-12">
                                                   <table class="table table-striped align-middle border rounded table-row-dashed gy-5 gs-7" id="kt_datatable_example2">
                                                    <thead>
                                                        <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                                                            <th class="min-w-10px">No.</th>
                                                            <th class="min-w-100px">Item Id</th>
                                                            <th class="min-w-100px">Nama Alat Ukur</th>
                                                            <th class="min-w-100px">Merk</th>
                                                            <th class="min-w-75px">Type</th>
                                                            <th class="min-w-75px">Serial</th>
                                                            <th class="min-w-75px">Nama Pada Sertikat</th>
                                                            <th class="min-w-75px">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @foreach($bookingupdate->alatukur as $alatukur)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $alatukur->item_id }}</td>
                                                            <td>{{ $alatukur->namaalat }}</td>
                                                            <td>{{ $alatukur->merk }}</td>
                                                            <td>{{ $alatukur->type }}</td>
                                                            <td>{{ $alatukur->serial }}</td>
                                                            <td>{{ $alatukur->namasertifikat }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-icon btn-danger btn-sm me-1">
                                                                    <span class="svg-icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="currentColor" opacity="0.3"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>    
                                                                </a>
                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                   </table>
                                                </div>
                                            </div>






                                        </div>
                                        <!--end::Card body-->
                                        <!--begin::Actions-->
                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                                            <button type="reset" onclick="history.back()" class="btn btn-light btn-active-light-primary me-2">Gak Jadee</button>
                                            <button type="submit" class="btn btn-success" id="kt_account_profile_details_submit">Gas Keun Update!!</button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Basic info-->
                            </div>
                            <!--end::Row--> 
                        </div>
                            

<!--end::Content-->
@endsection