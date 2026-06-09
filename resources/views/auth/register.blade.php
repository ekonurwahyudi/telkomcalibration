@extends('auth/master')
@section('judul_halaman','Halaman Login')
@section('konten')
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
				<!--begin::Content-->
				<div class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
					<!--begin::Container-->
					<div class="login-content order-2 order-lg-1 login-content-signup d-flex flex-column">
						<!--begin::Aside Top-->
						<div class="d-flex flex-column-auto flex-column px-10">
							<!--begin::Aside header-->
                            <a href="/" class="login-logo pb-xl-1 pb-10">
                                <img src="/images/logo-labtelkom.png" class="max-h-70px" alt="" />
                            </a>
							<!--end::Aside header-->
							<!--begin: Wizard Nav-->
							<div class="wizard-nav pt-5 pt-lg-15 pb-10">
								<!--begin::Wizard Steps-->
								<div class="wizard-steps d-flex flex-column flex-sm-row">
									<!--begin::Wizard Step 1 Nav-->
									<div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step" data-wizard-state="current">
										<div class="wizard-wrapper pr-7">
											<div class="wizard-icon">
												<i class="wizard-check ki ki-check"></i>
												<span class="wizard-number">1</span>
											</div>
											<div class="wizard-label">
												<h3 class="wizard-title">Perusahaan</h3>
												<div class="wizard-desc">Pilih Perusahaan</div>
											</div>
											<span class="svg-icon pl-6">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
											</span>
										</div>
									</div>
									<!--end::Wizard Step 1 Nav-->
									<!--begin::Wizard Step 2 Nav-->
									<div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step">
										<div class="wizard-wrapper pr-7">
											<div class="wizard-icon">
												<i class="wizard-check ki ki-check"></i>
												<span class="wizard-number">2</span>
											</div>
											<div class="wizard-label">
												<h3 class="wizard-title">Profil</h3>
												<div class="wizard-desc">Detail Profil</div>
											</div>
											<span class="svg-icon pl-6">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
											</span>
										</div>
									</div>
									<!--end::Wizard Step 2 Nav-->
									<!--begin::Wizard Step 3 Nav-->
									<div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step">
										<div class="wizard-wrapper">
											<div class="wizard-icon">
												<i class="wizard-check ki ki-check"></i>
												<span class="wizard-number">3</span>
											</div>
											<div class="wizard-label">
												<h3 class="wizard-title">Akun Login</h3>
												<div class="wizard-desc">Data Login</div>
											</div>
										</div>
									</div>
									<!--end::Wizard Step 3 Nav-->
								</div>
								<!--end::Wizard Steps-->
							</div>
							<!--end: Wizard Nav-->
						</div>
						<!--end::Aside Top-->
						<!--begin::Signin-->
						<div class="login-form">
							<!--begin::Form-->
							<form method="POST" action="{{ route('register') }}" class="form px-10" id="kt_login_signup_form">
								@csrf
								<!--begin: Wizard Step 1-->
								<div class="" data-wizard-type="step-content" data-wizard-state="current">
									<!--begin::Title-->
									<div class="pb-10 pb-lg-12">
										<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Halaman Pendaftaran</h3>
										<div class="text-muted font-weight-bold font-size-h6">Sudah punya akun?
										<a href="/login" class="text-primary font-weight-bolder">Masuk</a></div>
									</div>
									<!--begin::Title-->
									<!--begin::Form Group-->
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
											<label class="font-size-h4 font-weight-bolder text-dark pt-5">Perusahaan:</label>
											<a href="#" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5 " data-toggle="modal" data-target="#exampleModal">+ Tambah Perusahaan</a>
										</div>
										<!-- <label class="font-size-h6 font-weight-bolder text-dark">Perusahaan:</label> -->
										<select class="selectpicker form-control form-control-solid h-auto py-4 px-6 border-0 rounded-lg font-size-h6" name="nama_perusahaan" data-size="7" data-live-search="true">
											<option value="">Pilih Perusahaan</option>
											@foreach ($perusahaans ?? '' as $perusahaan)
											<option value="{{$perusahaan->nama_perusahaan}}">{{$perusahaan->nama_perusahaan}}</option>
											@endforeach
										</select>
										<span class="form-text text-muted">Jika anda <b style="color:red"> perorangan </b> tidak perlu memilih perusahaan</span>
									</div>
									<!--end::Form Group-->
								</div>
								<!--end: Wizard Step 1-->
								<!--begin: Wizard Step 2-->
								<div class="pb-5" data-wizard-type="step-content">
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">Nama Lengkap :</label>
										<div class="col-md-8">
											<input id="name" type="text" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
											@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">Alamat :</label>
										<div class="col-md-8">
										<input id="alamat" type="text" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0 @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
											@error('alamat')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">No.Handphone :</label>
										<div class="col-md-8">
										<input id="no_hp" type="text" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0 @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
											@error('no_hp')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
								<!--end: Wizard Step 2-->
								<!--begin: Wizard Step 3-->
								<div class="pb-5" data-wizard-type="step-content">
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">Email :</label>
										<div class="col-md-8">
											<input  name="pemail" id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" required value="{{ old('email') }}" required autocomplete="email"/>
											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">Password :</label>
										<div class="col-md-8">
											<input id="password" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-4 font-size-h6 font-weight-bolder text-dark p-5">Konfirmasi Password :</label>
										<div class="col-md-8">
											<input id="password-confirm" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-0" name="password_confirmation" required autocomplete="new-password">
										</div>
									</div>
								</div>
								<!--end: Wizard Step 5-->
								<!--begin: Wizard Actions-->
								<div class="d-flex justify-content-between pt-7">
									<div class="mr-2">
										<button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pr-8 pl-6 py-4 my-3 mr-3" data-wizard-type="action-prev">
										<span class="svg-icon svg-icon-md mr-2">
											<!--begin::Svg Icon | path:../halamanadmin/media/svg/icons/Navigation/Left-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
													<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>Kembali</button>
									</div>
									<div>
										<button class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-submit" type="submit">Daftar
										<span class="svg-icon svg-icon-md ml-2">
											<!--begin::Svg Icon | path:../halamanadmin/media/svg/icons/Navigation/Right-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span></button>
										<button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">Berikutnya
										<span class="svg-icon svg-icon-md ml-2">
											<!--begin::Svg Icon | path:../halamanadmin/media/svg/icons/Navigation/Right-2.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span></button>
									</div>
								</div>
								<!--end: Wizard Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						<!-- Modal-->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">
												<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
														<rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
														<path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
													</g>
												</svg><!--end::Svg Icon--></span>	
												Tambah Perusahaan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
												<form method="POST" action="/perusahaandaftar-proses" enctype="multipart/form-data">
													@csrf
													<div class="form-group row">
														<label for="nama_perusahaan" class="col-md-3 col-form-label">Nama Perusahaan:</label>
														<div class="col-md-8">
															<input id="nama_perusahaan" type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan" required autocomplete="nama_perusahaan" autofocus>

															@error('nama_perusahaan')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<label for="telepon_perusahaan" class="col-md-3 col-form-label">Telepon Perusahaan:</label>
														<div class="col-md-8">
															<input id="telepon_perusahaan" type="text" class="form-control @error('telepon_perusahaan') is-invalid @enderror" name="telepon_perusahaan" required autocomplete="telepon_perusahaan" autofocus>

															@error('telepon_perusahaan')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<label for="alamat_perusahaan" class="col-md-3 col-form-label">Alamat Perusahaan:</label>
														<div class="col-md-8">
															<textarea name="alamat_perusahaan" cols="30" rows="4"class="form-control @error('alamat_perusahaan') is-invalid @enderror" name="alamat_perusahaan" required autocomplete="alamat_perusahaan" autofocus></textarea>
															@error('alamat_perusahaan')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<label for="npwp_perusahaan" class="col-md-3 col-form-label">NPWP Perusahaan:</label>
														<div class="col-md-8">
															<input id="npwp_perusahaan" type="text" class="form-control @error('npwp_perusahaan') is-invalid @enderror" name="npwp_perusahaan" required autocomplete="npwp_perusahaan" autofocus>

															@error('npwp_perusahaan')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<label for="npwp_perusahaan" class="col-md-3 col-form-label">Upload Foto NPWP:</label>
														<div class="col-md-8">
															<input id="fotonpwp" type="file" class="form-control @error('fotonpwp') is-invalid @enderror" name="fotonpwp" required autocomplete="fotonpwp" autofocus>
															<p style="color:red;font-size:10px" class="ml-2">Format foto : JPG, JPEG, dan PNG</p>

															@error('fotonpwp')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
														</div>
													</div>
													<div class="form-group row mb-0">
														<div class="col-md-6 offset-md-4">
															<button type="submit" class="btn btn-primary">
																Daftarkan Perusahaan
															</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
@endsection