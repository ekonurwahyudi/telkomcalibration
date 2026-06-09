@extends('awanlab/css/master')
@section('judul_halaman', 'Tambah Responden')
@section('konten')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap">
				
					<div class="input-group input-group-sm ">
							<label class="mt-2" for="year">Tahun:</label>
							<select name="year" id="year" class="input-group input-group-sm input-group-solid form-control form-control-solid ml-3" style="width: 150px">
								<option value="2024">2024</option>
								
							</select>
							<button type="submit" class="btn btn-light-danger font-weight-bolder btn-sm ml-3">
								Filter
							</button>
					</div>
				
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
						<h5 class="card-label">Tambah Responden</h5>
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						<a href="javascript:void(0);" onclick="goBack()" class="btn btn-danger font-weight-bold mr-2">
								<span class="svg-icon">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Address-card.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Kembali</a>
						<!--end::Dropdown-->
						<!--begin::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<form action="/update/{{$user->id}}" id="inputresponden" method="POST">
						@csrf
						<div class="card-body">
							<div class="form-group mb-8">                                        
							<div class="form-group row">
								<label  class="col-2 col-form-label">Lokasi Lab</label>
								<div class="col-8">
									<select class="custom-select form-control @error('lab') is-invalid @enderror" name="lab">
										<option value="" disabled selected>Pilih Lokasi Lab</option>
										<option value="Lab Jakarta" {{ $user->lab === 'Lab Jakarta' ? 'selected' : ''}}>Lab Jakarta</option>
										<option value="Lab Medan" {{ $user->lab === 'Lab Medan' ? 'selected' : ''}}>Lab Medan</option>
										<option value="Lab Surabaya" {{ $user->lab === 'Lab Surabaya' ? 'selected' : ''}}>Lab Surabaya</option>
										<option value="Lab Makassar" {{ $user->lab === 'Lab Makassar' ? 'selected' : ''}}>Lab Makassar</option>
									</select>
								</div>
								@error('lab')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">TREG</label>
								<div class="col-8">
									<select id="treg" class="custom-select form-control @error('treg') is-invalid @enderror" name="treg">
										<option value="" disabled selected>Pilih TREG</option>
										<option value="TREG 1" {{ $user->treg === 'TREG 1' ? 'selected' : ''}}>TREG 1</option>
										<option value="TREG 2" {{ $user->treg === 'TREG 2' ? 'selected' : ''}}>TREG 2</option>
										<option value="TREG 3" {{ $user->treg === 'TREG 3' ? 'selected' : ''}}>TREG 3</option>
										<option value="TREG 4" {{ $user->treg === 'TREG 4' ? 'selected' : ''}}>TREG 4</option>
										<option value="TREG 5" {{ $user->treg === 'TREG 5' ? 'selected' : ''}}>TREG 5</option>
										<option value="TREG 6" {{ $user->treg === 'TREG 6' ? 'selected' : ''}}>TREG 6</option>
										<option value="TREG 7" {{ $user->treg === 'TREG 7' ? 'selected' : ''}}>TREG 7</option>
									</select>
								</div>
								@error('treg')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label" for="nama">Nama Responden</label>
								<div class="col-8">
									<input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$user->nama}}"  type="text">
								</div>
								
								@error('nama')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">No. Handpohone</label>
								<div class="col-8">
									<input class="form-control @error('hp') is-invalid @enderror" name="hp"  type="text" value="{{$user->hp}}" id="example-text-input"/>
								</div>
								@error('hp')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">Email</label>
								<div class="col-8">
									<input class="form-control @error('email') is-invalid @enderror" name="email"  type="text" value="{{$user->email}}" id="example-text-input"/>
								</div>
								@error('email')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">Perusahaan</label>
								<div class="col-8">
									<input class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan"  type="text" value="{{$user->perusahaan}}" id="example-text-input"/>
								</div>
								@error('perusahaan')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">Bidang perusahaan</label>
								<div class="col-8">
									<input class="form-control @error('bidang') is-invalid @enderror" name="bidang"  type="text" value="{{$user->bidang}}" id="example-text-input" placeholder="Jasa, General Trading, General Contractor, Other "/>
								</div>
								@error('bidang')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group row">
								<label  class="col-2 col-form-label">Status</label>
								<div class="col-8">
									<select class="custom-select form-control @error('status') is-invalid @enderror" name="status">
										<option value="" disabled selected>Pilih Status Responden</option>
										<option value="Telkom" {{ $user->status === 'Telkom' ? 'selected' : ''}}>Telkom</option>
										<option value="Non-Telkom" {{ $user->status === 'Non-Telkom' ? 'selected' : ''}}>Non-Telkom</option>
									</select>
								</div>
								@error('status')
									<div class="alert alert-danger mt-2">
										{{ $message }}
									</div>
								@enderror
							</div>
							</div>
							</div>
							<div class="card-footer">
							 <div class="alert alert-danger" id="nameExistsAlert" style="display: none;">
                             Nama ini telah melakukan input sebelumnya.
                            </div>
							<div class="row">
								<div class="col-2">
								</div>
								<div class="col-10">
								<button type="submit" class="btn btn-success mr-2">Submit</button>
								<button type="reset" class="btn btn-secondary">Batal</button>
								</div>
							</div>
						</div>
					</form>
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