
    <!--footer start-->
    {{-- <footer class="footer widget-footer clearfix">
        <div class="bottom-footer-text">
            <div class="container">
                <div class="row copyright">
                    <div class="col-sm-9">
                        <img src="../images/img-footer.png"/>
                        <span>© Copyright Calista 2023. All rights reserved. See product license for details.</span>
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
    </footer> --}}
    
    <!--footer end-->

    <!--back-to-top start-->
    <!-- <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a> -->
    <!--back-to-top end-->

</div><!-- page end -->


    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>-->
	<script src="../js/jquery-modal-video.min.js"></script>
	<script>
		$(".js-video-button").modalVideo({
			youtube:{
				controls:0,
				nocookie: true
			}
		});
	</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!--<script src="../js/jquery.min.js"></script>-->
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/jquery.easing.js"></script>    
    <script src="../js/jquery-waypoints.js"></script>    
    <script src="../js/jquery-validate.js"></script> 
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/numinate.min.js"></script>
    <script src="../js/imagesloaded.min.js"></script>
    <script src="../js/jquery-isotope.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="revolution/js/slider.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    

    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="../js/floating-wpp.min.js"></script>
    <script>$(document).ready(function () {
	$('select').selectpicker();
	$('select').change(function () {
		$('.output').html($(this).val());
	});
});</script>
    <script type="text/javascript">
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: '+628116417025', //WhatsApp Business phone number International format-
                //Get it with Toky at https://toky.co/en/features/whatsapp.
                headerTitle: '{{__('lang.waatas')}}', //Popup Title
                popupMessage: '{{__('lang.sapawa')}}', //Popup Message
                showPopup: true, //Enables popup display
                buttonImage: '<img src="../images/whatsapp.svg" />', //Button Image
                //headerColor: 'crimson', //Custom header color
                //backgroundColor: 'crimson', //Custom background button color
                position: "right"
            });
        });
    </script>
    <script>
  const pilihanField = document.getElementById('pilihan');
  const inputManualField = document.getElementById('inputManual');

  pilihanField.addEventListener('change', function() {
    if (pilihanField.value === 'manual') {
      inputManualField.style.display = 'block';
    } else {
      inputManualField.style.display = 'none';
    }
  });
</script>

  <script>
    const formSteps = document.querySelectorAll('.form-step');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    let currentStep = 0;

    function showStep(stepIndex) {
      formSteps.forEach((step, index) => {
        if (index === stepIndex) {
          step.classList.add('active');
        } else {
          step.classList.remove('active');
        }
      });

      prevBtn.disabled = stepIndex === 0;
      nextBtn.style.display = stepIndex === formSteps.length - 1 ? 'none' : 'block';
      submitBtn.style.display = stepIndex === formSteps.length - 1 ? 'block' : 'none';
    }

    function changeStep(stepChange) {
      const newStep = currentStep + stepChange;
      if (newStep >= 0 && newStep < formSteps.length) {
        currentStep = newStep;
        showStep(currentStep);
      }
    }

    showStep(currentStep);
  </script>
  
  <script>
  document.addEventListener("DOMContentLoaded", function() {
        const bidangSelect = document.getElementById("bidang");
        const judulInput = document.getElementById("judul");
        const kontrakInput = document.getElementById("kontrak");
        const perusahaanInput = document.getElementById("perusahaan");
        const kelompokInput = document.getElementById("kelompok");
        const PICInput = document.getElementById("PIC");

        bidangSelect.addEventListener("change", function() {
            const selectedOption = bidangSelect.options[bidangSelect.selectedIndex];
            const selectedJudul = selectedOption.getAttribute("data-judul") || '';
            const selectedKontrak = selectedOption.getAttribute("data-kontrak") || '';
            const selectedPerusahaan = selectedOption.getAttribute("data-perusahaan") || '';
            const selectedKelompok = selectedOption.getAttribute("data-kelompok") || '';
            const selectedPIC = selectedOption.getAttribute("data-PIC") || '';
            judulInput.value = selectedJudul;
            kontrakInput.value = selectedKontrak;
            perusahaanInput.value = selectedPerusahaan;
            kelompokInput.value = selectedKelompok;
            PICInput.value = selectedPIC;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#bidang').select2({
            placeholder: 'Pilih Bidang....',
            allowClear: true,
            tags: true
        });
        
        // Ketika nilai select berubah
        $('#bidang').on('select2:select', function(e) {
            const data = e.params.data;
            $('#judul').val(data.element.dataset.judul || '');
            $('#kontrak').val(data.element.dataset.kontrak || '');
            $('#perusahaan').val(data.element.dataset.perusahaan || '');
            $('#kelompok').val(data.element.dataset.kelompok || '');
            $('#PIC').val(data.element.dataset.PIC || '');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#ttm-contactform-2').submit(function(event) {
            if (isNameDuplicate()) {
                event.preventDefault();
                $('#nameExistsAlert').show();
            }
        });

        $('#nama').change(function() {
            $('#nameExistsAlert').hide();
        });

        function isNameDuplicate() {
            var nama = $('#nama').val();

            var isDuplicate = false;

            $.ajax({
                url: "{{ route('form.checkName') }}",
                type: "GET",
                data: { nama: nama},
                async: false,
                success: function(response) {
                    isDuplicate = response;
                }
            });

            return isDuplicate;
        }
    });
</script>
</body>
</html>