<?php 
	include 'config.php';
	session_start();
	$id = $_SESSION['id'];
	
	$query = mysqli_query($connect, "SELECT * FROM users WHERE user_id = '$id'");
	if($do = mysqli_fetch_array($query)) {
		$id = $do['user_id'];
		$uname = $do['username'];
		$fname = $do['fullname'];
		$gen = $do['gender'];
		$phone = $do['phone'];
		$dob = $do['dob'];
		$email = $do['email'];
		$pass = $do['password'];
	}

    if(isset($_POST['update'])) {
        $id = $_SESSION['id'];
        $uname = $_POST['username'];
        $fname = $_POST['fullname'];
        $gen = $_POST['gender'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
    
        $res = mysqli_query($connect, 
            "UPDATE users SET username='$uname', fullname='$fname',
            gender='$gen', phone='$phone', dob='$dob', email='$email' WHERE user_id='$id'");
    
        if($res) {
            echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Update Profil Berhasil!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = 'profile.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Gagal Update Profil!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <link rel="stylesheet" href="style/style10.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	</script>
    <div class="container">
        <div class="header">
            <div class="header-loneliness">
                <h1>Loneliness Test</h1>
            </div>
        </div>
        <div class="banner">
            <div class="banner-leftbox">
                <div class="banner-leftbox-title">
                    <h1>Hello</h1>
                    <p>
					<?php 
						echo $_SESSION['username']."!"."<br>";
						$id = $_SESSION['id'];
					?>
					</p>
                </div>
                <div class="banner-leftbox-button-top">
                    <ul>
                        <li class="home">
                            <a href="index.php" class="rumah">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg><span>Home</span></a></li>
                        <li class="profile"><a href="profile.php?id=<?php echo $id;?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                            </svg><span>Profile</span></a></li>
                        <li class="llt"><a href="pre_test.php?id=<?php echo $id;?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                            </svg><span>Loneliness Level Test</span></a></li>
                    </ul>
                </div>
                <div class="banner-leftbox-button-bottom">
                    <ul>
                        <li class="mentor"><a href="mentor.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg><span>Mentor dan Psikolog</span></a></li>
                        <li class="history"><a href="history.php?id=<?php echo $id;?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw"><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                            </svg><span>History</span></a></li>
                        <li class="logout"><a href="logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg><span>Log Out</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="banner-rightbox">
                <div class="banner-rightbox-header">
                    <div class="banner-rightbox-title">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="banner-rightbox-profile">
                        <a href="profile.php?id=<?php echo $id;?>">Back To Profile</a>
                    </div>
                </div>
                <div class="banner-rightbox-form">
					<form name="Edit profile" id="Myform" method="POST" action="" style="display: flex;">
						<div class="input-form-left">
                            <label for="fullname">Name</label>
                            <input id="fullname" type="text" name="fullname" value="<?php echo $fname;?>" placeholder="">
                            <label for="dob">Date of Birth</label>
                            <input id="dob" type="date" name="dob" value="<?php echo $dob;?>">
                            <label for="email">Email</label>
							<input id="email" type="text" name="email" value="<?php echo $email;?>" placeholder="">
                        </div>
                        <div class="input-form-right">
                            <label for="username">Username</label>
                            <input id="username" type="text" name="username" value="<?php echo $uname;?>" placeholder="">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" name="phone" value="<?php echo $phone;?>" placeholder="">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="">Pilih Gender</option>
                                <option value="Male" <?php if($gen == "Male") echo "selected";?>>Male</option>
                                <option value="Female" <?php if($gen == "Female") echo "selected";?>>Female</option>
                            </select>
                        </div>

						<div class="banner-rightbox-button">
                        	<button type="submit" id="tombol" name="update">Save</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="long-line"></div>
        </div>
    </div>
</body>
</html>
