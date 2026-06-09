@extends('awanlab/css/master')
@section('judul_halaman', 'Time Plan & PIC CSS')
@section('konten')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap">
				
					<!-- <div class="input-group input-group-sm ">
							<label class="mt-2" for="year">Tahun:</label>
							<select name="year" id="year" class="input-group input-group-sm input-group-solid form-control form-control-solid ml-3" style="width: 150px">
								<option value="2025">2025</option>
								
							</select>
							<button type="submit" class="btn btn-light-danger font-weight-bolder btn-sm ml-3">
								Filter
							</button>
					</div> -->
				
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
			<!--begin::Notice-->
			<!--end::Notice-->
			<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap py-5">
					<div class="card-title">
						<h3 class="d-flex align-items-center text-dark font-weight-bold my-1">
                            <span class="svg-icon svg-icon-danger svg-icon-2x">
                    			<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
                    			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    					<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"/>
                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"/>
                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"/>
                    				</g>
                    			</svg>
                    			<!--end::Svg Icon-->
                    		</span>&nbsp;Timeplan & PIC</h3>
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						<a href="href="https://api.whatsapp.com/send?phone=628121555423" class="btn btn-light-warning hover-rotate-start font-weight-bold mr-2">
								<span class="svg-icon">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    										<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"/>
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"/>
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"/>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Helpdesk</a>
						<!--end::Dropdown-->
						<!--begin::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
                	<table  class="table table-bordered table-checkable " id="order-listing5"  style="width:100%">
							<tr class="hdr">
								<th rowspan="2" style="vertical-align: middle;">No.</th>
								<th rowspan="2" style="vertical-align: middle;">Kegiatan</th>
								<th colspan="4" style="vertical-align: middle;">September</th>
								<th colspan="4" style="vertical-align: middle;">Oktober</th>
								<th rowspan="2" style="vertical-align: middle;">Keterangan</th>
							</tr>
					        <tr>
								<td class="headerta">I</td>
								<td class="headerta">II</td>
								<td class="headerta">III</td>
								<td class="headerta">IV</td>
								<td class="headerta">I</td>
								<td class="headerta">II</td>
								<td class="headerta">III</td>
								<td class="headerta">IV</td>
								
							</tr>
							<tr>
								<td>1</td>
								<td>Koordinasi & Pengiriman NDE ke All IM Reg : CoE serta detail tahapan yg akan dilaksanakan</td>
								<td class="highlight"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Kompulir daftar Responden & NIK utk TELKOM serta alamat email utk Non Telkom ssi format</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Identifikasi Responden & Pengiriman Daftar Responden</td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Dikirimkan via email ke HO TIF (Eko Wahyudi)</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Pengiriman kuesioner melalui email ke masing-masing responden & tembusan ke Penanggung jawab di IM Reg</td>
								<td></td>
								<td></td>
								<td class="highlight"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>4</td>
								<td>Pengumpulan Jawaban Kuesioner / Hasil Survey</td>
								<td></td>
								<td></td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>5</td>
								<td>Analisis & Pengolahan Data Hasil Survey</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td></td>
							</tr>
							<tr>
								<td>6</td>
								<td>Pembuatan Laporan CSS LK TELKOM</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="highlight"></td>
								<td class="highlight"></td>
								<td></td>
							</tr>
					</table>
					</br>
					<span><b>Daftar Penanggung jawab di masing- masing IM Reg :</b></span>
					<li>IM Reg 1 : Hadi Kristianta / 860023   <a href="https://api.whatsapp.com/send?phone=6281373636044"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 2 : Ni Made Dwidhyana K. / 900019   <a href="https://api.whatsapp.com/send?phone=6281296503305"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 3 : Heldi Fuad Abdillah / 720516   <a href="https://api.whatsapp.com/send?phone=6281330906288"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 4 : Muhamad Jumhan / 740189   <a href="https://api.whatsapp.com/send?phone=6281357053517"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 5 : Andy Suherman / 720477   <a href="https://api.whatsapp.com/send?phone=6281241347376"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 6 : Satria Nugroho / 690304   <a href="https://api.whatsapp.com/send?phone=6282149463888"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>IM Reg 7 : Noh Muhammad Ali / 770008   <a href="https://api.whatsapp.com/send?phone=6281242209504"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
					<li>HO-TIF : Iswantoro / 720410   <a href="https://api.whatsapp.com/send?phone=628111160199"><i class="flaticon-whatsapp" style="color:#10cd32;"></i></a></li>
				</div>
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>

						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
@endsection