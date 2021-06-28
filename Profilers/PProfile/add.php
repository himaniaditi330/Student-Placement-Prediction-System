<?php
  session_start();
  if($_SESSION["username"]){
    echo "Welcome, ".$_SESSION['username']."!";
  }
   else {
	   header("location: index.php");
   die("You must be Log in to view this page <a href='index.php'>Click here</a>");}
   
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
      
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>
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
    <!-- Left column -->
     <div class="templatemo-flex-row">
  <!--Include sidebar-->
	  <?php include 'sidebar.php';?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <!--Include top nav-->
	  <?php include 'topnav.php';?>
        <div class="templatemo-content-container">  
          <div class="templatemo-content-widget white-bg">
<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp"); // Selecting Database from Server
if(isset($_POST['submit']))
{ 

$USN = $_POST['USN'];
$sun = $_SESSION["username"];
$phno = $_POST['Num'];
$email = $_POST['Email'];
$date = $_POST['DOB'];
$cursem = $_POST['Cursem']; 
$branch = $_POST['Branch'];
$per = $_POST['Percentage'];
$puagg = $_POST['Puagg'];
$beaggregate = $_POST['Beagg'];
$back = $_POST['Backlogs'];
$hisofbk = $_POST['History']; 
$detyear = $_POST['Dety'];

    if($query = mysqli_query($connect, "Update `stu_detail` set `contact_no`='$phno',`10th`=$per,`12th`=$puagg,`B.Tech`='$beaggregate'
 ,`active_backlogs`= '$back',`total_backs`='$hisofbk',`Email`='$email',`Year_gap`='$detyear',`DOB`='$date',
 `Sem`='$cursem',`Branch`='$branch' where `S_id`='$sun' "))
    {
				?><h2 class="margin-bottom-10"><center>Details has been received successfully...!!</center></h2>
				<?php
      }
	  
     
		else {
	?><h2 class="margin-bottom-10"><center>FAILED..!!</center></h2>
				<?php
		}


}
//if file upload is submitted
$status=$statusMsg="";
if(isset($_POST['submit']))
{
	$status='error';
	if(!empty($_FILES["fileToUpload"]["name"]))
	{
		//get file info
		$fileName=basename($_FILES["fileToUpload"]["name"]);
		$fileType=pathinfo($fileName,PATHINFO_EXTENSION);
		
		//allow certain file types
		$allowTypes=array('jpg','png','jpeg');
		if(in_array($fileType,$allowTypes))
		{
			$image=$_FILES["fileToUpload"]["tmp_name"];
			$imgContent=addslashes(file_get_contents($image));
			$insert=mysqli_query($connect,"INSERT into images (id,image,uploaded) VALUES ('$sun','$imgContent',NOW())");
			if($insert)
			{
				$status='success';
				$statusMsg='File uploaded successfully';
				
			}
			else
				$statusMsg='File upload failed';
		}
		else
			$statusMsg='Only jpg,png,jpeg allowed';
	}
	else
		$statusMsg='Select an image';
}
echo $statusMsg;

?>
</div>
</div>
 </div>
      </div>
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
    <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
  </body>

</html>