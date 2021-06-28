<?php
  session_start();
  if(($_SESSION["pusername"])){
    
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
    <title>TPO - Details</title>
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
           <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget orangee-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="addpdrive.php">
                      <img class="media-object img-circle" src="images/sunset11.png" alt="Sunset" width="100px" height="100px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Add Placement Drives</h2>
                    <p>Add New/Existing Company To the Current Drive List</p>  
                  </div>        
                </div>                
              </div> 
				<div class="templatemo-content-widget orangeee-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                   <a href="update.php">
                      <img class="media-object img-circle" src="images/UD.png" alt="Sunset" width="100px" height="100px">
                   </a>
                  </div>
                  <div class="media-body">
				  
                    <h2 class="media-heading text-uppercase">Update Student's Placement Detail</h2><p>Update the Details of Drives happened and the Status of Students </p>				
                  </div>        
                </div>                
              </div> 
				<div class="templatemo-content-widget orangeeee-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="drive.php">
                      <img class="media-object img-circle" src="images/sunset33.jpg" alt="Sunset" width="100px" height="100px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Company Details</h2>
                    <p>View the Eligibility Criteria of Companies Visited to Our Campus</p>  
                  </div>        
                </div>                
              </div> 			  
				<div class="templatemo-content-widget oranggge-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="drivehome.php">
                      <img class="media-object img-circle" src="images/DD.jpg" alt="Sunset" width="100px" height="100px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Placed Student Details</h2>
                    <p>Get the Whole Information of the Placed Students in Drives</p>  
                  </div>        
                </div>                
              </div>        			  
              
				<div class="templatemo-content-widget orangeee-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                   <a href="add_marks.php">
                      <img class="media-object img-circle" src="images/sunset22.png" alt="Sunset" width="100px" height="100px">
                   </a>
                  </div>
                  <div class="media-body">
				  
                    <h2 class="media-heading text-uppercase">Add Student's Assessment Marks</h2><p>Update the Marks of Assessment happened.</p>				
                  </div>        
                </div>                
              </div> 
            </div>
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
