
@extends('awanlab/css/master')
@section('judul_halaman', 'List Responden CSS')
@section('konten')
<style>
	.treg-shortcuts {
		display: flex;
		flex-wrap: wrap;
		gap: 8px;
	}

	.treg-shortcuts .btn {
		border-radius: 6px;
	}
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			@php
                        $currentUrl = url()->current();
                        $treg='';
                        if (strpos($currentUrl, 'treg1') !== false) {
                            $treg = 'treg1';
                        } elseif (strpos($currentUrl, 'treg2') !== false) {
                            $treg = 'treg2';
                        } elseif (strpos($currentUrl, 'all-list') !== false) {
                            $treg = 'all-list';
                        }elseif (strpos($currentUrl, 'treg3') !== false) {
                            $treg = 'treg3';
                        }elseif (strpos($currentUrl, 'treg4') !== false) {
                            $treg = 'treg4';
                        }elseif (strpos($currentUrl, 'treg5') !== false) {
                            $treg = 'treg5';
                        }elseif (strpos($currentUrl, 'treg6') !== false) {
                            $treg = 'treg6';
                        }elseif (strpos($currentUrl, 'treg7') !== false) {
                            $treg = 'treg7';
                        }
						$formAction = $treg ? url('/' . $treg) : url('/all-list');
            @endphp
			<div class="d-flex align-items-center flex-wrap">
				<form action="{{ $formAction }}" method="GET">
					<div class="input-group input-group-sm ">
							<label class="mt-2" for="year">Tahun:</label>
							<select name="year" id="year" onchange="this.form.submit()" class="input-group input-group-sm input-group-solid form-control form-control-solid ml-3" style="width: 150px">
								@php
									$currentYear = \Carbon\Carbon::now()->year;
									$minYear = 2023;
								@endphp
								@for($i = $currentYear; $i >= $minYear; $i--)
									<option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
								@endfor
							</select>
							<button type="submit" class="btn btn-light-danger font-weight-bolder btn-sm ml-3">
								Filter
							</button>
					</div>
				</form>
				<!--end::Dropdowns-->
				<span>      
					<span class="label label-inline label-pill label-danger label-rounded mr-2">INFO: </span>
					Data Responden <b>{{ \Carbon\Carbon::now()->year }}</b> adalah responden {{ \Carbon\Carbon::now()->year - 1 }} silahkan di update!!
				</span>
				
			</div>
			<!--end::Info-->
	
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
								<!--begin::Daterange-->
					<a href="#" class="btn btn-light btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip"  data-placement="left">
						<span class="text-muted font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
						<span class="text-primary font-weight-bold" id="kt_dashboard_daterangepicker_date">{{ \Carbon\Carbon::now()->format('d F') }}</span>
						<span class="svg-icon svg-icon-sm svg-icon-primary ml-1"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Chat-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<rect x="0" y="0" width="24" height="24"/>
			<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
			<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"/>
		</g>
	</svg><!--end::Svg Icon--></span>                </a>
					<!--end::Daterange-->
	

			</div>
			<!--end::Toolbar-->
		</div>
		
	</div>
			<div class="d-flex flex-column-fluid">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Dashboard-->
					<!--begin::Row-->
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
					<div class="row">
						<div class="col-3">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-sm">Total Responden</span>
                                                <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 text-hover-primary d-block">{{ count($all ?? []) }}</span>
											<span class="font-weight-bold text-dark font-size-sm">Responden</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
						<div class="col-3">
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
						<div class="col-3">
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
						<div class="col-3">
							<!--begin::Stats Widget 31-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-sm">Belum mengisi</span>
                                                <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 text-hover-primary d-block">{{count($belum)}}</span>
											<span class="font-weight-bold text-dark font-size-sm">Responden</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 31-->
						</div>
					</div>

                    <div class="alert alert-custom alert-warning fade show mb-5" style="background-color:#ffa800d4; border:#ffa800d4" role="alert">
                        <div class="alert-icon"><img src="/images/LinkAja.png" style="width:50px;height:50px;"/></div>
                        <div class="alert-text">
                            <h4 class="fw-semibold">Saldo Link Aja!</h4>
                            <span><b>200 Responden</b> pertama akan mendapatkan saldo Link Aja!</span>
                        </div>
                    </div>

					<div class="card card-custom gutter-b">
						<div class="card-body py-4">
							<div class="d-flex align-items-center justify-content-between flex-wrap">
								<div class="font-weight-bolder text-dark mb-2 mb-md-0">Filter TREG</div>
								<div class="treg-shortcuts">
									<a href="/all-list?year={{ $year }}" class="btn btn-sm {{ $treg === 'all-list' ? 'btn-danger' : 'btn-light-danger' }}">ALL TREG</a>
									@for($i = 1; $i <= 7; $i++)
										<a href="/treg{{ $i }}?year={{ $year }}" class="btn btn-sm {{ $treg === 'treg' . $i ? 'btn-danger' : 'btn-light-danger' }}">TREG {{ $i }}</a>
									@endfor
								</div>
							</div>
						</div>
					</div>


					<div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                                    <span class="nav-text">Semua Responden</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="nav-text">Responden Telkom</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                    <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="nav-text">Non Telkom</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_4">
                                    <span class="nav-icon"><i class="fas fa-hourglass-half"></i></span>
                                    <span class="nav-text">Belum Mengisi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-toolbar">
                        <a href="/add" class="btn btn-danger font-weight-bold mr-2">
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
                                </g>
                            </svg>
                        </span>Tambah Responden</a>
                        <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-success font-weight-bold mr-2 font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
                                <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
                                </g>
                            </svg>
                        </span>Export/Import
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-item">
                                    <a href="/{{$treg}}/export_excel?year={{ $year }}" target="_blank" class="navi-link">
                                        <span class="navi-icon"><i class="flaticon2-paper"></i></span>
                                        <span class="navi-text">Download Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="modal" data-target="#exampleModalLong">
                                        <span class="navi-icon"><i class="flaticon2-layers-1"></i></span>
                                        <span class="navi-text">Upload Bulk</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <form action="{{ route('copy.respondents.year') }}" method="POST" onsubmit="return confirm('Salin semua data responden tahun {{ $year - 1 }} ke {{ $year }}? Data dengan nama dan HP yang mirip akan dilewati.');">
                                        @csrf
                                        <input type="hidden" name="source_year" value="{{ $year - 1 }}">
                                        <input type="hidden" name="target_year" value="{{ $year }}">
                                        <input type="hidden" name="treg" value="{{ $treg }}">
                                        <button type="submit" class="navi-link border-0 bg-white w-100 text-left" style="cursor:pointer;">
                                            <span class="navi-icon"><i class="flaticon2-copy"></i></span>
                                            <span class="navi-text">Salin Responden {{ $year - 1 }} ke {{ $year }}</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                                <!--end::Navigation-->
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                            <table  class="table table-bordered table-checkable " id="order-listing-all"  style="width:100%">
										<thead>
											<tr>
												<th width="5px">No.</th>
												<th>Treg</th>
												<th>Nama Responden</th>
												<th>No. HP</th>
												<th>Perusahaan</th>
												<th>Lokasi</th>
												<th>Status</th>
												<th>Ingatkan!</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($all as $respondent)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$respondent->treg}}</td>
												<td>{{$respondent->nama}}</td>
												<td>{{$respondent->hp}}</td>
												<td>{{$respondent->perusahaan}}</td>
												<td>{{$respondent->lab}}</td>
												<td>{{$respondent->status}}</td>
												@php
													$pesan = "â€¼ï¸*TELKOM CUSTOMER SATISFACTION SURVEY*â€¼ï¸

Hola *Sobat $respondent->nama*!

Semoga semua dalam keadaan yang sehat dan tetap bersemangat yahhh! ðŸ¤©

Psst, Kami dari Lab Kalibrasi Telkom mau minta waktunya sebentar, Saat ini sedang mengadakan _Survei Kepuasan Pelanggan (Customer Satisfaction Survey/CSS)_ Lab Kalibrasi Telkom. Kami butuh banget bantuan dari Sobat semua buat isi survei ini biar Lab Kalibrasi Telkom makin keren! ðŸ˜ŽðŸ™Œ

Yukkk, langsung aja klik link di bawah yaaa:
https://telkomcalibration.com/CSS-LKTelkom

Tunggu apa lagi? Isi surveinya sekarang, karena _feedback_ dari kamu sangat berarti buat kami! ðŸ˜Žâœ¨"
												@endphp
												<td style="text-align: center">
                                                    <a href="https://wa.me/62{{ ltrim($respondent->hp, '0') }}?text={{ rawurlencode($pesan) }}">
                                                        <button data-toggle="tooltip" title="Ingatkan Via Whatsapp!" class="btn btn-icon btn-sm" style="background-color:#10cd32">
                                                            <i class="flaticon-whatsapp" style="color:white"></i>
                                                        </button>
                                                    </a>
                                                </td>

												<td class="row">
												        <div class="col-6">
												            <a href="/edit/{{$respondent->id}}" class="btn btn-icon btn-success btn-sm"><i class="flaticon-edit-1"></i></a>    
												        </div>
												        <div class="col-6">
												            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data.destroy', $respondent->id) }}" method="POST">
												                @csrf
                                                                <button type="submit" class="btn btn-icon btn-danger btn-sm"><i class="flaticon-delete"></i></button>
                                                            </form>
												        </div>
												</td>
											</tr>
												@endforeach
										</tbody>
									</table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                            <table  class="table table-bordered table-checkable " id="order-listing"  style="width:100%">
										<thead>
											<tr>
												<th width="5px">No.</th>
												<th>Treg</th>
												<th>Nama Responden</th>
												<th>No. HP</th>
												{{-- <th width="200px">Email</th> --}}
												<th>Perusahaan</th>
												<th>Lokasi</th>
												<th>Status</th>
												<th>Ingatkan!</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($list as $list)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$list->treg}}</td>
												<td>{{$list->nama}}</td>
												<td>{{$list->hp}}</td>
												{{-- <td>{{$list->email}}</td> --}}
												<td>{{$list->perusahaan}}</td>
												<td>{{$list->lab}}</td>
												<td>{{$list->status}}</td>
												@php
													$pesan = "‼️*TELKOM CUSTOMER SATISFACTION SURVEY*‼️

Hola *Sobat $list->nama*!

Semoga semua dalam keadaan yang sehat dan tetap bersemangat yahhh! 🤩

Psst, Kami dari Lab Kalibrasi Telkom mau minta waktunya sebentar, Saat ini sedang mengadakan _Survei Kepuasan Pelanggan (Customer Satisfaction Survey/CSS)_ Lab Kalibrasi Telkom. Kami butuh banget bantuan dari Sobat semua buat isi survei ini biar Lab Kalibrasi Telkom makin keren! 😎🙌

Yukkk, langsung aja klik link di bawah yaaa:
https://telkomcalibration.com/CSS-LKTelkom

Tunggu apa lagi? Isi surveinya sekarang, karena _feedback_ dari kamu sangat berarti buat kami! 😎✨"
												@endphp
												<td style="text-align: center">
                                                    <a href="https://wa.me/62{{ ltrim($list->hp, '0') }}?text={{ rawurlencode($pesan) }}">
                                                        <button data-toggle="tooltip" title="Ingatkan Via Whatsapp!" class="btn btn-icon btn-sm" style="background-color:#10cd32">
                                                            <i class="flaticon-whatsapp" style="color:white"></i>
                                                        </button>
                                                    </a>
                                                </td>

												<td class="row">
												        <div class="col-6">
												            <a href="/edit/{{$list->id}}" class="btn btn-icon btn-success btn-sm"><i class="flaticon-edit-1"></i></a>    
												        </div>
												        <div class="col-6">
												            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data.destroy', $list->id) }}" method="POST">
												                @csrf
                                                                <button type="submit" class="btn btn-icon btn-danger btn-sm"><i class="flaticon-delete"></i></button>
                                                            </form>
												        </div>
												</td>
											</tr>
												@endforeach
										</tbody>
									</table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                            <table  class="table table-bordered table-checkable " id="order-listing2"  style="width:100%">
										<thead>
											<tr>
												<th width="5px">No.</th>
												<th>Treg</th>
												<th>Nama Responden</th>
												<th>No. HP</th>
												<th>Perusahaan</th>
												<th>Lokasi</th>
												<th>Status</th>
												<th>Ingatkan!</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($non as $non)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$non->treg}}</td>
												<td>{{$non->nama}}</td>
												<td>{{$non->hp}}</td>
												<td>{{$non->perusahaan}}</td>
												<td>{{$non->lab}}</td>
												<td>{{$non->status}}</td>
												@php
													$pesan = "‼️*TELKOM CUSTOMER SATISFACTION SURVEY*‼️

Hola *Sobat $non->nama*!

Semoga semua dalam keadaan yang sehat dan tetap bersemangat yahhh! 🤩

Psst, Kami dari Lab Kalibrasi Telkom mau minta waktunya sebentar, Saat ini sedang mengadakan _Survei Kepuasan Pelanggan (Customer Satisfaction Survey/CSS)_ Lab Kalibrasi Telkom. Kami butuh banget bantuan dari Sobat semua buat isi survei ini biar Lab Kalibrasi Telkom makin keren! 😎🙌

Yukkk, langsung aja klik link di bawah yaaa:
https://telkomcalibration.com/CSS-LKTelkom

Tunggu apa lagi? Isi surveinya sekarang, karena _feedback_ dari kamu sangat berarti buat kami! 😎✨"
												@endphp
												<td style="text-align: center">
                                                    <a href="https://wa.me/62{{ ltrim($non->hp, '0') }}?text={{ rawurlencode($pesan) }}">
                                                        <button data-toggle="tooltip" title="Ingatkan Via Whatsapp!" class="btn btn-icon btn-sm" style="background-color:#10cd32">
                                                            <i class="flaticon-whatsapp" style="color:white"></i>
                                                        </button>
                                                    </a>
                                                </td>

												<td class="row">
												        <div class="col-6">
												            <a href="/edit/{{$non->id}}" class="btn btn-icon btn-success btn-sm"><i class="flaticon-edit-1"></i></a>    
												        </div>
												        <div class="col-6">
												            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data.destroy', $non->id) }}" method="POST">
												                @csrf
                                                                <button type="submit" class="btn btn-icon btn-danger btn-sm"><i class="flaticon-delete"></i></button>
                                                            </form>
												        </div>
												</td>
											</tr>
												@endforeach
										</tbody>
									</table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_4_4" role="tabpanel" aria-labelledby="kt_tab_pane_4_4">
                           <table  class="table table-bordered table-checkable " id="order-listing3"  style="width:100%">
										<thead>
											<tr>
												<th width="5px">No.</th>
												<th>Treg</th>
												<th>Nama Responden</th>
												<th>No. HP</th>
												<th>Perusahaan</th>
												<th>Email</th>
												<th>Status</th>
												<th>Ingatkan!</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($belum as $belum)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$belum->treg}}</td>
												<td>{{$belum->nama}}</td>
												<td>{{$belum->hp}}</td>
												<td>{{$belum->perusahaan}}</td>
												<td>{{$belum->email}}</td>
												<td>{{$belum->status}}</td>
												@php
													$pesan = "‼️*TELKOM CUSTOMER SATISFACTION SURVEY*‼️

Hola *Sobat $belum->nama*!

Semoga semua dalam keadaan yang sehat dan tetap bersemangat yahhh! 🤩

Psst, Kami dari Lab Kalibrasi Telkom mau minta waktunya sebentar, Saat ini sedang mengadakan _Survei Kepuasan Pelanggan (Customer Satisfaction Survey/CSS)_ Lab Kalibrasi Telkom. Kami butuh banget bantuan dari Sobat semua buat isi survei ini biar Lab Kalibrasi Telkom makin keren! 😎🙌

Yukkk, langsung aja klik link di bawah yaaa:
https://telkomcalibration.com/CSS-LKTelkom

Tunggu apa lagi? Isi surveinya sekarang, karena _feedback_ dari kamu sangat berarti buat kami! 😎✨."
												@endphp
												<td style="text-align: center">
                                                    <a href="https://wa.me/62{{ ltrim($belum->hp, '0') }}?text={{ rawurlencode($pesan) }}">
                                                        <button data-toggle="tooltip" title="Ingatkan Via Whatsapp!" class="btn btn-icon btn-sm" style="background-color:#10cd32">
                                                            <i class="flaticon-whatsapp" style="color:white"></i>
                                                        </button>
                                                    </a>
                                                </td>

												<td class="row">
												        <div class="col-6">
												            <a href="/edit/{{$belum->id}}" class="btn btn-icon btn-success btn-sm"><i class="flaticon-edit-1"></i></a>    
												        </div>
												        <div class="col-6">
												            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data.destroy', $belum->id) }}" method="POST">
												                @csrf
                                                                <button type="submit" class="btn btn-icon btn-danger btn-sm"><i class="flaticon-delete"></i></button>
                                                            </form>
												        </div>
												</td>
											</tr>
												@endforeach
										</tbody>
									</table>
                        </div>
                    </div>
                </div>
            </div>
				<!--end::Container-->
				<!--Modal insert Bulk-->
        				<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Bulk Data Responden</h5>
                                        <div class="card-toolbar">
                    						<!--begin::Dropdown-->
                    						<a href="/template_responden.xlsx" class="btn btn-success font-weight-bold mr-2 hover-rotate-start" download>
                    								<span class="svg-icon">
                    									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
                    									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        										<path opacity="0.3" d="M5 22H19C19.6 22 20 21.6 20 21V8L14 2H5C4.4 2 4 2.4 4 3V21C4 21.6 4.4 22 5 22Z" fill="currentColor"/>
                                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                                                                <rect x="7.55518" y="16.7585" width="10.144" height="2" rx="1" transform="rotate(-45 7.55518 16.7585)" fill="currentColor"/>
                                                                <rect x="9.0174" y="9.60327" width="10.0952" height="2" rx="1" transform="rotate(45 9.0174 9.60327)" fill="currentColor"/>
                    										</g>
                    									</svg>
                    									<!--end::Svg Icon-->
                    								</span>Download Template</a>
                    						<!--end::Dropdown-->
                    						<!--begin::Button-->
                    					</div>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form" action="/uploadbulk" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">Apakah ingin menghapus data lama? </label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="pilihan" value="YA" checked="checked" />
                                                            <span></span>
                                                            Ya
                                                        </label>
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="pilihan" value="TIDAK"/>
                                                            <span></span>
                                                            Tidak
                                                        </label>
                                                    </div>
                                                    <span class="form-text text-muted">Jika pilih <b>"YA"</b> maka data lama akan dihapus digantikan dengan data yang akan diupload.</span>
                                                </div>
                                            </div>
                                            <div>
                                            <div class="form-group row">
                                				<label class="col-3 mb-3">File Browser</label> 
                                				<input type="text" name="treg" value="{{$treg}}" hidden>
                                				<div class="col-9 col-form-label custom-file">
                                					 <input class="form-control" type="file" id="excelFile" name="excelFile" accept=".xlsx, .xls">
                                				</div>
                                			</div>
                                			</br>
                                			<span><b>Note:</b> Data yang akan diupload dipastikan kembali tidak ada <b>Double Nama</b> dan formatnya disesuikan dengan template atau hasil dari Download Excel di website ini.</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger font-weight-bold">Update Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
				</div>
				</div>
			<!--end::Entry-->
		</div>
		
			
    
@endsection
