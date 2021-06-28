<?php
  session_start();
  if($_SESSION["username"]){
    $usn=$_SESSION["username"];
	//echo "$usn";
  }
   else {
	   header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Profile Home</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
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
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
              <div class="square"></div>
              <h2 class="templatemo-inline-block">Welcome to UGI-SPSP</h2>
              <hr>
              <p>Work is Magic and it defines you at every aspect of ur life. As you Work Hard u will become smart and the Irony is Every Smart worker will be a Successfull man where as worthless hardwork is like a monkey finding gold in a sea.
                <a href="preferences.php""
                target="_parent">Go and Fill your Details in Details Tab</a>
                </p>
              <p>We have got number of Partners from the companies who are tied up to our college and it is Incresasing. We are doing our Job of getting u Placed and 
                Being a Student its your duty to acompolish ur responsibilities.</p>
            </div>
            <div class="templatemo-content-widget white-bg col-1 ">
              <i class="fa fa-times"></i><a href="pred.php">
              <h4 class="text-uppercase">Check Prediction</h4>
              <h5 class="text-uppercase margin-bottom-10">Your Prediction Percentage</h5><br>
              <img src="images/pie.jpg" alt="Bicycle"  class="img-circle img-thumbnail">
			  </a>
            </div>
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i><a href="chartnew.php">
              <h4 class="text-uppercase">Academics Progress</h4>
              <h5 class="text-uppercase">Grades of Progress</h5>
              <hr></a>
			  <a href="chartnew.php">
              <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="width: 60%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
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
                    <h2 class="media-heading text-uppercase">Latest Drive</h2>
                    <p>Click on and get the Latest Drive and Upcoming Drive Details</p>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative">
                  <h2 class="text-uppercase">Lately Placed Students</h2>
                </div>
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
          <!-- Second row ends -->
        </div>
      </div>
    </div>
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <!-- jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
  </body>

</html>