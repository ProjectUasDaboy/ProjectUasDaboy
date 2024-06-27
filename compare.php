<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
    include 'data.php';
    $selectedSKUs = $_POST['compare'];
    $selectedHape = array_filter($arrHape, function($hape) use ($selectedSKUs) {
        return in_array($hape['SKU'], $selectedSKUs);
    });
} else {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbandingan Hape</title>
    <link rel="stylesheet" href="styles-compare.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="top-section">
                <div class="logo-container">
                    <img src="img/logo.png" alt="Logo Toko Hape" class="logo">
                </div>
                <h1>Daboy Store</h1>
            </div>
            <div class="bottom-section">
                <div class="contact-info">
                    <p><strong>Alamat:</strong> Jalan Teratai No. 123</p>
                    <p><strong>Telp:</strong> 08123456789</p>
                </div>
            </div>
        </div>
        <div class="content">
            <h1 class="compare-heading">Perbandingan Hape</h1>
            <div class="comparison">
                <?php if (!empty($selectedHape)): ?>
                    <?php foreach ($selectedHape as $hape): ?>
                        <div class="compare-card">
                            <img src="<?php echo $hape['url_gambar']; ?>" alt="<?php echo $hape['Model']; ?>">
                            <h2><?php echo $hape['Merk'] . " " . $hape['Model']; ?></h2>
                            <p>Harga: Rp<?php echo number_format($hape['Harga'], 0, ',', '.'); ?></p>
                            <ul>
                                <?php foreach ($hape['spec'] as $spec): ?>
                                    <li><?php echo $spec; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada produk yang dipilih untuk dibandingkan.</p>
                <?php endif; ?>
                <a href="index.php" class="back-link"><< Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
