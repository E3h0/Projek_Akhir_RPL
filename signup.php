<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;700&family=Raleway:wght@200;400;700&family=Rambla:wght@700&display=swap"
      rel="stylesheet"
    />

    <!-- My Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Styles -->
    <link rel="stylesheet" href="style/style8.css" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="header-title">
          <h1>Lonelines Test</h1>
        </div>
        <div class="header-backto">
          <a href="index.php">Back to homepage</a>
        </div>
      </div>
      <div class="banner">
        <div class="banner-welcome">
          <h1>Welcome back!</h1>
          <p>Already have Account? <a href="login.php">Log In</a></p>
        </div>
        <div class="banner-form">
          <form id="MyForm" action="signup.php" method="post">
            <div class="banner-form-left">
              <label>Full Name</label>
              <input type="text" name="fullname" placeholder="Enter your fullname" required/>
              <label>Username</label>
              <input type="text" name="username" placeholder="Create username" required/>
              <label>Date of Birth</label>
              <input type="date" name="dob" placeholder="" required/>
              <label>Password</label>
              <input type="password" id="pwd" name="password" minlength="8" placeholder="Create password"/>
			      </div>
			      <div class="banner-form-right">
              <label>Email</label>
              <input type="email" name="email" placeholder="Enter email" required/>
              <label>Gender</label>
              <div class="gender">
                <div class="male">
                  <input type="radio" id="Male" name="gender" value="Male" required>
                  <label for="Male">Male</label>
                </div>
                <div class="female">
                  <input type="radio" id="Female" name="gender" value="Female" required>
                  <label for="Female">Female</label>
                </div>
              </div>
              <label>Phone Number</label>
              <input type="text" name="phone" placeholder="Enter phone number"/>
              <label>Confirm password</label>
              <input type="password" id="c_pwd" name="c_pwd" placeholder="Enter password"/>
            </div>
			      <div class="banner-form-button">
              <button type="submit" name="Submit" onclick="checkPassword()">
                Sign Up
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="footer">
        <div class="footer-line"></div>
      </div>
    </div>

    <?php
    include "config.php";

    if(isset($_POST['Submit'])){

      $fname = $_POST['fullname'];
      $uname = $_POST['username'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $gen = $_POST['gender'];
      $phone = $_POST['phone'];
      $pwd = $_POST['password'];

      $sign_up = "INSERT INTO users(`username`, `fullname`, `gender`, `phone`, `dob`, `email`, `password`) VALUES ('$uname', '$fname', '$gen', '$phone', '$dob', '$email', '$pwd')";
      $do = mysqli_query($connect, $sign_up);

      if($do){
        echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Berhasil Membuat Akun',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'login.php';
                    });
                });
            </script>";
        exit();
      } else{
          echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
          echo "<script>
                  $(document).ready(function() {
                      Swal.fire({
                          title: 'Gagal Membuat Akun',
                          text: 'Terdapat kesalahan dalam pembuatan akun.',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      });
                  });
              </script>";
      }

      mysqli_close($connect);
    }
?>
    <script>
      feather.replace();
    </script>
  </body>
</html>
