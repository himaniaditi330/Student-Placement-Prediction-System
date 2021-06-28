<?php
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	
	$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
    mysqli_select_db($connect,"spsp") or die("Cant Connect to database"); // Selecting Database from Server
	
	if($password == $confirm) {
		if($sql = mysqli_query($connect, "UPDATE `spsp`.`admin_detail` SET `password` ='$password' WHERE `admin_detail`.`id` = '$USN1'"));
		echo "<center>Password Reset Complete</center>";
		echo "<center>Redirecting you back to Login Page! If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
		session_unset();
	} else
	echo "Update Failed";
?>