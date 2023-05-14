<?php 
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loneliness Level Test</title>
</head>
<body>
	<h2>Loneliness Level Test</h2>
	<a type="hidden" href="../home.php"><p style="text-align: right;">Back to home</p></a>
	<p>Meningkatnya rasa kesepian dapat berdampak buruk pada kesehatan mental Anda, oleh karena itu disarankan untuk mengevaluasi tingkat kesepian Anda sebagai tindakan awal untuk mengurangi risikonya.</p>

	<h2>Panduan Loneliness Level Test!</h2>
	<ol>
		<li>Isilah dengan jujur</li>
		<li>Tidak ada jawaban benar atau salah</li>
		<li>Cari tempat yang nyaman supaya bisa fokus</li>
		<li>Hasil tes bisa didapatkan setelah mengisi semua pertanyaan dengan lengkap</li>
	</ol>
	<a href="tes1.php?id=<?php echo $id?>"><button>Mulai test</button></a>
</body>
</html>