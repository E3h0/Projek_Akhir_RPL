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
      <link rel="stylesheet" href="style/style11.css">
</head>
<body>
	<?php 
        session_start();
        $id = $_SESSION['id'];
    ?>
    <div class="container">
        <div class="header">
            <div class="header-title">
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
                <div class="banner-rightbox-title">
                    <h1>History</h1>
                </div>
                <div class="banner-rightbox-history">
                    <table>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Waktu Tes</th>
                            <th>Hasil Tes</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
							<?php
							// Include the necessary config.php file and database connection logic
							include "config.php";
                            // Retrieve the history data from the database
                            $sql = "SELECT * FROM scores WHERE u_id = $id ORDER BY scores.time DESC";
                            $result = mysqli_query($connect, $sql);
                            $historyData = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            // Loop through the history data and generate the rows dynamically
                            foreach ($historyData as $index => $data) {
                                $no = $index + 1;
                                $tm = $data['time']; // Replace this with the actual field name from the database
                                $sc = $data["values"]; // Replace this with the actual field name from the database
                            ?>
						  	<tr>
								<td><?php echo $no;?></td>
                            	<td><?php echo $tm;?></td>
                                <td><?php echo $sc;?></td>
                            	<td>
                                    <!-- <a href="result.php?score=<?php echo $sc;?>">Detail</a> -->
                                    <div class="delete">
                                        <a class="delete" href="hapus.php?time=<?php echo $tm;?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                            <span>Hapus</span>
                                        </a>
                                    </div>
								</td>
						  	</tr>
						<?php
                        }
						?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>
        </div>
        <div class="footer">
            <div class="long-line"></div>
        </div>
    </div>
    <script>
        feather.replace();
    </script>
</body>
</html>
