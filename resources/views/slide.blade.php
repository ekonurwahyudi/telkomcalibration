<div  id="rev_slider_5_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
            <!-- START REVOLUTION SLIDER -->
            <div  id="rev_slider_5_1" class="rev_slider fullwidthabanner" data-version="5.4.8">
                <ul>
                    <!-- SLIDE  -->
                @foreach ($slides as $slide)
                    <li data-index="rs-7" data-transition="slotzoom-horizontal" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="0" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <a href="{{$slide->slide_link}}"><img src="{{ url('storage/slides/'.__('lang.slide').$slide->slide_judul.'.png')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina></a>
                        <!-- <img src="{{ url('storage/slides/'.$slide->slide_gambar_id)}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina> -->
                    </li>
                @endforeach
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->