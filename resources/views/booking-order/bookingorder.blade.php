@include('/booking-order/header')
<!-- page-title -->
@if(session('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session('success') }}</strong>
</div>
@endif
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </div>                    
</div>

    <!--site-main start-->
    <div class="site-main">


        <!--grid-section-->
        <section class="ttm-row pt-0 pb-50 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-white z-index-2 spacing-5 box-shadow">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header mb-4">
                                        <h2 class="title">Form Booking Schedule Kalibrasi LK Telkom</h2></br>
                                        <span>Terima Kasih telah memilih Lab Kalibrasi Telkom untuk layanan kalibrasi Anda. Untuk mengantisipasi overloading request order, kami mohon bantuan kepada Bapak/Ibu sekalian untuk melakukan input data terlebih dahulu sebagai booking jadwal kalibrasi karena saat ini kondisi kami sedang full booked. Mohon maaf atas ketidaknyamanannya, dan terima kasih atas bantuan serta kerja sama Bapak/Ibu sekalian.</span></br></br>
                                        <span>Salam,</br>
                                            Tim Kalibrasi LK Telkom</span></br>
                                    </div>
                                    <hr class="dropdown-divider mb-4">
                                    <form action="{{ route('order.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="perusahaan">Nama Perusahaan <span style="color: brown"><i>*</i></span></label>
                                                <input class="text-input" id="perusahaan" name="perusahaan" type="text" value="" placeholder="Nama Perusahaan" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="nama">Nama Lengkap <span style="color: brown"><i>*</i></span></label>
                                                <input class="text-input" name="nama" type="text" value="" placeholder="Nama lengkap" id="nama">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="email">Email <span style="color: brown"><i>*</i></span></label>
                                                <input class="text-input" id="email" name="email" type="text" value="" placeholder="Email" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="lab"><span style="color: brown"><i><b>Lokasi Lab</b> *</i></span></label>
                                                <select name="lab" id="lab">
                                                    <option disabled selected value>-- Pilih Lab Kalibrasi --</option>
                                                    <option value="AJKT">Lab. Kalibrasi Jakarta</option>
                                                    <option value="AMDN">Lab. Kalibrasi Medan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="hp">No. Handphone <span style="color: brown"><i>*</i></span></label>
                                                <input class="text-input" id="hp" name="hp" type="text" value="" placeholder="No. Handphone" required>
                                                <label class="mb-1 pt-3" for="layanan">Layanan <span style="color: brown"><i>*</i></span></label>
                                                <select name="layanan" id="layanan">
                                                    <option value="InLab">Di Lokasi Lab Telkom (InLab)</option>
                                                    <option value="Onsite">Onsite di Lokasi (Onsite)</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="mb-1" for="keterangan">Keterangan</label>
                                                <textarea class="form-control" id="keterangan" name="keterangan" rows="7"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8" >
                                                <p class="mt-4 pt-2" style="font-size:12px; color:rgb(54, 54, 54)"><i><b>Note:</b> Silahkan klik tombol Tambah Alat Ukur, untuk menambahkan alat ukur yang akan dikalibrasi.</i></p>
                                            </div>
                                            <div class="col-md-4">
                                                <div style="text-align: right" class="mt-4">
                                                    <button type="button" id="addTool" class="btn btn-danger mb-3" style="background-color: #F64E60;border-color:#F64E60;font-size:14px">  
                                                    <span class="svg-icon svg-icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                <path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L8,21 C5.790861,21 4,19.209139 4,17 C4,14.790861 5.790861,13 8,13 L20,13 C21.1045695,13 22,13.8954305 22,15 Z M7,19 C8.1045695,19 9,18.1045695 9,17 C9,15.8954305 8.1045695,15 7,15 C5.8954305,15 5,15.8954305 5,17 C5,18.1045695 5.8954305,19 7,19 Z" fill="currentColor" opacity="0.3"/>
                                                                <path d="M15.5421357,5.69999981 L18.3705628,8.52842693 C19.1516114,9.30947552 19.1516114,10.5758055 18.3705628,11.3568541 L9.88528147,19.8421354 C8.3231843,21.4042326 5.79052439,21.4042326 4.22842722,19.8421354 C2.66633005,18.2800383 2.66633005,15.7473784 4.22842722,14.1852812 L12.7137086,5.69999981 C13.4947572,4.91895123 14.7610871,4.91895123 15.5421357,5.69999981 Z M7,19 C8.1045695,19 9,18.1045695 9,17 C9,15.8954305 8.1045695,15 7,15 C5.8954305,15 5,15.8954305 5,17 C5,18.1045695 5.8954305,19 7,19 Z" fill="currentColor" opacity="0.3"/>
                                                                <path d="M5,3 L9,3 C10.1045695,3 11,3.8954305 11,5 L11,17 C11,19.209139 9.209139,21 7,21 C4.790861,21 3,19.209139 3,17 L3,5 C3,3.8954305 3.8954305,3 5,3 Z M7,19 C8.1045695,19 9,18.1045695 9,17 C9,15.8954305 8.1045695,15 7,15 C5.8954305,15 5,15.8954305 5,17 C5,18.1045695 5.8954305,19 7,19 Z" fill="currentColor"/>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                        Tambah Alat Ukur</button>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <hr class="dropdown-divider mb-4">
                                        <div class="row" style="color: white">
                                            <div class="form-group col-md-3" style="background-color: #F64E60;border-top-left-radius: 10px;">
                                                <label class="mb-1 mt-1" >Nama Alat <span style="color: brown"><i>*</i></span></label>
                                            </div>
                                            <div class="form-group col-md-2" style="background-color: #F64E60">
                                                <label class="mb-1 mt-1">Merk </label>
                                            </div>
                                            <div class="form-group col-md-2" style="background-color: #F64E60">
                                                <label class="mb-1 mt-1">Type</label>
                                            </div>
                                            <div class="form-group col-md-2" style="background-color: #F64E60">
                                                <label class="mb-1 mt-1" >Serial Number</label>
                                            </div>
                                            <div class="form-group col-md-2" style="background-color: #F64E60">
                                                <label class="mb-1 mt-1">Nama Pada Sertifikat</label>
                                            </div>
                                            <div class="form-group col-md-1" style="background-color: #F64E60;border-top-right-radius: 10px;">
                                                <label class="mb-1 mt-1">Aksi</label>
                                            </div>
                                        </div>
                                        <div id="tools">
                                            <!-- Form tambah alat akan ditampilkan di sini -->
                                        </div>
                                
                                        <p style="font-size:12px; color:red"><i>Silahkan pilih Alat Ukur, jika tidak ada silahkan input manual</i></p>
                                
                                        <button type="submit" class="btn btn-success" style="background-color: #1BC5BD; border-color:#1BC5BD;font-size:14px">
                                            <span class="svg-icon svg-icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
                                                    <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                            </span>
                                            Booking Order</button>
                                    </form>
                                </div><!-- section title end -->

                            
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        
        </section>
        <!--grid-section end-->

      
    </div><!--site-main end-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let toolCounter = 0;
            const katalogData = {!! $katalog !!};
    
            $('#addTool').click(function() {
                toolCounter++;
    
                const toolForm = `
                    <div class="tool">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <select class="text-input" id="namaalat${toolCounter}" placeholder="Pilih Alat Ukur...." name="namaalat${toolCounter}">
                                        ${katalogData.map(item => `
                                        <option value="${item.namaalat}"
                                                data-merk="${item.merk}"
                                                data-type="${item.type}"
                                                data-itemid="${item.itemid}"
                                        >${item.namaalat}</option>
                                    `).join('')}
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input class="text-input" id="merk${toolCounter}" name="merk${toolCounter}" type="text">
                                <input class="text-input" id="itemid${toolCounter}" name="itemid${toolCounter}" type="text" hidden>
                            </div>
                            <div class="form-group col-md-2">
                                <input class="text-input" id="type${toolCounter}" name="type${toolCounter}" type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <input class="text-input" name="serial${toolCounter}" type="text" value="-">
                            </div>
                            <div class="form-group col-md-2">
                                <input class="text-input" name="namasertifikat${toolCounter}" type="text" value="-">
                            </div>
                            <div class="form-group col-md-1">
                                <button type="button" class="removeTool btn mb-3" style="background-color: #F64E60;font-size:14px;color:white">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
    
                $('#tools').append(toolForm);
                $(`#namaalat${toolCounter}`).select2({
                    placeholder: 'Pilih Alat Ukur....',
                    allowClear: true,
                    tags: true
                });
                $(`#namaalat${toolCounter}`).on('change', function() {
                    const selectedOption = $(this).find('option:selected');
                    const merkValue = selectedOption.data('merk');
                    const typeValue = selectedOption.data('type');
                    const itemidValue = selectedOption.data('itemid');
                    $(`#merk${toolCounter}`).val(merkValue);
                    $(`#type${toolCounter}`).val(typeValue);
                    $(`#itemid${toolCounter}`).val(itemidValue);
                });
            });
    
            // Menghapus form tambah alat
            $('#tools').on('click', '.removeTool', function() {
                $(this).closest('.tool').remove();
            });

           
        });
    </script>
@include('/booking-order/footer')