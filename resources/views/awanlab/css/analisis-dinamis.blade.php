@php
    $year = $year ?? now()->year;
    $safePercent = function ($value, $total) {
        return $total > 0 ? ceil(($value / $total) * 100) : 0;
    };
@endphp
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>
        Report Analytics CSS {{ $year }}
    </title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="../halamanadmin/media/logos/favicon.png" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="https://calista.cloud/dashboards/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
    type="text/css" />
<link href="/halamanadmin/analisis/datatables.bundle.css" rel="stylesheet"
    type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="/halamanadmin/analisis/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="/halamanadmin/analisis/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if (localStorage.getItem("data-theme") !== null) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Content-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="../../demo1/dist/index.html" class="d-lg-none">
                <img alt="Logo" src="halamanadmin/media/logos/atemis2.png" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}"
                class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Report Analytics CSS {{ $year }}
</h1>
                <!--end::Title-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <form action="/analisis-css" method="GET" class="d-flex align-items-center me-5">
                    <select name="year" class="form-select form-select-sm w-125px" onchange="this.form.submit()">
                        @for ($filterYear = now()->year + 1; $filterYear >= 2023; $filterYear--)
                            <option value="{{ $filterYear }}" {{ (int) $year === $filterYear ? 'selected' : '' }}>
                                {{ $filterYear }}
                            </option>
                        @endfor
                    </select>
                </form>
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <h6 class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</h6>
										<h6 class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Great People   </h6>
										<span class="symbol symbol-lg-35 symbol-25 svg-icon-primary">
											<span class="symbol-label font-size-h5 font-weight-bold"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-28-020759/theme/html/demo5/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#F64E60" fill-rule="nonzero" opacity="0.3"/>
													<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#DE1B1B" fill-rule="nonzero"/>
												</g>
											</svg><!--end::Svg Icon--></span></span>
										</span>
                        <!--end::Avatar-->

                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">
                                <span class="svg-icon menu-icon">    
														<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1">
																<path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor"/>
                                                                <path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor"/>
															</g>
														</svg></span>
														Login</a>
                        </div>
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px"
                        id="kt_app_header_menu_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                
                <!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="../../demo1/dist/index.html">
            <img alt="Logo" src="halamanadmin/media/logos/atemis2.png"
                class=" h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="halamanadmin/media/logos/icon-atemis2.png"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item menu-item here">
                    <!--begin:Menu link-->
                    <a href="/dashboard-css" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0" y="0" width="24" height="24"/>
									<path d="M7,15 C7.55228475,15 8,15.4477153 8,16 C8,16.5522847 7.55228475,17 7,17 L6,17 C4.34314575,17 3,15.6568542 3,14 L3,7 C3,5.34314575 4.34314575,4 6,4 L18,4 C19.6568542,4 21,5.34314575 21,7 L21,14 C21,15.6568542 19.6568542,17 18,17 L17,17 C16.4477153,17 16,16.5522847 16,16 C16,15.4477153 16.4477153,15 17,15 L18,15 C18.5522847,15 19,14.5522847 19,14 L19,7 C19,6.44771525 18.5522847,6 18,6 L6,6 C5.44771525,6 5,6.44771525 5,7 L5,14 C5,14.5522847 5.44771525,15 6,15 L7,15 Z" fill="currentColor" fill-rule="nonzero"/>
									<polygon fill="currentColor" opacity="0.3" points="8 20 16 20 12 15"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dashboard CSS</span>
                    </a>
                    <!--end:Menu link-->
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0" y="0" width="24" height="24"/>
									<path opacity="0.3" d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z" fill="currentColor"/>
                                    <path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Report Analytic</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a href="/analisis-css?year={{ $year }}" class="menu-link active">
								<span class="svg-icon menu-icon">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1">
											<rect x="14" y="9" width="6" height="6" rx="3" fill="currentColor"/>
											<rect x="3" y="9" width="6" height="6" rx="3" fill="currentColor" fill-opacity="0.7"/>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
								<span class="menu-text">Analisis Dinamis</span>
							</a>
                            <!--end:Menu link-->
                        </div>
                        
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Master Data</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                                <div class="menu-item menu-item here">
                    <!--begin:Menu link-->
                    <a href="/all-list" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0" y="0" width="24" height="24"/>
									<path d="M7,15 C7.55228475,15 8,15.4477153 8,16 C8,16.5522847 7.55228475,17 7,17 L6,17 C4.34314575,17 3,15.6568542 3,14 L3,7 C3,5.34314575 4.34314575,4 6,4 L18,4 C19.6568542,4 21,5.34314575 21,7 L21,14 C21,15.6568542 19.6568542,17 18,17 L17,17 C16.4477153,17 16,16.5522847 16,16 C16,15.4477153 16.4477153,15 17,15 L18,15 C18.5522847,15 19,14.5522847 19,14 L19,7 C19,6.44771525 18.5522847,6 18,6 L6,6 C5.44771525,6 5,6.44771525 5,7 L5,14 C5,14.5522847 5.44771525,15 6,15 L7,15 Z" fill="currentColor" fill-rule="nonzero"/>
									<polygon fill="currentColor" opacity="0.3" points="8 20 16 20 12 15"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">List Responden</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="/timeplan" class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"/>
                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"/>
                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Time Plan & PIC</span>
                    </a>
                    <!--end:Menu link-->
                </div>


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="https://api.whatsapp.com/send?phone=628121555423"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="Customer Support">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z"
                            fill="currentColor" />
                        <path
                            d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="btn-label">Customer Support</span>
            <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
            <span class="svg-icon btn-icon svg-icon-2 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                        fill="currentColor" />
                    <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
                    <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
                    <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">

                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    
</div>                        <!--end::Toolbar-->

                        
                        <!--begin::Content-->                    
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                                <!--begin::Col-->
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                                    <!--begin::Card widget 20-->
                                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10"
                                        style="background-color: #F1416C;background-image:url('https://preview.keenthemes.com/metronic8/demo1/assets/media/patterns/vector-1.png')">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <div class="card-title d-flex flex-column">
                                                <!--begin::Amount-->
                                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{count($hasilsurveys)}}</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Survei Masuk</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Amount-->
                                                <span class="fs-1 fw-bold text-white me-2 lh-1 ls-n2 mt-2">{{count($internal)}}</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Telkom</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Amount-->
                                                <span class="fs-1 fw-bold text-white me-2 lh-1 ls-n2 mt-2">{{count($external)}}</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Non-Telkom</span>
                                                <!--end::Subtitle-->
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Card body-->
                                        <div class="card-body d-flex align-items-end pt-0">
                                            <!--begin::Progress-->
                                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                                <div
                                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                                    <span> + {{count($hasilsurveys)-count($responden)}} Responden</span>
                                                    <span>{{ $safePercent(count($hasilsurveys), count($responden)) }}%</span>
                                                </div>
                                                <div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
                                                    <div class="bg-white rounded h-8px" role="progressbar" style="width: {{ $safePercent(count($hasilsurveys), count($responden)) }}%;"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card widget 20-->
                                    <!--begin::Card widget 7-->
                                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <div class="card-title d-flex flex-column">
                                                <!--begin::Amount-->
                                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">227</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Responden Terdaftar</span>
                                                <!--begin::Amount-->
                                                <span class="fs-1 fw-bold text-dark me-2 lh-1 ls-n2 mt-2">{{count($datainternal)}}</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Telkom</span>
                                                <!--end::Subtitle-->
                                                <!--begin::Amount-->
                                                <span class="fs-1 fw-bold text-dark me-2 lh-1 ls-n2 mt-2">{{count($dataexternal)}}</span>
                                                <!--end::Amount-->
                                                <!--begin::Subtitle-->
                                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Non-Telkom</span>
                                                <!--end::Subtitle-->
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column justify-content-end pt-0">
                                            <!--begin::Title-->
                                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Responden CSS {{ $year }}</span>
                                            <!--end::Title-->
                                            <!--begin::Users group-->
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Masrofin Zaki">
                                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">M</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Nursinah">
                                                    <span class="symbol-label bg-danger text-inverse-warning fw-bold">N</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Sangap Simarmata">
                                                    <span class="symbol-label bg-success text-inverse-warning fw-bold">S</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Putu Angga Sudyatmika">
                                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">P</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Zaky Maulana Mustafa">
                                                    <span class="symbol-label bg-danger text-inverse-warning fw-bold">Z</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Runson Binsar Tarida Manalu">
                                                    <span class="symbol-label bg-primary text-inverse-warning fw-bold">R</span>
                                                </div>
                                                <a href="/all-list" class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+300</span>
                                                </a>
                                            </div>
                                            <!--end::Users group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card widget 7-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xxl-9">
                                    <!--begin::Chart widget 22-->
                                        <div class="card h-xl-100">
                                        <div class="card-header pt-7">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">PROGRESS PENGISIAN RESPONDEN CSS {{ $year }}</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 7 menit lalu</span>
                                            </h3>
                                            <!--end::Title-->
                                            <!--begin::Toolbar-->
                                            <div class="card-toolbar">
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html"
                                                    class="btn btn-sm btn-danger">Kembali</a>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>

                                        <!--begin::Body-->
                                        <div class="card-body pb-3">  
                                                                                                    <!--begin::Wrapper-->                         
                                        <div class="d-flex flex-wrap flex-md-nowrap">
                                            <!--begin::Items-->                         
                                            <div class="me-md-5 w-100">
                                                                                    
                                                    <!--begin::Item-->                                               
                                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                        <!--begin::Block-->                                                                                   
                                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-50px me-4">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="currentColor"/>
                                                                        <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                        <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="currentColor" opacity="0.3"/>
                                                                    </svg>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->

                                                            <!--begin::Section-->                                                    
                                                            <div class="me-2">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">LK MEDAN</a>
                                                                
                                                                <span class="text-gray-400 fw-bold d-block fs-7">Jl. Gaharu No.1 Medan </span>
                                                            </div>                                         
                                                            <!--end::Section-->  
                                                        </div>                                         
                                                        <!--end::Block-->  
                                                        
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center">                    
                                                            <span class="text-dark fw-bolder fs-1">{{count($surveymedan)}}</span> 

                                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                
                                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{count($respondenmedan)}}</span>                                                           

                                                            <span class="badge badge-lg badge-light-success align-self-center px-2">{{ $safePercent(count($surveymedan), count($respondenmedan)) }}%</span>                                       
                                                        </div>                                  
                                                        <!--end::Info-->                                                      
                                                    </div>
                                                    <!--end::Item-->                         
                                                                                    
                                                    <!--begin::Item-->                                               
                                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                        <!--begin::Block-->                                                                                   
                                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-50px me-4">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="currentColor"/>
                                                                        <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                        <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="currentColor" opacity="0.3"/>
                                                                        </svg>
                                                                        </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->

                                                            <!--begin::Section-->                                                    
                                                            <div class="me-2">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">LK JAKARTA</a>
                                                                
                                                                <span class="text-gray-400 fw-bold d-block fs-7">Jl. Percetakan Negara No. 17-19</span>
                                                            </div>                                          
                                                            <!--end::Section-->  
                                                        </div>                                         
                                                        <!--end::Block-->  
                                                        
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center">                    
                                                            <span class="text-dark fw-bolder fs-1">{{count($surveyjakarta)}}</span> 

                                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                
                                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">72</span>                                                           

                                                            <span class="badge badge-lg badge-light-success align-self-center px-2">100%</span>                                       
                                                        </div>                                  
                                                        <!--end::Info-->                                                      
                                                    </div>
                                                    <!--end::Item-->                         
                                                                                    
                                                    <!--begin::Item-->                                               
                                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                        <!--begin::Block-->                                                                                   
                                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-50px me-4">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="currentColor"/>
                                                                        <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                        <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="currentColor" opacity="0.3"/>
                                                                    </svg>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->

                                                            <!--begin::Section-->                                                    
                                                            <div class="me-2">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">LK SURABAYA</a>
                                                                
                                                                <span class="text-gray-400 fw-bold d-block fs-7">Jl. Gayungan PTT No.17-19</span>
                                                            </div>                                         
                                                            <!--end::Section-->  
                                                        </div>                                         
                                                        <!--end::Block-->  
                                                        
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center">                    
                                                            <span class="text-dark fw-bolder fs-1">{{count($surveysurabaya)}}</span> 

                                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                
                                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">74</span>                                                           

                                                            <span class="badge badge-lg badge-light-success align-self-center px-2">100%</span>                                       
                                                        </div>                                  
                                                        <!--end::Info-->                                                      
                                                    </div>
                                                    <!--end::Item--> 
                                                    
                                                    <!--begin::Item-->                                               
                                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                                        <!--begin::Block-->                                                                                   
                                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-50px me-4">
                                                                <span class="symbol-label">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="currentColor"/>
                                                                        <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                        <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="currentColor" opacity="0.3"/>
                                                                    </svg>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->

                                                            <!--begin::Section-->                                                    
                                                            <div class="me-2">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">LK MAKASSAR</a>
                                                                
                                                                <span class="text-gray-400 fw-bold d-block fs-7">Jl. AP Pettarani No. 4</span>
                                                            </div>                                         
                                                            <!--end::Section-->  
                                                        </div>                                         
                                                        <!--end::Block-->  
                                                        
                                                        <!--begin::Info-->
                                                        <div class="d-flex align-items-center">                    
                                                            <span class="text-dark fw-bolder fs-1">{{count($surveymakassar)}}</span> 

                                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                                                
                                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">{{count($respondenmakassar)}}</span>                                                           

                                                            <span class="badge badge-lg badge-light-success align-self-center px-2">{{ $safePercent(count($surveymakassar), count($respondenmakassar)) }}%</span>                                       
                                                        </div>                                  
                                                        <!--end::Info-->                                                      
                                                    </div>
                                                    <!--end::Item--> 
                                            </div>
                                            <!--end::Items--> 
                                            
                                            <!--begin::Container-->
                                            <div class="d-flex justify-content-between flex-column w-225px w-md-600px mx-auto mx-md-0 pt-3 pb-10">
                                                <!--begin::Title-->
                                                <div class="fs-4 fw-bold text-gray-900 text-center mb-5">
                                                    Populasi Responden CSS<br/> Lab Kalibrasi Telkom {{ $year }}
                                                </div>
                                                <!--end::Title--> 

                                                <!--begin::Chart-->
                                                <div id="kt_chart_widgets_css" class="mx-auto mb-4"></div>
                                                <!--end::Chart-->

                                                <!--begin::Labels-->
                                                <div class="mx-auto">
                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Bullet-->
                                                        <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                                                        <!--end::Bullet-->

                                                        <!--begin::Label-->
                                                        <div class="fs-8 fw-semibold text-muted">Lab. Kalibrasi Telkom Medan ({{ count($respondenmedan) }} Responden)</div>
                                                        <!--end::Label-->                                 
                                                    </div>
                                                    <!--end::Label-->   
                                                    
                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Bullet-->
                                                        <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                                                        <!--end::Bullet-->

                                                        <!--begin::Label-->
                                                        <div class="fs-8 fw-semibold text-muted">Lab. Kalibrasi Telkom Jakarta (72 Responden)</div>
                                                        <!--end::Label-->                                 
                                                    </div>
                                                    <!--end::Label-->   

                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Bullet-->
                                                        <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                                                        <!--end::Bullet-->

                                                        <!--begin::Label-->
                                                        <div class="fs-8 fw-semibold text-muted">Lab. Kalibrasi Telkom Surabaya (74 Responden)</div>
                                                        <!--end::Label-->                                 
                                                    </div>
                                                    <!--end::Label-->   

                                                    <!--begin::Label-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Bullet-->
                                                        <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                                                        <!--end::Bullet-->

                                                        <!--begin::Label-->
                                                        <div class="fs-8 fw-semibold text-muted">Lab. Kalibrasi Telkom Makassar ({{ count($respondenmakassar) }} Responden)</div>
                                                        <!--end::Label-->                                 
                                                    </div>
                                                    <!--end::Label-->   
                                                </div>
                                                <!--end::Labels-->                                
                                            </div>
                                            <!--end::Container-->
                                        </div>
                                        <!--end::Wrapper-->  
                                        </div>
                                        <!--end: Card Body-->
                                        </div>
                                        <!--end::Chart widget 22-->
                                </div>
                                <!--end::Col-->
                            </div>


                            <!--Cart CSI-->
                            <div class="row gx-5 gx-xl-10">
                                <!--begin::Col-->
                                <div class="col-sm-3 mb-5 mb-xl-10">
                                    <div class="card card-flush h-lg-100">  
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">            
                                                <span class="card-label fw-bold text-dark">Lab. Kalibrasi Medan</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                            </h3>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">                 
                                                        <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kepentingan (MIS)
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="MIS adalah total dari average masing-masing nilai harapan.">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                         </span> 
                                                    </div>
                                                                       
                                                    <!--end::Section-->  
                                    
                                                <!--begin::Statistics--> 
                                                <div class="d-flex align-items-senter">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>  
                                                    <span class="text-gray-900 fw-bolder fs-6">{{ round($mis['Lab Medan'],2) }}</span>
                                                    <!--end::Number-->  
                                                    
                                                                                            
                                                </div>  
                                                <!--end::Statistics-->           
                                            </div>
                                                <!--end::Item-->
                                    
                                                                <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Factor (WF)
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="WF adalah total dari rata-rata WF (rata-rata harapan / total MIS x 100).">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                         </span>
                                                        </div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                                  
                                                        <span class="text-gray-900 fw-bolder fs-6">100</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                    </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kinerja (MSS)
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="MIS adalah total dari average masing-masing nilai kenyataan.">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                         </span>    
                                                    </div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>            
                                                        <span class="text-gray-900 fw-bolder fs-6">{{ round($mss['Lab Medan'],2) }}</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Score (WS)
                                                            <span class="ms-1" data-bs-toggle="tooltip" title="WS adalah total dari rata-rata WS (rata-rata WF setiap harapan x total MSS x total WF).">
                                                                <span class="svg-icon svg-icon-lg">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                            <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                             </span>    
                                                        </div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                    </g>
                                                                </svg>
                                                            </span>                              
                                                            <span class="text-gray-900 fw-bolder fs-6">{{ round($totalWS['Lab Medan'],2) }}</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                                    <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Highest Scale
                                                            <span class="ms-1" data-bs-toggle="tooltip" title="Highest Scale adalah score tertinggi dari nilai survey setiap pertayaan.">
                                                                <span class="svg-icon svg-icon-lg">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                            <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                             </span></div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                                       
                                                            <span class="text-gray-900 fw-bolder fs-6">5</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                            <!--end::Item-->

                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">CSI
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="CSI adalah nilai akhir dari Pembagian Total WS / Highest Scale ">
                                                            <span class="svg-icon svg-icon-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                         </span>    
                                                    </div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>            
                                                        <span class="text-gray-900 fw-bolder fs-5"><b>{{ round($totalWS['Lab Medan']/5*100,2) }} %</b></span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                                  
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                    @php
                                                        $csi = $totalWS['Lab Medan']/5*100; // Gantilah ini dengan nilai CSI yang sesuai

                                                        if ($csi > 87) {
                                                            $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                        } elseif ($csi >= 84 && $csi <= 87) {
                                                            $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                        } elseif ($csi >= 80 && $csi < 84) {
                                                            $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                        } elseif ($csi >= 77 && $csi < 80) {
                                                            $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                        } elseif ($csi >= 71 && $csi < 77) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                        } elseif ($csi >= 64 && $csi < 71) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                        } else {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                        }
                                                    @endphp
                                                        <!--begin::Number-->           
                                                        <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                         <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                </g>
                                                            </svg>
                                                        </span> 
                                                        <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-html="true" title="<b>CSI Lab Medan</b> </br>
                                                                                                                                2020 : Good (Puas) </br>
                                                                                                                                2023 : Good (Puas) </br>
                                                                                                                                2024 : Excellent">
                                                                                                            
                                                            <span class="svg-icon svg-icon-lg">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                        <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                         </span> 
                                                    
                                                    
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                                
                                                
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::LIst widget 1-->
                                </div>
                                <div class="col-sm-3 mb-5 mb-xl-10">
                                    <div class="card card-flush h-lg-100">  
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">            
                                                <span class="card-label fw-bold text-dark">Lab. Kalibrasi Jakarta</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                            </h3>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">                 
                                                        <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kepentingan (MIS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                <!--begin::Statistics--> 
                                                <div class="d-flex align-items-senter">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>    
                                                    <span class="text-gray-900 fw-bolder fs-6">{{ round($mis['Lab Jakarta'],2) }}</span> 
                                                    <!--end::Number-->  
                                                    
                                                                                            
                                                </div>  
                                                <!--end::Statistics-->           
                                            </div>
                                                <!--end::Item-->
                                    
                                                                <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Factor (WF)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                                  
                                                        <span class="text-gray-900 fw-bolder fs-6">100</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                    </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kinerja (MSS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>               
                                                        <span class="text-gray-900 fw-bolder fs-6">{{ round($mss['Lab Jakarta'],2) }}</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Score (WS)</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>                                 
                                                            <span class="text-gray-900 fw-bolder fs-6">{{ round($totalWS['Lab Jakarta'],2) }}</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                                    <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Highest Scale</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                                       
                                                            <span class="text-gray-900 fw-bolder fs-6">5</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                            <!--end::Item-->

                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">CSI</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>               
                                                        <span class="text-gray-900 fw-bolder fs-5"><b>{{ round($totalWS['Lab Jakarta']/5*100,2) }} %</b></span> 
                                                        <!--end::Number-->  
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->            
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                    @php
                                                        $csi = $totalWS['Lab Jakarta']/5*100; // Gantilah ini dengan nilai CSI yang sesuai

                                                        if ($csi > 87) {
                                                            $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                        } elseif ($csi >= 84 && $csi <= 87) {
                                                            $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                        } elseif ($csi >= 80 && $csi < 84) {
                                                            $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                        } elseif ($csi >= 77 && $csi < 80) {
                                                            $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                        } elseif ($csi >= 71 && $csi < 77) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                        } elseif ($csi >= 64 && $csi < 71) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                        } else {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                        }
                                                    @endphp
                                                        <!--begin::Number-->           
                                                        <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                         <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                </g>
                                                            </svg>
                                                        </span> 
                                                        <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-html="true" title="<b>CSI Lab Jakarta</b> </br>
                                                                                                                        2020 : Cukup Puas </br>
                                                                                                                        2023 : Good (Puas) </br>
                                                                                                                        2024 : Excellent">
                                                                                                    
                                                            <span class="svg-icon svg-icon-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                            </g>
                                                            </svg>
                                                        </span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                                
                                                
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::LIst widget 1-->
                                </div>
                                <div class="col-sm-3 mb-5 mb-xl-10">
                                    <div class="card card-flush h-lg-100">  
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">            
                                                <span class="card-label fw-bold text-dark">Lab. Kalibrasi Surabaya</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                            </h3>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">                 
                                                        <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kepentingan (MIS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                <!--begin::Statistics--> 
                                                <div class="d-flex align-items-senter">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    <span class="text-gray-900 fw-bolder fs-6">{{ round($mis['Lab Surabaya'],2) }}</span> 
                                                    <!--end::Number-->  
                                                    
                                                                                            
                                                </div>  
                                                <!--end::Statistics-->           
                                            </div>
                                                <!--end::Item-->
                                    
                                                                <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Factor (WF)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                                  
                                                        <span class="text-gray-900 fw-bolder fs-6">100</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                    </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kinerja (MSS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>           
                                                        <span class="text-gray-900 fw-bolder fs-6">{{ round($mss['Lab Surabaya'],2) }}</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Score (WS)</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>                            
                                                            <span class="text-gray-900 fw-bolder fs-6">{{ round($totalWS['Lab Surabaya'],2) }}</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                                    <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Highest Scale</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                                       
                                                            <span class="text-gray-900 fw-bolder fs-6">5</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                            <!--end::Item-->

                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">CSI</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>           
                                                        <span class="text-gray-900 fw-bolder fs-5"><b>{{ round($totalWS['Lab Surabaya']/5*100,2) }} %</b></span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    {{-- <div class="text-gray-700 fw-semibold fs-6 me-2">Intepretasi</div>                    --}}
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        
                                                    @php
                                                        $csi = $totalWS['Lab Surabaya']/5*100; // Gantilah ini dengan nilai CSI yang sesuai

                                                        if ($csi > 87) {
                                                            $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                        } elseif ($csi >= 84 && $csi <= 87) {
                                                            $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                        } elseif ($csi >= 80 && $csi < 84) {
                                                            $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                        } elseif ($csi >= 77 && $csi < 80) {
                                                            $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                        } elseif ($csi >= 71 && $csi < 77) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                        } elseif ($csi >= 64 && $csi < 71) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                        } else {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                        }
                                                    @endphp
                                                        <!--begin::Number-->
                                                        <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                         <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                </g>
                                                            </svg>
                                                        </span> 
                                                        <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-html="true" title="<b>CSI Lab Surabaya</b> </br>
                                                                                                                    2020 : Excellent </br>
                                                                                                                    2023 : Excellent </br>
                                                                                                                    2024 : Excellent">
                                                                                                
                                                        <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                            <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                        </g>
                                                        </svg>
                                                        </span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                                
                                                
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::LIst widget 1-->
                                </div>
                                <div class="col-sm-3 mb-5 mb-xl-10">
                                    <div class="card card-flush h-lg-100">  
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">            
                                                <span class="card-label fw-bold text-dark">Lab. Kalibrasi Makassar</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                            </h3>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                                        
                                        <!--begin::Body-->
                                        <div class="card-body pt-5">                 
                                                        <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kepentingan (MIS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                <!--begin::Statistics--> 
                                                <div class="d-flex align-items-senter">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span> 
                                                    <span class="text-gray-900 fw-bolder fs-6">{{ round($mis['Lab Makassar'],2) }}</span> 
                                                    <!--end::Number-->  
                                                    
                                                                                            
                                                </div>  
                                                <!--end::Statistics-->           
                                            </div>
                                                <!--end::Item-->
                                    
                                                                <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Factor (WF)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                                  
                                                        <span class="text-gray-900 fw-bolder fs-6">100</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                    </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kinerja (MSS)</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>            
                                                        <span class="text-gray-900 fw-bolder fs-6">{{ round($mss['Lab Makassar'],2) }}</span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Score (WS)</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>                              
                                                            <span class="text-gray-900 fw-bolder fs-6">{{ round($totalWS['Lab Makassar'],2) }}</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                                    <div class="separator separator-dashed my-3"></div>
                                                <!--end::Separator-->
                                            
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Section-->
                                                        <div class="text-gray-700 fw-semibold fs-6 me-2">Highest Scale</div>                   
                                                        <!--end::Section-->  
                                        
                                                        <!--begin::Statistics--> 
                                                        <div class="d-flex align-items-senter">
                                                                       
                                                            <span class="text-gray-900 fw-bolder fs-6">5</span> 
                                                            <!--end::Number-->  
                                                            
                                                                                                    
                                                                            </div>  
                                                        <!--end::Statistics-->           
                                                    </div>
                                            <!--end::Item-->

                                            <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">CSI</div>                   
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                </g>
                                                            </svg>
                                                        </span>            
                                                        <span class="text-gray-900 fw-bolder fs-5"><b>{{ round($totalWS['Lab Makassar']/5*100,2) }} %</b></span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-3"></div>
                                                    <!--end::Separator-->
                                                
                                                        <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Section-->
                                                    {{-- <div class="text-gray-700 fw-semibold fs-6 me-2">Intepretasi</div>                    --}}
                                                    <!--end::Section-->  
                                    
                                                    <!--begin::Statistics--> 
                                                    <div class="d-flex align-items-senter">
                                                        
                                                    @php
                                                        $csi = $totalWS['Lab Makassar']/5*100; // Gantilah ini dengan nilai CSI yang sesuai

                                                        if ($csi > 87) {
                                                            $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                        } elseif ($csi >= 84 && $csi <= 87) {
                                                            $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                        } elseif ($csi >= 80 && $csi < 84) {
                                                            $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                        } elseif ($csi >= 77 && $csi < 80) {
                                                            $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                        } elseif ($csi >= 71 && $csi < 77) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                        } elseif ($csi >= 64 && $csi < 71) {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                        } else {
                                                            $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                        }
                                                    @endphp
                                                        <!--begin::Number-->    
                                                        <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                         <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                </g>
                                                            </svg>
                                                        </span>        
                                                        <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-html="true" title="<b>CSI Lab Makassar</b> </br>
                                                                                                                    2020 : Excellent </br>
                                                                                                                    2023 : Excellent </br>
                                                                                                                    2024 : Excellent">
                                                                                                
                                                        <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                            <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                        </g>
                                                        </svg>
                                                        </span> 
                                                        <!--end::Number-->  
                                                        
                                                                                                
                                                                        </div>  
                                                    <!--end::Statistics-->           
                                                </div>
                                                <!--end::Item-->
                                    
                                                
                                                
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::LIst widget 1-->
                                </div>
                                
                            </div>
                            {{-- End Card CSI --}}
                                                        <!--Cart CSI-->
                                                        <div class="row gx-5 gx-xl-10">
                                                            <!--begin::Col-->
                                                            <div class="col-sm-3 mb-5 mb-xl-10">
                                                                <div class="card card-flush h-lg-100">  
                                                                    <!--begin::Header-->
                                                                    <div class="card-header pt-5">
                                                                        <!--begin::Title-->
                                                                        <h3 class="card-title align-items-start flex-column">            
                                                                            <span class="card-label fw-bold text-dark">Result Nasional</span>
                                                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                                                        </h3>
                                                                        <!--end::Title-->
                                                                    </div>
                                                                    <!--end::Header-->
                                                                    
                                                                    <!--begin::Body-->
                                                                    <div class="card-body pt-5">                 
                                                                                    <!--begin::Item-->
                                                                        <div class="d-flex flex-stack">
                                                                                <!--begin::Section-->
                                                                                <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kepentingan (MIS)</div>                   
                                                                                <!--end::Section-->  
                                                                
                                                                            <!--begin::Statistics--> 
                                                                            <div class="d-flex align-items-senter">
                                                                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                            <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>  
                                                                                <span class="text-gray-900 fw-bolder fs-6">{{ round($misnas,2) }}</span> 
                                                                                <!--end::Number-->  
                                                                                
                                                                                                                        
                                                                            </div>  
                                                                            <!--end::Statistics-->           
                                                                        </div>
                                                                            <!--end::Item-->
                                                                
                                                                                            <!--begin::Separator-->
                                                                        <div class="separator separator-dashed my-3"></div>
                                                                                <!--end::Separator-->
                                                                            
                                                                                    <!--begin::Item-->
                                                                            <div class="d-flex flex-stack">
                                                                                <!--begin::Section-->
                                                                                <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Factor (WF)</div>                   
                                                                                <!--end::Section-->  
                                                                
                                                                                <!--begin::Statistics--> 
                                                                                <div class="d-flex align-items-senter">
                                                                                              
                                                                                    <span class="text-gray-900 fw-bolder fs-6">100</span> 
                                                                                    <!--end::Number-->  
                                                                                    
                                                                                                                            
                                                                                </div>  
                                                                                <!--end::Statistics-->           
                                                                            </div>
                                                                            <!--end::Item-->
                                                                
                                                                        <!--begin::Separator-->
                                                                        <div class="separator separator-dashed my-3"></div>
                                                                                <!--end::Separator-->
                                                                            
                                                                                    <!--begin::Item-->
                                                                            <div class="d-flex flex-stack">
                                                                                <!--begin::Section-->
                                                                                <div class="text-gray-700 fw-semibold fs-6 me-2">Total Kinerja (MSS)</div>                   
                                                                                <!--end::Section-->  
                                                                
                                                                                <!--begin::Statistics--> 
                                                                                <div class="d-flex align-items-senter">
                                                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>            
                                                                                    <span class="text-gray-900 fw-bolder fs-6">{{ round($mssall,2) }}</span> 
                                                                                    <!--end::Number-->  
                                                                                    
                                                                                                                            
                                                                                                    </div>  
                                                                                <!--end::Statistics-->           
                                                                            </div>
                                                                            <!--end::Item-->
                                                                            <div class="separator separator-dashed my-3"></div>
                                                                            <!--end::Separator-->
                                                                        
                                                                                <!--begin::Item-->
                                                                                <div class="d-flex flex-stack">
                                                                                    <!--begin::Section-->
                                                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Total Weighted Score (WS)</div>                   
                                                                                    <!--end::Section-->  
                                                                    
                                                                                    <!--begin::Statistics--> 
                                                                                    <div class="d-flex align-items-senter">
                                                                                        <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                </g>
                                                                                            </svg>
                                                                                        </span>                              
                                                                                        <span class="text-gray-900 fw-bolder fs-6">{{ round($totalWSnas,2) }}</span> 
                                                                                        <!--end::Number-->  
                                                                                        
                                                                                                                                
                                                                                                        </div>  
                                                                                    <!--end::Statistics-->           
                                                                                </div>
                                                                                <div class="separator separator-dashed my-3"></div>
                                                                            <!--end::Separator-->
                                                                        
                                                                                <!--begin::Item-->
                                                                                <div class="d-flex flex-stack">
                                                                                    <!--begin::Section-->
                                                                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Highest Scale</div>                   
                                                                                    <!--end::Section-->  
                                                                    
                                                                                    <!--begin::Statistics--> 
                                                                                    <div class="d-flex align-items-senter">
                                                                                                   
                                                                                        <span class="text-gray-900 fw-bolder fs-6">5</span> 
                                                                                        <!--end::Number-->  
                                                                                        
                                                                                                                                
                                                                                                        </div>  
                                                                                    <!--end::Statistics-->           
                                                                                </div>
                                                                        <!--end::Item-->
                            
                                                                        <div class="separator separator-dashed my-3"></div>
                                                                                <!--end::Separator-->
                                                                            
                                                                                    <!--begin::Item-->
                                                                            <div class="d-flex flex-stack">
                                                                                <!--begin::Section-->
                                                                                <div class="text-gray-700 fw-semibold fs-6 me-2">CSI</div>                   
                                                                                <!--end::Section-->  
                                                                
                                                                                <!--begin::Statistics--> 
                                                                                <div class="d-flex align-items-senter">
                                                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>            
                                                                                    <span class="text-gray-900 fw-bolder fs-5"><b>{{ round($totalWSnas/5*100,2) }} %</b></span> 
                                                                                    <!--end::Number-->                           
                                                                                                    </div>  
                                                                                <!--end::Statistics-->           
                                                                            </div>
                                                                            <!--end::Item-->
                                                                            <div class="separator separator-dashed my-3"></div>
                                                                                <!--end::Separator-->
                                                                            
                                                                                    <!--begin::Item-->
                                                                            <div class="d-flex flex-stack">
                                                                                <!--begin::Section-->
                                                                                                
                                                                                <!--end::Section-->  
                                                                
                                                                                <!--begin::Statistics--> 
                                                                                <div class="d-flex align-items-senter">
                                                                                   
                                                                                @php
                                                                                    $csi = $totalWS['Lab Medan']/5*100; // Gantilah ini dengan nilai CSI yang sesuai
                            
                                                                                    if ($csi > 87) {
                                                                                        $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                                                    } elseif ($csi >= 84 && $csi <= 87) {
                                                                                        $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                                                    } elseif ($csi >= 80 && $csi < 84) {
                                                                                        $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                                                    } elseif ($csi >= 77 && $csi < 80) {
                                                                                        $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                                                    } elseif ($csi >= 71 && $csi < 77) {
                                                                                        $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                                                    } elseif ($csi >= 64 && $csi < 71) {
                                                                                        $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                                                    } else {
                                                                                        $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                                                    }
                                                                                @endphp
                                                                                    <!--begin::Number-->           
                                                                                    <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                                                         <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                                                </g>
                                                                                            </svg>
                                                                                        </span> 
                                                                                        <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span> 
                                                                                    <!--end::Number-->  
                                                                                    
                                                                                                                            
                                                                                                    </div>  
                                                                                <!--end::Statistics-->           
                                                                            </div>
                                                                            <!--end::Item-->
                                                                
                                                                            
                                                                            
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::LIst widget 1-->
                                                            </div>
                                                            <div class="col-sm-9 mb-5 mb-xl-10">
                                                                <div class="card card-flush h-lg-100">  
                                                                    <!--begin::Header-->
                                                                    <div class="card-header pt-5">
                                                                        <!--begin::Title-->
                                                                        <h3 class="card-title align-items-start flex-column">            
                                                                            <span class="card-label fw-bold text-dark">Result CSI ALL Laboratorium Kalibrasi Telkom</span>
                                                                            <span class="text-gray-400 mt-1 fw-semibold fs-6"><i>Customer Satisfiction Index Interpretation</i>
                                                                                <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="<img src='/csi.png'/>">
                                                                                                                        
                                                                                <span class="svg-icon svg-icon-md">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                                    <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                                    <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                                </g>
                                                                                </svg>
                                                                                </span>
                                                                            </span>
                                                                        </h3>
                                                                        <!--end::Title-->
                                                                    </div>
                                                                    <!--end::Header-->
                                                                    
                                                                    <!--begin::Body-->
                                                                    <div class="card-body pt-5">
                                                                        <div id="chartdiv" style="height: 380px;"></div>
                                                                    </div>
                                                                    <!--end::Body-->
                                                                </div>
                                                                <!--end::LIst widget 1-->
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        {{-- End Card CSI --}}

                                                    <div class="row gx-5 gx-xl-10">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-7 mb-5 mb-xl-10">
                                                                
                                                        <!--begin::Table widget 9-->
                                                        <div class="card card-flush h-xl-100">
                                                            <!--begin::Header-->
                                                            <div class="card-header pt-5">        
                                                                <!--begin::Title-->
                                                                <h3 class="card-title align-items-start flex-column">
                                                                    <span class="card-label fw-bold text-gray-800">Rekapitulasi By Telkom Group & Non Telkom</span>
                                                                    
                                                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Rekap harapan & kenyataan</span>
                                                                </h3>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Header-->
                                                        
                                                            <!--begin::Body-->
                                                            <div class="card-body py-3">
                                                                <!--begin::Table container-->
                                                                <div class="table-responsive">
                                                                    <!--begin::Table-->
                                                                    <table class="table table-row-dashed align-middle gs-0 gy-4">
                                                                        <!--begin::Table head-->
                                                                        <thead>
                                                                            <tr class="fs-7 fw-bold border-0 text-gray-400">                                    
                                                                                <th class="min-w-150px" colspan="2">KOMPONEN CSI</th>
                                                                                <th class="min-w-150px text-end pe-0" colspan="2">TELKOM Group</th>
                                                                                <th class="text-end min-w-150px" colspan="2">NON-   TELKOM</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <!--end::Table head-->
                                                        
                                                                        <!--begin::Table body-->
                                                                        <tbody>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Total Kepentingan (MIS)</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">{{ round($mistnt['Telkom'],2) }}</span>
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($mistnt['Non-Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Total Weighted Factor (WF)</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">100</span>                                                              
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-dark fw-bold fs-6 me-3">100</span>                                                              
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Total Kinerja (MSS)</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($msstnt['Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($msstnt['Non-Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Total Weighted Score (WS)</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                            <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                        </g>
                                                                                                    </svg>
                                                                                                </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($totalWStnt['Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($totalWStnt['Non-Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Highest Scale</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">5</span>                                                            
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-dark fw-bold fs-6 me-3">5</span>                                                              
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CSI</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($totalWStnt['Telkom']/5*100,2) }} %</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="svg-icon svg-icon-success svg-icon-2x">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                                                                                                        <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span>                                  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($totalWStnt['Non-Telkom']/5*100,2) }} %</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="" colspan="2">
                                                                                        {{-- <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Intepretasi</span>                                             --}}
                                                                                    </td>
                                                                                    @php
                                                                                        $csi = $totalWStnt['Telkom']/5*100; // Gantilah ini dengan nilai CSI yang sesuai
                                
                                                                                        if ($csi > 87) {
                                                                                            $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                                                        } elseif ($csi >= 84 && $csi <= 87) {
                                                                                            $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                                                        } elseif ($csi >= 80 && $csi < 84) {
                                                                                            $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                                                        } elseif ($csi >= 77 && $csi < 80) {
                                                                                            $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                                                        } elseif ($csi >= 71 && $csi < 77) {
                                                                                            $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                                                        } elseif ($csi >= 64 && $csi < 71) {
                                                                                            $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                                                        } else {
                                                                                            $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                                                        }
                                                                                    @endphp
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                                                             
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{!! $kategori !!}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            @php
                                                                                                $csi = $totalWStnt['Non-Telkom']/5*100; // Gantilah ini dengan nilai CSI yang sesuai
                                        
                                                                                                if ($csi > 87) {
                                                                                                    $kategori = "<span class='badge badge-success badge-lg'>Excellent</span>";
                                                                                                } elseif ($csi >= 84 && $csi <= 87) {
                                                                                                    $kategori = "<span class='badge badge-primary badge-lg'>Very Good</span>";
                                                                                                } elseif ($csi >= 80 && $csi < 84) {
                                                                                                    $kategori = "<span class='badge badge-info badge-lg'>Good</span>";
                                                                                                } elseif ($csi >= 77 && $csi < 80) {
                                                                                                    $kategori = "<span class='badge badge-warning badge-lg'>Borderline</span>";
                                                                                                } elseif ($csi >= 71 && $csi < 77) {
                                                                                                    $kategori = "<span class='badge badge-danger badge-lg'>Cause for Concern</span>";
                                                                                                } elseif ($csi >= 64 && $csi < 71) {
                                                                                                    $kategori = "<span class='badge badge-danger badge-lg'>Poor</span>";
                                                                                                } else {
                                                                                                    $kategori = "<span class='badge badge-danger badge-lg'>Very Poor</span>";;
                                                                                                }
                                                                                            @endphp                                 
                                                                                            <span class="text-gray-900 fw-bolder fs-1"><span class='badge badge-info badge-lg'>Excellent</span></span>
                                                                                             <span class="svg-icon svg-icon-success svg-icon-2x pt-2">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                                        <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                                                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </span> 
                                                                                            <span class="text-gray-900 fw-bolder fs-1"><b>{!! $kategori !!}</b></span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                            </tbody>
                                                                        <!--end::Table body-->
                                                                    </table>
                                                                    <!--end::Table-->
                                                                </div>
                                                                <!--end::Table container-->
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Table Widget 9-->    </div>
                                                            <!--end::Col-->
                                                        
                                                             <!--begin::Col-->
                                                             <div class="col-xl-5 mb-5 mb-xl-10">
                                                                
                                                        <!--begin::Table widget 10-->
                                                        <div class="card card-flush h-xl-100">
                                                            <!--begin::Header-->
                                                            <div class="card-header pt-5">        
                                                                <!--begin::Title-->
                                                                <h3 class="card-title align-items-start flex-column">
                                                                    <span class="card-label fw-bold text-gray-800">Result CSI Telkom Group & Non-Telkom</span>
                                                                    
                                                                    <span class="text-gray-400 pt-1 fw-semibold fs-6"><i>Customer Satisfiction Index Interpretation</i></span>
                                                                </h3>
                                                                <!--end::Title-->
                                                        
                                                                
                                                            </div>
                                                            
                                                            <!--begin::Body-->
                                                            <div class="card-body py-3">
                                                                <!--begin::Table container-->
                                                                
                                                                    <div id="chartdivo" style="height: 380px;"></div>
                                                                
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Table Widget 10-->    </div>
                                                            <!--end::Col-->
                                                    </div>
                                                        <!--end::Row-->
                                                    
                                                        <div class="row gx-5 gx-xl-10">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-6 mb-5 mb-xl-10">
                                                                
                                                        <!--begin::Table widget 9-->
                                                        <div class="card card-flush h-xl-100">
                                                            <!--begin::Header-->
                                                            <div class="card-header pt-5">        
                                                                <!--begin::Title-->
                                                                <h3 class="card-title align-items-start flex-column">
                                                                    <span class="card-label fw-bold text-gray-800">Rekapitulasi IPA Telkom Group & Non-Telkom ({{ $year }})</span>
                                                                    
                                                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Rekap harapan, kenyataan & Gap</span>
                                                                </h3>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Header-->
                                                        
                                                            <!--begin::Body-->
                                                            <div class="card-body py-3">
                                                                <!--begin::Table container-->
                                                                <div class="table-responsive">
                                                                    <!--begin::Table-->
                                                                    <table class="table table-row-dashed align-middle gs-0 gy-4">
                                                                        <!--begin::Table head-->
                                                                        <thead>
                                                                            <tr class="fs-7 fw-bold border-0 text-gray-400">                                    
                                                                                <th class="min-w-150px" colspan="2">CUSTOMER</th>
                                                                                <th class="min-w-150px text-end pe-0" colspan="2">KINERJA</th>
                                                                                <th class="text-end min-w-150px" colspan="2">HARAPAN       GAP</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <!--end::Table head-->
                                                        
                                                                        <!--begin::Table body-->
                                                                        <tbody>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Laboratorium Medan</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            @php
                                                                                                function hitungRataRata($data, $prefix, $lokasi) {
                                                                                                    $rataRata = [];
                                                                                                    for ($i = 1; $i <= 20; $i++) {
                                                                                                        $kolom = $prefix . $i;
                                                                                                        $rataRata[$kolom] = $data[$lokasi][$kolom];
                                                                                                    }
                                                                                                    return count($rataRata) > 0 ? array_sum($rataRata) / count($rataRata) : 0;
                                                                                                }

                                                                                                $lokasi = ['Lab Medan', 'Lab Jakarta', 'Lab Surabaya', 'Lab Makassar'];
                                                                                                $rataRataMis = [];
                                                                                                $rataRataMss = [];

                                                                                                foreach ($lokasi as $lokasiItem) {
                                                                                                    $rataRataMis[$lokasiItem] = hitungRataRata($ratamis, 'h', $lokasiItem);
                                                                                                    $rataRataMss[$lokasiItem] = hitungRataRata($ratamss, 'k', $lokasiItem);
                                                                                                }
                                                                                            @endphp
         
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMss['Lab Medan'],2) }}</span>
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                                                           
                                                                                            
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">{{ round($rataRataMis['Lab Medan'],2) }}</span> 
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMss['Lab Medan'] - $rataRataMis['Lab Medan'],3) }}</span>                                                        
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Laboratorium Jakarta</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMss['Lab Jakarta'],2) }}</span>                                                               
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">{{ round($rataRataMis['Lab Jakarta'],2) }}</span> 
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMss['Lab Jakarta'] - $rataRataMis['Lab Jakarta'],2) }}</span>                                                             
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Laboratorium Surabaya</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                       
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMss['Lab Surabaya'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                                                        
                                                                                            
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMis['Lab Surabaya'],2) }}</span> 
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMss['Lab Surabaya'] - $rataRataMis['Lab Surabaya'],2) }}</span>                                                        
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                                    <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Laboratorium Makassar</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMss['Lab Makassar'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMis['Lab Makassar'],2) }}</span> 
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMss['Lab Makassar'] - $rataRataMis['Lab Makassar'],2) }}</span>                                                        
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                @php
                                                                                function hitungRataRatatnt($datatnt, $prefix, $lokasitnt) {
                                                                                    $rataRatatnt = [];
                                                                                    for ($i = 1; $i <= 20; $i++) {
                                                                                        $kolomtnt = $prefix . $i;
                                                                                        $rataRatatnt[$kolomtnt] = $datatnt[$lokasitnt][$kolomtnt];
                                                                                    }
                                                                                    return count($rataRatatnt) > 0 ? array_sum($rataRatatnt) / count($rataRatatnt) : 0;
                                                                                }

                                                                                $lokasitnt = ['Telkom', 'Non-Telkom'];
                                                                                $rataRataMistnt = [];
                                                                                $rataRataMsstnt = [];

                                                                                foreach ($lokasitnt as $lokasiItemtnt) {
                                                                                    $rataRataMistnt[$lokasiItemtnt] = hitungRataRatatnt($ratamistnt, 'h', $lokasiItemtnt);
                                                                                    $rataRataMsstnt[$lokasiItemtnt] = hitungRataRatatnt($ratamsstnt, 'k', $lokasiItemtnt);
                                                                                }
                                                                            @endphp

                                                                                <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Telkom Group</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMsstnt['Telkom'],2) }}</span>                                                            
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                
                                                                                            
                                                                                            <span class="text-gray-800 fw-bold fs-6 me-1">{{ round($rataRataMistnt['Telkom'],2) }}</span>  
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMsstnt['Telkom'] - $rataRataMistnt['Telkom'],2) }}</span>                                                            
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Non-Telkom</span>                                            
                                                                                    </td>
                                                        
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMsstnt['Non-Telkom'],2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($rataRataMistnt['Non-Telkom'],2) }}</span>                              
                                                                                             
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($rataRataMsstnt['Non-Telkom'] - $rataRataMistnt['Non-Telkom'],2) }}</span>                                                        
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="" colspan="2">
                                                                                        <span class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Nasional</span>                                            
                                                                                    </td>
                                                                                    @php
                                                                                        $rataRataH = [];
                                                                                        $rataRataK = [];

                                                                                        for ($i = 1; $i <= 20; $i++) {
                                                                                            $kolomH = 'h' . $i;
                                                                                            $kolomK = 'k' . $i;
                                                                                            
                                                                                            $rataRataH[] = $averagesnas[$kolomH]; //mis
                                                                                            $rataRataK[] = $averagesall[$kolomK]; //mss
                                                                                        }

                                                                                        $mssnas = count($rataRataK) > 0 ? array_sum($rataRataK) / count($rataRataK) : 0;
                                                                                        $misnas = count($rataRataH) > 0 ? array_sum($rataRataH) / count($rataRataH) : 0;

                                                                                    @endphp 
                                                                                    <td class="pe-0" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">                                     
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($mssnas,2) }}</span>                                                         
                                                                                        </div>                                                          
                                                                                    </td>
                                                        
                                                                                    <td class="" colspan="2">                                
                                                                                        <div class="d-flex justify-content-end">  
                                                                                            <span class="text-dark fw-bold fs-6 me-3">{{ round($misnas,2) }}</span> 
                                                                                            <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">{{ round($mssnas-$misnas,2) }}</span>                                                        
                                                                                        </div>                                                          
                                                                                    </td>
                                                                                </tr>
                                                                                            </tbody>
                                                                        <!--end::Table body-->
                                                                    </table>
                                                                    <!--end::Table-->
                                                                </div>
                                                                <!--end::Table container-->
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Table Widget 9-->    </div>
                                                            <!--end::Col-->
                                                        
                                                             <!--begin::Col-->
                                                             <div class="col-xl-6 mb-5 mb-xl-10">
                                                                
                                                        <!--begin::Table widget 10-->
                                                        <div class="card card-flush h-xl-100">
                                                            <div class="card-header pt-5">        
                                                                <!--begin::Title-->
                                                                <h3 class="card-title align-items-start flex-column">
                                                                    <span class="card-label fw-bold text-gray-800">Result IPA Telkom Group & Non-Telkom ({{ $year }})</span>
                                                                    
                                                                    <span class="text-gray-400 pt-1 fw-semibold fs-6"><i>Importance Performance Analysis (IPA)</i></span>
                                                                </h3>
                                                                <!--end::Title-->
                                                        
                                                                
                                                            </div>
                                                            <div class="card-body">
                                                                <div id="gap" style="height: 300px;"></div>
                                                            </div>
                                                        </div>
                                                        <!--end::Table Widget 10-->    </div>
                                                            <!--end::Col-->
                                                    </div>
                                                        <!--end::Row-->
                                                    
                                                    
                                                        <div class="row gy-5 g-xl-10">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-12 mb-xl-10">
                                                                
                                                        <!--begin::List widget 16-->
                                                        <div class="card card-flush h-xl-100">
                                                            <!--begin::Header-->
                                                            <div class="card-header pt-7">
                                                                <!--begin::Title-->
                                                                <h3 class="card-title align-items-start flex-column">
                                                                    <span class="card-label fw-bold text-gray-800">Result IPA ALL Laboratorium Kalibrasi Telkom</span>
                                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6"><i>Importance Performance Analysis (IPA)</i>
                                                                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="<img src='/ipa/ipa.png'/>">
                                                                                                                        
                                                                        <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <circle fill="#f1416c" cx="12" cy="12" r="10"/>
                                                                            <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#ffffff"/>
                                                                        </g>
                                                                        </svg>
                                                                        </span>
                                                                    </span>
                                                                </h3>
                                                                <!--end::Title-->
                                                        
                                                                {{-- <!--begin::Toolbar-->
                                                                <div class="card-toolbar">   
                                                                    <a href="#" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' data-bs-custom-class="tooltip-inverse" title="Delivery App is coming soon">View All</a>             
                                                                </div>
                                                                <!--end::Toolbar--> --}}
                                                            </div>
                                                            <!--end::Header-->
                                                        
                                                            <!--begin::Body-->
                                                            <div class="card-body pt-4 px-0">       
                                                                <!--begin::Nav-->             
                                                                <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
                                                                    <!--begin::Item--> 
                                                                    <li class="nav-item">
                                                                        <!--begin::Link--> 
                                                                        <a class="nav-link active  d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_1">                   
                                                                            <!--begin::Subtitle-->
                                                                            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Lab. Medan
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
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Lab. Jakarta
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
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Lab. Surabaya  
                                                                            </span> 
                                                                            <!--end::Subtitle-->
                                                                            
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                            <!--end::Bullet-->
                                                                        </a>
                                                                        <!--end::Link-->                
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <!--begin::Link--> 
                                                                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_4">                   
                                                                            <!--begin::Subtitle-->
                                                                            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Lab. Makassar  
                                                                            </span> 
                                                                            <!--end::Subtitle-->
                                                                            
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                            <!--end::Bullet-->
                                                                        </a>
                                                                        <!--end::Link-->                
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <!--begin::Link--> 
                                                                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_5">                   
                                                                            <!--begin::Subtitle-->
                                                                            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Telkom Group  
                                                                            </span> 
                                                                            <!--end::Subtitle-->
                                                                            
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                            <!--end::Bullet-->
                                                                        </a>
                                                                        <!--end::Link-->                
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <!--begin::Link--> 
                                                                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_6">                   
                                                                            <!--begin::Subtitle-->
                                                                            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Non-Telkom  
                                                                            </span> 
                                                                            <!--end::Subtitle-->
                                                                            
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                                                            <!--end::Bullet-->
                                                                        </a>
                                                                        <!--end::Link-->                
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <!--begin::Link--> 
                                                                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_7">                   
                                                                            <!--begin::Subtitle-->
                                                                            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"/>
                                                                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                                                        <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                                Nasional  
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
                                                                            <div class="card-toolbar mb-2">
                                                                                <span 
                                                                                  data-bs-toggle="tooltip" 
                                                                                  data-bs-placement="right" 
                                                                                  data-bs-html="true" 
                                                                                  title="<img src='/ipa/medan{{ $year }}.png' width='400' height='269'/>"
                                                                                  class="btn btn-sm btn-danger">
                                                                                  Graphic IPA
                                                                                </span>

                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k1'] - $ratamis['Lab Medan']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k2'] - $ratamis['Lab Medan']['h2'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k3'] - $ratamis['Lab Medan']['h3'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k4'] - $ratamis['Lab Medan']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k5'] - $ratamis['Lab Medan']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k6'] - $ratamis['Lab Medan']['h6'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k7'] - $ratamis['Lab Medan']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k8'] - $ratamis['Lab Medan']['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k9'] - $ratamis['Lab Medan']['h9'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k10'] - $ratamis['Lab Medan']['h10'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k11'] - $ratamis['Lab Medan']['h11'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k12'] - $ratamis['Lab Medan']['h12'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k13'] - $ratamis['Lab Medan']['h13'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k14'] - $ratamis['Lab Medan']['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k15'] - $ratamis['Lab Medan']['h15'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k16'] - $ratamis['Lab Medan']['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k17'] - $ratamis['Lab Medan']['h17'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k18'] - $ratamis['Lab Medan']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k19'] - $ratamis['Lab Medan']['h19'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Medan']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Medan']['k20'] - $ratamis['Lab Medan']['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMss['Lab Medan'],2) }}</td>
                                                                                        <td>{{ round($rataRataMis['Lab Medan'],2) }}</td>
                                                                                        <td>{{ round($rataRataMss['Lab Medan'] - $rataRataMis['Lab Medan'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->
                                                                        
                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_2">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/jakarta{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k1'] - $ratamis['Lab Jakarta']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k2'] - $ratamis['Lab Jakarta']['h2'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k3'] - $ratamis['Lab Jakarta']['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k4'] - $ratamis['Lab Jakarta']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k5'] - $ratamis['Lab Jakarta']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k6'] - $ratamis['Lab Jakarta']['h6'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k7'] - $ratamis['Lab Jakarta']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k8'] - $ratamis['Lab Jakarta']['h8'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k9'] - $ratamis['Lab Jakarta']['h9'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k10'] - $ratamis['Lab Jakarta']['h10'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k11'] - $ratamis['Lab Jakarta']['h11'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k12'] - $ratamis['Lab Jakarta']['h12'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k13'] - $ratamis['Lab Jakarta']['h13'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k14'] - $ratamis['Lab Jakarta']['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k15'] - $ratamis['Lab Jakarta']['h15'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k16'] - $ratamis['Lab Jakarta']['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k17'] - $ratamis['Lab Jakarta']['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k18'] - $ratamis['Lab Jakarta']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k19'] - $ratamis['Lab Jakarta']['h19'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Jakarta']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Jakarta']['k20'] - $ratamis['Lab Jakarta']['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMss['Lab Jakarta'],2) }}</td>
                                                                                        <td>{{ round($rataRataMis['Lab Jakarta'],2) }}</td>
                                                                                        <td>{{ round($rataRataMss['Lab Jakarta'] - $rataRataMis['Lab Jakarta'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->

                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_3">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/surabaya{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k1'] - $ratamis['Lab Surabaya']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k2'] - $ratamis['Lab Surabaya']['h2'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k3'] - $ratamis['Lab Surabaya']['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k4'] - $ratamis['Lab Surabaya']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k5'] - $ratamis['Lab Surabaya']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k6'] - $ratamis['Lab Surabaya']['h6'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k7'] - $ratamis['Lab Surabaya']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k8'] - $ratamis['Lab Surabaya']['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k9'] - $ratamis['Lab Surabaya']['h9'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k10'] - $ratamis['Lab Surabaya']['h10'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k11'] - $ratamis['Lab Surabaya']['h11'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k12'] - $ratamis['Lab Surabaya']['h12'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k13'] - $ratamis['Lab Surabaya']['h13'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k14'] - $ratamis['Lab Surabaya']['h14'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k15'] - $ratamis['Lab Surabaya']['h15'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k16'] - $ratamis['Lab Surabaya']['h16'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k17'] - $ratamis['Lab Surabaya']['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k18'] - $ratamis['Lab Surabaya']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k19'] - $ratamis['Lab Surabaya']['h19'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Surabaya']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Surabaya']['k20'] - $ratamis['Lab Surabaya']['h20'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMss['Lab Surabaya'],2) }}</td>
                                                                                        <td>{{ round($rataRataMis['Lab Surabaya'],2) }}</td>
                                                                                        <td>{{ round($rataRataMss['Lab Surabaya'] - $rataRataMis['Lab Surabaya'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->

                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_4">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/makassar{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k1'] - $ratamis['Lab Makassar']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k2'] - $ratamis['Lab Makassar']['h2'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k3'] - $ratamis['Lab Makassar']['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k4'] - $ratamis['Lab Makassar']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k5'] - $ratamis['Lab Makassar']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k6'] - $ratamis['Lab Makassar']['h6'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k7'] - $ratamis['Lab Makassar']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k8'] - $ratamis['Lab Makassar']['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k9'] - $ratamis['Lab Makassar']['h9'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k10'] - $ratamis['Lab Makassar']['h10'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k11'] - $ratamis['Lab Makassar']['h11'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k12'] - $ratamis['Lab Makassar']['h12'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k13'] - $ratamis['Lab Makassar']['h13'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k14'] - $ratamis['Lab Makassar']['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k15'] - $ratamis['Lab Makassar']['h15'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k16'] - $ratamis['Lab Makassar']['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k17'] - $ratamis['Lab Makassar']['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k18'] - $ratamis['Lab Makassar']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k19'] - $ratamis['Lab Makassar']['h19'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamis['Lab Makassar']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamss['Lab Makassar']['k20'] - $ratamis['Lab Makassar']['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMss['Lab Makassar'],2) }}</td>
                                                                                        <td>{{ round($rataRataMis['Lab Makassar'],2) }}</td>
                                                                                        <td>{{ round($rataRataMss['Lab Makassar'] - $rataRataMis['Lab Makassar'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->

                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_5">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/telkom{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k1'] - $ratamistnt['Telkom']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k2'] - $ratamistnt['Telkom']['h2'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k3'] - $ratamistnt['Telkom']['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k4'] - $ratamistnt['Telkom']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k5'] - $ratamistnt['Telkom']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k6'] - $ratamistnt['Telkom']['h6'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k7'] - $ratamistnt['Telkom']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k8'] - $ratamistnt['Telkom']['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k9'] - $ratamistnt['Telkom']['h9'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k10'] - $ratamistnt['Telkom']['h10'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k11'] - $ratamistnt['Telkom']['h11'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k12'] - $ratamistnt['Telkom']['h12'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k13'] - $ratamistnt['Telkom']['h13'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k14'] - $ratamistnt['Telkom']['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k15'] - $ratamistnt['Telkom']['h15'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k16'] - $ratamistnt['Telkom']['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k17'] - $ratamistnt['Telkom']['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k18'] - $ratamistnt['Telkom']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k19'] - $ratamistnt['Telkom']['h19'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Telkom']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Telkom']['k20'] - $ratamistnt['Telkom']['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMsstnt['Telkom'],2) }}</td>
                                                                                        <td>{{ round($rataRataMistnt['Telkom'],2) }}</td>
                                                                                        <td>{{ round($rataRataMsstnt['Telkom'] - $rataRataMistnt['Telkom'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->
                                                                        
                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_6">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/nontelkom{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k1'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h1'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k1'] - $ratamistnt['Non-Telkom']['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k2'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h2'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k2'] - $ratamistnt['Non-Telkom']['h2'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k3'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h3'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k3'] - $ratamistnt['Non-Telkom']['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k4'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h4'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k4'] - $ratamistnt['Non-Telkom']['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k5'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h5'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k5'] - $ratamistnt['Non-Telkom']['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k6'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h6'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k6'] - $ratamistnt['Non-Telkom']['h6'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k7'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h7'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k7'] - $ratamistnt['Non-Telkom']['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k8'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h8'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k8'] - $ratamistnt['Non-Telkom']['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k9'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h9'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k9'] - $ratamistnt['Non-Telkom']['h9'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k10'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h10'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k10'] - $ratamistnt['Non-Telkom']['h10'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k11'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h11'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k11'] - $ratamistnt['Non-Telkom']['h11'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k12'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h12'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k12'] - $ratamistnt['Non-Telkom']['h12'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k13'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h13'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k13'] - $ratamistnt['Non-Telkom']['h13'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k14'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h14'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k14'] - $ratamistnt['Non-Telkom']['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k15'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h15'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k15'] - $ratamistnt['Non-Telkom']['h15'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k16'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h16'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k16'] - $ratamistnt['Non-Telkom']['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k17'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h17'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k17'] - $ratamistnt['Non-Telkom']['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k18'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h18'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k18'] - $ratamistnt['Non-Telkom']['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k19'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h19'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k19'] - $ratamistnt['Non-Telkom']['h19'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k20'],2) }}</td>
                                                                                        <td>{{ round($ratamistnt['Non-Telkom']['h20'],2) }}</td>
                                                                                        <td>{{ round($ratamsstnt['Non-Telkom']['k20'] - $ratamistnt['Non-Telkom']['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($rataRataMsstnt['Non-Telkom'],2) }}</td>
                                                                                        <td>{{ round($rataRataMistnt['Non-Telkom'],2) }}</td>
                                                                                        <td>{{ round($rataRataMsstnt['Non-Telkom'] - $rataRataMistnt['Non-Telkom'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
                                                                        </div>
                                                                        <!--end::Tap pane-->

                                                                        <!--begin::Tap pane-->
                                                                        <div class="tab-pane fade" id="kt_list_widget_16_tab_7">
                                                                            <div class="card-toolbar mb-2">
                                                                                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="<img src='/ipa/nasional{{ $year }}.png' width='400' height='269'/>"
                                                                                    class="btn btn-sm btn-danger">Graphic IPA</span>
                                                                            </div>
                                                                            <table class="table" border="1px">
                                                                                <thead class="table-dark">
                                                                                    <tr style="vertical-align: middle;text-align:center">
                                                                                        <th rowspan="2">Dimensi</th>
                                                                                        <th rowspan="2">Peryataan</th>
                                                                                        <th colspan="1">Performance</th>
                                                                                        <th colspan="1">Importance</th>
                                                                                        <th rowspan="2">Gap</th>
                                                                                        <th rowspan="2">Keterangan</th>
                                                                                    </tr>
                                                                                    
                                                                                    <tr  style="vertical-align: middle;text-align:center">
                                                                                        <th>MSS (X)</th>
                                                                                        <th>MIS (Y)</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody style="text-align: center" class="table table-row-bordered">
                                                                                    <tr class="table-danger fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">01. Peralatan dan infrastruktur Lab Kalibrasi memadai.</td>
                                                                                        <td>{{ round($averagesall['k1'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h1'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k1'] - $averagesnas['h1'],2) }}</td>
                                                                                        <td>Prioritas 1</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">02. Memiliki sistem informasi yang memadai dan mudah diakses.</td>
                                                                                        <td>{{ round($averagesall['k2'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h2'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k2'] - $averagesnas['h2'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">03. Personel Kalibrasi berpenampilan rapi dan   menarik.</td>
                                                                                        <td>{{ round($averagesall['k3'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h3'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k3'] - $averagesnas['h3'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">04. Ruangan Customer Service representatif dan nyaman.</td>
                                                                                        <td>{{ round($averagesall['k4'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h4'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k4'] - $averagesnas['h4'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Tangible</td>
                                                                                        <td style="text-align: left">05. Personel bersikap ramah dan sopan kepada Plg. </td>
                                                                                        <td>{{ round($averagesall['k5'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h5'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k5'] - $averagesnas['h5'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">06. Personel LK peduli terhadap permintaan/kebutuhan Plg.</td>
                                                                                        <td>{{ round($averagesall['k6'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h6'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k6'] - $averagesnas['h6'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">07. Personel Kalibrasi peduli terhadap keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($averagesall['k7'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h7'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k7'] - $averagesnas['h7'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">08. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.</td>
                                                                                        <td>{{ round($averagesall['k8'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h8'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k8'] - $averagesnas['h8'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">09. Informasi yang disampaikan oleh Personel LK mudah dipahami.</td>
                                                                                        <td>{{ round($averagesall['k9'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h9'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k9'] - $averagesnas['h9'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Empathy</td>
                                                                                        <td style="text-align: left">10. Personel Kalibrasi mudah dihubungi.</td>
                                                                                        <td>{{ round($averagesall['k10'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h10'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k10'] - $averagesnas['h10'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">11. Personel LK cepat tanggap dlm menerima permintaan Plg.</td>
                                                                                        <td>{{ round($averagesall['k11'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h11'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k11'] - $averagesnas['h11'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">12. Personel LK cepat tanggap dlm menyelesaikan permintaan Plg.</td>
                                                                                        <td>{{ round($averagesall['k12'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h12'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k12'] - $averagesnas['h12'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td>Responsive</td>
                                                                                        <td style="text-align: left">13. Personel LK cepat tanggap dlm menangani keluhan (complain) Plg.</td>
                                                                                        <td>{{ round($averagesall['k13'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h13'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k13'] - $averagesnas['h13'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">14. LK memberikan layanan yg sesuai dgn standar mutu ISO-17025.</td>
                                                                                        <td>{{ round($averagesall['k14'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h14'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k14'] - $averagesnas['h14'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">15. LK memberikan  layanan yg tepat ssi dgn spesifikasi yg diminta.</td>
                                                                                        <td>{{ round($averagesall['k15'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h15'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k15'] - $averagesnas['h15'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">16. LK memberikan layanan  dgn mekanisme sesuai kontrak/ PO.</td>
                                                                                        <td>{{ round($averagesall['k16'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h16'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k16'] - $averagesnas['h16'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">17. LK memberikan layanan  sesuai dgn  jumlah yang diminta Plg.</td>
                                                                                        <td>{{ round($averagesall['k17'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h17'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k17'] - $averagesnas['h17'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Reliability</td>
                                                                                        <td style="text-align: left">18. LK memberikan layanan yg dpt dipertanggungjawabkan scr legal.</td>
                                                                                        <td>{{ round($averagesall['k18'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h18'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k18'] - $averagesnas['h18'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-warning fw-bold">
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">19. LK dapat memberikan kepastian.</td>
                                                                                        <td>{{ round($averagesall['k19'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h19'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k19'] - $averagesnas['h19'],2) }}</td>
                                                                                        <td>Prioritas 2</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Assurance</td>
                                                                                        <td style="text-align: left">20. Personel LK mempunyai kompetensi yang memadai.</td>
                                                                                        <td>{{ round($averagesall['k20'],2) }}</td>
                                                                                        <td>{{ round($averagesnas['h20'],2) }}</td>
                                                                                        <td>{{ round($averagesall['k20'] - $averagesnas['h20'],2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr class="table-dark text-white">
                                                                                        <td colspan="2">Average</td>
                                                                                        <td>{{ round($mssnas,2) }}</td>
                                                                                        <td>{{ round($misnas,2) }}</td>
                                                                                        <td>{{ round($mssnas - $misnas,2) }}</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                
                                                                            </table>       
                                                                                
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
                                                        

                                                        
                            <!--end::Content container-->
                            </div>

<!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">Buatan anak bangsa dengan 
                                    <span class="svg-icon svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="currentColor" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                </span></span>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
                                <span class="text-muted font-weight-bold mr-2">Copyright © {{ $year }}</span>  Atemis 2.0, All rights reserved.
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
<!--end::Footer-->                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::content-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>

    @php
    $csi_medan = $totalWS['Lab Medan'] / 5 * 100;
    $csi_jakarta = $totalWS['Lab Jakarta'] / 5 * 100;
    $csi_surabaya = $totalWS['Lab Surabaya'] / 5 * 100;
    $csi_makassar = $totalWS['Lab Makassar'] / 5 * 100;
    $csi_telkom = $totalWStnt['Telkom'] / 5 * 100;
    $csi_nontelkom = $totalWStnt['Non-Telkom'] / 5 * 100;
    $csi_all = $totalWSnas / 5 * 100;

    // Data Anda dalam format PHP
    $data = [
        [
            "lokasi" => "Lab Medan",
            "2023" => 81.5,
            "2024" => 87,
            "2025" => round($csi_medan),2, // Masukkan nilai $csi Medan
        ],
        [
            "lokasi" => "Lab Jakarta",
            "2023" => 82.5,
            "2024" => 89,
            "2025" => round($csi_jakarta),2, // Masukkan nilai $csi Jakarta
        ],
        [
            "lokasi" => "Lab Surabaya",
            "2023" => 90.5,
            "2024" => 92,
            "2025" => round($csi_surabaya),2, // Masukkan nilai $csi Surabaya
        ],
        [
            "lokasi" => "Lab Makassar",
            "2023" => 88.5,
            "2024" => 89,
            "2025" => round($csi_makassar),2, // Masukkan nilai $csi Makassar
        ],
    ];
    $tnt = [
        [
            "lokasi" => "Telkom Group",
            "2024" => 90,
            "2025" => round($csi_telkom),2, // Masukkan nilai $csi Medan
        ],
        [
            "lokasi" => "Non-Telkom",
            "2024" => 87,
            "2025" => round($csi_nontelkom),2, // Masukkan nilai $csi Jakarta
        ],
        [
            "lokasi" => "Nasional",
            "2024" => 90,
            "2025" => round($csi_all),2, // Masukkan nilai $csi Jakarta
        ],
    ];
    $gap = [[
                "year"=> "Lab Medan",
                "harapan"=>  round($rataRataMis['Lab Medan'],2) ,
                "kinerja"=>  round($rataRataMss['Lab Medan'],2) ,
                "gap"=>  round((-1*($rataRataMss['Lab Medan'] - $rataRataMis['Lab Medan'])),2) ,
                ], [
                "year"=> "Lab Jakarta",
                "harapan"=>  round($rataRataMis['Lab Jakarta'],2) ,
                "kinerja"=>  round($rataRataMss['Lab Jakarta'],2) ,
                "gap"=>  round((-1*($rataRataMss['Lab Jakarta'] - $rataRataMis['Lab Jakarta'])),2),
                ], [
                "year"=> "Lab Surabaya",
                "harapan"=>  round($rataRataMis['Lab Surabaya'],2) ,
                "kinerja"=>  round($rataRataMss['Lab Surabaya'],2) ,
                "gap"=>  round((-1*($rataRataMss['Lab Surabaya'] - $rataRataMis['Lab Surabaya'])),2),
                ], [
                "year"=> "Lab Makassar",
                "harapan"=>  round($rataRataMis['Lab Makassar'],2) ,
                "kinerja"=>  round($rataRataMss['Lab Makassar'],2) ,
                "gap"=>  round((-1*($rataRataMss['Lab Makassar'] - $rataRataMis['Lab Makassar'])),2),
                ], [
                "year"=> "Telkom Group",
                "harapan"=>  round($rataRataMistnt['Telkom'],2) ,
                "kinerja"=>  round($rataRataMsstnt['Telkom'],2) ,
                "gap"=>  round((-1*($rataRataMsstnt['Telkom'] - $rataRataMistnt['Telkom'])),2) ,
                ], [
                "year"=> "Non-Telkom",
                "harapan"=>  round($rataRataMistnt['Non-Telkom'],2) ,
                "kinerja"=>  round($rataRataMsstnt['Non-Telkom'],2) ,
                "gap"=>  round((-1*($rataRataMsstnt['Non-Telkom'] - $rataRataMistnt['Non-Telkom'])),2) ,
                ], [
                "year"=> "Nasional",
                "harapan"=>  round($misnas,2) ,
                "kinerja"=>  round($mssnas,2) ,
                "gap"=>  round((-1*($mssnas-$misnas)),2) ,
    ]];

    // Konversi data PHP menjadi format JSON yang akan digunakan dalam skrip JavaScript
    $tnt_json = json_encode($tnt);
    $gap_json = json_encode($gap);
    $data_json = json_encode($data);
@endphp
<div id="data-container" data-data='<?php echo $data_json = json_encode($data); ?>'></div>
<div id="tnt-container" data-tnt='<?php echo $tnt_json = json_encode($tnt); ?>'></div>
<div id="gap-container" data-gap='<?php echo $gap_json = json_encode($gap); ?>'></div>
<script>
    var hostUrl = "assets/";
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    am5.ready(function() {
            
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );

        var data =  JSON.parse(document.getElementById('data-container').getAttribute('data-data'));;
        

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "lokasi",
        renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9
        }),
        tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.labelsContainer.set("tooltip", am5.Tooltip.new(root, {
        pointerOrientation: "down"
        }));

        var xRenderer = xAxis.get("renderer");

        xRenderer.labels.template.setAll({
        tooltipText: "{lokasi}",
        oversizedBehavior: "truncate",
        maxWidth: 100
        });

        xRenderer.labels.template.setup = function(target) {
        target.set("background", am5.Rectangle.new(root, {
            fill: am5.color(0x000000),
            fillOpacity: 0
        }));
        };

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "lokasi"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
        });

        series.bullets.push(function () {
            return am5.Bullet.new(root, {
            locationY: 0.5,
            sprite: am5.Label.new(root, {
                text: "{valueY} %",
                fill: root.interfaceColors.get("alternativeText"),
                centerY: am5.p50,
                centerX: am5.p50,
                populateText: true,
                
            })
            });
        });

        series.data.setAll(data);
        series.appear();
        legend.data.push(series);
        }

        makeSeries("2023", "2023");
        makeSeries("2024", "2024");
        makeSeries("2025", "2025");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {
            
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdivo");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root.verticalLayout
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50
        })
        );

        var data =  JSON.parse(document.getElementById('tnt-container').getAttribute('data-tnt'));;
        

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "lokasi",
        renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9
        }),
        tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.labelsContainer.set("tooltip", am5.Tooltip.new(root, {
        pointerOrientation: "down"
        }));

        var xRenderer = xAxis.get("renderer");

        xRenderer.labels.template.setAll({
        tooltipText: "{lokasi}",
        oversizedBehavior: "truncate",
        maxWidth: 100
        });

        xRenderer.labels.template.setup = function(target) {
        target.set("background", am5.Rectangle.new(root, {
            fill: am5.color(0x000000),
            fillOpacity: 0
        }));
        };

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "lokasi"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
        });

        series.bullets.push(function () {
            return am5.Bullet.new(root, {
            locationY: 0.5,
            sprite: am5.Label.new(root, {
                text: "{valueY} %",
                fill: root.interfaceColors.get("alternativeText"),
                centerY: am5.p50,
                centerX: am5.p50,
                populateText: true,
                
            })
            });
        });

        series.data.setAll(data);
        series.appear();
        legend.data.push(series);
        }

        makeSeries("2024", "2024");
        makeSeries("2025", "2025");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {


    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("gap");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
    orientation: "horizontal"
    }));

    
    var data =  JSON.parse(document.getElementById('gap-container').getAttribute('data-gap'));;

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, {});
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "year",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
    }));

    xRenderer.grid.template.setAll({
    location: 1
    })

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    min: 0,
    max: 100,
    numberFormat: "#'%'",
    strictMinMax: true,
    calculateTotals: true,
    renderer: am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
    })
    }));


    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(am5.Legend.new(root, {
    centerX: am5.p50,
    x: am5.p50
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        stacked: true,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        valueYShow: "valueYTotalPercent",
        categoryXField: "year"
    }));

    series.columns.template.setAll({
        tooltipText: "{name}, {categoryX}:{valueYTotalPercent.formatNumber('#.#')}%",
        tooltipY: am5.percent(10)
    });
    series.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();

    series.bullets.push(function() {
        return am5.Bullet.new(root, {
        sprite: am5.Label.new(root, {
            text: "{valueY} %",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: am5.p50,
            centerX: am5.p50,
            populateText: true
        })
        });
    });

    legend.data.push(series);
    }

    makeSeries("Kinerja", "kinerja");
    makeSeries("Harapan", "harapan");
    makeSeries("Gap", "gap");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {
    
    var data = [{
      "x": 10,
      "y": 14,
      "errorX": 3,
      "errorY": 4
    }, {
      "x": 0,
      "y": 0,
      "errorX": 2,
      "errorY": 6
    }, {
      "x": -10,
      "y": 3,
      "errorX": 0.8,
      "errorY": 3.5
    }, {
      "x": -6,
      "y": 5,
      "errorX": 1.2,
      "errorY": 4.2
    }, {
      "x": 11,
      "y": -4,
      "errorX": 2.4,
      "errorY": 3.9
    }, {
      "x": 13,
      "y": 1,
      "errorX": 1.5,
      "errorY": 3.3
    }, {
      "x": 1,
      "y": 6,
      "errorX": 2,
      "errorY": 3.3
    }];
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelY: "zoomXY",
      pinchZoomX:true,
      pinchZoomY:true
    }));
    
    chart.get("colors").set("step", 2);
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
      extraMax: 0.2,
      extraMin: 0.2,
      renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 50 }),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      extraMax: 0.2,
      extraMin: 0.2,
      renderer: am5xy.AxisRendererY.new(root, {}),
      tooltip: am5.Tooltip.new(root, {})
    }));
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.LineSeries.new(root, {
      calculateAggregates: true,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "y",
      valueXField: "x",
      tooltip: am5.Tooltip.new(root, {
        labelText: "x: {valueX}\ny: {valueY}\nerrorX: {errorX}\nerrorY: {errorY}"
      })
    }));
    
    // add error bullet
    series.bullets.push(function() {
      var graphics = am5.Graphics.new(root, {
        strokeWidth: 2,
        stroke: series.get("stroke"),
        draw: function(display, target) {
          var dataItem = target.dataItem;
          var errorX = dataItem.dataContext.errorX;
    
          var xPosition0 = xAxis.valueToPosition(0);
          var xPosition1 = xAxis.valueToPosition(errorX);
    
          var width = (xAxis.get("renderer").positionToCoordinate(xPosition1) - xAxis.get("renderer").positionToCoordinate(xPosition0)) / 2;
    
          display.moveTo(-width, 0);
          display.lineTo(width, 0);
    
          display.moveTo(-width, -10);
          display.lineTo(-width, 10);
    
          display.moveTo(width, -10);
          display.lineTo(width, 10);
    
          var errorY = dataItem.dataContext.errorY;
    
          var yPosition0 = yAxis.valueToPosition(0);
          var yPosition1 = yAxis.valueToPosition(errorY);
    
          var height = (yAxis.get("renderer").positionToCoordinate(yPosition1) - yAxis.get("renderer").positionToCoordinate(yPosition0)) / 2;
    
          display.moveTo(0, -height);
          display.lineTo(0, height);
    
          display.moveTo(-10, -height);
          display.lineTo(10, -height);
    
          display.moveTo(-10, height);
          display.lineTo(10, height);
        }
      });
    
      return am5.Bullet.new(root, {
        dynamic: true,
        sprite: graphics
      });
    });
    
    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    series.bullets.push(function() {
      var graphics = am5.Circle.new(root, {
        strokeWidth: 2,
        radius: 5,
        stroke: series.get("stroke"),
        fill: root.interfaceColors.get("background"),
      });
      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });
    
    series.strokes.template.set("strokeOpacity", 0);
    
    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    chart.set("cursor", am5xy.XYCursor.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      snapToSeries: [series]
    }));
    
    // Add scrollbars
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set("scrollbarX", am5.Scrollbar.new(root, {
      orientation: "horizontal"
    }));
    
    chart.set("scrollbarY", am5.Scrollbar.new(root, {
      orientation: "vertical"
    }));
    
    series.data.setAll(data);
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
    
    }); // end am5.ready()
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalId = 'ipaChartModal';

    if (!document.getElementById(modalId)) {
        document.body.insertAdjacentHTML('beforeend', `
            <div class="modal fade" id="${modalId}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Grafik Penyebaran IPA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-white">
                            <div id="ipaChartModalBody" class="w-100 overflow-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        `);
    }

    function parseNumber(value) {
        var number = parseFloat(String(value || '').replace(',', '.').replace(/[^\d.-]/g, ''));
        return Number.isFinite(number) ? number : null;
    }

    function chartDataFromTable(table) {
        var rows = Array.from(table.querySelectorAll('tbody tr'));
        var averageRow = rows.find(function (row) {
            var firstCell = row.querySelector('td');
            return firstCell && firstCell.textContent.trim().toLowerCase() === 'average';
        });

        if (!averageRow) {
            return null;
        }

        var averageCells = averageRow.querySelectorAll('td');
        var firstAverageCellSpan = parseInt(averageCells[0] && averageCells[0].getAttribute('colspan'), 10) || 1;
        var avgPerformanceIndex = firstAverageCellSpan > 1 ? 1 : 2;
        var avgImportanceIndex = firstAverageCellSpan > 1 ? 2 : 3;
        var avgPerformance = parseNumber(averageCells[avgPerformanceIndex] && averageCells[avgPerformanceIndex].textContent);
        var avgImportance = parseNumber(averageCells[avgImportanceIndex] && averageCells[avgImportanceIndex].textContent);
        var points = [];

        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            if (cells.length < 6 || cells[0].textContent.trim().toLowerCase() === 'average') {
                return;
            }

            var match = cells[1].textContent.match(/^\s*(\d+)/);
            var performance = parseNumber(cells[2].textContent);
            var importance = parseNumber(cells[3].textContent);

            if (!match || performance === null || importance === null) {
                return;
            }

            points.push({
                number: parseInt(match[1], 10),
                performance: performance,
                importance: importance,
                priority: cells[5].textContent.trim()
            });
        });

        return {
            avgPerformance: avgPerformance,
            avgImportance: avgImportance,
            points: points
        };
    }

    function renderIpaChart(table) {
        var data = chartDataFromTable(table);
        var container = document.getElementById('ipaChartModalBody');

        if (!data || !data.points.length) {
            container.innerHTML = '<div class="text-center text-muted py-10">Data IPA tidak tersedia.</div>';
            return;
        }

        var width = 1120;
        var height = 650;
        var padding = {left: 82, right: 42, top: 48, bottom: 72};
        var xs = data.points.map(function (point) { return point.performance; }).concat([data.avgPerformance]);
        var ys = data.points.map(function (point) { return point.importance; }).concat([data.avgImportance]);
        var minX = Math.min.apply(null, xs);
        var maxX = Math.max.apply(null, xs);
        var minY = Math.min.apply(null, ys);
        var maxY = Math.max.apply(null, ys);
        var xPad = Math.max((maxX - minX) * 0.14, 0.03);
        var yPad = Math.max((maxY - minY) * 0.14, 0.03);
        minX -= xPad;
        maxX += xPad;
        minY -= yPad;
        maxY += yPad;

        function x(value) {
            return padding.left + ((value - minX) / (maxX - minX || 1)) * (width - padding.left - padding.right);
        }

        function y(value) {
            return height - padding.bottom - ((value - minY) / (maxY - minY || 1)) * (height - padding.top - padding.bottom);
        }

        function fmt(value) {
            return Number(value).toFixed(2).replace(/\.?0+$/, '');
        }

        var avgX = x(data.avgPerformance);
        var avgY = y(data.avgImportance);
        var pointSvg = data.points.map(function (point) {
            var cx = x(point.performance);
            var cy = y(point.importance);
            var labelClass = point.priority === 'Prioritas 1' ? '#ffd9df' : (point.priority === 'Prioritas 2' ? '#fff1c7' : '#ffffff');

            return `
                <circle cx="${cx}" cy="${cy}" r="5.5" fill="#3f7fc1"></circle>
                <rect x="${cx + 9}" y="${cy - 19}" width="72" height="26" rx="2" fill="${labelClass}" opacity="0.95"></rect>
                <text x="${cx + 16}" y="${cy - 1}" font-size="16" fill="#444">${point.number}; ${fmt(point.importance)}</text>
            `;
        }).join('');

        container.innerHTML = `
            <svg viewBox="0 0 ${width} ${height}" class="w-100" role="img" aria-label="Grafik penyebaran IPA">
                <rect x="0" y="0" width="${width}" height="${height}" fill="#fff"></rect>
                <line x1="${padding.left}" y1="${avgY}" x2="${width - padding.right}" y2="${avgY}" stroke="red" stroke-width="4"></line>
                <line x1="${avgX}" y1="${padding.top}" x2="${avgX}" y2="${height - padding.bottom}" stroke="red" stroke-width="4"></line>
                <rect x="${padding.left}" y="${padding.top}" width="${width - padding.left - padding.right}" height="${height - padding.top - padding.bottom}" fill="none" stroke="#d6d0bf" stroke-width="1.5"></rect>
                ${pointSvg}
                <text x="${width / 2}" y="${height - 24}" text-anchor="middle" font-size="20" fill="#555">Performance / Kinerja</text>
                <text x="24" y="${height / 2}" text-anchor="middle" transform="rotate(-90 24 ${height / 2})" font-size="20" fill="#555">Importance / Harapan</text>
                <text x="${avgX + 8}" y="${padding.top + 22}" font-size="13" fill="#b00000">Avg X ${fmt(data.avgPerformance)}</text>
                <text x="${width - padding.right - 110}" y="${avgY - 8}" font-size="13" fill="#b00000">Avg Y ${fmt(data.avgImportance)}</text>
            </svg>
        `;
    }

    document.querySelectorAll('[title*="/ipa/"]').forEach(function (trigger) {
        if (trigger.dataset.ipaButtonReady === '1') {
            return;
        }

        trigger.dataset.ipaButtonReady = '1';
        trigger.style.display = 'none';
        var button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn btn-sm btn-light-primary ms-2';
        button.textContent = 'Grafic IPA';

        button.addEventListener('click', function () {
            var tab = trigger.closest('.tab-pane');
            var table = tab && tab.querySelector('table');

            if (table) {
                renderIpaChart(table);
            }

            if (window.bootstrap && bootstrap.Modal) {
                bootstrap.Modal.getOrCreateInstance(document.getElementById(modalId)).show();
                return;
            }
        });

        trigger.insertAdjacentElement('afterend', button);
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    function parseNumber(value) {
        var number = parseFloat(String(value || '').replace(',', '.').replace(/[^\d.-]/g, ''));
        return Number.isFinite(number) ? number : null;
    }

    function getPriority(performance, importance, averagePerformance, averageImportance) {
        if (performance === null || importance === null || averagePerformance === null || averageImportance === null) {
            return '';
        }

        if (performance <= averagePerformance && importance > averageImportance) {
            return 'Prioritas 1';
        }

        if (performance < averagePerformance && importance <= averageImportance) {
            return 'Prioritas 2';
        }

        return '';
    }

    function tableScope(table) {
        var tab = table.closest('.tab-pane');
        var id = tab ? tab.id : '';
        var idMap = {
            kt_list_widget_16_tab_1: 'medan',
            kt_list_widget_16_tab_2: 'jakarta',
            kt_list_widget_16_tab_3: 'surabaya',
            kt_list_widget_16_tab_4: 'makassar',
            kt_list_widget_16_tab_5: 'telkom',
            kt_list_widget_16_tab_6: 'nontelkom',
            kt_list_widget_16_tab_7: 'nasional'
        };

        if (idMap[id]) {
            return idMap[id];
        }

        var tooltip = tab && tab.querySelector('[title*="/ipa/"]');
        var source = tooltip ? tooltip.getAttribute('title').toLowerCase() : table.textContent.toLowerCase();
        if (source.indexOf('nontelkom') !== -1 || source.indexOf('non-telkom') !== -1) return 'nontelkom';
        if (source.indexOf('nasional') !== -1) return 'nasional';
        if (source.indexOf('surabaya') !== -1) return 'surabaya';
        if (source.indexOf('makassar') !== -1) return 'makassar';
        if (source.indexOf('jakarta') !== -1) return 'jakarta';
        if (source.indexOf('medan') !== -1) return 'medan';
        if (source.indexOf('telkom') !== -1) return 'telkom';
        return null;
    }

    function questionNumber(row) {
        var cells = row.querySelectorAll('td');
        var match = cells[1] && cells[1].textContent.match(/^\s*(\d+)/);
        return match ? parseInt(match[1], 10) : null;
    }

    function applyPriorityCorrection(priority, scope, number) {
        if (@json((int) ($year ?? now()->year)) !== 2025) {
            return priority;
        }

        if (scope === 'nasional' && (number === 9 || number === 11)) {
            return '';
        }

        return priority;
    }

    document.querySelectorAll('table').forEach(function (table) {
        var hasPriorityColumn = Array.from(table.querySelectorAll('th')).some(function (header) {
            return header.textContent.trim().toLowerCase() === 'keterangan';
        });

        if (!hasPriorityColumn) {
            return;
        }

        var rows = Array.from(table.querySelectorAll('tbody tr'));
        var averageRow = rows.find(function (row) {
            var firstCell = row.querySelector('td');
            return firstCell && firstCell.textContent.trim().toLowerCase() === 'average';
        });

        if (!averageRow) {
            return;
        }

        var averageCells = averageRow.querySelectorAll('td');
        var firstAverageCellSpan = parseInt(averageCells[0] && averageCells[0].getAttribute('colspan'), 10) || 1;
        var averagePerformanceIndex = firstAverageCellSpan > 1 ? 1 : 2;
        var averageImportanceIndex = firstAverageCellSpan > 1 ? 2 : 3;
        var averagePerformance = parseNumber(averageCells[averagePerformanceIndex] && averageCells[averagePerformanceIndex].textContent);
        var averageImportance = parseNumber(averageCells[averageImportanceIndex] && averageCells[averageImportanceIndex].textContent);

        var scope = tableScope(table);

        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            if (cells.length < 6 || cells[0].textContent.trim().toLowerCase() === 'average') {
                return;
            }

            var performance = parseNumber(cells[2].textContent);
            var importance = parseNumber(cells[3].textContent);
            var priority = getPriority(performance, importance, averagePerformance, averageImportance);
            var number = questionNumber(row);
            var noteCell = cells[5];

            priority = applyPriorityCorrection(priority, scope, number);

            noteCell.textContent = priority;
            noteCell.classList.remove('text-danger', 'text-warning', 'fw-bold');
            row.classList.remove('table-danger', 'table-warning', 'fw-bold');

            if (priority === 'Prioritas 1') {
                noteCell.classList.add('text-danger', 'fw-bold');
                row.classList.add('table-danger', 'fw-bold');
            } else if (priority === 'Prioritas 2') {
                noteCell.classList.add('text-warning', 'fw-bold');
                row.classList.add('table-warning', 'fw-bold');
            }
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var previousYear = @json($previousYear ?? null);
    var previousMetrics = @json($previousTrendMetrics ?? []);

    if (!previousMetrics || previousMetrics.hasData === false) {
        return;
    }

    var upIcon = `
        <span class="svg-icon svg-icon-success svg-icon-2x" title="Naik dibanding ${previousYear}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/>
                    <path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="currentColor" fill-rule="nonzero"/>
                </g>
            </svg>
        </span>`;

    var downIcon = `
        <span class="svg-icon svg-icon-danger svg-icon-2x" title="Turun dibanding ${previousYear}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <rect fill="#000000" opacity="0.3" transform="translate(12.353553, 12.146447) rotate(-135.000000) translate(-12.353553, -12.146447) " x="11.3535534" y="5.14644661" width="2" height="14" rx="1"/>
                    <path d="M15.8890873,16.0961941 C16.441372,16.0961941 16.8890873,16.5439093 16.8890873,17.0961941 C16.8890873,17.6484788 16.441372,18.0961941 15.8890873,18.0961941 L7.40380592,18.0961941 C6.86841446,18.0961941 6.42800568,17.6745174 6.40474976,17.1396313 L6.05119637,9.00790332 C6.02720666,8.45613984 6.45505183,7.98939965 7.00681531,7.96540994 C7.55857879,7.94142022 8.02531897,8.36926539 8.04930869,8.92102887 L8.36127239,16.0961941 L15.8890873,16.0961941 Z" fill="currentColor" fill-rule="nonzero"/>
                </g>
            </svg>
        </span>`;

    var neutralIcon = '<span class="svg-icon svg-icon-muted svg-icon-2x" title="Sama dengan tahun sebelumnya"></span>';

    function parseNumber(value) {
        var number = parseFloat(String(value || '').replace(',', '.').replace(/[^\d.-]/g, ''));
        return Number.isFinite(number) ? number : null;
    }

    function metricKey(label) {
        if (label.indexOf('Total Kepentingan') !== -1) {
            return 'mis';
        }
        if (label.indexOf('Total Kinerja') !== -1) {
            return 'mss';
        }
        if (label.indexOf('Total Weighted Score') !== -1) {
            return 'ws';
        }
        if (label.trim() === 'CSI') {
            return 'csi';
        }
        return null;
    }

    function contextMetrics(text) {
        if (text.indexOf('Medan') !== -1) {
            return previousMetrics.labs && previousMetrics.labs['Lab Medan'];
        }
        if (text.indexOf('Jakarta') !== -1) {
            return previousMetrics.labs && previousMetrics.labs['Lab Jakarta'];
        }
        if (text.indexOf('Surabaya') !== -1) {
            return previousMetrics.labs && previousMetrics.labs['Lab Surabaya'];
        }
        if (text.indexOf('Makassar') !== -1) {
            return previousMetrics.labs && previousMetrics.labs['Lab Makassar'];
        }
        if (text.indexOf('Non-Telkom') !== -1) {
            return previousMetrics.customerTypes && previousMetrics.customerTypes['Non-Telkom'];
        }
        if (text.indexOf('Telkom Group') !== -1 || text.indexOf('Telkom') !== -1) {
            return previousMetrics.customerTypes && previousMetrics.customerTypes['Telkom'];
        }
        if (text.indexOf('Nasional') !== -1 || text.indexOf('ALL Laboratorium') !== -1) {
            return previousMetrics.national;
        }
        return null;
    }

    document.querySelectorAll('.d-flex.flex-stack').forEach(function (row) {
        var labelElement = row.children[0];
        var valueElement = row.children[row.children.length - 1];
        var label = labelElement ? labelElement.textContent.trim() : '';
        var key = metricKey(label);

        if (!key || !valueElement) {
            return;
        }

        var iconElement = valueElement.querySelector('.svg-icon-success.svg-icon-2x, .svg-icon-danger.svg-icon-2x');
        if (!iconElement) {
            return;
        }

        var current = parseNumber(valueElement.textContent);
        var card = row.closest('.card') || row.closest('.col-xl-3') || document.body;
        var metrics = contextMetrics(card.textContent);

        if (!metrics || typeof metrics[key] === 'undefined' || current === null) {
            return;
        }

        var previous = parseFloat(metrics[key]);
        var html = neutralIcon;

        if (current > previous) {
            html = upIcon;
        } else if (current < previous) {
            html = downIcon;
        }

        iconElement.outerHTML = html;
    });
});
</script>


<script src="/halamanadmin/analisis/plugins.bundle.js"></script>
<script src="/halamanadmin/analisis/scripts.bundle.js"></script>
<script src="/halamanadmin/analisis/documentation.js"></script>

<script src="https://calista.cloud/dashboards/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="/halamanadmin/analisis/datatables.bundle.js"></script>
<script src="/halamanadmin/js/widgets.bundle.js"></script>
<script src="/halamanadmin/analisis/widgets.js"></script>
<script src="/halamanadmin/analisis/apps/chat/chat.js"></script>
<script src="/halamanadmin/analisis/utilities/modals/upgrade-plan.js"></script>
<script src="/halamanadmin/analisis/utilities/modals/create-app.js"></script>
<script src="/halamanadmin/analisis/utilities/modals/new-target.js"></script>
<script src="/halamanadmin/analisis/utilities/modals/users-search.js"></script>  
</body>

</html>
