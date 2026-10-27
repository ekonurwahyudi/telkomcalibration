<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Verifikasi keaslian sertifikat kalibrasi dari QR code.
 *
 * Data sertifikat ada di ATEMIS yang berada di jaringan intranet, jadi
 * situs publik ini tidak bisa menyentuhnya langsung. Permintaan diteruskan
 * lewat n8n yang punya akses ke sana.
 */
class VerifyCertificateController extends Controller
{
    public function show($token)
    {
        // Validasi bentuk token sebelum memanggil n8n: menahan percobaan
        // sisir token dan menghemat panggilan keluar.
        if (!preg_match('/^([A-Za-z0-9_-]{22}|[a-f0-9]{32})$/', $token)) {
            return response()->view('verify-certificate', [
                'document' => null,
                'error' => null,
            ], 404);
        }

        $endpoint = config('verify.n8n_url');

        if (!$endpoint) {
            Log::warning('VERIFY_N8N_URL belum diset');

            return response()->view('verify-certificate', [
                'document' => null,
                'error' => 'Layanan verifikasi belum dikonfigurasi.',
            ], 503);
        }

        try {
            $response = Http::timeout(config('verify.timeout'))
                ->withHeaders(['X-Verify-Key' => config('verify.n8n_key')])
                ->get($endpoint, ['token' => $token]);
        } catch (\Throwable $error) {
            // n8n mati atau jaringan putus: bedakan dari "tidak terdaftar",
            // supaya pelanggan tidak dikira memegang sertifikat palsu.
            Log::error('Verifikasi sertifikat gagal: ' . $error->getMessage());

            return response()->view('verify-certificate', [
                'document' => null,
                'error' => 'Layanan verifikasi sedang tidak tersedia. Coba beberapa saat lagi.',
            ], 503);
        }

        if ($response->status() === 404) {
            return response()->view('verify-certificate', [
                'document' => null,
                'error' => null,
            ], 404);
        }

        if (!$response->successful()) {
            Log::error('Verifikasi sertifikat: n8n balas ' . $response->status());

            return response()->view('verify-certificate', [
                'document' => null,
                'error' => 'Layanan verifikasi sedang tidak tersedia. Coba beberapa saat lagi.',
            ], 503);
        }

        $payload = $response->json();
        $document = is_array($payload) && !empty($payload['valid'])
            ? ($payload['data'] ?? null)
            : null;

        return response()->view('verify-certificate', [
            'document' => $document,
            'error' => null,
        ], $document ? 200 : 404);
    }
}
