
@extends('survey-mitra/master')
@section('judul_halaman', 'Monitoring Survey Mitra DSO')
@section('konten')
			<div class="d-flex flex-column-fluid">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Dashboard-->
					<!--begin::Row-->
					<div class="row">
						<div class="col-3">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-dark font-size-h3 center">Data Kontrak</span>
                                                <span class="card-title font-weight-bolder text-dark  mb-0 pt-2 text-hover-primary d-block" style="font-size:35px">30</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
                        <div class="col-3">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bg-success card-stretch gutter-b">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-white font-size-h3 center">Survei Masuk</span>
                                                <span class="card-title font-weight-bolder text-white mb-0 pt-2 text-hover-primary d-block" style="font-size:35px">{{count($hasilsurveys)}}</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
                        <div class="col-3">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bg-danger card-stretch gutter-b">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-white font-size-h3 center">Belum Mengisi</span>
                                                <span class="card-title font-weight-bolder text-white mb-0 pt-2 text-hover-primary d-block" style="font-size:35px">{{count($belum)}}</span>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
						</div>
                        <div class="col-3">
							<!--begin::Stats Widget 29-->
							<div class="card card-custom bg-info card-stretch gutter-b">
								<!--begin::Body-->
								<div class="card-body">
									<div class="row">
									  <div class="col-12 pr-2">
									 		<span class="font-weight-bold text-white font-size-h3 center">Presentase</span>
                                                <span class="card-title font-weight-bolder text-white font-size-h1 mb-0 pt-2 text-hover-primary d-block">{{ ceil(count($hasilsurveys)/count($datamitra)*100) }} %</span>
                                                <div class="progress progress-xs bg-white-o-90">
                                                    <div class="progress-bar bg-white" role="progressbar" style="width: {{ ceil(count($hasilsurveys)/count($datamitra)*100) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
									  </div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Stats Widget 29-->
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
												</span>&nbsp;Hasil Survey Performansi Mitra DSO</h3>
									</div>
								</div>
								<div class="card-body" >
									<!--begin: Datatable-->
									<table  class="table table-bordered" id="hasil">
										<thead>
											<tr>
												<th>No.</th>
												<th style="width:100px">Bidang</th>
												<th>Judul</th>
												<th>No. Kontrak</th>
												<th>Perusahaan</th>
                                                <th>PIC Telkom</th>
												<th>Pertayaan 1</th>
												<th>Pertayaan 2</th>
												<th>Pertayaan 3</th>
												<th>Pertayaan 4</th>
												<th>Pertayaan 5</th>
												<th>Pertayaan 6</th>
												<th>Pertayaan 7</th>
												<th>Pertayaan 8</th>
												<th>Pertayaan 9</th>
												<th>Pertayaan 10</th>
												<th>Pertayaan 11</th>
												<th>Pertayaan 12</th>
												<th>Pertayaan 13</th>
												<th>Pertayaan 14</th>
												<th>Pertayaan 15</th>
												<th>Pertayaan 16</th>
												<th>Pertayaan 17</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									    	@foreach ($hasilsurveys as $hasilsurvey)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$hasilsurvey->kelompok}}</td>
												<td>{{$hasilsurvey->judul}}</td>
												<td>{{$hasilsurvey->kontrak}}</td>
												<td>{{$hasilsurvey->perusahaan}}</td>
												<td>{{$hasilsurvey->PIC}}</td>
												<td>{{$hasilsurvey->p1}}</td>
												<td>{{$hasilsurvey->p2}}</td>
												<td>{{$hasilsurvey->p3}}</td>
												<td>{{$hasilsurvey->p4}}</td>
												<td>{{$hasilsurvey->p5}}</td>
												<td>{{$hasilsurvey->p6}}</td>
												<td>{{$hasilsurvey->p7}}</td>
												<td>{{$hasilsurvey->p8}}</td>
												<td>{{$hasilsurvey->p9}}</td>
												<td>{{$hasilsurvey->p10}}</td>
												<td>{{$hasilsurvey->p11}}</td>
												<td>{{$hasilsurvey->p12}}</td>
												<td>{{$hasilsurvey->p13}}</td>
												<td>{{$hasilsurvey->p14}}</td>
												<td>{{$hasilsurvey->p15}}</td>
												<td>{{$hasilsurvey->p16}}</td>
												<td>{{$hasilsurvey->p17}}</td>
											</tr>
												@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

                        <div class="col-lg-12 mt-10">
							<div class="card card-custom">
								<div class="card-header flex-wrap py-5">
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
												</span>&nbsp;Saran untuk Mitra</h3>
									</div>
								</div>
								<div class="card-body" >
									<!--begin: Datatable-->
									<table  class="table table-bordered table-checkable " id="order-listing"  style="width:100%">
										<thead>
											<tr>
												<th width="5px">No.</th>
												<th>Bidang</th>
												<th>Perusahaan</th>
												<th>Saran</th>
											</tr>
										</thead>
										<tbody>
									        @php $no = 1; @endphp
									        @foreach ($saran1 as $saran1)
											<tr>
												<td width="5px">{{$no++}}</td>
												<td>{{$saran1->kelompok}}</td>
												<td>{{$saran1->perusahaan}}</td>
												<td>{{$saran1->saran}}</td>
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