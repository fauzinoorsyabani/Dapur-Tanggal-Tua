# Geo Booster — Brand Logo Assets

## Implementasi

Kartu produk sekarang memakai logo brand, bukan lagi visual kategori generik. Mapping disimpan di `php-app/public/index.php` melalui fungsi `brandLogo()` dan asset lokal berada di `php-app/public/assets/logos/`.

Brand yang tercakup:

- Gemini
- CapCut
- Microsoft Office
- Adobe
- Duolingo
- Canva
- iLovePDF
- Gmail
- Crunchyroll
- Avira
- Notion
- edX
- Prime Video
- JetBrains
- Figma
- Framer
- Miro
- Autodesk
- YouTube
- HBO
- Grok

Asset future-ready juga disiapkan untuk ChatGPT/OpenAI dan Claude.

## Sumber dan penggunaan

Logo SVG utama bersumber dari **Simple Icons**, yang menyatakan proyeknya sebagai CC0 dan menyediakan ikon brand dalam format SVG: <https://simpleicons.org/>. Gemini, CapCut, dan Grok memakai asset gambar hasil image search karena tidak tersedia sebagai icon yang cocok di paket Simple Icons pada saat implementasi.

Logo adalah merek dagang milik pemilik masing-masing. Geo Booster hanya menampilkannya untuk identifikasi produk dan tidak menyatakan afiliasi, endorsement, atau kepemilikan atas merek tersebut. Sebelum commercial launch, review ulang brand guidelines dan izin reseller setiap layanan.

## Update asset

Untuk mengganti logo:

1. Simpan asset baru di `php-app/public/assets/logos/`.
2. Update mapping `brandLogo()`.
3. Rebuild `php-app/static/`.
4. Upload asset dan HTML/CSS static ke CDN production.
5. Update URL di `php-app/api/site.js` dan `php-app/api/style.js`.
6. Jalankan lint dan smoke test sebelum push.
