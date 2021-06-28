<?php
  session_start();
  if(isset($_SESSION["pusername"])){
  }
   else
	   header("location: index.php");
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
    <title>Principal - Student Details</title>
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
            <h2 class="margin-bottom-10">ELIGIBILITY CRITERIA</h2>
            
            <form action="eligibility.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
			
              <div class="row form-group">
                	 <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Branch of Study</label>
                  <select name="Branch" class="form-control" required>  
					   <option value="">Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="IT">IT</option>
                    <option value="EEE">EEE</option>
                    <option value="ECE">ECE</option>
                    <option value="ME">ME</option>
                    <option value="CE">CE</option>
					<option value="EN">EN</option>
                  </select>
                </div>
			<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Semester</label>
                  <select name="Sem" class="form-control" >  
					   <option value="">Sem</option>
                    <option value="8">8</option>
                    <option value="7">7</option>
                    <option value="6">6</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
					<option value="2">2</option>
					<option value="1">1</option>
                  </select>
                </div>				
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="sslc">10th Aggregate</label>
                  <input type="text" name="10" class="form-control" id="sslc" placeholder="">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Pu">12th/Diploma Aggregate</label>
                  <input type="text" name="12" class="form-control" id="Pu" placeholder="">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="BE">B. Tech. Aggregate</label>
                  <input type="text" name="btech" class="form-control" id="BE" placeholder="">
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Current Backlogs</label>
                  <input type="number" name="curback" class="form-control" placeholder="Numbers">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Total Backlogs</label>
                  <input type="number" name="totback" class="form-control" placeholder="Numbers">
                </div>
				
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Year Gap</label>
                  <select name="yg" class="form-control">
                     <option value="select">Years</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                
				
                
				
          <br>
              <div class="form-group text-right">
                <button type="submit" name="submit" class="templatemo-blue-button">submit</button>
                <button type="reset" class="templatemo-white-button">Reset</button>
              </div>
            </form>
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