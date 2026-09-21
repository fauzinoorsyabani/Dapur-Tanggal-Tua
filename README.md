# Geo Booster

Geo Booster adalah fondasi Software as a Service (SaaS) untuk katalog dan penjualan produk digital secara transparan, aman, dan mudah dioperasikan. Versi awal ini memakai **PHP 8.2+ tanpa TypeScript** untuk menjaga kurva belajar tetap rendah.

## Status proyek

Repositori ini sebelumnya berisi aplikasi React/TypeScript dari proyek lain. Fondasi Geo Booster ditambahkan sebagai aplikasi PHP mandiri di `php-app/` agar migrasi dapat dilakukan bertahap tanpa menghapus aset lama.

Versi yang tersedia saat ini adalah **catalogue-first MVP**: landing page, katalog produk, filter kategori, trust signals, dan alur permintaan pesanan yang belum terhubung ke pembayaran atau provisioning otomatis.

## Website production

Website permanen tersedia di [geo-booster-eta.vercel.app](https://geo-booster-eta.vercel.app/). Deployment production dibuat dari export statis `php-app/static/`, sedangkan aplikasi PHP di `php-app/public/` tetap menjadi source canonical untuk pengembangan backend berikutnya.

## Menjalankan lokal

```bash
cd php-app
php -S 127.0.0.1:8080 -t public
```

Buka `http://127.0.0.1:8080`.

## Struktur penting

- `php-app/public/` — web root dan asset yang boleh diakses publik.
- `php-app/config/` — konfigurasi non-rahasia dan data katalog sementara.
- `docs/` — system design, project management, backend, frontend, API, data model, dan threat model.
- `.agent/skills/` — aturan kerja agentic engineering yang wajib diikuti saat mengembangkan fitur.

## Prinsip produk

Geo Booster tidak boleh menjual kredensial curian, akses ilegal, atau produk yang melanggar kebijakan penyedia layanan. Integrasi pembayaran dan fulfillment hanya boleh diaktifkan setelah legalitas reseller, terms of service, refund policy, dan bukti kepemilikan lisensi diverifikasi.

## Referensi internal

Mulai dari [System Design](docs/architecture.md), lalu baca [Project Management](docs/project-management.md) dan [Agentic Engineering](docs/agentic-engineering.md).

## Pengujian cepat

```bash
php -l php-app/public/index.php
```

Untuk deployment, gunakan PHP-FPM/Nginx atau Apache dengan document root menunjuk ke `php-app/public/`. Jangan pernah menjadikan `config/`, `storage/`, atau `.env` sebagai web root.

Deployment Vercel saat ini menggunakan upload production langsung karena GitHub App Vercel belum terpasang pada akun. Jika GitHub App diaktifkan, project dapat dihubungkan ke branch `main` agar deployment berjalan otomatis setiap push.
