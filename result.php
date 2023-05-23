<?php 

		session_start();
		$id = $_SESSION['id'];
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title></title>
</head>
<body>
	<script type="text/javascript">// Mendapatkan parameter URL
		var urlParams = new URLSearchParams(window.location.search);

		// Mendapatkan nilai skor dari parameter URL
		var score = urlParams.get("score");

		// Mendapatkan kategori dari parameter URL
		var category = urlParams.get("category");
	</script>

	<div class="d-flex flex-row-reverse">
		<a href="pre_test.php?id=<?php echo $id;?>">Kembali ke awal kuis</a>
	</div>

	<div id="score">
		<img id="imageContainer" src="" alt="Loneliness Image" class="rounded" height="200px" width="auto">
		<h2><span id="title"></span></h2>
	    <p>Tingkat kesepianmu =  <span id="result"></span>.</p>
	    <p>Kategori tingkat kesepianmu = <span id="resCategory"></span>.</p>
	    <p><span id="motivationText"></span></p>
	    <p>Kamu butuh bantuan buat mengurangi rasa kesepianmu? Atau ingin tahu lebih lanjut tentang rasa kesepian? Yuk, temukan selengkapnya lewat online mentoring bersama psikolog yang tentunya relevan dan ahli di bidang ini, bantu temukan solusi untuk mengurangi rasa kesepianmu dan berkembang lebih baik tiap harinya! Jangan biarkan dirimu larut terlalu lama dalam rasa kesepian dan kesendirian. Klik tombol dibawah ini untuk mempelajari lebih lanjut!"</p>
	    <a id="btn_psikolog" href="psikolog.php"><button type="button">Temukan Psikolog</button></a>
    </div>

	<script type="text/javascript">

		var btn_p = document.getElementById("btn_psikolog");

		// Menampilkan skor dan kategori di halaman baru
		var res = document.getElementById("result");
		res.innerHTML = score;
		var cat = document.getElementById("resCategory");
		cat.innerHTML = category;
		var title = document.getElementById("title");

		var motivationText = "";
		var titleText = "";	
		switch (category) {
              case "Low loneliness":
                motivationText = "Selamat!!! Hasil tes menunjukkan bahwa kamu baik-baik aja dan tidak merasa kesepian. Kamu merasa puas dengan hubungan yang telah kamu bentuk selama ini. Kamu juga cenderung memiliki orang-orang yang dapat kamu andalkan dan Kamu merasa senang serta nyaman menghabiskan waktumu bersama mereka. Hal ini sangatlah bagus untukmu! jagalah kondisimu saat ini.";
                titleText = "Wow selamat!!!, ternyata kamu tidak begitu kesepian nih"
                break;
              case "Medium loneliness":
                motivationText = "Nahh hasil tesnya menunjukkan bahwa kamu merasa cukup kesepian mih. Sebenarnya Saat ini, kamu memiliki beberapa orang yang bisa kamu percayai dan dapat kamu andalkan, akan tetapi, kamu masih merasakan adanya kekurangan dari interaksi yang kamu lakukan. Takjarang, kamu merasakan adanya kekosongan dalam kehidupan sosialmu. Kekosongan itu sebaiknya kamu isi dengan melakukan aktivitas yang dapat membantumu membangun hubungan yang lebih bermakna. Kamu bisa mengikuti berbagai kegiatan seperti melakukan hobimu ataupun kegiatan online yang melibatkan banyak orang, seperti bermain game. Mungkin kamu menginginkan hubungan yang lebih dari itu? Kamu bisa mulai chatting dengan teman-temanmu dan menanyakan kabar mereka.";
                titleText = "Waduh, sepertinya kamu mulai merasa kesepian nih";
                break;
              case "High loneliness":
                motivationText = "Hasil tesnya menunjukkan bahwa kamu merasa sangat kesepian. Saat ini, kamu cenderung merasa hubungan yang kamu bentuk itu kurang memuaskan dari segi kualitas maupun kuantitas. Oleh karena itu, kamu mengharapkan hubungan yang lebih bermakna atau terbentuk dengan lebih banyak orang. Rasa kesepian ini juga mungkin saja berdampingan dengan perasaan lain, seperti bosan, gelisah, dan tidak bahagia dengan kehidupan sosialmu. Oleh karenanya, mulailah memberanikan diri untuk membicarakan masalahmu ke orang lain. Ingat bahwa rasa kesepian sangat wajar dan umum dirasakan orang-orang, tetapi jika hal ini sudah mengganggu keseharianmu, kamu perlu menghubungi orang yang lebih profesional untuk membantumu.";
             	titleText = "Waduh, sepertinya kamu merasa kesepian banget nih";
                break;
              default:
                motivationText = "Tetaplah positif dan ingat bahwa membangun hubungan sangat penting untuk kesejahteraan.";
                break;
            }
        // Menampilkan kalimat motivasi pada elemen dengan id "motivationText"
        document.getElementById("motivationText").innerHTML = motivationText;
        title.innerHTML = titleText;

  		// Tampilkan gambar based on category
	 	var imageContainer = document.getElementById("imageContainer");
	  	var imageSrc = "";

		  switch (category) {
		    case "Low loneliness":
		      imageSrc = "Img/lonely_low.jpg";
		      break;
		    case "Medium loneliness":
		      imageSrc = "Img/lonely_med.png";
		      break;
		    case "High loneliness":
		      imageSrc = "Img/lonely_high.jpg";
		      break;
		    default:
		      imageSrc = "images/default_image.jpg";
		      break;
			}

	  	// Ubah atribut src gambar
	  	imageContainer.src = imageSrc;

	</script>
</body>
</html>