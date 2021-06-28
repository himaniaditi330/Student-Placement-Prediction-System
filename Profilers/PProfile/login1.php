<?php
	session_start();
	$pusername = $_POST['username'];
	$password  = $_POST['password'];
?>

	
<?php 	
	if ($pusername && $password)
	{
		$connect = mysqli_connect("localhost","root","") or die("Couldn't Connect");
		mysqli_select_db($connect, "spsp") or die("Cant find DB");
		
		$query = mysqli_query($connect, "SELECT * FROM tpo_detail WHERE tpo_id='$pusername'");
		
		$numrows = mysqli_num_rows($query);
		
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['tpo_id'];
				$dbpassword = $row['password'];
				
			}
			if ($pusername==$dbusername&&$password==$dbpassword)
			{
			  echo "<center>Login Successfull..!! <br/>Redirecting you to HomePage! </br>If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='3; url=index.php'>";
			 $_SESSION['pusername'] = $pusername;
			} else {
			$message = "Username and/or Password incorrect.";
  			echo "<script type='text/javascript'>alert('$message');</script>";
			  echo "<center>Redirecting you back to Login Page! If not Goto <a href='index.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
			}
		}else
			die("User not exist");
		
	}
	else
	header("location: index.php");
	?>