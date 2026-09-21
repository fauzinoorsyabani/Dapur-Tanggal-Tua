<?php

declare(strict_types=1);

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: strict-origin-when-cross-origin');
header("Permissions-Policy: camera=(), microphone=(), geolocation=()");
header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' 'unsafe-inline'; img-src 'self' data:; connect-src 'self'; frame-ancestors 'none'; base-uri 'self'; form-action 'self'");

$app = require __DIR__ . '/../config/app.php';

$products = [
    ['name' => 'AI Workspace', 'category' => 'AI & Productivity', 'eyebrow' => 'Paling dicari', 'description' => 'Akses produktivitas AI untuk riset, ideasi, dan pekerjaan harian.', 'price' => 'Mulai Rp39.000', 'class' => 'violet', 'icon' => '✦'],
    ['name' => 'Streaming Bundle', 'category' => 'Entertainment', 'eyebrow' => 'Hemat hingga 40%', 'description' => 'Pilihan hiburan digital untuk menemani waktu santai tanpa proses rumit.', 'price' => 'Mulai Rp25.000', 'class' => 'orange', 'icon' => '▶'],
    ['name' => 'Music Premium', 'category' => 'Entertainment', 'eyebrow' => 'Bebas iklan', 'description' => 'Dengarkan musik favorit dengan pengalaman yang lebih fokus dan personal.', 'price' => 'Mulai Rp29.000', 'class' => 'cyan', 'icon' => '♪'],
    ['name' => 'Creator Toolkit', 'category' => 'AI & Productivity', 'eyebrow' => 'Untuk kreator', 'description' => 'Tools pilihan untuk mempercepat workflow konten dan kolaborasi digital.', 'price' => 'Mulai Rp49.000', 'class' => 'lime', 'icon' => '⌁'],
    ['name' => 'Study Companion', 'category' => 'Education', 'eyebrow' => 'Belajar lebih terarah', 'description' => 'Akses layanan digital yang membantu sesi belajar tetap konsisten.', 'price' => 'Mulai Rp35.000', 'class' => 'pink', 'icon' => '◈'],
    ['name' => 'Team Access', 'category' => 'Business', 'eyebrow' => 'Untuk tim kecil', 'description' => 'Paket digital dengan onboarding yang jelas untuk kebutuhan kerja tim.', 'price' => 'Mulai Rp79.000', 'class' => 'blue', 'icon' => '＋'],
];

function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function slug(string $value): string { return strtolower((string) preg_replace('/[^a-z0-9]+/i', '-', $value)); }
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Geo Booster — akses produk digital premium dengan proses yang jelas, cepat, dan aman.">
    <title><?= e($app['name']) ?> — Digital access, made clear.</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="#top" aria-label="Geo Booster home"><span class="brand-mark">G</span><span>Geo<span class="brand-accent">Booster</span></span></a>
        <nav class="nav" aria-label="Navigasi utama">
            <a href="#catalog">Katalog</a><a href="#how-it-works">Cara kerja</a><a href="#faq">FAQ</a>
        </nav>
        <a class="header-cta" href="<?= e($app['support_url']) ?>" target="_blank" rel="noopener">Chat support <span>↗</span></a>
    </header>

    <main id="top">
        <section class="hero section-shell">
            <div class="hero-copy">
                <div class="pill"><span class="pulse"></span> Akses digital, tanpa drama</div>
                <h1>Produk premium.<br><em>Jelas</em> sejak awal.</h1>
                <p class="hero-lead">Temukan akses digital yang kamu butuhkan dengan informasi paket yang transparan, proses yang ringkas, dan support manusia yang responsif.</p>
                <div class="hero-actions"><a class="button button-primary" href="#catalog">Lihat katalog <span>↓</span></a><a class="text-link" href="#how-it-works">Kenapa Geo Booster? <span>↗</span></a></div>
                <div class="mini-proof"><div class="avatars"><i>R</i><i>A</i><i>D</i><i>+</i></div><span><strong>1.200+</strong> pengguna mulai dari sini</span></div>
            </div>
            <div class="hero-art" aria-label="Ilustrasi paket digital Geo Booster">
                <div class="orbit orbit-one"></div><div class="orbit orbit-two"></div>
                <div class="float-card card-top"><span class="card-dot"></span><b>FAST DELIVERY</b><small>Dalam hitungan menit</small></div>
                <div class="main-orb"><div class="orb-grid"></div><span>G<span class="brand-accent">B</span></span></div>
                <div class="float-card card-bottom"><span class="check">✓</span><div><b>Verified access</b><small>Curated by Geo Booster</small></div></div>
                <div class="spark spark-one">✦</div><div class="spark spark-two">✧</div>
            </div>
        </section>

        <section class="trustbar"><div class="section-shell trust-inner"><span class="trust-label">Dibuat untuk akses yang lebih tenang</span><span>✦ Transparency first</span><span>◌ Human support</span><span>⌁ Curated products</span></div></section>

        <section id="catalog" class="section-shell catalog-section">
            <div class="section-heading"><div><div class="eyebrow">01 / EXPLORE</div><h2>Find your <em>fit.</em></h2></div><p>Mulai dari kebutuhanmu. Setiap produk hadir dengan detail paket dan jalur bantuan yang mudah ditemukan.</p></div>
            <div class="filter-row" role="group" aria-label="Filter katalog"><button class="filter active" data-filter="all">Semua</button><button class="filter" data-filter="AI & Productivity">AI & Productivity</button><button class="filter" data-filter="Entertainment">Entertainment</button><button class="filter" data-filter="Education">Education</button><button class="filter" data-filter="Business">Business</button></div>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <article class="product-card" data-category="<?= e($product['category']) ?>"><div class="product-visual <?= e($product['class']) ?>"><span class="product-icon"><?= e($product['icon']) ?></span><span class="product-orbit"></span><span class="product-label"><?= e($product['eyebrow']) ?></span></div><div class="product-body"><div><span class="product-category"><?= e($product['category']) ?></span><h3><?= e($product['name']) ?></h3></div><p><?= e($product['description']) ?></p><div class="product-foot"><strong><?= e($product['price']) ?></strong><a href="<?= e($app['support_url']) ?>" target="_blank" rel="noopener" aria-label="Tanya tentang <?= e($product['name']) ?>">→</a></div></div></article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="how-it-works" class="process-section"><div class="section-shell"><div class="section-heading light"><div><div class="eyebrow">02 / SIMPLE PROCESS</div><h2>From curious<br>to <em>covered.</em></h2></div><p>Satu alur yang mudah dipahami. Tidak ada jargon yang disembunyikan dan tidak ada langkah yang dibuat berputar-putar.</p></div><div class="process-grid"><div class="process-step"><span>01</span><h3>Pilih kebutuhan</h3><p>Bandingkan kategori dan detail paket yang paling relevan untukmu.</p></div><div class="process-step"><span>02</span><h3>Chat dengan kami</h3><p>Konfirmasi stok, durasi, dan ketentuan sebelum melakukan pembayaran.</p></div><div class="process-step"><span>03</span><h3>Terima akses</h3><p>Setelah pembayaran terverifikasi, instruksi akses dikirim melalui kanal yang disepakati.</p></div></div></div></section>

        <section id="faq" class="section-shell faq-section"><div class="section-heading"><div><div class="eyebrow">03 / GOOD TO KNOW</div><h2>Pertanyaan<br>yang <em>sering</em> muncul.</h2></div></div><div class="faq-list"><details open><summary>Apakah produk Geo Booster legal dan aman?</summary><p>Kami hanya akan menayangkan produk yang memiliki sumber dan hak distribusi yang dapat diverifikasi. Detail kebijakan dan syarat tiap produk wajib dibaca sebelum checkout.</p></details><details><summary>Bagaimana jika saya membutuhkan bantuan?</summary><p>Gunakan tombol Chat support untuk terhubung dengan tim kami. Kami membantu proses sebelum dan sesudah pembelian melalui kanal resmi.</p></details><details><summary>Apakah sudah ada pembayaran otomatis?</summary><p>Versi awal ini masih menggunakan alur konfirmasi manual. Payment gateway dan fulfillment otomatis menjadi milestone berikutnya setelah verifikasi operasional selesai.</p></details></div></section>
    </main>
    <footer class="site-footer"><div class="section-shell footer-inner"><a class="brand" href="#top"><span class="brand-mark">G</span><span>Geo<span class="brand-accent">Booster</span></span></a><p>Digital access, made clear.</p><span>© <?= date('Y') ?> Geo Booster</span></div></footer>
    <script>
    document.querySelectorAll('.filter').forEach(function (button) { button.addEventListener('click', function () { document.querySelectorAll('.filter').forEach(function (item) { item.classList.remove('active'); }); button.classList.add('active'); var value = button.dataset.filter; document.querySelectorAll('.product-card').forEach(function (card) { card.hidden = value !== 'all' && card.dataset.category !== value; }); }); });
    </script>
</body>
</html>
