<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body spellcheck="false">
    <p><img src="/images/kup.PNG" style="width: 97%;"></p>
    <table style="width: 97%; border-collapse: collapse; border: 1px solid rgb(255, 255, 255);">
        <tbody>
            <tr>
                <td style="width: 49.7783%;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">&nbsp; &nbsp; No &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : FORM/QP-02-01/.............../20...</span><br></td>
                <td style="width: 50.1108%;"><em><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Contact Person &nbsp; &nbsp; &nbsp; &nbsp;</span></em><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;">: {{ $booking->hp }}<br></span></span></td>
            </tr>
            <tr>
                @if($booking->lab == "AJKT")
                <td style="width: 49.7783%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp; &nbsp; Lokasi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Jakarta<del>/Medan/Surabaya/Makassar</del> *)<br></span></span></td>
                @elseif($booking->lab == "AMDN")
                <td style="width: 49.7783%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp; &nbsp; Lokasi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <del>Jakarta</del>/Medan/<del>Surabaya/Makassar</del> *)<br></span></span></td>
                @endif
                <td style="width: 50.1108%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;"><em>Request Received &nbsp; &nbsp;</em>: ................................<br></span></span></td>
            </tr>
            <tr>
                <td style="width: 49.7783%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">&nbsp; &nbsp; Pelanggan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $booking->perusahaan }}</span><br></span></span></td>
                <td style="width: 50.1108%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;"><em>Quantity &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</em>: ................................<br></span></span></td>
            </tr>
            <tr>
                <td style="width: 49.7783%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;">&nbsp; &nbsp; Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <br></span></span></td>
                <td style="width: 50.1108%;"><span style="font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif;"><em>Target Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</em>: ................................<br></span></span></td>
            </tr>
            <tr>
                <td style="width: 49.7783%;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">&nbsp; &nbsp; Telepon/Faks/Email &nbsp;: <br></span></td>
                <td style="width: 50.1108%;"><br></td>
            </tr>
        </tbody>
    </table> 
    <br>
    <table style="width: 96%; border-collapse: collapse; border: 1px solid rgb(0, 0, 0); margin-right: calc(6%);">
        <tbody>
            <tr>
                <td rowspan="3" style="width: 4.5%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">No</span></td>
                <td rowspan="3" style="width: 20.1283%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">Nama&nbsp;Perangkat</span>&nbsp;</span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td rowspan="3" style="width: 12.9912%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">Merk</span>&nbsp;</span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td rowspan="3" style="width: 7.0569%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">Tipe</span>&nbsp;</span></span></td>
                <td rowspan="3" style="width: 9.3023%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">S/N</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="12" style="width: 37.0489%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-size: 11px; font-family: Arial, sans-serif;">Beri&nbsp;tanda&nbsp;centang&nbsp;(</span><span style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-size: 11px;">&radic;</span><span style="color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-size: 11px; font-family: Arial, sans-serif;">) jika&nbsp;lengkap</span></span></span></td>
                <td rowspan="3" style="width: 8.5004%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">Keterangan</span></span></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 6.0145%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Kalibrator</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="2" style="width: 6.1748%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Personil</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="2" style="width: 6.4154%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Metode</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="2" style="width: 6.0947%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">CMC</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="2" style="width: 6.0947%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Jadwal</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td colspan="2" style="width: 6.255%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><span style="color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Lokasi</span></span></span><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
            </tr>
            <tr>
                <td style="width: 2.887%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK <br></span></span></td>
                <td style="width: 3.1275%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></td>
                <td style="width: 2.9671%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK</span></span></td>
                <td style="width: 3.2077%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></td>
                <td style="width: 3.0473%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK</span></span></td>
                <td style="width: 3.368%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></td>
                <td style="width: 2.8869%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK</span></span></td>
                <td style="width: 3.2077%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></td>
                <td style="width: 2.8869%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK</span></span></td>
                <td style="width: 3.2077%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></td>
                <td style="width: 2.9672%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">OK</span></span></td>
                <td style="width: 3.3681%; vertical-align: middle; text-align: center; border: 1px solid rgb(0, 0, 0);">
                    <div style="text-align: center;"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;">NOK</span></span></div>
                </td>
            </tr>
            @php $no=1; @endphp
            @foreach($booking->alatukur as $alatukur)
            <tr>
                <td style="width: 5.3125%; border: 1px solid rgb(0, 0, 0); text-align: center;"><span style="font-size: 11px; "><span style="font-family: Arial, Helvetica, sans-serif;">{{$no++}}</span></span></td>
                <td style="width: 20.1283%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;padding:4px;">{{ $alatukur->namaalat }}</span></span></td>
                <td style="width: 12.9912%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;padding:4px;">{{ $alatukur->merk }}</span></span></td>
                <td style="width: 7.0569%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;padding:4px;">{{ $alatukur->type }}</span></span></td>
                <td style="width: 9.3023%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;padding:4px;">{{ $alatukur->serial }}</span></span></td>
                <td style="width: 2.887%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.1275%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 2.9671%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.0473%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.368%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 2.9672%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 3.3681%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
                <td style="width: 8.5004%; border: 1px solid rgb(0, 0, 0);"><span style="font-size: 11px;"><span style="font-family: Arial, Helvetica, sans-serif;"><br></span></span></td>
            </tr>
            @endforeach
            <tr>
                <td style="width: 5.3125%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 20.1283%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 12.9912%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 7.0569%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 9.3023%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.887%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.1275%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9671%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.0473%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.368%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9672%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.3681%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 8.5004%; border: 1px solid rgb(0, 0, 0);"><br></td>
            </tr>
            <tr>
                <td style="width: 5.3125%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 20.1283%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 12.9912%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 7.0569%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 9.3023%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.887%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.1275%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9671%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.0473%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.368%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9672%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.3681%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 8.5004%; border: 1px solid rgb(0, 0, 0);"><br></td>
            </tr>
            <tr>
                <td style="width: 5.3125%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 20.1283%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 12.9912%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 7.0569%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 9.3023%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.887%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.1275%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9671%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.0473%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.368%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9672%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.3681%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 8.5004%; border: 1px solid rgb(0, 0, 0);"><br></td>
            </tr>
            <tr>
                <td style="width: 5.3125%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 20.1283%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 12.9912%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 7.0569%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 9.3023%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.887%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.1275%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9671%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.0473%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.368%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.8869%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.2077%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 2.9672%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 3.3681%; border: 1px solid rgb(0, 0, 0);"><br></td>
                <td style="width: 8.5004%; border: 1px solid rgb(0, 0, 0);"><br></td>
            </tr>
        </tbody>
    </table>
    <p style="line-height: 1;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">*) Coret yang tidak perlu<br></span></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Hasil Evaluasi : .............................................................................................................................................................................................................................................................</span><br><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;..............................................................................................................................................................................................................................................................</span></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Waktu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Tanggal ................................................................................................ Jam .......................................................................................................................................</span></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Dilaksanakan : ................................................................................................/NIK : .............................................................. /TTD: ...........................................................................</span></p>
    <p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Mengetahui&nbsp; &nbsp;: ................................................................................................/NIK : .............................................................. /TTD: ...........................................................................</span><br></span></p>
    <script>
		window.print();
	</script>
</body>

</html>