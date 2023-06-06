<?php 
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;700&family=Raleway:wght@200;400;700&family=Rambla:wght@700&display=swap"
    rel="stylesheet"/>
  
    <!-- My Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
  
    <!-- My Styles -->
    <link rel="stylesheet" href="style/style5.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <h1>Loneliness Level Test</h1>
            </div>
        </div>
        <div class="banner">
            <div class="banner-desc">
                <p>Meningkatnya rasa kesepian dapat berdampak buruk pada kesehatan mental Anda, oleh karena itu disarankan untuk mengevaluasi tingkat kesepian Anda sebagai tindakan awal untuk mengurangi risikonya.</p>
            </div>
            <div class="banner-img">
                <img src="style/Checklist.jpg" alt="">
            </div>
            <div class="banner-panduan">
                <h2>Panduan Loneliness Level Test</h1>
                <ul>
                    <li>1. Isilah dengan jujur</li>
                    <li>2. Tidak ada jawaban yang benar ataupun salah</li>
                    <li>3. Cari tempat yang nyaman supaya fokus</li>
                    <li>4. Hasil tes bisa didapatkan setelah mengisi semua pertanyaan dengan lengkap.</li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <div class="footer-button">
                <a href="tes1.php?id=<?php echo $id?>">Mulai Tes</a>
            </div>
            <div class="footer-line"></div>
        </div>
    </div>
</body>
</html>
