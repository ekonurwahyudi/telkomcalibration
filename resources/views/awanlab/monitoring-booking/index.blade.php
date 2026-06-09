@extends('/awanlab/monitoring-booking/master')
@section('judul', ' Dashboard Booking Order')
@section('konten')
    
                        
                        <!--begin::Content-->                    
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                @endif
                            <!--begin::Row-->
                            <div class="d-flex flex-column-fluid mb-4 pb-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/halamanadmin/media/svg/shapes/abstract-1.svg)">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="svg-icon svg-icon-4x svg-icon-info">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="currentColor"/>
                                                                        <path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="currentColor" opacity="0.3"/>
                                                                        <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="currentColor" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                            <div class="col-8">
                                                            <span class="fw-bold text-dark fs-3">Booking Masuk</span>
                                                            <span class="card-title fw-bold text-dark fs-1 mb-0 text-hover-primary d-block" style="padding-left:1cm">{{ count($booking) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="card card-custom bg-info card-stretch gutter-b">
                                                <div class="card-body mb-2">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="svg-icon svg-icon-4x svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M5,2 L19,2 C20.1045695,2 21,2.8954305 21,4 L21,6 C21,7.1045695 20.1045695,8 19,8 L5,8 C3.8954305,8 3,7.1045695 3,6 L3,4 C3,2.8954305 3.8954305,2 5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L16,6 C16.5522847,6 17,5.55228475 17,5 C17,4.44771525 16.5522847,4 16,4 L11,4 Z M7,6 C7.55228475,6 8,5.55228475 8,5 C8,4.44771525 7.55228475,4 7,4 C6.44771525,4 6,4.44771525 6,5 C6,5.55228475 6.44771525,6 7,6 Z" fill="currentColor" opacity="0.3"/>
                                                                        <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,13 C21,14.1045695 20.1045695,15 19,15 L5,15 C3.8954305,15 3,14.1045695 3,13 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L16,13 C16.5522847,13 17,12.5522847 17,12 C17,11.4477153 16.5522847,11 16,11 L11,11 Z M7,13 C7.55228475,13 8,12.5522847 8,12 C8,11.4477153 7.55228475,11 7,11 C6.44771525,11 6,11.4477153 6,12 C6,12.5522847 6.44771525,13 7,13 Z" fill="currentColor"/>
                                                                        <path d="M5,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,18 C3,16.8954305 3.8954305,16 5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 L11,18 Z M7,20 C7.55228475,20 8,19.5522847 8,19 C8,18.4477153 7.55228475,18 7,18 C6.44771525,18 6,18.4477153 6,19 C6,19.5522847 6.44771525,20 7,20 Z" fill="currentColor"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                            <div class="col-8">
                                                            <span class="fw-bold text-white fs-4">Proses Kalibrasi</span>
                                                            <span class="card-title text-white fw-bold fs-2 mb-0 text-hover-primary d-block" style="padding-left:1cm">{{ count($booking2) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="card card-custom bg-success card-stretch gutter-b">
                                                <div class="card-body mb-2">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="svg-icon svg-icon-4x svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <polygon fill="currentColor" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
                                                                        <path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" fill="currentColor"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                            <div class="col-8">
                                                            <span class="fw-bold text-white fs-4">Kalibrasi Selesai</span>
                                                            <span class="card-title text-white fw-bold fs-2 mb-0 text-hover-primary d-block" style="padding-left:1cm">{{ count($booking3) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="card card-custom bg-warning card-stretch gutter-b">
                                                <div class="card-body mb-2">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="svg-icon svg-icon-4x svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M5,2 L19,2 C20.1045695,2 21,2.8954305 21,4 L21,6 C21,7.1045695 20.1045695,8 19,8 L5,8 C3.8954305,8 3,7.1045695 3,6 L3,4 C3,2.8954305 3.8954305,2 5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L16,6 C16.5522847,6 17,5.55228475 17,5 C17,4.44771525 16.5522847,4 16,4 L11,4 Z M7,6 C7.55228475,6 8,5.55228475 8,5 C8,4.44771525 7.55228475,4 7,4 C6.44771525,4 6,4.44771525 6,5 C6,5.55228475 6.44771525,6 7,6 Z" fill="currentColor" opacity="0.3"/>
                                                                        <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,13 C21,14.1045695 20.1045695,15 19,15 L5,15 C3.8954305,15 3,14.1045695 3,13 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L16,13 C16.5522847,13 17,12.5522847 17,12 C17,11.4477153 16.5522847,11 16,11 L11,11 Z M7,13 C7.55228475,13 8,12.5522847 8,12 C8,11.4477153 7.55228475,11 7,11 C6.44771525,11 6,11.4477153 6,12 C6,12.5522847 6.44771525,13 7,13 Z" fill="currentColor"/>
                                                                        <path d="M5,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,18 C3,16.8954305 3.8954305,16 5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 L11,18 Z M7,20 C7.55228475,20 8,19.5522847 8,19 C8,18.4477153 7.55228475,18 7,18 C6.44771525,18 6,18.4477153 6,19 C6,19.5522847 6.44771525,20 7,20 Z" fill="currentColor"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                            <div class="col-8">
                                                            <span class="fw-bold text-white fs-4">Total Alat Ukur</span>
                                                            <span class="card-title text-white fw-bold fs-2 mb-0 text-hover-primary d-block" style="padding-left:1cm">{{ count($alatukur) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row gy-5 g-xl-10">
                                <!--begin::Col-->
                                <div class="col-xl-12 mb-xl-10  mb-3">
                            <!--begin::List widget 16-->
                            <div class="card card-flush h-xl-100">
                                
                                <!--begin::Body-->
                                <div class="card-body pt-6 px-0">       
                                    <!--begin::Nav-->             
                                    <ul class="nav nav-pills nav-pills-custom item position-relative mx-9">
                                        <!--begin::Item--> 
                                        <li class="nav-item">
                                            <!--begin::Link--> 
                                            <a class="nav-link active btn-active-light btn-active-color-primary   d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_1">                   
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2" style="padding-right: 2px;"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="currentColor"/>
                                                            <path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="currentColor" opacity="0.3"/>
                                                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="currentColor" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                    Booking Masuk
                                                </span> 
                                                <!--end::Subtitle-->
                                                
                                                <!--begin::Bullet-->
                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->                
                                        </li>
                                        <!--end::Item--> 
                            
                                        <!--begin::Item--> 
                                        <li class="nav-item">
                                            <!--begin::Link--> 
                                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_2">                   
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2" style="padding-right: 2px;"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M5,2 L19,2 C20.1045695,2 21,2.8954305 21,4 L21,6 C21,7.1045695 20.1045695,8 19,8 L5,8 C3.8954305,8 3,7.1045695 3,6 L3,4 C3,2.8954305 3.8954305,2 5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L16,6 C16.5522847,6 17,5.55228475 17,5 C17,4.44771525 16.5522847,4 16,4 L11,4 Z M7,6 C7.55228475,6 8,5.55228475 8,5 C8,4.44771525 7.55228475,4 7,4 C6.44771525,4 6,4.44771525 6,5 C6,5.55228475 6.44771525,6 7,6 Z" fill="currentColor" opacity="0.3"/>
                                                            <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,13 C21,14.1045695 20.1045695,15 19,15 L5,15 C3.8954305,15 3,14.1045695 3,13 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L16,13 C16.5522847,13 17,12.5522847 17,12 C17,11.4477153 16.5522847,11 16,11 L11,11 Z M7,13 C7.55228475,13 8,12.5522847 8,12 C8,11.4477153 7.55228475,11 7,11 C6.44771525,11 6,11.4477153 6,12 C6,12.5522847 6.44771525,13 7,13 Z" fill="currentColor"/>
                                                            <path d="M5,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,18 C3,16.8954305 3.8954305,16 5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 L11,18 Z M7,20 C7.55228475,20 8,19.5522847 8,19 C8,18.4477153 7.55228475,18 7,18 C6.44771525,18 6,18.4477153 6,19 C6,19.5522847 6.44771525,20 7,20 Z" fill="currentColor"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                    Proses Kalibrasi
                                                </span> 
                                                <!--end::Subtitle-->
                                                
                                                <!--begin::Bullet-->
                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->                
                                        </li>
                                        <!--end::Item-->    
                                        
                                        <!--begin::Item--> 
                                        <li class="nav-item">
                                            <!--begin::Link--> 
                                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_3">                   
                                                <!--begin::Subtitle-->
                                                <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2"  style="padding-right: 2px;"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <polygon fill="currentColor" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
                                                            <path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" fill="currentColor"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                    Riwayat Booking  
                                                </span> 
                                                <!--end::Subtitle-->
                                                
                                                <!--begin::Bullet-->
                                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                <!--end::Bullet-->
                                            </a>
                                            <!--end::Link-->                
                                        </li>
                                        <!--end::Item--> 
                                        
                                        <!--begin::Bullet-->
                                        <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                                        <!--end::Bullet-->
                                    </ul>             
                                    <!--end::Nav-->
                            
                                    <!--begin::Tab Content-->
                                    <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2">
                                                        
                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade show active" id="kt_list_widget_16_tab_1">
                                                <div class="card card-p-0 card-flush">
                                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                                        <div class="card-title">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1">
                                                               
                                                                    <span class="svg-icon position-absolute ms-4 svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                        </g>
                                                                    </svg><!--end::Svg Icon--></span>
                                                                
                                                                <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Booking" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Export buttons-->
                                                            <div id="kt_datatable_example_1_export" class="d-none"></div>
                                                            <!--end::Export buttons-->
                                                        </div>
                                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                            <!--begin::Export dropdown-->
                                                            <button type="button" class="btn btn-success" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
                                                                        <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                Export Report
                                                            </button>
                                                            <!--begin::Menu-->
                                                            <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                                                    Export as Excel
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Menu-->
                                                            <!--end::Export dropdown-->
                                                
                                                            <!--begin::Hide default export buttons-->
                                                            <div id="kt_datatable_example_buttons" class="d-none"></div>
                                                            <!--end::Hide default export buttons-->
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped align-middle border rounded table-row-dashed gy-5 gs-7" id="kt_datatable_example">
                                                            <thead>
                                                                <!--begin::Table row-->
                                                                <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                                                                    <th class="min-w-10px">No.</th>
                                                                    <th class="min-w-20px">Lokasi</th>
                                                                    <th class="min-w-100px">Nomor Order</th>
                                                                    <th class="min-w-100px">Nama PIC</th>
                                                                    <th class="min-w-100px">Perusahaan</th>
                                                                    <th class="min-w-75px">Layanan</th>
                                                                    <th class="min-w-75px">Qty</th>
                                                                    <th class="min-w-75px">Status</th>
                                                                    <th class="min-w-100px pe-5">Tgl Order</th>
                                                                    <th class="text-center min-w-20px">Aksi</th>
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </thead>
                                                            <tbody>
                                                                @php $no = 1; @endphp
                                                                @foreach($booking as $booking)
                                                                
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $booking->lab }}</td>
                                                                    <td>{{ $booking->nomorbooking }}</td>
                                                                    <td>{{ $booking->nama }}</td>
                                                                    <td>{{ $booking->perusahaan }}</td>
                                                                    <td>
                                                                        @if($booking->layanan == 'InLab')
                                                                        <div class="badge badge-light-danger">InHouse</div>  
                                                                        @else  
                                                                        <div class="badge badge-light-warning">{{ $booking->layanan }}</div>
                                                                        @endif
                                                                        
                                                                    </td>
                                                                    <td>{{ count($booking->alatukur) }} Pcs</td>
                                                                    <td>
                                                                        @if($booking->status == 'Open')
                                                                        <div class="badge badge-info">Booking Order</div>  
                                                                        @else
                                                                        <div class="badge badge-warning">{{ $booking->status }}</div>
                                                                        @endif
                                                                        
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d F Y') }}</td>
                                                                    {{-- <td data-order="2022-03-10T14:40:00+05:00">{{ $booking->created_at }}</td> --}}
                                                                    <td>
                                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                                            <a href="/editbooking/{{ $booking->id }}" class="btn btn-icon btn-light-warning btn-sm me-1">
                                                                                <span class="svg-icon">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                                            <rect fill="currentColor" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>    
                                                                            </a>
                                                                            
                                                                            <a class="btn btn-icon btn-light-success btn-sm me-1 detail"
                                                                            @foreach($booking->alatukur as $alatukur)
                                                                                data-merk="{{$alatukur->merk}}"
                                                                                data-type="{{$alatukur->type}}"
                                                                                
                                                                            @endforeach
                                                                            >
                                                                                <span class="svg-icon">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="currentColor" opacity="0.3"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                            </a>

                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            
                                                                    
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Tap pane-->

                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade show" id="kt_list_widget_16_tab_2">
                                                <div class="card card-p-0 card-flush">
                                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                                        <div class="card-title">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1">
                                                               
                                                                    <span class="svg-icon position-absolute ms-4 svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                        </g>
                                                                    </svg><!--end::Svg Icon--></span>
                                                                
                                                                <input type="text" data-kt-filter2="search2" class="form-control form-control-solid w-250px ps-14" placeholder="Search Booking" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Export buttons-->
                                                            <div id="kt_datatable_example_2_export" class="d-none"></div>
                                                            <!--end::Export buttons-->
                                                        </div>
                                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                            <!--begin::Export dropdown-->
                                                            <button type="button" class="btn btn-success" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
                                                                        <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                Export Report
                                                            </button>
                                                            <!--begin::Menu-->
                                                            <div id="KT_datatable_example_2_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                                                    Export as Excel
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Menu-->
                                                            <!--end::Export dropdown-->
                                                
                                                            <!--begin::Hide default export buttons-->
                                                            <div id="KT_datatable_example_2_buttons" class="d-none"></div>
                                                            <!--end::Hide default export buttons-->
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped align-middle border rounded table-row-dashed gy-5 gs-7" id="KT_datatable_example_2">
                                                            <thead>
                                                                <!--begin::Table row-->
                                                                <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                                                                    <th class="min-w-10px">No.</th>
                                                                    <th class="min-w-20px">Lokasi</th>
                                                                    <th class="min-w-100px">Nomor Order</th>
                                                                    <th class="min-w-100px">Nama PIC</th>
                                                                    <th class="min-w-100px">Perusahaan</th>
                                                                    <th class="min-w-75px">Layanan</th>
                                                                    <th class="min-w-75px">Qty</th>
                                                                    <th class="min-w-75px">Status</th>
                                                                    <th class="min-w-100px pe-5">Tgl Order</th>
                                                                    <th class="text-center min-w-20px">Aksi</th>
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </thead>
                                                            <tbody>
                                                                @php $no = 1; @endphp
                                                                @foreach($booking2 as $booking)
                                                                @if($booking->status == "progres")
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $booking->lab }}</td>
                                                                    <td>{{ $booking->nomorbooking }}</td>
                                                                    <td>{{ $booking->nama }}</td>
                                                                    <td>{{ $booking->perusahaan }}</td>
                                                                    <td>
                                                                        @if($booking->layanan == 'InLab')
                                                                        <div class="badge badge-light-danger">InHouse</div>  
                                                                        @else  
                                                                        <div class="badge badge-light-warning">{{ $booking->layanan }}</div>
                                                                        @endif
                                                                        
                                                                    </td>
                                                                    <td>{{ count($booking->alatukur) }} Pcs</td>
                                                                    <td>
                                                                        @if($booking->status == 'progres')
                                                                        <div class="badge badge-warning">Proses Kalibrasi</div>  
                                                                        @endif
                                                                        
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d F Y') }}</td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                                            <a href="/editbooking/{{ $booking->id }}" class="btn btn-icon btn-light-warning btn-sm me-1">
                                                                                <span class="svg-icon">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                                            <rect fill="currentColor" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>    
                                                                            </a>
                                                                            
                                                                            <a class="btn btn-icon btn-light-success btn-sm me-1 detail"
                                                                            @foreach($booking->alatukur as $alatukur)
                                                                                data-merk="{{$alatukur->merk}}"
                                                                                data-type="{{$alatukur->type}}"
                                                                                
                                                                            @endforeach
                                                                            >
                                                                                <span class="svg-icon">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="currentColor" opacity="0.3"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                            </a>

                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                                    
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Tap pane-->

                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade show" id="kt_list_widget_16_tab_3">
                                                <div class="card card-p-0 card-flush">
                                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                                        <div class="card-title">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1">
                                                               
                                                                    <span class="svg-icon position-absolute ms-4 svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                        </g>
                                                                    </svg><!--end::Svg Icon--></span>
                                                                
                                                                <input type="text" data-kt-filter3="search3" class="form-control form-control-solid w-250px ps-14" placeholder="Search Booking" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Export buttons-->
                                                            <div id="kt_datatable_example_3_export" class="d-none"></div>
                                                            <!--end::Export buttons-->
                                                        </div>
                                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                            <!--begin::Export dropdown-->
                                                            <button type="button" class="btn btn-success" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
                                                                        <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                Export Report
                                                            </button>
                                                            <!--begin::Menu-->
                                                            <div id="kt_datatable_example_export_menu_3" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                                                    Export as Excel
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--end::Menu-->
                                                            <!--end::Export dropdown-->
                                                
                                                            <!--begin::Hide default export buttons-->
                                                            <div id="kt_datatable_example_3_buttons" class="d-none"></div>
                                                            <!--end::Hide default export buttons-->
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped align-middle border rounded table-row-dashed gy-5 gs-7" id="kt_datatable_example_3">
                                                            <thead>
                                                                <!--begin::Table row-->
                                                                <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                                                                    <th class="min-w-10px">No.</th>
                                                                    <th class="min-w-20px">Lokasi</th>
                                                                    <th class="min-w-100px">Nomor Order</th>
                                                                    <th class="min-w-100px">Nama PIC</th>
                                                                    <th class="min-w-100px">Perusahaan</th>
                                                                    <th class="min-w-75px">Layanan</th>
                                                                    <th class="min-w-75px">Qty</th>
                                                                    <th class="min-w-75px">Status</th>
                                                                    <th class="min-w-100px pe-5">Tgl Order</th>
                                                                    <th class="text-center min-w-20px">Aksi</th>
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </thead>
                                                            <tbody>
                                                                @php $no = 1; @endphp
                                                                @foreach($booking3 as $booking)
                                                                @if($booking->status != "Open")
                                                                    @if($booking->status != "progres")
                                                                    <tr>
                                                                        <td>{{ $no++ }}</td>
                                                                        <td>{{ $booking->lab }}</td>
                                                                        <td>{{ $booking->nomorbooking }}</td>
                                                                        <td>{{ $booking->nama }}</td>
                                                                        <td>{{ $booking->perusahaan }}</td>
                                                                        <td>
                                                                            @if($booking->layanan == 'InLab')
                                                                            <div class="badge badge-light-danger">InHouse</div>  
                                                                            @else  
                                                                            <div class="badge badge-light-warning">{{ $booking->layanan }}</div>
                                                                            @endif
                                                                            
                                                                        </td>
                                                                        <td>{{ count($booking->alatukur) }} Pcs</td>
                                                                        <td>
                                                                            @if($booking->status == 'close')
                                                                            <div class="badge badge-success">Close</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Cancel</div>
                                                                            @endif
                                                                            
                                                                        </td>
                                                                        <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d F Y') }}</td>
                                                                        {{-- <td>{{ $booking->created_at }}</td> --}}
                                                                        <td>
                                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                                <a href="/editbooking/{{ $booking->id }}" class="btn btn-icon btn-light-warning btn-sm me-1">
                                                                                    <span class="svg-icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                                                <rect fill="currentColor" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>    
                                                                                </a>
                                                                                
                                                                                <a class="btn btn-icon btn-light-success btn-sm me-1 detail"
                                                                                @foreach($booking->alatukur as $alatukur)
                                                                                    data-merk="{{$alatukur->merk}}"
                                                                                    data-type="{{$alatukur->type}}"
                                                                                    
                                                                                @endforeach
                                                                                >
                                                                                    <span class="svg-icon">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                                <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                                                                <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="currentColor" opacity="0.3"/>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                </a>
    
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                @endif
                                                                    
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Tap pane-->
                                            
                                            
                                                    
                                    </div>
                                    <!--end::Tab Content-->        
                                </div>
                                <!--end: Card Body-->
                            </div>
                            <!--end::List widget 16-->     </div>
                            <!--end::Col-->      
                            </div>
                            <!--end::Row--> 
                            </div>
                            

<!--end::Content-->

@endsection