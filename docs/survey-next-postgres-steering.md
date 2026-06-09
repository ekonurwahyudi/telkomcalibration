# Steering Rebuild Survey CSS ke Next.js + PostgreSQL

Dokumen ini menjadi acuan awal sebelum membangun ulang modul Customer Satisfaction Survey (CSS) dari Laravel Blade ke Next.js dan PostgreSQL. Fokusnya bukan memperbaiki halaman lama, tetapi memetakan struktur lama, kebutuhan bisnis, struktur data target, API, halaman, dashboard, dan tahapan migrasi.

## Tujuan

- Membangun ulang halaman survey pelanggan dengan Next.js.
- Memindahkan penyimpanan data survey ke PostgreSQL dengan struktur yang lebih rapi.
- Menyiapkan dashboard survey yang setara atau lebih baik dari dashboard Laravel saat ini.
- Membuat struktur data yang mudah dipakai ulang untuk survey tahun berikutnya tanpa menambah kolom `h1-h20` dan `k1-k20` lagi.
- Menjaga data lama tetap bisa dimigrasikan dari tabel lama `user_css` dan `hasil_survey`.

## Kondisi Sistem Saat Ini

### Halaman Publik Survey

File utama:

- `resources/views/survey.blade.php`

Route utama:

- `GET /CSS2025` menjalankan `CssController@survey`
- `POST /css-input` menjalankan `CssController@input`
- `GET /check-name` menjalankan `CssController@checkName`

Alur halaman:

1. Pelanggan membuka halaman survey.
2. Pelanggan memilih nama dari daftar responden `user_css`.
3. Data responden otomatis mengisi email, HP, perusahaan, bidang, TREG, status, dan lab.
4. Pelanggan mengisi survey dalam 3 langkah:
   - Informasi responden
   - Survey Harapan
   - Survey Kenyataan
5. Pelanggan memberi skor 1 sampai 5 untuk 20 pertanyaan harapan dan 20 pertanyaan kenyataan.
6. Pelanggan dapat mengisi saran.
7. Data disimpan ke tabel `hasil_survey`.

### Dashboard Lama

Folder dashboard CSS:

- `resources/views/awanlab/css`

Halaman penting:

- `css.blade.php`: rekap hasil survey.
- `list.blade.php`: daftar responden dan status sudah/belum mengisi.
- `tambah-responden.blade.php`: input responden.
- `edit.blade.php`: edit responden.
- `timeplan.blade.php`: halaman timeplan.
- `analisis23.blade.php`, `analisis24.blade.php`, `analisis25.blade.php`: analisis per tahun.

Route dashboard:

- `GET /dashboard-css`
- `GET /all-list`
- `GET /treg1` sampai `/treg7`
- `GET /survey_export`
- `GET /survey_export_filtered`
- `GET /all-list/export_excel`
- `GET /treg1/export_excel` sampai `/treg7/export_excel`
- `POST /uploadbulk`
- `GET /add`
- `POST /add-proses`
- `GET /edit/{id}`
- `POST /update/{id}`
- `POST data/{id}`
- `GET /timeplan`

### Tabel Lama yang Terbaca dari Kode

#### `user_css`

Dipakai sebagai master calon responden.

Field dari model/controller:

- `id`
- `nama`
- `hp`
- `email`
- `treg`
- `status`
- `perusahaan`
- `bidang`
- `lab`
- `tahun`
- `created_at`
- `updated_at`

Nilai penting:

- `status`: `Telkom`, `Non-Telkom`
- `treg`: `TREG 1` sampai `TREG 7`
- `lab`: `Lab Medan`, `Lab Jakarta`, `Lab Surabaya`, `Lab Makassar`

#### `hasil_survey`

Dipakai sebagai tabel hasil survey.

Field dari model/controller:

- `id`
- `nama`
- `bidang`
- `email`
- `hp`
- `perusahaan`
- `lab`
- `status`
- `treg`
- `saran`
- `h1` sampai `h20`
- `k1` sampai `k20`
- `created_at`
- `updated_at`

Catatan:

- `h` berarti Harapan atau Importance.
- `k` berarti Kenyataan atau Performance.
- Nilai skor 1 sampai 5.
- Struktur lama melebar ke banyak kolom, sehingga kurang fleksibel jika jumlah pertanyaan berubah.

## Pertanyaan Survey Saat Ini

Pertanyaan dipakai untuk dua dimensi penilaian:

- Harapan
- Kenyataan

Daftar pertanyaan:

1. Peralatan dan infrastruktur Laboratorium Kalibrasi memadai.
2. Memiliki sistem informasi yang memadai dan mudah diakses.
3. Personel Kalibrasi berpenampilan rapi dan menarik.
4. Ruangan Customer Service representatif dan nyaman.
5. Personel bersikap ramah dan sopan kepada Pelanggan.
6. Personel Lab Kalibrasi peduli terhadap permintaan atau kebutuhan Pelanggan.
7. Personel Kalibrasi peduli terhadap keluhan (complain) Pelanggan.
8. Lab Kalibrasi menyediakan permintaan layanan di luar jam kerja.
9. Informasi yang disampaikan oleh Personel Kalibrasi mudah dipahami.
10. Personel Kalibrasi mudah dihubungi.
11. Personel Kalibrasi cepat tanggap dalam menerima permintaan Pelanggan.
12. Personel Kalibrasi cepat tanggap dalam menyelesaikan permintaan Pelanggan.
13. Personel Kalibrasi cepat tanggap dalam menangani keluhan (complain) Pelanggan.
14. Lab Kalibrasi memberikan layanan yang sesuai dengan standar mutu ISO-17025.
15. Lab Kalibrasi memberikan layanan yang tepat sesuai dengan spesifikasi yang diminta oleh Pelanggan.
16. Lab Kalibrasi memberikan layanan dengan mekanisme sesuai kontrak/PO.
17. Lab Kalibrasi memberikan layanan sesuai dengan jumlah yang diminta Pelanggan.
18. Lab Kalibrasi memberikan layanan yang dapat dipertanggungjawabkan secara legal.
19. Lab Kalibrasi dapat memberikan kepastian.
20. Personel Kalibrasi mempunyai kompetensi yang memadai.

Skala nilai:

- `1`: Tidak Penting / Tidak Puas
- `2`: Kurang Penting / Kurang Puas
- `3`: Cukup Penting / Cukup Puas
- `4`: Penting / Puas
- `5`: Sangat Penting / Sangat Puas

Label untuk Harapan:

- Tidak Penting
- Kurang Penting
- Cukup Penting
- Penting
- Sangat Penting

Label untuk Kenyataan:

- Tidak Puas
- Kurang Puas
- Cukup Puas
- Puas
- Sangat Puas

## Struktur Target Next.js

Rekomendasi stack:

- Next.js App Router
- TypeScript
- PostgreSQL
- Prisma ORM
- Zod untuk validasi request/form
- React Hook Form untuk survey multi-step
- TanStack Table untuk tabel dashboard
- Recharts atau Tremor untuk chart dashboard
- NextAuth/Auth.js atau session internal untuk admin
- Upload XLSX memakai parser seperti `xlsx`

Struktur folder awal:

```text
src/
  app/
    (public)/
      survey/[year]/page.tsx
      survey/success/page.tsx
    (admin)/
      dashboard/css/page.tsx
      dashboard/css/responden/page.tsx
      dashboard/css/responden/new/page.tsx
      dashboard/css/responden/[id]/edit/page.tsx
      dashboard/css/analysis/page.tsx
      dashboard/css/timeplan/page.tsx
    api/
      survey/
        respondents/route.ts
        submissions/route.ts
        check-name/route.ts
      admin/
        css/
          summary/route.ts
          respondents/route.ts
          submissions/route.ts
          export/route.ts
          import-respondents/route.ts
  components/
    survey/
      SurveyIntro.tsx
      SurveyStepper.tsx
      RespondentForm.tsx
      RatingQuestionTable.tsx
      RatingOption.tsx
    dashboard/
      SummaryCards.tsx
      SurveyChart.tsx
      RespondentTable.tsx
      SubmissionTable.tsx
      FilterBar.tsx
  lib/
    db.ts
    validations/
      survey.ts
      respondent.ts
    services/
      survey-service.ts
      dashboard-service.ts
      export-service.ts
  constants/
    survey-questions.ts
    labs.ts
    treg.ts
```

## Struktur Database PostgreSQL Target

Tujuan utama struktur baru adalah menghindari tabel melebar seperti `h1-h20` dan `k1-k20`.

### `survey_periods`

Menyimpan periode survey per tahun.

```text
id uuid primary key
year integer unique
title text
is_active boolean
starts_at timestamp nullable
ends_at timestamp nullable
created_at timestamp
updated_at timestamp
```

### `labs`

Master lab kalibrasi.

```text
id uuid primary key
code text unique
name text
city text
is_active boolean
created_at timestamp
updated_at timestamp
```

Contoh data:

- `lab-medan`, `Lab Medan`
- `lab-jakarta`, `Lab Jakarta`
- `lab-surabaya`, `Lab Surabaya`
- `lab-makassar`, `Lab Makassar`

### `respondents`

Pengganti `user_css`.

```text
id uuid primary key
survey_period_id uuid references survey_periods(id)
name text
phone text nullable
email text nullable
company text nullable
business_field text nullable
treg text nullable
customer_type text nullable
lab_id uuid references labs(id)
created_at timestamp
updated_at timestamp
```

Constraint yang disarankan:

- Unique per periode berdasarkan kombinasi `survey_period_id`, `name`, dan `company`.
- Index untuk `survey_period_id`, `treg`, `customer_type`, `lab_id`.

### `survey_questions`

Master pertanyaan.

```text
id uuid primary key
survey_period_id uuid references survey_periods(id)
number integer
question text
category text nullable
is_active boolean
created_at timestamp
updated_at timestamp
```

Catatan:

- Pertanyaan bisa berbeda per tahun.
- Jika pertanyaan tetap sama, tetap disimpan per periode agar histori tidak berubah ketika teks pertanyaan tahun baru diedit.

### `survey_submissions`

Header hasil survey.

```text
id uuid primary key
survey_period_id uuid references survey_periods(id)
respondent_id uuid nullable references respondents(id)
name text
phone text nullable
email text nullable
company text nullable
business_field text nullable
treg text nullable
customer_type text nullable
lab_id uuid references labs(id)
suggestion text nullable
submitted_at timestamp
created_at timestamp
updated_at timestamp
```

Catatan:

- Field profil tetap disalin ke submission supaya histori tidak berubah ketika data responden diedit setelah survey masuk.
- `respondent_id` nullable agar tetap bisa menampung input manual.

### `survey_answers`

Detail jawaban per pertanyaan.

```text
id uuid primary key
submission_id uuid references survey_submissions(id) on delete cascade
question_id uuid references survey_questions(id)
dimension text
score integer
created_at timestamp
updated_at timestamp
```

Nilai `dimension`:

- `expectation`
- `performance`

Constraint:

- `score` harus 1 sampai 5.
- Unique `submission_id`, `question_id`, `dimension`.

Dengan struktur ini, satu submission berisi 40 baris jawaban untuk 20 pertanyaan:

- 20 jawaban `expectation`
- 20 jawaban `performance`

## API yang Dibutuhkan

### Public Survey

#### `GET /api/survey/respondents?year=2025`

Mengambil daftar responden untuk dropdown.

Response minimal:

```json
[
  {
    "id": "uuid",
    "name": "Nama Responden",
    "email": "email@example.com",
    "phone": "08123",
    "company": "Nama Perusahaan",
    "businessField": "Bidang",
    "treg": "TREG 1",
    "customerType": "Telkom",
    "lab": {
      "id": "uuid",
      "name": "Lab Jakarta"
    }
  }
]
```

#### `GET /api/survey/check-name?year=2025&name=...`

Mengecek apakah nama responden sudah mengisi survey di tahun yang sama.

Response:

```json
{
  "exists": true
}
```

#### `POST /api/survey/submissions`

Menyimpan survey.

Payload target:

```json
{
  "year": 2025,
  "respondentId": "uuid",
  "profile": {
    "name": "Nama",
    "phone": "08123",
    "email": "email@example.com",
    "company": "Perusahaan",
    "businessField": "Bidang",
    "treg": "TREG 1",
    "customerType": "Telkom",
    "labId": "uuid"
  },
  "answers": [
    {
      "questionId": "uuid",
      "expectationScore": 5,
      "performanceScore": 4
    }
  ],
  "suggestion": "Saran pelanggan"
}
```

Validasi:

- Tahun wajib.
- Nama, HP, email, perusahaan, bidang, dan lab wajib.
- Semua pertanyaan aktif wajib memiliki skor harapan dan kenyataan.
- Skor hanya 1 sampai 5.
- Cegah submit ganda untuk responden yang sama pada periode yang sama, kecuali admin mengizinkan override.

### Admin Dashboard

#### `GET /api/admin/css/summary?year=2025`

Mengambil ringkasan dashboard.

Data yang dibutuhkan:

- Total target responden.
- Total survey masuk.
- Persentase partisipasi.
- Total per lab.
- Total per TREG.
- Total Telkom vs Non-Telkom.
- Jumlah belum mengisi.
- Jumlah saran masuk.
- Rata-rata harapan.
- Rata-rata kenyataan.
- Gap harapan vs kenyataan.

#### `GET /api/admin/css/respondents?year=2025&treg=&lab=&status=&filled=`

Mengambil master responden dengan filter.

#### `POST /api/admin/css/respondents`

Tambah responden.

#### `PATCH /api/admin/css/respondents/:id`

Edit responden.

#### `DELETE /api/admin/css/respondents/:id`

Hapus responden.

#### `POST /api/admin/css/import-respondents`

Upload Excel calon responden.

Opsi import:

- Tambah data tanpa hapus data lama.
- Replace data per TREG dan tahun.
- Validasi duplicate sebelum insert.

#### `GET /api/admin/css/submissions?year=2025&search=&treg=&lab=&customerType=`

Mengambil hasil survey.

#### `GET /api/admin/css/export?year=2025&type=submissions`

Export hasil survey ke Excel.

Tipe export:

- `submissions`: hasil survey.
- `respondents`: master responden.
- `filtered-submissions`: hasil survey sesuai filter aktif.

## Halaman yang Perlu Dibangun

### Public

#### `/survey/[year]`

Isi:

- Intro survey.
- Stepper 3 langkah.
- Form identitas responden.
- Rating harapan.
- Rating kenyataan.
- Saran.
- Submit.

UX penting:

- Dropdown responden dengan autocomplete.
- Tetap boleh input manual jika nama tidak ada.
- Auto-fill profil ketika nama dipilih.
- Validasi per langkah.
- Indikator progress.
- Tampilan mobile harus nyaman karena pelanggan kemungkinan mengisi dari HP.

#### `/survey/success`

Isi:

- Konfirmasi survey berhasil.
- Pesan terima kasih.

### Admin

#### `/dashboard/css`

Isi:

- Filter tahun.
- Summary cards.
- Partisipasi nasional.
- Partisipasi per TREG.
- Partisipasi per lab.
- Telkom vs Non-Telkom.
- Saran terbaru per lab.
- Tombol export.

#### `/dashboard/css/responden`

Isi:

- Daftar responden.
- Filter tahun, TREG, lab, status, sudah/belum isi.
- Tambah responden.
- Edit responden.
- Hapus responden.
- Import Excel.
- Export Excel.

#### `/dashboard/css/analysis`

Isi:

- Rata-rata harapan per pertanyaan.
- Rata-rata kenyataan per pertanyaan.
- Gap per pertanyaan.
- Analisis per lab.
- Analisis per TREG.
- Analisis Telkom vs Non-Telkom.

#### `/dashboard/css/timeplan`

Isi:

- Target kegiatan survey.
- Status progress.
- Bisa dibuat statis dulu jika belum ada tabel timeplan.

## Rumus Dashboard

### Total Target Responden

Jumlah baris `respondents` pada periode terpilih.

### Total Survey Masuk

Jumlah baris `survey_submissions` pada periode terpilih.

### Persentase Partisipasi

```text
survey_masuk / target_responden * 100
```

Jika target responden 0, tampilkan 0%.

### Belum Mengisi

Responden yang belum punya submission pada periode yang sama.

### Rata-rata Harapan

Rata-rata `survey_answers.score` dengan `dimension = expectation`.

### Rata-rata Kenyataan

Rata-rata `survey_answers.score` dengan `dimension = performance`.

### Gap

```text
rata_rata_kenyataan - rata_rata_harapan
```

Interpretasi:

- Gap positif: kinerja melebihi harapan.
- Gap nol: sesuai harapan.
- Gap negatif: kinerja masih di bawah harapan.

## Steering Halaman Analisis Dinamis

Halaman analisis lama saat ini masih dibuat manual per tahun:

- `resources/views/awanlab/css/analisis23.blade.php`
- `resources/views/awanlab/css/analisis24.blade.php`
- `resources/views/awanlab/css/analisis25.blade.php`

Route lama juga manual:

- `/analisis2023`
- `/analisis2024`
- `/analisis2025`

Untuk rebuild Next.js, analisis tidak perlu dibuat ulang menjadi `analisis26`, `analisis27`, dan seterusnya. Cukup satu halaman dinamis:

```text
/dashboard/css/analysis?year=2026
```

Filter yang dibutuhkan:

- Tahun: 2023, 2024, 2025, 2026, dan seterusnya.
- Pembanding: otomatis `tahun dipilih - 1`, tetapi bisa juga dibuat opsi manual.
- Lab: Semua, Lab Medan, Lab Jakarta, Lab Surabaya, Lab Makassar.
- Segment pelanggan: Semua, Telkom, Non-Telkom.
- TREG: Semua, TREG 1 sampai TREG 7.

Data yang dihitung ulang ketika filter berubah:

- Jumlah responden.
- Jumlah survey masuk.
- Persentase partisipasi.
- MIS atau total/rata-rata Importance.
- MSS atau total/rata-rata Performance.
- Weight Factor.
- Weight Score.
- CSI.
- Gap performance terhadap importance.
- IPA per pertanyaan.
- Perbandingan nilai dengan tahun sebelumnya.

### Perbandingan Tahun dan Icon Naik/Turun

Setiap nilai utama di analisis perlu dibandingkan dengan periode sebelumnya. Misalnya user memilih tahun 2026, maka sistem mengambil data 2026 sebagai current year dan 2025 sebagai previous year.

Nilai yang perlu dibandingkan:

- CSI per lab.
- CSI nasional.
- CSI Telkom dan Non-Telkom.
- MIS per lab.
- MSS per lab.
- Rata-rata Importance.
- Rata-rata Performance.
- Gap.
- Participation rate.

Aturan icon:

```text
delta = nilai_tahun_dipilih - nilai_tahun_sebelumnya
```

- Jika `delta > 0`, tampilkan icon naik warna success.
- Jika `delta < 0`, tampilkan icon turun warna danger.
- Jika `delta = 0`, tampilkan tanda netral atau tidak perlu icon.
- Jika data tahun sebelumnya belum ada, tampilkan `-` dan jangan tampilkan icon.

Di Next.js, icon ini sebaiknya dibuat sebagai komponen reusable:

```text
TrendValue
props:
  value: number
  previousValue?: number
  precision?: number
  suffix?: string
```

Output komponen:

- Icon naik jika value lebih besar dari previousValue.
- Icon turun jika value lebih kecil dari previousValue.
- Angka utama.
- Delta kecil jika dibutuhkan, misalnya `+1.25` atau `-0.40`.

Icon naik mengikuti SVG `svg-icon-success` yang sudah dipakai di dashboard lama.
Icon turun mengikuti SVG `svg-icon-danger` yang sudah dipakai di dashboard lama.

Catatan implementasi:

- Class lama memiliki typo `align-items-senter`; di rebuild gunakan `align-items-center`.
- Jangan copy SVG berulang di setiap card. Simpan sebagai komponen `TrendUpIcon` dan `TrendDownIcon`.
- Untuk dashboard baru, boleh memakai icon library, tetapi bentuk visual harus tetap konsisten dengan icon existing yang diberikan.

### Struktur API Analisis

Endpoint utama:

```text
GET /api/admin/css/analysis?year=2026&lab=all&customerType=all&treg=all
```

Response target:

```json
{
  "year": 2026,
  "previousYear": 2025,
  "filters": {
    "lab": "all",
    "customerType": "all",
    "treg": "all"
  },
  "summary": {
    "respondentTarget": 120,
    "submissionCount": 100,
    "participationRate": 83.33,
    "previousParticipationRate": 80.12,
    "csi": 91.2,
    "previousCsi": 89.7,
    "averageImportance": 4.66,
    "previousAverageImportance": 4.61,
    "averagePerformance": 4.54,
    "previousAveragePerformance": 4.49,
    "gap": -0.12,
    "previousGap": -0.12
  },
  "byLab": [
    {
      "lab": "Lab Medan",
      "csi": 91.2,
      "previousCsi": 89.5,
      "averageImportance": 4.66,
      "averagePerformance": 4.54,
      "gap": -0.12
    }
  ],
  "ipa": {
    "xAxis": "performance",
    "yAxis": "importance",
    "xAverage": 4.53,
    "yAverage": 4.66,
    "points": [
      {
        "questionNumber": 1,
        "question": "Peralatan dan infrastruktur Laboratorium Kalibrasi memadai.",
        "importance": 4.7,
        "performance": 4.48,
        "gap": -0.22,
        "quadrant": "concentrate-here"
      }
    ]
  }
}
```

## Steering IPA Dinamis

Di halaman lama, bagian `Result IPA ALL Laboratorium Kalibrasi Telkom` masih memakai gambar PNG manual seperti:

- `/public/ipa/medan2025.png`
- `/public/ipa/jakarta2025.png`
- `/public/ipa/surabaya2025.png`
- `/public/ipa/makassar2025.png`
- `/public/ipa/nasional2025.png`

Untuk rebuild, IPA sebaiknya tidak lagi bergantung pada gambar manual per tahun. Chart dibuat dinamis dari data survey.

### Cara Membaca IPA

Pada gambar `public/ipa/medan2025.png`:

- Sumbu X adalah Performance atau Kenyataan.
- Sumbu Y adalah Importance atau Harapan.
- Setiap titik adalah nomor pertanyaan.
- Garis vertikal merah adalah rata-rata Performance.
- Garis horizontal merah adalah rata-rata Importance.
- Posisi titik menentukan kuadran prioritas.

### Data yang Dibutuhkan untuk IPA

Untuk setiap pertanyaan:

```text
importance = rata-rata skor expectation untuk pertanyaan tersebut
performance = rata-rata skor performance untuk pertanyaan tersebut
gap = performance - importance
```

Rata-rata pembagi kuadran:

```text
xAverage = rata-rata semua performance pada scope filter
yAverage = rata-rata semua importance pada scope filter
```

### Kuadran IPA

```text
if performance < xAverage and importance >= yAverage:
  quadrant = concentrate-here

if performance >= xAverage and importance >= yAverage:
  quadrant = keep-up-the-good-work

if performance < xAverage and importance < yAverage:
  quadrant = low-priority

if performance >= xAverage and importance < yAverage:
  quadrant = possible-overkill
```

Label kuadran:

- `concentrate-here`: penting tetapi performa masih di bawah rata-rata.
- `keep-up-the-good-work`: penting dan performa sudah tinggi.
- `low-priority`: importance dan performance sama-sama relatif rendah.
- `possible-overkill`: performa tinggi pada aspek yang importance-nya relatif lebih rendah.

### Tampilan IPA di Next.js

Komponen yang disarankan:

```text
IpaScatterChart
props:
  title: string
  points: IpaPoint[]
  xAverage: number
  yAverage: number
```

Fitur chart:

- Scatter point untuk 20 pertanyaan.
- Label nomor pertanyaan.
- Tooltip berisi nomor, teks pertanyaan, importance, performance, gap, dan kuadran.
- Garis vertikal rata-rata Performance.
- Garis horizontal rata-rata Importance.
- Filter lab/tahun langsung mengganti data chart.
- Export chart sebagai PNG boleh dibuat setelah versi dashboard stabil.

Dengan cara ini, ketika tahun 2026 berjalan, sistem cukup menerima data survey 2026 dan chart IPA akan otomatis muncul dari data, tanpa membuat file `medan2026.png` secara manual.

## Migrasi Data Lama ke PostgreSQL

Tahap migrasi:

1. Export data lama dari MySQL/Laravel:
   - `user_css`
   - `hasil_survey`
2. Buat `survey_periods` untuk tahun data lama, misalnya 2023, 2024, 2025.
3. Insert master `labs`.
4. Insert `respondents` dari `user_css`.
5. Insert `survey_questions` untuk tiap periode.
6. Insert `survey_submissions` dari `hasil_survey`.
7. Pecah kolom `h1-h20` dan `k1-k20` menjadi baris di `survey_answers`.
8. Cocokkan `respondent_id` berdasarkan nama, perusahaan, dan tahun jika memungkinkan.
9. Audit jumlah:
   - Jumlah responden lama vs baru.
   - Jumlah submission lama vs baru.
   - Jumlah jawaban baru harus `jumlah_submission * 40`.

## Keputusan Teknis yang Perlu Dikunci

Sebelum build, tim perlu menyepakati:

- Apakah survey publik tetap memakai URL `/CSS2025` atau diganti menjadi `/survey/2025`.
- Apakah responden wajib dipilih dari master, atau boleh input manual.
- Aturan submit ulang: ditolak, update jawaban lama, atau admin approval.
- Role admin yang dibutuhkan.
- Format Excel import/export yang ingin dipertahankan dari sistem lama.
- Apakah pertanyaan bisa diedit dari dashboard atau cukup lewat seed/config.
- Apakah dashboard analisis harus sama persis dengan halaman `analisis25.blade.php` atau boleh diringkas dengan visual baru.

## Prioritas Build

### Fase 1: Fondasi

- Setup Next.js + PostgreSQL.
- Setup Prisma schema.
- Seed lab, periode, dan 20 pertanyaan.
- Buat halaman survey publik.
- Buat API submit survey.

### Fase 2: Dashboard Dasar

- Halaman summary dashboard.
- Daftar responden.
- Daftar hasil survey.
- Filter tahun, lab, TREG, status.
- Export hasil survey.

### Fase 3: Operasional Admin

- CRUD responden.
- Import Excel.
- Status sudah/belum mengisi.
- Proteksi login admin.

### Fase 4: Analisis

- Chart rata-rata harapan dan kenyataan.
- Gap analysis.
- Analisis per lab dan per TREG.
- Export analisis.

### Fase 5: Migrasi dan Cutover

- Migrasi data lama.
- Validasi angka dashboard lama vs baru.
- Deploy staging.
- UAT internal.
- Deploy production.

## Risiko dan Catatan

- Data lama memakai nama responden sebagai penghubung utama, sehingga matching ke responden baru bisa tidak sempurna jika ada nama duplikat.
- Migration lama untuk `user_css` dan `hasil_survey` tidak ditemukan di hasil pencarian, jadi struktur final harus dikonfirmasi dari database production atau export schema.
- Beberapa dashboard lama menghitung tahun dari `created_at`, sementara sebagian responden memakai field `tahun`. Di sistem baru semua harus konsisten memakai `survey_period_id`.
- Struktur baru akan membuat export perlu mapping ulang agar tetap menghasilkan format Excel yang familiar.
- Validasi frontend saja tidak cukup; API tetap wajib validasi semua skor dan profil.

## Output Minimum untuk Rebuild Pertama

Rebuild pertama dianggap siap diuji jika sudah ada:

- Halaman `/survey/2025`.
- Submit survey masuk ke PostgreSQL.
- Dashboard `/dashboard/css` menampilkan total target, total masuk, persentase, per lab, per TREG.
- Halaman daftar responden dengan import manual minimal.
- Export hasil survey.
- Script migrasi awal dari format lama ke format baru.
