@extends('auth/master')
@section('judul_halaman','Halaman Login')
@section('konten')
<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Content-->
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
					<!--begin::Wrapper-->
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">
						<!--begin::Logo-->
						<a href="/" class="login-logo pb-xl-20 pb-15">
							<img src="/images/logo-labtelkom.png" class="max-h-70px" alt="" />
						</a>
							<div class="login-form">
							<!--begin::Form-->
							<form method="POST" class="form" action="{{ route('login') }}" >
								@csrf	
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Masuk</h3>
									<div class="text-muted font-weight-bold font-size-h4">Belum punya akun?
									<a href="/newregister" class="text-primary font-weight-bolder">Daftar Sekarang!</a></div>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email:</label>
									<input id="email" type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          		    @enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
										<a href="#" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Lupa Password ?</a>
									</div>
									<input id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Masuk</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
@endsection