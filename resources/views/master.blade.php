<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="PT Telkom Indonesia (Persero) Tbk dari tahun 1995 sampai saat ini Telkom telah memiliki 4 Laboratorium Kalibrasi yang berada di Jakarta, Surabaya, Makasar dan Medan. Lab Kalibrasi Telkom juga telah terakreditasi oleh Komite Akreditasi Nasional (KAN) dengan Nomor Akreditasi LK 016 IDN, yang mengacu ke ISO/IEC 17025:2017." />
<meta name="author" content="https://www.themetechmount.com/" />
<meta name="viewport" content=" width=device-width, initial-scale=1, maximum-scale=1" />
<title>Lab Kalibrasi Telkom</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="images/facivon.png" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<!-- fontawesome -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css"> -->
<link rel="stylesheet" type="text/css" href="css/all.css">

<!-- themify -->
<link rel="stylesheet" type="text/css" href="css/themify-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css"/>

<!-- slick -->
<link rel="stylesheet" type="text/css" href="css/slick.css">

<!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">

    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="css/shortcodes.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="css/megamenu.css"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css"/>

<link rel="stylesheet" type="text/css" href="css/floating-wpp.min.css">
<link rel="stylesheet" href="/css/modal-video.min.css">
<style>
    textarea {
        padding: 10px;
        vertical-align: top;
        width: 200px;
    }
    textarea:focus {
        outline-style: solid;
        outline-width: 2px;
    }
</style>
</style>
</head>

<body>
    

    <!--page start-->
    <div class="page">

        <!-- preloader start -->
        <!-- <div id="preloader">
            <div id="status">&nbsp;</div>
        </div> -->
        <!-- preloader end -->       

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <!-- top_bar -->
            <div class="top_bar ttm-bgcolor-skincolor clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fa fa-phone"></i></div>021-21480341</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fal fa-envelope"></i></div><a href="mailto:yourdomain@gmail.com">labkalibrasi@telkom.co.id</a></div>
                            <div class="top_bar_contact_item ml-auto"><div class="top_bar_icon"><i class="fal fa-clock"></i></div>{{ __('header.Waktu')}}</div>
                            <nav class="main-menu menu-mobile" id="menu">
                                <ul class="menu">
                                    <li class="mega-menu-item">
                                    <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fal fa-globe"></i></div>ID</div>
                                        <ul class="mega-submenu">
                                            <li><a href="#"></i>English</a>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <a href="{{ route('artikel') }}"><div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fa fa-user"></i></div>{{ __('header.Login')}}</div></a>
                        </div>
                    </div>
                </div>
            </div><!-- top_bar end-->
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex flex-row">
                                    <!-- site-branding -->
                                    <div class="site-branding mr-auto">
                                        <a class="home-link" href="/" rel="home">
                                            <img id="logo-img" class="img-center" src="images/logo-img.png" alt="logo-img">
                                        </a>
                                    </div><!-- site-branding end -->
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item">
                                                <a href="/" class="mega-menu-link">Beranda</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="tentang-kami" class="mega-menu-link">Tentang Kami</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="tentang-kami">Profil Lab</a>
                                                    <li><a href="sertifikat-iso">Sertifikasi ISO 17025:2017</a></li>
                                                    <li><a href="struktur-organisasi">Struktur Organisasi</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="layanan-kalibrasi" class="mega-menu-link">Layanan</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="layanan-kalibrasi">Kalibrasi</a>
                                                    <li><a href="konsultasi">Konsultasi</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="#" class="mega-menu-link">info</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="ruanglingkup" class="mega-menu-link">Ruang Lingkup Kalibrasi</a>
                                                    <!-- <ul class="mega-submenu">
                                                        <li><a href="labjakarta">Lab Kalibrasi Jakarta</a>
                                                        <li><a href="labmedan">Lab Kalibrasi Medan</a></li>
                                                        <li><a href="labsurabaya">Lab Kalibrasi Surabaya</a></li>
                                                        <li><a href="labmakassar">Lab Kalibrasi Makassar</a></li>
                                                    </ul> -->
                                                    <!-- <li><a href="#">Tarif Kalibrasi</a></li> -->
                                                    <li><a href="#">Client Kami</a>
                                                    <li><a href="kritik-saran">Kritik & Saran</a>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="/artikel" class="mega-menu-link">Artikel</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="hubungi-kami" class="mega-menu-link">Hubungi Kami</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-icon-btn-left ttm-btn-color-grey" href="/tracking-order"> <i class="ti ti-target"></i>Tracking Order</a>
                                            <!-- <div id="appointment">
                                                <h3>Buat Jadwal Kalibrasi</h3>
                                                <form class="wrap-form appointment_form clearfix" method="post" action="#" id="tes">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="form-group">
                                                                <span class="text-input">
                                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                                    <input name="name" type="text" value="" placeholder="Nama Lengkap" required="required">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-group">
                                                                <span class="text-input">
                                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                                    <input name="phone" type="tel" value="" placeholder="Nomor Handphone" required="required">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-group">
                                                                <span class="text-input">
                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                    <input name="email" type="email" value="" placeholder="Email">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group date">
                                                                <span class="text-input">
                                                                    <i class="fa fa-calendar"></i>
                                                                    <input type="text" value="" id="datetimepicker1">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-group">
                                                                <span class="text-input">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                    <input name="Note" type="text" value="" placeholder="Catatan">
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor" type="submit">Buat Jadwal Kalibrasi</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> -->
                                    </div>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->
        </header><!--header end-->
        
        @yield('konten')

        
    <!--footer start-->
    <footer class="footer widget-footer clearfix">
        <div class="first-footer ttm-bgcolor-skincolor">
            <div class="container">
                <div class="row">
                <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Lab Kalibrasi Telkom</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Jl. Percetakan Negara No. 17-19, Jakarta Pusat</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                    <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Hubungi Kami</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Costumer Care: 021-21480341</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                    <div class="widget-area col-xs-12 col-sm-12 col-md-3 col-lg-4">
                        <aside class="widget widget-text">
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                        <i class="flaticon-email"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Email Kami</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p><a href="mailto:Supportteam@example.com">telkomkalibrasi@telkom.co.id</a></p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="third-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                        <div class="widget widget_text clearfix">
                            <div style="margin-left: 3em">
                                <img id="footer-logo-img" src="images/footer-logo.png" width="200">
                                <br>
                                <br>
                            </div>
                            <div class="textwidget widget-text">
                                <p class="pb-10 pr-30">Lab Kalibrasi Telkom telah mendapatkan sertifikat KAN ISO 17025:2017 dengan <br>nomor akreditasi LK 016 IDN</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                        <div class="widget widget_nav_menu clearfix">
                        <div class="mb-30">
                                <h4>Lokasi Lab Kalibrasi Telkom</h4>
                            </div>
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Lab Kalibrasi Jakarta</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Jl. Percetakan Negara No. 17-19, Jakarta Pusat 10570 Phone: 021-21480341</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                            <br>
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Lab Kalibrasi Medan</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Jl. Gaharu No.1 Medan bt 20235 Phone: 061-4531311</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end--> 
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area"> -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                        <div class="pt-45 res-991-pt-0 res-991-pb-30">
                            <div class="mb-30">
                                <br>
                            </div>
                            <!--featured-icon-box-->
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Lab Kalibrasi Surabaya</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Jl. Gayungan PTT No.17-19 Surabaya 60235 Phone: 031-8283678</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                            <br>
                            <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                        <i class="flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Lab Kalibrasi Makasar</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Jl. AP Pettarani No. 4 Makassar 90211 Phone: 0411-864444, 880444</p>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end-->
                        </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="bottom-footer-text">
            <div class="container">
                <div class="row copyright">
                    <div class="col-sm-9">
                        <span>Copyright © 2020 Laboratorium Calibration Telkom</span>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="d-flex flex-row align-items-center justify-content-end social-icons">
                            <ul class="social-icons list-inline">
                                <li class="social-facebook"><a class="tooltip-top" target="_blank" href="" data-tooltip="Facebook"><i class="ti ti-facebook"></i></a></li>
                                <li class="social-twitter"><a class="tooltip-top" target="_blank" href="" data-tooltip="Linkedin"><i class="ti ti-linkedin"></i></a></li>
                                <li class="social-instagram"><a class="tooltip-top" target="_blank" href="" data-tooltip="Google"><i class="ti ti-google"></i></a></li>
                                <li class="social-twitter"><a class="tooltip-top" target="_blank" href="" data-tooltip="twitter"><i class="ti ti-twitter-alt"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div id="WAButton"></div>
    </footer>
    
    <!--footer end-->

    <!--back-to-top start-->
    <!-- <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a> -->
    <!--back-to-top end-->

</div><!-- page end -->


    <!-- Javascript -->
    <script
	src="https://code.jquery.com/jquery-2.2.4.min.js"
	integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	crossorigin="anonymous"></script>
	<script src="../js/jquery-modal-video.min.js"></script>
	<script>
		$(".js-video-button").modalVideo({
			youtube:{
				controls:0,
				nocookie: true
			}
		});
	</script>

    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.easing.js"></script>    
    <script src="js/jquery-waypoints.js"></script>    
    <script src="js/jquery-validate.js"></script> 
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/numinate.min.js"></script>
    <script src="js/imagesloaded.min.js"></script>
    <script src="js/jquery-isotope.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="revolution/js/slider.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    

    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="js/floating-wpp.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: '+628987088921', //WhatsApp Business phone number International format-
                //Get it with Toky at https://toky.co/en/features/whatsapp.
                headerTitle: 'Hubungi kami lewat Whatsapp!', //Popup Title
                popupMessage: 'Selamat datang di Lab Kalibrasi Telkom, ada yang bisa kami bantu 😀?', //Popup Message
                showPopup: true, //Enables popup display
                buttonImage: '<img src="images/whatsapp.svg" />', //Button Image
                //headerColor: 'crimson', //Custom header color
                //backgroundColor: 'crimson', //Custom background button color
                position: "right"
            });
        });
    </script>

</body>
</html>