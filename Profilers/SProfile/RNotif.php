<?php
  session_start();
 if (isset($_SESSION['username'])){
    
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
    <title>TPO</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
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
            
			<center><h2 class="margin-bottom-10">Read Message</h2>
            <p>Notifications from Placement Department and Principal</p></center>
              
				
			   <?php
			$user=$_SESSION['username'];
			
$num_rec_per_page=10;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
if(isset($_POST['submit']))
{ 
	$sender = $_POST['Sender'];
	if ($sender=='0012345')
	{
$sql = "SELECT * FROM notif WHERE (Receiver='Student' or Receiver='Both') and Sender='0012345' ORDER BY `Date and time` DESC LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connect, $sql); //run the query

while ($rs_row = mysqli_fetch_assoc($rs_result)) 
{ 
?>
           <div class="templatemo-content-widget orangeee-bg">
                             
                <div class="media">
                  <div class="media-left">
				  		<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp");
$result=mysqli_query($connect,"SELECT Image FROM admin_detail");
?>
                   <?php
		  while($row=$result->fetch_assoc())
		  {?>
                      <img class="media-object img-circle" src="data:image/jpg:charset=utf8;base64,
					  <?php echo base64_encode($row['Image']);?> "
					  alt="Sunset" width="100px" height="100px"/>
                   <?php }?>
                  </div>
                  <div class="media-body">
				  
                    <h2 class="media-heading text-uppercase"  style="color:#2E86C1;"><?php echo $rs_row['Subject'] ; ?></h2><br>
					<span><p style="font-size:15px;"><?php echo $rs_row['Message'] ;?></p>	</span>
							<span style="float:right"><?php echo $rs_row['Date and time'] ; ?></span>
							
                  </div>        
                </div>                
              </div> 
<?php
}}
else
	{
$sql = "SELECT * FROM notif WHERE (Receiver='Student' or Receiver='Both') and Sender='rahul123' ORDER BY `Date and time` DESC LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connect, $sql); //run the query
while ($rs_row = mysqli_fetch_assoc($rs_result)) 
{ 
?>
           <div class="templatemo-content-widget orangeee-bg">
                             
                <div class="media">
                  <div class="media-left">
				  		<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp");
$result=mysqli_query($connect,"SELECT Image FROM tpo_detail");
?>
                   <?php
		  while($row=$result->fetch_assoc())
		  {?>
                      <img class="media-object img-circle" src="data:image/jpg:charset=utf8;base64,
					  <?php echo base64_encode($row['Image']);?> "
					  alt="Sunset" width="100px" height="100px"/>
                   <?php }?>
                  </div>
                  <div class="media-body">
				  
                    <h2 class="media-heading text-uppercase"  style="color:#2E86C1;"><?php echo $rs_row['Subject'] ; ?></h2><br>
					<span><p style="font-size:15px;"><?php echo $rs_row['Message'] ; ?></p>	</span>
							<span style="float:right"><?php echo $rs_row['Date and time'] ; ?></span>
							
                  </div>        
                </div>                
              </div> 
<?php
}}}

?> 

              
          </div>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
  </body>
</html>
