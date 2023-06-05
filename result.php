<?php 
    session_start();
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;700&family=Raleway:wght@200;400;700&family=Rambla:wght@700&display=swap"
    rel="stylesheet"/>
   
    <!-- My Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
   
    <!-- My Styles -->
    <link rel="stylesheet" href="style/style13.css">
</head>
<body>
    <script type="text/javascript">// Mendapatkan parameter URL
		var urlParams = new URLSearchParams(window.location.search);

		// Mendapatkan nilai skor dari parameter URL
		var score = urlParams.get("score");

		// Mendapatkan kategori dari parameter URL
		var category = urlParams.get("category");
	</script>

    <div class="container">
        <div class="header">
            <div class="header-title">
                <h1>Loneliness Level Test</h1>
            </div>
            <div class="header-side">
                <a href="home.php?id=<?php echo $id;?>">Back To Homepage</a>
            </div>
        </div>
        <div id="score" class="banner">
            <div class="banner-result">
                <div class="banner-result-img">
                    <img id="imageContainer" src="" class="rounded" height="auto" width="100%" style="border-top-left-radius: 23.5px; border-top-right-radius: 23.5px;">
                </div>
                <div class="banner-result-title">
                    <h2 id=title></h2>
                </div>
                <div class="banner-result-desc">
                    <!-- <p id="title"></p> -->
                    <p style="font-size: 1.3rem; font-weight: 700;">Tingkat kesepianmu =  <span id="result"></span>.</p>
                    <p style="font-size: 1.3rem; font-weight: 700;">Kategori tingkat kesepianmu = <span id="resCategory"></span>.</p>
                    <br><br>
                    <p><span id="motivationText"></span></p>
                    <br>
                    <p>Kamu butuh bantuan buat mengurangi rasa kesepianmu? Atau ingin tahu lebih lanjut tentang rasa kesepian?<br><br>Yuk, temukan selengkapnya lewat online mentoring bersama mentor dan psikolog yang tentunya relevan dan ahli di bidang ini, bantu temukan solusi untuk mengurangi rasa kesepianmu dan berkembang lebih baik tiap harinya!<br><br>Jangan biarkan dirimu larut terlalu lama dalam rasa kesepian dan kesendirian. Klik tombol dibawah ini untuk melihat rekomendasi mentor/psikolog yang cocok untu dirimu.</p>
                    <br><br>
                </div>
                <div class="banner-result-button">
                    <a id="btn_psikolog" href="fullmentor.php">Rekomendasi Mentor/Psikolog</a>
                </div>
                <div class="banner-result-line"></div>
                <div class="banner-result-disc">
                    <p>
                        Harap diingat:
                        <br><br>
                        Rasa kesepian dapat dirasakan siapapun, meski sedang dikelilingi banyak orang sekalipun. Kesepian bukan tentang berapa banyak anggota keluarga atau teman yang dimiliki, tapi tentang kualitas hubungan yang terbangun di antaranya.
                        <br><br>
                        Rasa sepi, sedih, cemas, dan khawatir akan menghantui saat dukungan sosial yang diperlukan tak lagi bisa dirasakan oleh diri. Berbagai perasaan negatif tersebut, bila dibiarkan terlalu lama, dapat mengganggu kesehatan mental dan kualitas hidup sehari-hari.
                        <br><br>
                        <span>*Tes ini merupakan alat ukur terjemahan UCLA Lonelines Scale Version 3</span>
                        <br><br>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer">

        </div>
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
                motivationText = "Hasil tes menunjukkan bahwa kamu baik-baik aja dan tidak merasa kesepian. Kamu merasa puas dengan hubungan yang telah kamu bentuk selama ini.<br><br>Kamu juga cenderung memiliki orang-orang yang dapat kamu andalkan dan Kamu merasa senang serta nyaman menghabiskan waktumu bersama mereka.<br><br>Hal ini sangatlah bagus untukmu! jagalah kondisimu saat ini.";
                titleText = "Selamat!, ternyata kamu tidak begitu kesepian &#128515"
                break;
            case "Medium loneliness":
                motivationText = "Hasil tes menunjukkan bahwa kamu merasa cukup kesepian mih. Sebenarnya Saat ini, kamu memiliki beberapa orang yang bisa kamu percayai dan dapat kamu andalkan, akan tetapi, kamu masih merasakan adanya kekurangan dari interaksi yang kamu lakukan.<br><br>Tak jarang, kamu merasakan adanya kekosongan dalam kehidupan sosialmu. Kekosongan itu sebaiknya kamu isi dengan melakukan aktivitas yang dapat membantumu membangun hubungan yang lebih bermakna.<br><br>Kamu bisa mengikuti berbagai kegiatan seperti melakukan hobimu ataupun kegiatan online yang melibatkan banyak orang, seperti bermain game. Mungkin kamu menginginkan hubungan yang lebih dari itu? Kamu bisa mulai chatting dengan teman-temanmu dan menanyakan kabar mereka.";
                titleText = "Ternyata kamu mulai merasa kesepian nih &#128531";
                break;
            case "High loneliness":
                motivationText = "Hasil tes menunjukkan bahwa kamu merasa sangat kesepian. Saat ini, kamu cenderung merasa hubungan yang kamu bentuk itu kurang memuaskan dari segi kualitas maupun kuantitas.<br><br>Oleh karena itu, kamu mengharapkan hubungan yang lebih bermakna atau terbentuk dengan lebih banyak orang.<br><br> Rasa kesepian ini juga mungkin saja berdampingan dengan perasaan lain, seperti bosan, gelisah, dan tidak bahagia dengan kehidupan sosialmu. Oleh karenanya, mulailah memberanikan diri untuk membicarakan masalahmu ke orang lain.<br><br>Ingat bahwa rasa kesepian sangat wajar dan umum dirasakan orang-orang, tetapi jika hal ini sudah mengganggu keseharianmu, kamu perlu menghubungi orang yang lebih profesional untuk membantumu.";
                titleText = "Ternyata kamu sedang merasa sangat kesepian &#128534";
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
            imageSrc = "style/non-alone.jpg";
            break;
            case "Medium loneliness":
            imageSrc = "style/alone.jpg";
            break;
            case "High loneliness":
            imageSrc = "style/sepibanget.jpg";
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
