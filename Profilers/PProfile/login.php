<?php
  session_start();
  if($_SESSION["pusername"]){
    
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
    <title>TPO - Home</title>
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
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
              <div class="square"></div>
              <h2 class="templatemo-inline-block">Welcome to UGI-SPSP</h2>
              <p></p>
              <p>Hello Officer! Have a great day with us! With UGI-SPSP Account, You can add drives, Send Notifications and View the Eligibility Criteria of Students.</p>
              <p>Hope you enjoy doing that. Greetings!!</p>
              
              <p><a href="manage-users.php">View Students</a></p>
              <p><a href="preferences.php">Update your Profile</a></p>
               
            </div>
			
        
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <h3 class="text-uppercase">Marks Analysis</h4>
              <h5 class="text">Marks of Student</h5>
              <hr>
			  <a href="chart.php">
              <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="width: 60%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="width: 50%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="width: 60%;"></div>
              </div>
			  </a>
            </div>
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
			<div class="templatemo-content-widget white-bg col-1">
              <div class="templatemo-content-widget orange-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="drive.php">
                      <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Companies Visited</h2>
                    <p>View the Companies Visited in our Campus so far.</p>  
                  </div>        
                </div>                
              </div>            
                 </div>      
            </div>
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Placed Students Details</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>Student ID</td>
                        <td>Name</td>
                        <td>Company</td>
                        <td>Date</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
		
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT sd.S_id,Concat(sd.F_name,\" \",sd.L_name) as Name,cd.com_name,ps.Date FROM stu_detail sd 
INNER JOIN company_detail cd INNER JOIN `placed_students` ps 
WHERE sd.S_id=ps.S_id and ps.com_id=cd.com_id ORDER BY ps.Date DESC "; 
$rs_result = mysqli_query ($connect, $sql); //run the query
?>
<?php
while ($row = mysqli_fetch_assoc($rs_result)) 
{ 

            print "<tr>"; 

print "<td>" . $row['S_id'] . "</td>"; 
print "<td>" . $row['Name'] . "</td>"; 
print "<td>" . $row['com_name'] . "</td>"; 
print "<td>" . $row['Date'] . "</td>"; 


print "</tr>"; 

}
?>                    
                    </tbody>
                  </table>    
                </div>                          
              </div>
            </div>           
                  
        </div>
		<div class="pagination-wrap">
    <ul class="pagination">
			  <?php 
		
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'spsp');
$sql = "SELECT sd.S_id,sd.F_name,cd.com_name,ps.Date FROM stu_detail sd 
INNER JOIN company_detail cd INNER JOIN `placed_students` ps 
WHERE sd.S_id=ps.S_id and ps.com_id=cd.com_id ORDER BY ps.Date DESC "; 
$rs_result = mysqli_query($connect, $sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
$totalpage = ceil($total_records / $num_rec_per_page); 

$currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
	 if($currentpage == 0)
	{
	   
	}
	else if( $currentpage >= 1  &&  $currentpage <= $totalpage  )
	{
	
		if( $currentpage > 1 && $currentpage <= $totalpage)
			{
				
				$prev = $currentpage-1;
				echo "<li><a  href='manage-users.php?page=".$prev."'><</a></li>";
				
			}
	
	if($totalpage > 1){
$prev = $currentpage-1;
	for ($i=$prev+1; $i<=$currentpage+2; $i++){
		echo "<li><a href='manage-users.php?page=".$i."'>".$i."</a></li>";
  }
  }
	
	
	if($totalpage > $currentpage  )
	{
		$nxt = $currentpage+1;
		echo "<li><a  href='manage-users.php?page=".$nxt."' >></a></li>";
	}

	 echo "<li><a>Total Pages:".$totalpage."</a></li>";
}
 ?> 
</ul>
</div>
      </div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>