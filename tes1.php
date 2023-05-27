<?php 
  $id = $_GET['id'];
  // echo $id;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Loneliness Level Test</title>
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

    <h1>Loneliness Level Test</h1>
    <p id="question"><script type="text/javascript">document.getElementById("question").innerHTML = (currentQuestion + 1) + "/20 <br>" + questions[currentQuestion];</script></p>
    <form action="tes1.php" method="POST">
      <div id="ans">
        <input onclick="nextQuestion()" id="a1" type="radio" name="answer" value="1" onclick="selectAnswer(1)">
        <label for="a1">Tidak Pernah</label><br>
        <input onclick="nextQuestion()" id="a2" type="radio" name="answer" value="2" onclick="selectAnswer(2)">
        <label for="a2">Jarang</label><br>
        <input onclick="nextQuestion()" id="a3" type="radio" name="answer" value="3" onclick="selectAnswer(3)">
        <label for="a3">Kadang-kadang</label><br>
        <input onclick="nextQuestion()" id="a4" type="radio" name="answer" value="4" onclick="selectAnswer(4)">
        <label for="a4">Selalu</label><br>
      </div>
      <button type="button" id="backButton" disabled onclick="previousQuestion()">Back</button>
    </form>
    <br><br>
      <script>
        var answers = new Array(questions.length).fill(-1);
        // var currentQuestion = 0;
        var backButton = document.getElementById("backButton");
        var nextButton = document.getElementById("nextButton");
        var anss = document.getElementById('ans');
        function previousQuestion() {
        currentQuestion--;
       document.getElementById("question").innerHTML = (currentQuestion + 1) + "/20 <br>" + questions[currentQuestion];
            if (currentQuestion === 0) {
            	backButton.disabled = true;
            }
            // nextButton.style.display = "none";
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
      	    	document.getElementById("question").innerHTML = (currentQuestion + 1) + "/20 <br>" + questions[currentQuestion];
      	    for (var i = 0; i < radios.length; i++) {
      	      radios[i].checked = false;
      	    }
            backButton.disabled = false;
      	}
      }
      function selectAnswer(value) {
      	answers[currentQuestion] = parseInt(value);
      }
  </script>
</body>
</html>
