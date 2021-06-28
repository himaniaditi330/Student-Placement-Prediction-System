<?php
  session_start();
  if(isset($_SESSION["pusername"])){
   
  }
   else
	   header("location: index.php")
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
    <title>Details</title>
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
            <h2 class="margin-bottom-10">Placement Drives</h2>
            <p>Update Students Details</p>
            <form action="updatedrive1.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="sid">Student ID</label>
                  <input type="text" name="sid" class="form-control" id="inputusn" placeholder="" required>
                </div>
                
				
				
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="cid">Company ID</label>
                  <input type="text"  name="cid" class="form-control" id="inputName" placeholder="" required>
                </div>
				
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Date">Date</label>
                  <input type="date" name="Date" class="form-control" id="Date" placeholder="DD/MM/YYYY" required>
                </div>
				
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Attendance">Attendence</label>
			    <select name="Attendance" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
			        <option value="0">N</option>
				</select>
                 </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="written test">Written Test</label>
				<select name="WrittenTest" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
			        <option value="0">N</option>
			    </select>                 
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Group disscussion"> Personal Interview</label>
				<select name="PI" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
			        <option value="0">N</option>
				</select> 
                </div>		
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Group disscussion"> Group Disscussion</label>
				<select name="GD" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
			        <option value="0">N</option>
				</select> 
                </div>				
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="Technical">Technical</label>
                 	<select name="Tech" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
			        <option value="0">N</option>
			    </select>
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Placed</label>
                  <select name="Placed" class="form-control" required>
                    <option value="select">Y/N</option>
                    <option value="1">Y</option>
                    <option value="0">N</option>                   
                  </select>
				  </div>
				  <br>				  
              <div class="form-group text-right">
                <button type="submit"  name="submit" class="templatemo-blue-button">submit</button>
                <button type="reset" class="templatemo-white-button">Reset</button>
              </div>
            </form>
          </div>
          
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