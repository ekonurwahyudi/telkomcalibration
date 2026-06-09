@include('/header')
@include('/slide')

    <!--site-main start-->
    <div class="site-main">

        <!--introduction-section-->
        <section class="ttm-row services-section bg-img3 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-xs-12 order-1">
                        <div class="mb-25 pt-50 mr_40 res-991-pt-0 res-991-mr-0">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header">
                                    <h5>{{ __('lang.Tentang')}}</h5>
                                    <h2 class="title">Laboratorium Calibration <br> PT. Telekomunikasi Indonesia, Tbk.</h2>
                                </div>
                                <div class="title-desc"> {{ __('lang.telkom')}}</div> <br/>
                                <div class="title-desc"> {{ __('lang.tentanglab')}}</div>
                            </div><!-- section title end -->
                            <br/>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box style1 icon-align-before-heading">
                                        <div class="featured-icon">
                                            <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                                <i class="fal fa-route"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h5>{{__('lang.onsite')}}</h5>
                                            </div>
                                            <div class="featured-desc">
                                                <p>{{__('lang.onsitedes')}}</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                                <div class="col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box style1 icon-align-before-heading">
                                        <div class="featured-icon">
                                            <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md">
                                            <i class="fal fa-warehouse-alt"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h5>{{__('lang.inhouse')}}</h5>
                                            </div>
                                            <div class="featured-desc">
                                                <p>{{__('lang.inhousedes')}}</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-skincolor mr-10 mt-15" href="tentang-kami">{{__('lang.selengkapnya')}}</a>
                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor mr-10 mt-15 js-video-button"  data-video-id='v1mVEQ-pUcw' href=""> <i class="far fa-play-circle"></i> {{__('lang.nonton')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-xs-1 order-lg-2 order-md-3 order-3">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box style1 icon-align-top-content ttm-bgcolor-skincolor">
                            <div class="featured-icon-box-inner-1">
                                <div class="featured-icon-box-inner-2">
                                    <div class="featured-icon text-center">
                                        <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-lg">
                                            <i class="fal fa-flower-daffodil"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content text-center">
                                        <div class="featured-title">
                                            <h5>25 {{__('lang.tahun')}}</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>Experiance Of Laboratory</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-xl-5 col-lg-5 col-xs-12 order-sm-2 order-md-2 order-2">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-white pt-10 pl-10 pr-10 pb-10 z-index-1">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!-- ttm_single_image-wrapper -->
                                <div class="ttm_single_image-wrapper text-center">
                                    <img class="img-fluid" src="images/single-img-one.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
            <br>
            <br>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-8 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h5>OUR SERVICE</h5>
                                <h2 class="title">{{__('lang.Layanan')}}</h2>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <!-- row -->
                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":891,"settings":{"slidesToShow": 2}}, {"breakpoint":640,"settings":{"slidesToShow": 1}}]}'>
                    <div class="ttm-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-services">
                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                <a href="fiberoptic"> <img class="img-fluid" src="images/services/optic.jpeg" alt="image"></a>
                            </div><!-- featured-thumbnail end-->
                            <div class="featured-content">
                                <div class="fea_con_left">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-grey ttm-icon_element-size-xs ttm-icon_element-style-round">
                                        <i class="fas fa-wifi"></i>
                                    </div>
                                </div>
                                <div class="fea_con_right">
                                    <div class="featured-title">
                                        <h5><a href="fiberoptic">Fiber Optic</a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>{{__('lang.isifiber')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox -->
                    </div>
                    
                    <div class="ttm-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-services">
                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                <a href="kelistrikan"> <img class="img-fluid" src="images/services/listrik.jpeg" alt="image"></a>
                            </div><!-- featured-thumbnail end-->
                            <div class="featured-content">
                                <div class="fea_con_left">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-grey ttm-icon_element-size-xs ttm-icon_element-style-round">
                                        <i class="fas fa-charging-station"></i>
                                    </div>
                                </div>
                                <div class="fea_con_right">
                                    <div class="featured-title">
                                        <h5><a href="kelistrikan">{{__('lang.kelistrikan')}}</a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>{{__('lang.isilistrik')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-services">
                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                <a href="frekuensiwaktu"> <img class="img-fluid" src="images/services/frekuensi.jpeg" alt="image"></a>
                            </div><!-- featured-thumbnail end-->
                            <div class="featured-content">
                                <div class="fea_con_left">
                                    <div class="ttm-icon ttm-icon_element-border ttm-icon_element-color-grey ttm-icon_element-size-xs ttm-icon_element-style-round">
                                        <i class="fas fa-wave-square"></i>
                                    </div>
                                </div>
                                <div class="fea_con_right">
                                    <div class="featured-title">
                                        <h5><a href="frekuensiwaktu">{{__('lang.frekuensi')}}</a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>{{__('lang.isifrekuensi')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- featured-imagebox -->
                    </div>
                    
                    
                </div><!-- row end -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-50 res-991-mt-30 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-icon-btn-left ttm-btn-color-skincolor" href="#"><i class="fa fa-calendar"></i>Buat Jadwal Kalibrasi</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!--services-section end-->

        <section class="ttm-row services-section ttm-bgcolor-skincolor bg-img8 ttm-bg ttm-bgimage-yes clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container"><!--container-->
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-9 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h5>WHY CHOOSE US</h5>
                                <h2 class="title">{{__('lang.kenapa')}}</h2>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style5">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg ttm-icon_element-style-round">
                                    <i class="fal fa-concierge-bell"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>High<br>Quality Services</h5>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style5">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg ttm-icon_element-style-round">
                                    <i class="fal fa-tachometer-alt-fastest"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Fast<br>Working Process</h5>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style5">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg ttm-icon_element-style-round">
                                    <i class="fal fa-user-headset"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>24/7<br>Customer Support</h5>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-top-content style5">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg ttm-icon_element-style-round">
                                <i class="fal fa-users"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Expert<br>Labtechician Team</h5>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </div>
                </div>
                <br>
            </div>
        </section>


        <!--fid-section-->
        <div class="ttm-row fid-section mt_80 res-991-mt-0 z-index-1 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-white box-shadow">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <!-- ttm-fid -->
                                        <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                            <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                <i class="ti ti-file"></i>
                                            </div>
                                            <div class="ttm-fid-contents">
                                                <h4 class="ttm-fid-inner">
                                                    <span>ISO:17025
                                                    </span>
                                                </h4>
                                                <h3 class="ttm-fid-title">{{__('lang.Sertifikat')}}</h3>
                                            </div>
                                        </div><!-- ttm-fid end -->
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <!-- ttm-fid -->
                                        <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                            <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                <i class="ti ti-target"></i>
                                            </div>
                                            <div class="ttm-fid-contents">
                                                <h4 class="ttm-fid-inner">
                                                    <span   data-appear-animation="animateDigits" 
                                                            data-from="0" 
                                                            data-to="27102" 
                                                            data-interval="15" 
                                                            data-before="" 
                                                            data-before-style="sup" 
                                                            data-after="" 
                                                            data-after-style="sub" 
                                                            class="numinate">27102
                                                    </span>
                                                    <sub>+</sub>
                                                </h4>
                                                <h3 class="ttm-fid-title">Calibration since 2015</h3>
                                            </div>
                                        </div><!-- ttm-fid end -->
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <!-- ttm-fid -->
                                        <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                            <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                <i class="flaticon-placeholder"></i>
                                            </div>
                                            <div class="ttm-fid-contents">
                                                <h4 class="ttm-fid-inner">
                                                    <span>4 Lab
                                                    </span>
                                                    <sub></sub>
                                                </h4>
                                                <h3 class="ttm-fid-title">Location in Indonesia</h3>
                                            </div>
                                        </div><!-- ttm-fid end -->
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <!-- ttm-fid -->
                                        <div class="ttm-fid inside ttm-fid-with-icon ttm-fid-view-lefticon style2">
                                            <div class="ttm-fid-icon-wrapper ttm-textcolor-skincolor">
                                                <i class="flaticon-support"></i>
                                            </div>
                                            <div class="ttm-fid-contents">
                                                <h4 class="ttm-fid-inner">
                                                    <span   data-appear-animation="animateDigits" 
                                                            data-from="0" 
                                                            data-to="403" 
                                                            data-interval="15" 
                                                            data-before="" 
                                                            data-before-style="sup" 
                                                            data-after="" 
                                                            data-after-style="sub" 
                                                            class="numinate">403
                                                    </span>
                                                    <sub>+</sub>
                                                </h4>
                                                <h3 class="ttm-fid-title">Client Since 2015</h3>
                                            </div>
                                        </div><!-- ttm-fid end -->
                                    </div>
                                </div><!-- row end -->
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ttm-row procedure-section ttm-bgcolor-grey bg-img9 ttm-bg ttm-bgimage-yes z-index_1 mt_100 res-991-mt-0 clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-9 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h5>Way We Work</h5>
                                <h2 class="title">{{__('lang.alur')}}</h2>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <div class="row"><!-- row -->
                    <div class="col-md-4">
                        <!-- featured-imagebox -->
                        <div class="featured-icon-box icon-align-top-content text-center style4">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-white ttm-icon_element-size-md ttm-icon_element-style-rounded">
                                    <i class="fal fa-print-search"></i>
                                    <span class="fea-number">01</span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>{{__('lang.diagnosa')}}</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{__('lang.isidiagnosa')}}</p>
                                </div>
                            </div>
                            <div class="arrow">
                                <img src="images/arrow-1.png" alt=""/>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    <div class="col-md-4">
                        <!-- featured-imagebox -->
                        <div class="featured-icon-box icon-align-top-content text-center style4">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-white ttm-icon_element-size-md ttm-icon_element-style-rounded">
                                <i class="fal fa-monitor-heart-rate"></i>
                                    <span class="fea-number">02</span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>{{__('lang.proses')}}</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{__('lang.isiproses')}}</p>
                                </div>
                            </div>
                            <div class="arrow flip-arrow">
                                <img src="images/arrow-2.png" alt=""/>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                    <div class="col-md-4">
                        <!-- featured-imagebox -->
                        <div class="featured-icon-box icon-align-top-content text-center style4">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-white ttm-icon_element-size-md ttm-icon_element-style-rounded">
                                    <i class="fal fa-file-certificate"></i>
                                    <span class="fea-number">03</span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>{{__('lang.terbit')}}</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{__('lang.isiterbit')}}</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox end-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-30 res-991-mt-30 text-center">
                            <strong>{{__('lang.bingung')}} <u><a href="#">{{__('lang.lihatselengkapnya')}}</a></u></strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ttm-row broken-section-3 bg-layer mt_80 res-991-mt-0 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="col-bg-img-seven ttm-col-bgimage-yes ttm-bg ttm-col-bgcolor-yes ttm-left-span ttm-bgcolor-skincolor z-index-2 spacing-4">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content">
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="title">{{__('lang.iso')}}</h2>
                                    </div>
                                </div>
                                <p>{{__('lang.kan')}}</p>
                                <div class="sep_holder_box width-100 mt-35">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <a href="/BookingOrder" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left " style="background-color: #031b4e;border-color:#031b4e"> <i class="fa fa-calendar"></i>Booking Order</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="col-bg-img-eight ttm-col-bgimage-yes ttm-bg ttm-right-span mt-80 res-991-mt-0">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                <div class="ttm-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content">
                            </div>
                            <img src="../images/bg-image/col-bgimage-8.jpg" width="50" height="320" alt="bg-image">
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <section class="ttm-row blog-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-8 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h5>OUR BLOG & ARTICLE</h5>
                                <h2 class="title">{{__('lang.blog')}}</h2>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <!-- slick_slider -->
                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows":false, "autoplay":true, "centerMode":true, "centerPadding":0, "infinite":true, "initialSlide":2, "responsive": [{"breakpoint":870,"settings":{"slidesToShow": 2}} , {"breakpoint":525,"settings":{"slidesToShow": 1}}]}'>
                    @foreach ($artikels as $artikel)
                    <div class="ttm-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post">
                            <div class="ttm-post-thumbnail featured-thumbnail"> 
                                <img class="img-fluid" src="{{ url('storage/artikels/'.$artikel->artikel_gambar)}}" alt="image"> 
                            </div>
                            <div class="featured-content featured-content-post">
                                <div class="post-meta">
                                    <span class="ttm-meta-line"><i class="fa fa-user"></i>{{$artikel->artikel_editor}}</span>
                                    <span class="ttm-meta-line"><i class="fa fa-calendar"></i>{{$artikel->artikel_date}}</span>
                                </div>
                                <div class="post-title featured-title">
                                    <h5><a href="/artikel/{{$artikel->artikel_id}}">{{$artikel->artikel_judul}}</a></h5>
                                </div>
                                <div class="post-desc featured-desc">
                                    <p>{{Str::limit(Strip_tags($artikel->artikel_deskripsi),80)}}</p>
                                </div>
                            </div>
                        </div><!-- featured-imagebox-post end-->
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-30 res-991-mt-30 text-center">
                            <strong>Don’t hesitate, contact us for better help and blog. <u><a href="#">Explore all latest News.</a></u></strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog-section end-->


        <!--testimonial-section-->
        @include('testimonial')
        <!--testimonial-section end-->
        <!--client-section-->
        <div class="ttm-row client-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row text-center">
                    <div class="col-md-12">
                        <!-- slick_slider -->
                        <div class="slick_slider" data-slick='{"slidesToShow": 6, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true}'>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-01">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-01.jpg" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-01.jpg" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-02">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-02.png" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-02.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-03">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-03.jpg" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-03.jpg" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-04">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-04.jpg" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-04.jpg" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-05">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-05.jpg" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-05.jpg" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-06">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-06.png" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-06.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-box">
                                <div class="ttm-client-logo-tooltip" data-tooltip="client-07">
                                    <div class="ttm-client-logo-tooltip-inner">
                                        <div class="client-thumbnail">
                                            <img src="images/client/client-07.jpg" alt="image">
                                        </div>
                                        <div class="client-thumbnail_hover">
                                            <img src="images/client/hover-client-07.jpg" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- ttm-client end -->  
                        <strong>Don’t hesitate, explore all happy client. <u><a href="client.php">Click Here!</a></u></strong>
                        <br/>
                        <br/>
                    </div>
                </div><!-- row end -->  
            </div>
        </div>
        <!--client-section end-->
        
        <div class="sep_holder_box width-100">
            <span class="sep_holder"><span class="sep_line"></span></span>
        </div>

        <!--blog-section-->
        


    </div><!--site-main end-->
@include('/footer')