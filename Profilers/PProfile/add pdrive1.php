<?php
  session_start();
  if($_SESSION["pusername"]){
  }
   else {
	   header("location: ../index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="../favicon.ico" type="image/icon">
        <link rel="icon" href="../favicon.ico" type="image/icon">
      
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Placement Drives</title>
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
        <!--Include top nav-->
	  <?php include 'topnav.php';?>
        <div class="templatemo-content-container">  
		<div class="templatemo-content-widget white-bg">
          

<?php
$connect = mysqli_connect('localhost','root','') or die("Couldn't Connect");
mysqli_select_db($connect,'spsp') or die("Cant find DB");
if(isset($_POST['submit']))
{ 
$cid=$_POST['coid'];
$cname = $_POST['compny'];
$type=$_POST['ctyp'];
$tiid=$_POST['tid'];
$tag=$_POST['tagl'];
$date = $_POST['date'];
$mail=$_POST['email'];
$cntct=$_POST['contact'];
$campool = $_POST['campool'];
$poolven = $_POST['pcv'];
$per = $_POST['sslc'];
$puagg = $_POST['puagg'];
$beaggregate = $_POST['beagg'];
$back = $_POST['curback'];
$hisofbk = $_POST['hob'];
$breakstud = $_POST['break'];
$otherdet = $_POST['odetails'];
if($cname !=''||$date !='')
{
    if($query = mysqli_query($connect,"INSERT INTO `spsp`.`company_detail`(`com_id`,`com_name`,`type`,`tagline`,`tpo_id`,`email`,
	`contact_no`,`Date`,`C/P`,`Venue`,`10th`,`12th`,`B.Tech`,`active_backlogs`,`total_backs`,`Year_gap`,`ODetails`)
		VALUES ('$cid','$cname','$type','$tag','$tiid','$mail','$cntct', '$date', '$campool',
		'$poolven', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$breakstud', '$otherdet')"))
		{
                      echo "<center><h3>Data Inserted successfully...!!</h3></center>";
		}
		else die("FAILED");
}
}
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