<?php
   $connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
   mysqli_select_db($connect, "spsp") or die("Cant Connect to database"); // Selecting Database from Server
   
   
if(isset($_POST['submit']))
{ 
  
 $Fname = $_POST['Fname'];
 $Lname = $_POST['Lname'];
 $USN = $_POST['USN'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];
  $Question = $_POST['Question'];
   $Answer = $_POST['Answer'];
  echo "dfsfs";

 $check = mysqli_query($connect, "SELECT * FROM stu_login WHERE S_id='".$USN."'") or die("Check Query");
 if(mysqli_num_rows($check) == 0) 
 {
  if($repassword == $password)
  {
    
    
    if($query = mysqli_query($connect, "INSERT INTO stu_login(F_name, L_name, S_id ,password,email,question,answer) VALUES ('$Fname','$Lname', '$USN', '$password','$Email','$Question','$Answer')"))
    {	if ($query1 = mysqli_query($connect, "INSERT INTO stu_detail(F_name, L_name, S_id ,email) VALUES ('$Fname','$Lname', '$USN', '$Email')"))
		{
                       echo "<center> You have registered successfully...!! Go back to  </center>";
					             echo "<center><a href='index.php'>Login here</a> </center>";
		}
		else
			echo "error";
					   
    }
  }
   else
    {
       echo "<center>Your password do not match</center>";
    }
   }
   else
   {
       echo "<center>This ID already exists</center>"; 
  }
}
?>