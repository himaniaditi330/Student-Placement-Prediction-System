<?php
  session_start();
 if (isset($_SESSION['pusername'])){
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
    <title>Queries</title>
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
		<center>

<?php
			
$connect =  mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if(isset($_POST['submit']))
{ 
$cid = $_POST['com_id'];

$date= $_POST['Date'];

$RESULT=mysqli_query($connect, "SELECT count(Attendance) from placed_students where Attendance=1 and com_id='$cid' and Date='$date'");
$data=mysqli_fetch_assoc($RESULT);
echo "<br><h3>Number of Students Attended&nbsp:&nbsp";
echo $data['count(Attendance)'];

$RESULT=mysqli_query($connect, "SELECT count(written) from placed_students where written=1 and com_id='$cid' and Date='$date'");
$data=mysqli_fetch_assoc($RESULT);
echo "<br><br>Number of Students Cleared Written&nbsp:&nbsp";
echo $data['count(written)'];

echo "<br><br>Number of Students Cleared GD&nbsp:&nbsp";
$RESULT1=mysqli_query($connect, "SELECT count(GD) from placed_students where GD=1 and com_id='$cid' and Date='$date'");
$data1=mysqli_fetch_assoc($RESULT1);
echo $data1['count(GD)'];

echo "<br><br>Number of Students Cleared Technical&nbsp:&nbsp";
$RESULT1=mysqli_query($connect, "SELECT count(Technical) from placed_students where Technical=1 and com_id='$cid' and Date='$date'");
$data1=mysqli_fetch_assoc($RESULT1);
echo $data1['count(Technical)'];

echo "<br><br>Number of Students Placed&nbsp:&nbsp";
$RESULT1=mysqli_query($connect, "SELECT count(Placed) from placed_students where Placed=1 and com_id='$cid' and Date='$date'");
$data1=mysqli_fetch_assoc($RESULT1);
echo $data1['count(Placed)'];
echo "</h3>";
}
?>
</center>
</div>      			
                 
        </div>
      </div>
    </div>    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
      $(document).ready(function(){
        // Content widget with background image
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();        
      });
    </script>
  </body>
</html>