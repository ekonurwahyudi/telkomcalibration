<?php

return [
    // Webhook n8n yang meneruskan permintaan ke ATEMIS di intranet.
    'n8n_url' => env('VERIFY_N8N_URL'),

    // Kunci yang dikirim sebagai header X-Verify-Key.
    'n8n_key' => env('VERIFY_N8N_KEY'),

    // Detik. QR dipindai dari ponsel, jadi jangan dibiarkan menggantung lama.
    'timeout' => env('VERIFY_TIMEOUT', 10),
];
