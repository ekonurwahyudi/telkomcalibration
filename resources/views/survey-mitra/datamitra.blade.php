
@extends('survey-mitra/master')
@section('judul_halaman', 'Monitoring Survey Mitra DSO')
@section('konten')
			<div class="d-flex flex-column-fluid">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Dashboard-->
					<!--begin::Row-->

					{{-- <div class="row">
						<div class="col-4">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									      @php
									      $total = count($list) + count($non)
									      @endphp
									 		<span class="font-weight-bold text-dark font-size-sm">Total Responden</span>
                                                <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 text-hover-primary d-block">{{$total}}</span>
											<span class="font-weight-bold text-dark font-size-sm">Responden</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
						<div class="col-4">
							<!--begin::Stats Widget 30-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-sm">List Telkom</span>
                                                <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 text-hover-primary d-block">{{count($list)}}</span>
											<span class="font-weight-bold text-dark font-size-sm">Responden</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 30-->
						</div>
						<div class="col-4">
							<!--begin::Stats Widget 31-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-sm">List Non Telkom</span>
                                                <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 text-hover-primary d-block">{{count($non)}}</span>
											<span class="font-weight-bold text-dark font-size-sm">Responden</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 31-->
						</div>
					</div> --}}

                    <div class="card card-custom gutter-b">
                        <div class="card-header card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                            <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                            <span class="nav-text">Data Kontrak</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                            <span class="nav-icon"><i class="fas fa-hourglass-half"></i></span>
                                            <span class="nav-text">Belum Mengisi</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                    <table  class="table table-bordered table-checkable " id="order-listing"  style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="5px">No.</th>
                                                        <th>Bidang</th>
                                                        <th>Judul</th>
                                                        <th>No. Kontrak</th>
                                                        <th>Perusahaan</th>
                                                        <th>PIC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($list as $list)
                                                    <tr>
                                                        <td width="5px">{{$no++}}</td>
                                                        <td>{{$list->kelompok}}</td>
                                                        <td>{{$list->judul}}</td>
                                                        <td>{{$list->kontrak}}</td>
                                                        <td>{{$list->perusahaan}}</td>
                                                        <td>{{$list->PIC}}</td>
                                                    </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                                   <table  class="table table-bordered table-checkable " id="order-listing3"  style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="5px">No.</th>
                                                        <th>Bidang</th>
                                                        <th>Judul</th>
                                                        <th>No. Kontrak</th>
                                                        <th>Perusahaan</th>
                                                        <th>PIC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($belum as $belum)
                                                    <tr>
                                                        <td width="5px">{{$no++}}</td>
                                                        <td>{{$belum->kelompok}}</td>
                                                        <td>{{$belum->judul}}</td>
                                                        <td>{{$belum->kontrak}}</td>
                                                        <td>{{$belum->perusahaan}}</td>
                                                        <td>{{$belum->PIC}}</td>
                                                    </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                </div>
                            </div>
                        </div>
				<!--end::Container-->
                    
				</div>
				</div>
			<!--end::Entry-->
		</div>
    </div>
		
			
    
@endsection