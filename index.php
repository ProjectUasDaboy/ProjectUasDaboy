<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Hape</title>
    <link rel="stylesheet" href="styles-index.css">
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
                    <p><strong>Alamat: </strong>Jalan Teratai No. 123 </p>
                    <p><strong>Telp: </strong> 08123456789</p>
                </div>
            </div>
        </div>
        <div class="content">
            <form id="compareForm" action="compare.php" method="POST">
                <div class="cards">
                    <?php include 'data.php'; foreach ($arrHape as $hape): ?>
                        <div class="card">
                            <img src="<?php echo $hape['url_gambar']; ?>" alt="<?php echo $hape['Model']; ?>">
                            <h2><?php echo $hape['Merk'] . " " . $hape['Model']; ?></h2>
                            <p>Harga: Rp<?php echo number_format($hape['Harga'], 0, ',', '.'); ?></p>
                            <label>
                                <input type="checkbox" name="compare[]" value="<?php echo $hape['SKU']; ?>" onchange="validateCheckboxes()"> Pilih
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" id="compareButton" disabled>Bandingkan</button>
            </form>
        </div>
    </div>

    <script>
        function validateCheckboxes() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const checked = document.querySelectorAll('input[type="checkbox"]:checked');
            const button = document.getElementById('compareButton');

            if (checked.length === 3) {
                button.disabled = false;
                checkboxes.forEach(checkbox => {
                    if (!checkbox.checked) checkbox.disabled = true;
                });
            } else {
                button.disabled = true;
                checkboxes.forEach(checkbox => checkbox.disabled = false);
            }
        }
    </script>
</body>
</html>
