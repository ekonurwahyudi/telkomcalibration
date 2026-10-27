<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Verifikasi Sertifikat Kalibrasi - Telkom Calibration</title>
    <style>
        :root { color-scheme: light; }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 24px 16px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f3f4f8;
            color: #1a1a2e;
            line-height: 1.5;
        }
        .card {
            max-width: 680px;
            margin: 0 auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 16px rgba(0,0,0,.08);
            overflow: hidden;
        }
        .banner { padding: 24px; text-align: center; color: #fff; }
        .banner.valid   { background: #1bc5bd; }
        .banner.invalid { background: #f64e60; }
        .banner.warn    { background: #ffa800; }
        .banner h1 { margin: 14px 0 4px; font-size: 20px; }
        .banner p  { margin: 0; opacity: .92; font-size: 14px; }
        /* Logo berlatar terang, diberi alas putih agar terbaca di banner. */
        .banner .logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 6px rgba(0,0,0,.12);
        }
        .banner .logo img { max-height: 46px; display: block; }
        .body { padding: 20px 24px 24px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px 0; text-align: left; vertical-align: top; font-size: 15px; }
        th { width: 42%; color: #7e8299; font-weight: 600; }
        tr + tr th, tr + tr td { border-top: 1px solid #ebedf3; }
        .brand-foot {
            padding: 18px 16px 0;
            border-top: 1px solid #ebedf3;
            margin: 0 16px;
            text-align: center;
        }
        .brand-foot img { max-height: 54px; }
        .foot {
            padding: 14px 24px 20px;
            font-size: 12px;
            color: #7e8299;
            text-align: center;
        }
        @media (max-width: 420px) {
            th, td { display: block; width: 100%; padding: 4px 0; }
            tr + tr th { border-top: 1px solid #ebedf3; padding-top: 12px; }
            tr + tr td { border-top: 0; }
            td { padding-bottom: 10px; font-weight: 600; }
        }
    </style>
</head>
<body>
    <div class="card">
        @if ($document)
            <div class="banner valid">
                <div class="logo">
                    <img src="{{ asset('images/logo_lab.png') }}" alt="Telkom Calibration">
                </div>
                <h1>Dokumen Asli</h1>
                <p>Sertifikat ini terdaftar dan sudah ditandatangani</p>
            </div>
            <div class="body">
                <table>
                    <tr><th>No Order</th><td>{{ $document['no_order'] ?: '-' }}</td></tr>
                    <tr><th>No Serial</th><td>{{ $document['nomor_serial'] ?: '-' }}</td></tr>
                    <tr><th>Serial Number</th><td>{{ $document['serial_number'] ?: '-' }}</td></tr>
                    <tr><th>Item</th><td>{{ $document['item_desc'] ?: '-' }}</td></tr>
                    <tr><th>Merk / Model</th><td>{{ $document['model'] ?: '-' }}</td></tr>
                    <tr><th>Ditandatangani oleh</th><td>{{ $document['signer_name'] ?: '-' }}</td></tr>
                    <tr>
                        <th>Tanggal Tanda Tangan</th>
                        <td>
                            {{ !empty($document['signed_at'])
                                ? date('d M Y H:i', strtotime($document['signed_at']))
                                : '-' }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="brand-foot">
                <img src="{{ asset('images/kan.png') }}" alt="Komite Akreditasi Nasional">
            </div>
        @elseif ($error)
            {{-- Layanan bermasalah, BUKAN sertifikat palsu. Dibedakan supaya
                 pemegang dokumen asli tidak salah paham. --}}
            <div class="banner warn">
                <div class="logo">
                    <img src="{{ asset('images/logo_lab.png') }}" alt="Telkom Calibration">
                </div>
                <h1>Verifikasi Tertunda</h1>
                <p>Keaslian dokumen belum dapat diperiksa saat ini</p>
            </div>
            <div class="body">
                <p style="margin:0;color:#7e8299;font-size:14px">{{ $error }}</p>
            </div>
        @else
            <div class="banner invalid">
                <div class="logo">
                    <img src="{{ asset('images/logo_lab.png') }}" alt="Telkom Calibration">
                </div>
                <h1>Dokumen Tidak Dikenali</h1>
                <p>Kode verifikasi tidak terdaftar pada sistem kami</p>
            </div>
            <div class="body">
                <p style="margin:0;color:#7e8299;font-size:14px">
                    Pastikan Anda memindai QR code langsung dari dokumen sertifikat.
                    Bila kode berasal dari dokumen resmi namun tetap tidak dikenali,
                    hubungi pihak laboratorium kalibrasi.
                </p>
            </div>
        @endif
        <div class="foot">
            Diverifikasi oleh Telkom Calibration &middot; {{ date('d M Y H:i') }}
        </div>
    </div>
</body>
</html>
