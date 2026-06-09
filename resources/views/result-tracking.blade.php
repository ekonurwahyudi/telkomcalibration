@include('header')
                <div class="container">
                    <br/>
                    <div class="row align-items-center text-center">
                        <div class="col-lg-12">
                            <div class="">
                                <h3 class="title">Tracking Order</h3>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a href="/">{{__('lang.Beranda')}}</a>
                                </span>
                                <span>Tracking Order</span>
                            </div>
                        </div>
                    </div>
                </div>
<br/>
    <!--site-main start-->
    <div class="site-main">


        <section class="ttm-row pt-0 pb-50 clearfix">
            <div class="container">
                <div class="row">
                        <div class="col-6 widget widget-search">
                            <form action="/check-order" role="search" method="get" class="search-form">
                            @csrf
                                <label>
                                    <span style="color:black; font-size: 16px;"><b><i class="fa fa-search"></i> Masukkan Nomor Booking anda</b></span>
                                    <input type="search" class="input-text" name="nomorbooking" value="{{$nomorbooking}}" placeholder="Contoh : BO-AJKT-23-04">
                                </label>
                                <button type="submit" class="btn btn-danger btn-lg" value="Search"><i class="ti ti-search" aria-hidden="true"></i></button>
                            </form>
                            <br>
                            @if (count($hasils) > 0)
                            @foreach ($hasils as $hasil)
                            <div style="background-color: #f6faff;padding: 15px; width:470px; height:250px; color:black; ">
                            <span>
                                <b>Nama Lengkap :</b> {{$hasil->nama}}<br>
                                <b>Nama Perusahaan :</b> {{$hasil->perusahaan}}<br>
                                @if ($hasil->lab == "AJKT")
                                <b>Lokasi   :</b> Laboratorium Kalibrasi Jakarta<br>
                                @elseif($hasil->lab == "AMDN")
                                <b>Lokasi   :</b> Laboratorium Kalibrasi Medan<br>
                                @endif
                                <b>Nomor Booking   :</b> {{$hasil->nomorbooking}}<br>
                                <b>Layanan   :</b>
                                @if($hasil->layanan == "InLab")
                                    Di Lokasi Lab Telkom (InLab)
                                @else
                                    Onsite diLokasi (Onsite)
                                @endif
                                <br>
                                <b>Tanggal Booking :</b> {{$hasil->created_at}} <br>
                                <b>Status Alat :</b>
                                @if($hasil->status == "Open")
                                <div class="badge badge-info">Booking Order</div>
                                @elseif($hasil->status == "progres")
                                <div class="badge badge-warning">Sedang Di Kalibrasi</div>
                                @elseif($hasil->status == "SPH Dikirim")
                                <div class="badge badge-warning">SPH Dikirim</div>
                                @elseif($hasil->status == "close")
                                <div class="badge badge-success">Selesai diKalibrasi</div>
                                @elseif($hasil->status == "cancel")
                                <div class="badge badge-danger">Cancel/Damage</div>
                                @endif
                                <br>
                                {{-- <ul class="verticalBar">
                                    <li></li>
                                    <li></li>
                                    <li class="active"></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul> --}}
                                {{-- <div class="wrapper">
                                    <ul class="progressText">
                                        <li><b>Pre Order</b></li>
                                        <span>Senin, 20 Desember 2021</span>
                                        <li><b>Quotation</b></li>
                                        <span>Selasa, 21 Desember 2021</span>
                                        <li class="active"><b>Order diterima</b></li>
                                        <span>Selasa, 21 Desember 2021</span>
                                        <li><b>Order sedang dikalibrasi</b></li>
                                        <span>&nbsp</span>
                                        <li><b>Pembuatan Sertifikat</b></li>
                                        <span>&nbsp</span>
                                        <li><b>Billing Invoice</b></li>
                                        <span>&nbsp</span>
                                        <li><b>Selesai</b></li>
                                        <span>&nbsp</span>
                                    </ul>
                                </div> --}}
                            </span>
                            </div>
                            @endforeach
                            @else
                            <div style="background-color: #f6faff;padding: 15px; width:470px;color:black; ">
                                <span>Nomor Booking <b>{{$nomorbooking}}</b> tidak ditemukan</span>
                            </div>
                            @endif
                        </div>                    
                    <div class="col-6">
                    <center><span><b style="color:black; font-size: 16px;">Alat yang sedang dikalibrasi</b> (hanya menampilkan 5 terbaru)</span></center>
                    <table class="table table-bordered table-checkable" id="order-listing2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Model</th>
                                <th>S/N</th>
                                <th>Status Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($orders as $order)
                            @if($order->order_status != "")
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$order->order_namaalat}}</td>
                                <td>{{$order->order_model}}</td>
                                <td>{{$order->order_sn}}</td>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
    <!--footer start-->

@include('footer')