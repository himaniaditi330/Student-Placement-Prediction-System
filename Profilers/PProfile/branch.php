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
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>View Students</title>
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
          <div class="templatemo-content-widget no-padding">
		  	
            <div class="panel panel-default table-responsive">
		
              
			  <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
				  <td><a   class="white-text templatemo-sort-by">Student ID</a></td>
                    <td><a   class="white-text templatemo-sort-by">First Name</a></td>
                    <td><a   class="white-text templatemo-sort-by">Last Name </a></td>
                    <td><a class="white-text templatemo-sort-by">Contact Number  </a></td>
					   <td><a  class="white-text templatemo-sort-by">Email </a></td>
                       <td><a class="white-text templatemo-sort-by">DOB  </a></td>
   <td><a   class="white-text templatemo-sort-by">Sem </a></td>               
   <td><a class="white-text templatemo-sort-by">Branch </a></td>
   <td><a  class="white-text templatemo-sort-by">10<sup>th</sup> </td>
   <td><a  class="white-text templatemo-sort-by">12<sup>th</sup>/Diploma </a></td>
			      <td><a  class="white-text templatemo-sort-by">B.Tech</a></td>
				  <td><a  class="white-text templatemo-sort-by">Project </a></td>
			      <td><a class="white-text templatemo-sort-by">Active Backlogs </span></a></td>
				     <td><a   class="white-text templatemo-sort-by">Total Backlogs </span></a></td>
				     <td><a  class="white-text templatemo-sort-by">Year Gap</a></td>
				    
				  </thead>
			   </tr>
			   
	 <?php

		
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

if(isset($_POST['submit']))
{ 
	$search_by = $_POST['branch'];
	//echo "$search_by";
	//if ($search_by=='CSE')
	//
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail WHERE  
		Branch='$search_by' ORDER BY F_name LIMIT $start_from, $num_rec_per_page");
		$data=mysqli_fetch_assoc($RESULT);
		echo "<br><h3>Number of Students of branch '$search_by'&nbsp:&nbsp";
		echo $data['count(*)'];
		echo "</h3><br>"; 
		$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE  
		Branch='$search_by'");
		while($row = mysqli_fetch_assoc($sql))
		{
	        ?><tr> 
			
	<td> <p><?php echo $row['S_id'] ; ?></p> </td>  
 <td><p><?php echo $row['F_name'] ; ?></p> </td> 
 <td><p><?php echo$row['L_name']; ?></p> </td>
 <td><p><?php echo $row['contact_no']; ?></p> </td>
 <td><p><?php echo $row['email']; ?></p> </td>
 <td><p><?php echo $row['DOB']; ?></p> </td>
 <td><p><?php echo $row['Sem']; ?></p> </td> 
 <td><p><?php echo$row['Branch']; ?></p> </td>
 <td><p><?php echo $row['10th']; ?></p> </td>
 <td><p><?php echo $row['12th'] ; ?></p> </td>
 <td><p><?php echo $row['B.Tech']; ?></p> </td>
 <td><p><?php echo $row['Project']; ?></p> </td>
 <td><p><?php echo$row['active_backlogs']; ?></p> </td>
 <td><p><?php echo $row['total_backs']; ?></p> </td>
 <td><p><?php echo $row['Year_gap']; ?></p> </td>
</tr>
<?php
		
	}
	
	
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
mysqli_select_db($connect, 'spsp');
$sql = "SELECT * FROM stu_detail WHERE  
		Branch='$search_by' LIMIT $start_from, $num_rec_per_page"; 
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
				echo "<li><a  href='cse.php?page=".$prev."'><</a></li>";
				
			}
	
	if($totalpage > 1){
$prev = $currentpage-1;
	for ($i=$prev+1; $i<=$currentpage+1; $i++){
		echo "<li><a href='cse.php?page=".$i."'>".$i."</a></li>";
  }
  }
	
	
	if($totalpage > $currentpage +1 )
	{
		$nxt = $currentpage+1;
		echo "<li><a  href='cse.php?page=".$nxt."' >></a></li>";
	}

	 echo "<li><a>Total Pages:".$totalpage."</a></li>";
}

 
 ?> 
</ul>
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
