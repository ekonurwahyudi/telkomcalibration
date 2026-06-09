
@extends('awanlab/css/master')
@section('judul_halaman', 'Dashboard CSS ' . \Carbon\Carbon::now()->year)
@section('konten')
<style>
	#hasil .btn-xs {
		width: 26px;
		height: 26px;
		padding: 0;
	}

	#hasil .btn-xs i {
		font-size: 12px;
	}

	#hasil .hasil-action-cell,
	#hasil .hasil-action-cell form {
		cursor: default !important;
	}

	#hasil .hasil-action-cell form.d-inline {
		display: inline-flex !important;
		margin-left: 2px;
		vertical-align: middle;
	}

	#hasil .hasil-action-cell a,
	#hasil .hasil-action-cell button,
	#hasil .hasil-action-cell i {
		cursor: pointer !important;
	}

	#hasil thead th:nth-child(1),
	#hasil tbody td:nth-child(1),
	.dataTables_scrollHead table thead th:nth-child(1),
	.dataTables_scrollBody table tbody td:nth-child(1) {
		width: 40px !important;
		min-width: 40px !important;
		max-width: 40px !important;
		padding-left: 4px !important;
		padding-right: 4px !important;
		text-align: center !important;
		white-space: nowrap !important;
		box-sizing: border-box !important;
	}
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap">
				<form action="{{ url('/dashboard-css') }}" method="GET">
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
					<div class="row">
						<div class="col-2">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 1</span>
                                                <a href="/treg1"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg1) > 0 && count($hasil1) > 0 ? count($hasil1) . '/' . count($treg1) : '0' }}</span></a>
                                                @php
												
                                                $persen = count($treg1) > 0 ? ceil(count($hasil1) / count($treg1) * 100) : 0;
        
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 30-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 2</span>
                                                <a href="/treg2"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg2) > 0 && count($hasil2) > 0 ? count($hasil2) . '/' . count($treg2) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg2) > 0 ? ceil(count($hasil2) / count($treg2) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 30-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 31-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 3</span>
                                                <a href="/treg3"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg3) > 0 && count($hasil3) > 0 ? count($hasil3) . '/' . count($treg3) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg3) > 0 ? ceil(count($hasil3) / count($treg3) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 31-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 32-->
			                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 4</span>
                                                <a href="/treg4"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg4) > 0 && count($hasil4) > 0 ? count($hasil4) . '/' . count($treg4) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg4) > 0 ? ceil(count($hasil4) / count($treg4) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 32-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 32-->
						    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 5</span>
                                                <a href="/treg5"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg5) > 0 && count($hasil5) > 0 ? count($hasil5) . '/' . count($treg5) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg5) > 0 ? ceil(count($hasil5) / count($treg5) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 32-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 32-->
							    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 6</span>
                                                <a href="/treg6"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg6) > 0 && count($hasil6) > 0 ? count($hasil6) . '/' . count($treg6) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg6) > 0 ? ceil(count($hasil6) / count($treg6) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 32-->
						</div>
						<div class="col-2">
							<!--begin::Stats Widget 32-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12">
									 		<span class="font-weight-bold text-dark font-size-h4 center">TREG 7</span>
                                                <a href="/treg7"><span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 pt-2 text-hover-primary d-block">{{ count($treg7) > 0 && count($hasil7) > 0 ? count($hasil7) . '/' . count($treg7) : '0' }}</span></a>
                                                @php
                                                $persen = count($treg7) > 0 ? ceil(count($hasil7) / count($treg7) * 100) : 0;
                                                @endphp
                                                </br>
											<span class="font-weight-bold mt-3 text-dark font-size-sm">Progres: <span style="color:#1BC5BD;">{{$persen}}%</span> <i class="fas fa-arrow-up text-success icon-sm"></i></span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 32-->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card card-custom">
								<div class="card-header flex-wrap py-5">
									<div class="card-title">
										<h3 class="d-flex align-items-center text-dark font-weight-bold my-1">
										<span class="svg-icon svg-icon-danger svg-icon-2x">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path d="M7,15 C7.55228475,15 8,15.4477153 8,16 C8,16.5522847 7.55228475,17 7,17 L6,17 C4.34314575,17 3,15.6568542 3,14 L3,7 C3,5.34314575 4.34314575,4 6,4 L18,4 C19.6568542,4 21,5.34314575 21,7 L21,14 C21,15.6568542 19.6568542,17 18,17 L17,17 C16.4477153,17 16,16.5522847 16,16 C16,15.4477153 16.4477153,15 17,15 L18,15 C18.5522847,15 19,14.5522847 19,14 L19,7 C19,6.44771525 18.5522847,6 18,6 L6,6 C5.44771525,6 5,6.44771525 5,7 L5,14 C5,14.5522847 5.44771525,15 6,15 L7,15 Z" fill="#000000" fill-rule="nonzero"/>
															<polygon fill="#000000" opacity="0.3" points="8 20 16 20 12 15"/>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>&nbsp;Hasil Survey CSS</h3>
									</div>
									<div class="card-toolbar">
										<!-- <a href="/survey_export?year={{ $year }}" class="btn btn-success font-weight-bold mr-2 font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
												<path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
												</g>
											</svg>
										</span>Download Excel (All)
										</a> -->
										<button id="exportFilteredBtn" class="btn btn-success font-weight-bold mr-2 font-weight-bolder">
											<span class="svg-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
												<path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
												</g>
											</svg>
										</span>Download Excel
										</button>
										
									</div>
								</div>
								<div class="card-body" >
									<!--begin: Datatable-->
									<table  class="table table-bordered" id="hasil">
										<thead>
											<tr>
												<th class="text-center" style="width:40px; min-width:40px; max-width:32px">No.</th>
												<th class="text-center" style="width:72px; min-width:72px">Aksi</th>
												<th style="width:70px; min-width:70px">TREG</th>
												<th style="width:130px; min-width:130px">Lokasi</th>
												<th style="width:180px; min-width:180px">Nama Responden</th>
												<th style="width:130px; min-width:130px">No. HP</th>
												<th>Email</th>
												<th>Perusahaan</th>
												{{-- <th>Bidang</th> --}}
												<th>Status</th>
												<th>H1</th>
												<th>H2</th>
												<th>H3</th>
												<th>H4</th>
												<th>H5</th>
												<th>H6</th>
												<th>H7</th>
												<th>H8</th>
												<th>H9</th>
												<th>H10</th>
												<th>H11</th>
												<th>H12</th>
												<th>H13</th>
												<th>H14</th>
												<th>H15</th>
												<th>H16</th>
												<th>H17</th>
												<th>H18</th>
												<th>H19</th>
												<th>H20</th>
												<th>K1</th>
												<th>K2</th>
												<th>K3</th>
												<th>K4</th>
												<th>K5</th>
												<th>K6</th>
												<th>K7</th>
												<th>K8</th>
												<th>K9</th>
												<th>K10</th>
												<th>K11</th>
												<th>K12</th>
												<th>K13</th>
												<th>K14</th>
												<th>K15</th>
												<th>K16</th>
												<th>K17</th>
												<th>K18</th>
												<th>K19</th>
												<th>K20</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($hasilsurveys as $hasilsurvey)
											<tr>
												<td class="row-number text-center">{{$no++}}</td>
												<td class="text-nowrap text-center hasil-action-cell">
													<a href="{{ route('hasil-survey-css.edit', $hasilsurvey->id) }}" class="btn btn-icon btn-success btn-xs" data-toggle="tooltip" title="Edit hasil survey">
														<i class="flaticon-edit-1"></i>
													</a>
													<form action="{{ route('hasil-survey-css.delete', $hasilsurvey->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hasil survey ini?');">
														@csrf
														<button type="submit" class="btn btn-icon btn-danger btn-xs" data-toggle="tooltip" title="Hapus hasil survey">
															<i class="flaticon-delete"></i>
														</button>
													</form>
												</td>
												<td data-search="{{$hasilsurvey->treg ?? '-'}}">{{$hasilsurvey->treg ?? '-'}}</td>
												<td>{{$hasilsurvey->lab}}</td>
												<td>{{$hasilsurvey->nama}}</td>
												<td>{{$hasilsurvey->hp}}</td>
												<td>{{$hasilsurvey->email}}</td>
												<td>{{$hasilsurvey->perusahaan}}</td>
												{{-- <td>{{$hasilsurvey->bidang}}</td> --}}
												<td>{{$hasilsurvey->status}}</td>
												<td>{{$hasilsurvey->h1}}</td>
												<td>{{$hasilsurvey->h2}}</td>
												<td>{{$hasilsurvey->h3}}</td>
												<td>{{$hasilsurvey->h4}}</td>
												<td>{{$hasilsurvey->h5}}</td>
												<td>{{$hasilsurvey->h6}}</td>
												<td>{{$hasilsurvey->h7}}</td>
												<td>{{$hasilsurvey->h8}}</td>
												<td>{{$hasilsurvey->h9}}</td>
												<td>{{$hasilsurvey->h10}}</td>
												<td>{{$hasilsurvey->h11}}</td>
												<td>{{$hasilsurvey->h12}}</td>
												<td>{{$hasilsurvey->h13}}</td>
												<td>{{$hasilsurvey->h14}}</td>
												<td>{{$hasilsurvey->h15}}</td>
												<td>{{$hasilsurvey->h16}}</td>
												<td>{{$hasilsurvey->h17}}</td>
												<td>{{$hasilsurvey->h18}}</td>
												<td>{{$hasilsurvey->h19}}</td>
												<td>{{$hasilsurvey->h20}}</td>
												<td>{{$hasilsurvey->k1}}</td>
												<td>{{$hasilsurvey->k2}}</td>
												<td>{{$hasilsurvey->k3}}</td>
												<td>{{$hasilsurvey->k4}}</td>
												<td>{{$hasilsurvey->k5}}</td>
												<td>{{$hasilsurvey->k6}}</td>
												<td>{{$hasilsurvey->k7}}</td>
												<td>{{$hasilsurvey->k8}}</td>
												<td>{{$hasilsurvey->k9}}</td>
												<td>{{$hasilsurvey->k10}}</td>
												<td>{{$hasilsurvey->k11}}</td>
												<td>{{$hasilsurvey->k12}}</td>
												<td>{{$hasilsurvey->k13}}</td>
												<td>{{$hasilsurvey->k14}}</td>
												<td>{{$hasilsurvey->k15}}</td>
												<td>{{$hasilsurvey->k16}}</td>
												<td>{{$hasilsurvey->k17}}</td>
												<td>{{$hasilsurvey->k18}}</td>
												<td>{{$hasilsurvey->k19}}</td>
												<td>{{$hasilsurvey->k20}}</td>
											</tr>
												@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				<!--end::Container-->
				
				<div class="card card-custom gutter-b mt-10">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
						<h3 class="d-flex align-items-center text-dark font-weight-bold my-1">
						<span class="svg-icon svg-icon-danger svg-icon-2x">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    										<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"/>
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"/>
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"/>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>&nbsp;Saran untuk Laboratorium</h3>
					</div>
					<div></div>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-icon"><i class="fa fa-envelope-open-text"></i></span>
                                    <span class="nav-text">Lab Jakarta</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-icon"><i class="fa fa-envelope-open-text"></i></span>
                                    <span class="nav-text">Lab Medan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                    <span class="nav-icon"><i class="fa fa-envelope-open-text"></i></span>
                                    <span class="nav-text">Lab Surabaya</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_4">
                                    <span class="nav-icon"><i class="fa fa-envelope-open-text"></i></span>
                                    <span class="nav-text">Lab Makassar</span>
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
												<th>Treg</th>
												<th>Lokasi</th>
												<th>Saran</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									        @foreach ($saran1 as $saran1)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$saran1->treg}}</td>
												<td>{{$saran1->lab}}</td>
												<td>{{$saran1->saran}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                            <table  class="table table-bordered table-checkable " id="order-listing2"  style="width:100%">
								<thead>
									<tr>
										<th width="5px">No.</th>
										<th>Treg</th>
										<th>Lokasi</th>
										<th>Saran</th>
									</tr>
								</thead>
								<tbody>
							        @php $no = 1; @endphp
							        @foreach ($saran2 as $saran2)
									<tr>
										<td width="5px">{{$no++}}</td>
										<td>{{$saran2->treg}}</td>
										<td>{{$saran2->lab}}</td>
										<td>{{$saran2->saran}}</td>
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
										<th>Treg</th>
										<th>Lokasi</th>
										<th>Saran</th>
									</tr>
								</thead>
								<tbody>
							        @php $no = 1; @endphp
							        @foreach ($saran3 as $saran3)
									<tr>
										<td width="5px">{{$no++}}</td>
										<td>{{$saran3->treg}}</td>
										<td>{{$saran3->lab}}</td>
										<td>{{$saran3->saran}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_4_4" role="tabpanel" aria-labelledby="kt_tab_pane_4_4">
                          <table  class="table table-bordered table-checkable " id="order-listing4"  style="width:100%">
							<thead>
								<tr>
									<th width="5px">No.</th>
									<th>Treg</th>
									<th>Lokasi</th>
									<th>Saran</th>
								</tr>
							</thead>
							<tbody>
						        @php $no = 1; @endphp
						        @foreach ($saran4 as $saran4)
								<tr>
									<td width="5px">{{$no++}}</td>
									<td>{{$saran4->treg}}</td>
									<td>{{$saran4->lab}}</td>
									<td>{{$saran4->saran}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
                        </div>
                    </div>
                </div>
            </div>
				<!--end::Container-->
				
				
				</div>
				</div>
			<!--end::Entry-->
		</div>
		<!-- <script type="text/javascript">
		$(document).ready(function(){
			$('#set_dtl').on('click', function (){
				$('#exampleModal').modal('show');
				var order_namaalat = $(this).attr('data-order')
				$('#order_namaalat').text(order_namaalat)
				alert(order);
			})
		})
		</script> -->
    
@endsection
