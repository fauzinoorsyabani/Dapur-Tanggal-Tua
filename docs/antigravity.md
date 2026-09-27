# Geo Booster di IDE Antigravity

## Open project

Buka folder repository ini sebagai workspace: `/home/ubuntu/geo-booster`. Source canonical PHP berada di `php-app/`; web root-nya adalah `php-app/public/`.

## Run locally

Pada terminal IDE jalankan:

```bash
./run-local.sh
```

Kemudian buka `http://127.0.0.1:8080`. Untuk menjalankan manual tanpa launcher:

```bash
php -S 127.0.0.1:8080 -t php-app/public
```

## Safe development rules

Edit source PHP di `php-app/public/`, konfigurasi non-rahasia di `php-app/config/`, dan dokumentasi di `docs/`. Jangan commit `.env`, password, API key, akun pelanggan, inventory credential, OTP, atau payment secret. Jangan menjadikan `php-app/config/` sebagai document root.

## Validate before push

```bash
php -l php-app/public/index.php
php -l php-app/config/app.php
git status --short
git diff --check
```

## Current flow

MVP saat ini bersifat catalogue-first. Klik produk membuka WhatsApp Geo Booster dengan pesan yang sudah terisi. Database dan adapter payment Curies masih berada pada tahap planning; jangan mengaktifkan pembayaran nyata tanpa sandbox test, webhook verification, refund policy, dan verifikasi legalitas produk.

## Deployment

Static production build ada di `php-app/static/`. Setelah perubahan frontend, rebuild dengan:

```bash
cd php-app
rm -rf static/assets
mkdir -p static/assets
php public/index.php > static/index.html
cp public/assets/style.css static/assets/style.css
cp -R public/assets/products static/assets/products
cp public/.htaccess static/.htaccess
```

Push ke branch `main` setelah validasi. URL production saat ini: <https://geo-booster-fauzins-projects.vercel.app/>.
