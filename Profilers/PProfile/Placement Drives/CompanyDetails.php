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
        <link rel="shortcut icon" href="../favicon.ico" type="image/icon">
        <link rel="icon" href="../favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Company Details</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
    
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
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <?php
		  $Welcome = "Welcome";
          echo "<h1>" . $Welcome . "<br>". $_SESSION['pusername']. "</h1>";
		 echo "<br>";
		
		  ?>
        </header>
        <div class="profile-photo-container">
          <img src="../images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
           <ul>
             <li><a href="../login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li> 
            <li><a href="../Placement Drives.php" class="active"><i class="fa fa-home fa-fw"></i>Placement Drives</a></li>           
            <li><a href="../manage-users.php"><i class="fa fa-users fa-fw"></i>View Students</a></li>
            <li><a href="../queries.php"><i class="fa fa-users fa-fw"></i>Queries</a></li>
            <li><a href="../Students Eligibility.php"><i class="fa fa-sliders fa-fw"></i>Students Eligibility Status</a></li>
            <li><a href="../logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
               <li><a href="../../Homepage/index.php">Home UGI-SPSP</a></li>
                <li><a href="">Drives Home</a></li>
                <li><a href="Notif.php">Notifications</a></li>
                <li><a href="Change Password.php">Change Password</a></li>
              </ul> 
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                    <td><a   class="white-text templatemo-sort-by">Company ID</a></td>
                    <td><a   class="white-text templatemo-sort-by">Name</a></td>
                    <td><a   class="white-text templatemo-sort-by">Type</a></td>
                    <td><a class="white-text templatemo-sort-by">Tagline</a></td>
                    <td><a class="white-text templatemo-sort-by">TPO_ID</a></td>
                    <td><a class="white-text templatemo-sort-by">Date</a></td>
					   <td><a  class="white-text templatemo-sort-by">Email </a></td>
                       <td><a class="white-text templatemo-sort-by">Contact Number</a></td>
   <td><a   class="white-text templatemo-sort-by">Campus/Pool </a></td>               
   <td><a class="white-text templatemo-sort-by">Venue </a></td>
   <td><a  class="white-text templatemo-sort-by">10<sup>th</sup> </td>
   <td><a  class="white-text templatemo-sort-by">12<sup>th</sup>/Diploma </a></td>
			      <td><a  class="white-text templatemo-sort-by">B.Tech</a></td>
			      <td><a class="white-text templatemo-sort-by">Active Backlogs </span></a></td>
				     <td><a   class="white-text templatemo-sort-by">Total Backlogs </span></a></td>
				     <td><a  class="white-text templatemo-sort-by">Year Gap</a></td>
				     <td><a  class="white-text templatemo-sort-by">Other Details</a></td>
				    
				  </thead>
			   </tr>
			   <?php
			
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM company_detail ORDER BY com_name LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connect, $sql); //run the query
?>
<?php
while ($row = mysqli_fetch_assoc($rs_result)) 
{ 

           ?><tr> 
			
	<td> <p><?php echo $row['com_id'] ; ?></p> </td>  
 <td><p><?php echo $row['com_name'] ; ?></p> </td> 
 <td><p><?php echo$row['type']; ?></p> </td>
 <td><p><?php echo$row['tagline']; ?></p> </td>
 <td><p><?php echo$row['tpo_id']; ?></p> </td>
 <td><p><?php echo$row['Date']; ?></p> </td>
 <td><p><?php echo $row['email']; ?></p> </td>
 <td><p><?php echo $row['contact_no']; ?></p> </td>
 <td><p><?php echo $row['C/P']; ?></p> </td>
 <td><p><?php echo $row['Venue']; ?></p> </td> 
 <td><p><?php echo $row['10th']; ?></p> </td>
 <td><p><?php echo $row['12th'] ; ?></p> </td>
 <td><p><?php echo $row['B.Tech']; ?></p> </td>
 <td><p><?php echo$row['active_backlogs']; ?></p> </td>
 <td><p><?php echo $row['total_backs']; ?></p> </td>
 <td><p><?php echo $row['Year_gap']; ?></p> </td>
 <td><p><?php echo $row['ODetails']; ?></p> </td>
</tr>
<?php
}
?> 

                </tbody>
              </table>  
			  </div>
			  </div>
			  </div>


  <div class="pagination-wrap">
  <ul class="pagination">
			  <?php 
		
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'placement');
$sql = "SELECT * FROM addpdrive ORDER BY Date Desc"; 
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
				echo "<li><a  href='CompanyDetails.php?page=".$prev."'><</a></li>";
				
			}
	
	if($totalpage > 1){
$prev = $currentpage-1;
	for ($i=$prev+1; $i<=$currentpage+2; $i++){
		echo "<li><a href='CompanyDetails.php?page=".$i."'>".$i."</a></li>";
  }
  }
	
	
	if($totalpage > $currentpage  )
	{
		$nxt = $currentpage+1;
		echo "<li><a  href='CompanyDetails.php?page=".$nxt."' >></a></li>";
	}

	 echo "<li><a>Total Pages:".$totalpage."</a></li>";
}
 ?> 
</ul>
</div>

          <div class="templatemo-flex-row flex-content-row">                      
          
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