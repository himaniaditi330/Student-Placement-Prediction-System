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
    <title>Search</title>
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
            <h2 class="margin-bottom-10">Student Queries</h2><p> <br></p>
 <form action="COUNT3.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
			
              <div class="row form-group">
                	 <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Search By</label>
                  <select name="Search" class="form-control" required>  
					   <option value="">Search</option>
                    <option value="Name">Name</option>
                    <option value="USN">USN</option>
                    <option value="Sem">Sem</option>
                    <option value="Branch">Branch</option>
                    <option value="10">10<sup>th </sup>Percentage</option>
                    <option value="12">12<sup>th/Diploma </sup>Percentage</option>
					<option value="B.Tech">B.Tech. Aggregate </option>
                  </select>
				  
            </div>
			<div class="col-lg-6 col-md-6 form-group">
                  <label for="Search">Value</label>
                  <input type="text" name="s" class="form-control" placeholder="" required>
            </div>				
				</div>
				<br>
              <div class="form-group text-right">
                <button type="submit" name="s8" class="templatemo-blue-button">Submit</button>
              </div>
</form>
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



