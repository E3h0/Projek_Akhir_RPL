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
    <link rel="stylesheet" href="style/style6.css">
</head>
<body>
    <script type="text/javascript">
      var questions = [
          "Seberapa sering kamu merasa cocok dengan orang-orang di sekitarmu",
          "Seberapa sering kamu merasa tidak memiliki sahabat?",
          "Seberapa sering kamu merasa tidak bisa meminta bantuan ke siapapun?",
          "Seberapa sering kamu merasa sendirian?",
          "Seberapa sering kamu merasa menjadi bagian dari kelompok pertemanan?",
          "Seberapa sering kamu merasa bahwa kamu memiliki banyak kesamaan dengan orang di sekitarmu?",
          "Seberapa sering kamu merasa bahwa kamu tidak dekat dengan siapapun lagi?",
          "Seberapa sering kamu merasa ide dan pendapatmu berbeda dengan orang-orang di sekitarmu?",
          "Seberapa sering kamu merasa sebagai orang yang ramah dan mudah bergaul dengan orang lain?",
          "Seberapa sering kamu merasa dekat dengan orang lain?",
          "Seberapa sering kamu merasa dikucilkan oleh orang lain?",
          "Seberapa sering kamu merasa hubungan kamu dengan orang lain tidak bermakna?",
          "Seberapa sering kamu merasa bahwa tidak ada yang benar-benar memahamimu dengan baik?",
          "Seberapa sering kamu merasa terasing dari orang lain?",
          "Seberapa sering kamu merasa bahwa kamu bisa menemukan sahabat jika kamu memang menginginkannya?",
          "Seberapa sering kamu merasa bahwa kamu memiliki orang yang benar-benar memahamimu?",
          "Seberapa sering kamu merasa sebagai orang yang pemalu?",
          "Seberapa sering kamu merasa bahwa orang-orang yang ada di sekitarmu tidak benar-benar bersamamu?",
          "Seberapa sering kamu merasa bahwa kamu memiliki teman untuk bercerita?",
          "Seberapa sering kamu merasa bisa meminta bantuan ke orang lain?",
        ];
        var currentQuestion = 0;
    </script>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <h1>Loneliness Level Test</h1>
            </div>
        </div>
        <div class="banner">
            <form action="tes1.php" method="POST">
                <div class="banner-progress">
                    <div id="progress-bar" class="banner-progress-bar" style="width: 5%;"></div>
                    <span id="progress">Pertanyaan 1/20</span>
                </div>
                <div class="banner-test">
                    <div class="banner-question">
                        <p id="question"><script type="text/javascript">document.getElementById("question").innerHTML = questions[currentQuestion];</script></p>
                    </div>
                    <div class="banner-answer" id="ans">
                        <label for="a1">
                            <input onclick="nextQuestion()" id="a1" type="radio" name="answer" value="1" onclick="selectAnswer(1)">
                            Tidak pernah
                        </label>
                        <label for="a2">
                            <input onclick="nextQuestion()" id="a2" type="radio" name="answer" value="2" onclick="selectAnswer(2)">
                            Jarang
                        </label>
                        <label for="a3">
                            <input onclick="nextQuestion()" id="a3" type="radio" name="answer" value="3" onclick="selectAnswer(3)">
                            Kadang-kadang
                        </label>
                        <label for="a4">
                            <input onclick="nextQuestion()" id="a4" type="radio" name="answer" value="4" onclick="selectAnswer(4)">
                            Selalu
                        </label>
                    </div>
                </div>
                <div class="banner-button">
                    <button type="button" id="backButton" disabled onclick="previousQuestion()">Back</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="footer-line"></div>
        </div>
    </div>

    <script>

        var answers = new Array(questions.length).fill(-1);
        // var currentQuestion = 0;
        var backButton = document.getElementById("backButton");
        var nextButton = document.getElementById("nextButton");
        var anss = document.getElementById('ans');
        var progressBar = document.getElementById('progress-bar');
        var progressWidth = 5;
        function previousQuestion() {
        currentQuestion--;
        document.getElementById("question").innerHTML = questions[currentQuestion];
            if (currentQuestion === 0) {
            	backButton.disabled = true;
            }
            // nextButton.style.display = "none";
            progressBar -= 5;
            progressWidth -= 5;
            updateProgressBar();
        }
       
        function categori(score) {
          if (score <= 20) {
            return "Low loneliness";
          } else if ((score > 20) && (score <=51))  {
            return "Medium loneliness";
          } else {
            return "High loneliness";
          }
        }

        function calculateScore(answers) {
          var reverseQuestions = [0, 4, 5, 8, 9, 14, 15, 18, 19];
          var totalScore = 0;
          
          for (var i = 0; i < answers.length; i++) {
            var answer = answers[i];
            if (reverseQuestions.includes(i)) {
              answer = 5 - answer; // Membalik skema nilai untuk pertanyaan yang memerlukan pembalikan
            }
            totalScore += answer;
          }
          
          return totalScore;
        }

        function nextQuestion() {
          	var radios = document.getElementsByName("answer");
              var selectedValue = -1;
              for (var i = 0; i < radios.length; i++) {
              	if (radios[i].checked) {
            			selectedValue = radios[i].value;
            			break;
          		}
        		}
       		if (selectedValue === -1) {
          		alert("Please select an answer.");
          	return;
        	}

      	answers[currentQuestion] = parseInt(selectedValue);
      	currentQuestion++;
      	if (currentQuestion === questions.length) {
      		  var totalScore = calculateScore(answers);
      	    // result.innerHTML = totalScore;
            var lonelinessLevel = categori(totalScore);
            // resultCategory.innerHTML = lonelinessLevel;
            window.location.href = "result.php?score=" + totalScore + "&category=" + lonelinessLevel; 
      	    document.getElementById("question").style.display = "none";
      	    document.getElementsByName("answer").forEach(radio => radio.style.display = "none");
      	    anss.style.display = "none";
      	    backButton.style.display = "none";


            // Mendapatkan nilai id dari URL
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');

            // Mendapatkan nilai result
            var resultValue = totalScore;

            // waktu
            var currentTime = new Date().toLocaleString('en-US', { timeZone: 'Asia/Jakarta' });

            // Mengirim nilai result dan id ke server melalui AJAX
            // Mengirim total score dan category ke halaman "history"
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "proc.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                // Response dari server
                console.log(xhr.responseText);
              }
            };
            xhr.send("id=" + encodeURIComponent(id) + "&result=" + encodeURIComponent(resultValue) + "&time=" + encodeURIComponent(currentTime));

      	  	} else {
      	    	document.getElementById("question").innerHTML = questions[currentQuestion];
      	    for (var i = 0; i < radios.length; i++) {
      	      radios[i].checked = false;
      	    }
            backButton.disabled = false;
            progressWidth += 5;
            progressBar += 5;
            updateProgressBar();
      	}
      }
      function selectAnswer(value) {
      	answers[currentQuestion] = parseInt(value);
      }

      function updateProgressBar() {
          var progressBarElement = document.getElementById("progress-bar");
          progressBarElement.style.width = progressWidth + "%";
          document.getElementById("progress").innerHTML = "Pertanyaan " + (currentQuestion + 1) + "/" + questions.length;
      }
    </script>
    
</body>
</html>
