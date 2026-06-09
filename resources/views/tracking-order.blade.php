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
                                    <input type="search" class="input-text" name="nomorbooking" placeholder="Contoh : BO-AJKT-23-04">
                                </label>
                                <button type="submit" class="btn btn-danger btn-lg" value="Search"><i class="ti ti-search" aria-hidden="true"></i></button>
                                <br><span style="color:red;font-size:12px;"><b>*Note:</b>  Jika Booking kalibrasi tidak menggunakan web, maka hasilnya <b>tidak ada.</b></span>
                            </form>
                            <br>
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