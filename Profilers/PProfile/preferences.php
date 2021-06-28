<?php
  session_start();
  if($_SESSION["pusername"]){
	  $connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
	mysqli_select_db($connect, "spsp"); // Selecting Database from Server
	$sql="Select * from `tpo_detail`";
	$res=mysqli_query($connect,$sql);
	$rows=mysqli_fetch_assoc($res);
    
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
    <div class="templatemo-flex-row">
  <!--Include sidebar-->
	  <?php include 'sidebar.php';?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <!--Include top nav-->
	  <?php include 'topnav.php';?>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Preferences</h2>
            <p>Update Your Details</p>
            <form action="pref.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
			  <div class="col-lg-6 col-md-6 form-group">
                  <label for="tpoid">TPO ID</label>
                  <input type="text" name="tpoid" class="form-control" id="tpoid"value="<?php echo $rows["tpo_id"] ?> "readonly >
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="inputFirstName">TPO Name</label>
                  <input type="text" name="name" class="form-control" id="inputFirstName" value="<?php echo $rows["tpo_name"] ?> "readonly>
                </div> 
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Phone">Contact No:</label>
                  <input type="text" name="Num" class="form-control" id="Phone" value="<?php echo $rows["contact_no"] ?> ">
                </div>
				
				 <div class="col-lg-6 col-md-6 form-group">
                  <label for="Email">Email</label>
                  <input type="Email" name="Email" class="form-control" id="Email" value="<?php echo $rows["email"] ?> ">
                </div>
				
               
              </div>               
              </div>
              <div class="row form-group">
                <div class="col-lg-12">
                  <label class="control-label templatemo-block">Upload your Profile Pic</label>
                  <!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
                  <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true"
                  data-icon="false">
                  <p>Maximum upload size is 5 MB.</p>
                </div>
              </div>
              <div class="form-group text-right">
                
				<button type="submit"  name="submit" class="templatemo-blue-button">Update</button>
                <button type="reset" class="templatemo-white-button">Reset</button>
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