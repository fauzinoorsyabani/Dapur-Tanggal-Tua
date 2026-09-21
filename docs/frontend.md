# Frontend Specification

## Arah visual

Geo Booster menggunakan editorial utility: latar off-white, ink gelap, violet sebagai aksen utama, dan lime sebagai signal positif. Tipografi Space Grotesk memberi karakter pada heading, Manrope menjaga body text tetap mudah dibaca, dan DM Mono menandai metadata atau status. Layout memadukan whitespace luas dengan kartu produk yang ringkas.

## Prinsip UX

Landing page menjawab tiga pertanyaan: apa yang dijual, mengapa dapat dipercaya, dan bagaimana prosesnya. CTA utama mengarah ke katalog, bukan langsung ke pembayaran. Detail harga dan status produk harus dapat dibaca tanpa hover. Placeholder fitur tidak boleh terlihat seperti sudah aktif.

## Accessibility

HTML memakai landmark semantic, heading berurutan, focus state bawaan browser, label untuk control, dan contrast yang memadai. Filter katalog harus dapat digunakan dengan keyboard. `prefers-reduced-motion` dihormati. JavaScript hanya meningkatkan pengalaman; halaman tetap memiliki konten inti tanpa JavaScript.

## Responsive behavior

Desktop memakai grid dua kolom pada hero dan tiga kolom pada katalog. Di bawah 800px layout menjadi satu kolom dan navigasi disederhanakan. Di bawah 500px kartu katalog menjadi satu kolom agar teks tidak terjepit.

## Content rules

Jangan menjanjikan akses “resmi” atau “seumur hidup” tanpa bukti. Gunakan bahasa faktual: durasi, jenis akses, perangkat, region, dan support window harus eksplisit pada halaman detail SKU.
