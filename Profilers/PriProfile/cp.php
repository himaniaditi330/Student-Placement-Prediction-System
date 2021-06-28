<?php
  session_start();
  if($_SESSION["priusername"]){
  }
   else {
	   header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student - Change Password</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <!--Include sidebar-->
	  <?php include 'sidebar.php';?>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
    <!--Include top nav -->
		<?php include 'topnav.php';?>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            




<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp"); // Selecting Database from Server

	$Username = $_SESSION['priusername'];
	$Password = $_POST['Password'];
	$repassword = $_POST['repassword'];
	$cur = $_POST['curpassword'];
	if($Password && $repassword && $cur) 
	{
		if($Password == $repassword)
		{
			$sql = mysqli_query($connect, "SELECT * FROM `spsp`.`admin_detail` WHERE `id`='$Username'");
			if(mysqli_num_rows($sql) == 1)
			{
				$row = mysqli_fetch_assoc($sql);
				$dbpassword = $row['password'];
			    
				if($cur == $dbpassword)
				{
					if($query = mysqli_query($connect,"UPDATE `spsp`.`admin_detail` SET `password` = '$Password' WHERE `admin_detail`.`id` = '$Username'"))
					{
						?><h2 class="margin-bottom-10"><center>Password Changed Successfully</center></h2>
						<?php
						
					} else {
						?><h2 class="margin-bottom-10"><center>Can't Be Changed! Try Again</center></h2>
						<?php
						
					}
				} else {
					?><h2 class="margin-bottom-10"><center>Error! Please Check ur Password</center></h2>
						<?php
					
				}
			} else {
				?><h2 class="margin-bottom-10"><center>Username not Found</center></h2>
						<?php
				
			}
		} else{
			?><h2 class="margin-bottom-10"><center>Passwords Donot Match</center></h2>
						<?php
			
		}
	} else {
		?><h2 class="margin-bottom-10"><center>Enter All Fields</center></h2>
						<?php
		
	}
	?>
 </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
  </body>
</html>