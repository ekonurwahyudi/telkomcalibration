<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Survey Performansi Mitra DSO" />
<meta name="description" content="Survey Performansi Mitra DSO." />
<meta name="author" content="https://www.themetechmount.com/" />
<meta name="viewport" content=" width=device-width, initial-scale=1, maximum-scale=1" />
<title>Survey Performansi Mitra DSO</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="../images/facivon.png" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="../css/animate.css"/>

<!-- fontawesome -->
<!-- <link rel="stylesheet" href="../https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<link rel="stylesheet" href="../https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css"> -->
<link rel="stylesheet" type="text/css" href="../css/all.css">

<!-- themify -->
<link rel="stylesheet" type="text/css" href="../css/themify-icons.css"/>
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="../css/flaticon.css"/>

<!-- slick -->
<link rel="stylesheet" type="text/css" href="../css/slick.css">

<!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="../revolution/css/layers.css">

    <link rel="stylesheet" type="text/css" href="../revolution/css/settings.css">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="../css/shortcodes.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="../css/main.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="../css/megamenu.css"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="../css/responsive.css"/>

<link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.css"/>

<link rel="stylesheet" type="text/css" href="../css/floating-wpp.min.css">
<link rel="stylesheet" href="../css/modal-video.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- <link href="../halamanadmin/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> -->
 <!-- <link rel="stylesheet" type="text/css" href="css/tambah.css"> -->
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
    .wrapper {
        width: 330px;
        font-family: 'Roboto';
        font-size: 14px;
    }
    ul.verticalBar {
        list-style: none;
        position: relative;
        height: 370px;
        float: left;
    }
    .verticalBar li:first-child {
        border-radius: 1px 1px 0 0;    
    }
    .verticalBar li {
        width: 4px;
        background: #cc3e33;
        height: 13%;
    }
    .verticalBar li::after {
        content: "";
        display: block;
        width: 14px;
        height: 14px;
        background: #cc3e33;
        border-radius: 50%;
        position: relative;
        left: -5px;
        top: calc(100% - 7px);
    }
    .verticalBar li.active ~ li, .verticalBar li.active ~ li::after {
        background: #c5c5c5;
    }
    ul.progressText {
        list-style: none;
        height: 200px;
        margin-left: 30px;
        position: relative;
        top: 25px;
    }
    ul.progressText li{
        height: 12%;
        color: #cc3e33;
    }
    ul.progressText span{
        position: relative;
        top: -10px;  
        color: #cc3e33;
    }
    .progressText li.active ~ li, .progressText li.active ~ li::after {
        color: #c5c5c5;
    }
</style>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .grid-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* Ganti jumlah kolom sesuai kebutuhan */
    grid-gap: 2px;
  }
  .grid-item {
    border: 0px solid #ccc;
    padding: 10px;
    text-align: center;
  }
</style>

<style>
    .form-step {
      display: none;
    }
    
    .form-step.active {
      display: block;
    }
    
    .btn-container {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
  </style>

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '9899495530090532');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=9899495530090532&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11226319581"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11226319581');
</script>

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
                        <div class="col-xl-12 d-flex flex-row align-items-center ">
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fa fa-phone"></i></div>+62 811-3301-618</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fal fa-envelope"></i></div><a href="../mailto:yourdomain@gmail.com">rachmat.saputra@telkom.co.id</a></div>
                            <div class="top_bar_contact_item ml-auto"><div class="top_bar_icon"></div></div>
                            <nav class="main-menu menu-mobile" id="menu">
                                <ul class="menu">
                                    <li class="mega-menu-item">
                                    <div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fal fa-globe"></i></div>{{ __('lang.Bahasa')}}</div>
                                        <ul class="mega-submenu">
                                            <li><a href="{{ url('en')}}"></i>English</a></li>
                                            <li><a href="{{ url('id')}}"></i>Indonesia</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <a href="https://portal.telkom.co.id/"><div class="top_bar_contact_item"><div class="top_bar_icon"><i class="fa fa-user"></i></div>Portal Telkom</div></a>
                        </div>
                    </div>
                </div>
            </div><!-- top_bar end-->
        </header><!--header end-->
        