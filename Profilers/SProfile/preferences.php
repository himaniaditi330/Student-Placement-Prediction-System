<?php
  session_start();
  $ses=$_SESSION["username"];
  //echo "Welcome, ".$_SESSION['username']."!";
  if($_SESSION['username']){
    //echo "Welcome, ".$_SESSION['username']."!";
	$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
	mysqli_select_db($connect, "spsp"); // Selecting Database from Server
	$sql="Select * from `stu_detail` where `S_id`='$ses'";
	$res=mysqli_query($connect,$sql);
	$rows=mysqli_fetch_assoc($res);
//echo "Welcome, ".$_SESSION['username']."!";
//echo $rows["S_id"];
	
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
   <div class="templatemo-flex-row">
      <!--Include sidebar-->
	  <?php include 'sidebar.php';?>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
    <!--Include top nav -->
		<?php include 'topnav.php';?>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Preferences</h2>
            <p>Update Your Details</p>
            <form action="pref.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="inputFirstName">First Name</label>
                  <input type="text" name="Fname" class="form-control" id="inputFirstName" value="<?php echo $rows["F_name"] ?> "readonly>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="inputLastName">Last Name</label>
                  <input type="text"  name="Lname" class="form-control" id="inputLastName" value="<?php echo $rows["L_name"] ?>"readonly>
                </div>
				
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="usn">USN</label>
                  <input type="text" name="USN" class="form-control" id="usn" value="<?php echo $rows["S_id"] ?> " readonly>
                </div>
               
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Phone">Phone:</label>
                  <input type="text" name="Num" class="form-control" id="Phone" value="<?php echo $rows["contact_no"] ?>" >
                </div>
				
				 <div class="col-lg-6 col-md-6 form-group">
                  <label for="Email">Email</label>
                  <input type="Email" name="Email" class="form-control" id="Email" value="<?php echo $rows["email"] ?>">
                </div>
				
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="DOB">Date of Birth</label>
                  <input type="date" name="DOB" class="form-control" id="DOB" value="<?php echo $rows["DOB"] ?>" >
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Current Semester</label>
                  <select name="Cursem" class="form-control" >
                    <option value="<?php echo $rows["Sem"] ?>"><?php echo $rows["Sem"] ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
				  </div>
				  
				
				  <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Branch of Study</label>
                  <select name="Branch" class="form-control" >
                    <option value="<?php echo $rows["Branch"] ?>"><?php echo $rows["Branch"] ?></option>
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
                  <label for="sslc">10th Aggregate</label>
                  <input type="text" name="Percentage" class="form-control" id="sslc" value="<?php echo $rows["10th"] ?>" >
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Pu">12th/Diploma Aggregate</label>
                  <input type="text" name="Puagg" class="form-control" id="Pu" value="<?php echo $rows["12th"] ?>" >
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="BE">B.Tech Aggregate</label>
                  <input type="text" name="Beagg" class="form-control" id="BE" value="<?php echo $rows["B.Tech"] ?>">
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Active Backlogs</label>
                  <select name="Backlogs" class="form-control">
                    <option value="select"><?php echo $rows["active_backlogs"] ?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Total Backlogs</label>
                  <select name="History" class="form-control">
                    <option value="select"><?php echo $rows["total_backs"] ?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Year Gap</label>
                  <select name="Dety" class="form-control" >
                    <option value="select"><?php echo $rows["Year_gap"] ?></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
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