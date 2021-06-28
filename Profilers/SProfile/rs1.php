<?php
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	$USN2 = ($_SESSION['reset']);
	
	$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
   mysqli_select_db($connect, "spsp") or die("Cant Connect to database"); // Selecting Database from Server
   
			if($USN1 && $password && $confirm ){
		
	
	if($password == $confirm) {
		
		if($USN2 == $USN1){
		if($sql = mysqli_query($connect, "UPDATE `spsp`.`stu_login` SET `password` ='$password' WHERE `stu_login`.`S_id` = '$USN1'")){
		echo "<center>Password Reset Complete</center>"; 
		echo "<center>Redirecting you back to Login Page! If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
		session_unset();
		}
		} else {
			session_unset();
			die("Enter Your USN only");		
			
			} 
	} else
	{
	echo "Update Failed";
	session_unset();
	}
	}
	else
	{
	echo "Field cannot be left blank";
	session_unset();
	}
?>