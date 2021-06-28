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
    <title>Manage Students</title>
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
if(isset($_POST['s8']))
{ 
	$search_by = $_POST['Search'];
	$search = $_POST['s'];
	//echo "$search_by";
	if ($search_by=='Name')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail WHERE   
		(`F_name` LIKE '%$search%' or `L_name` LIKE '%$search%')");
		$data=mysqli_fetch_assoc($RESULT);
		echo "<br><h3>Number of Students with Name '$search'&nbsp:&nbsp";
		echo $data['count(*)'];
		echo "</h3><br>"; 
		$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE   
		(`F_name` LIKE '%$search%' or `L_name` LIKE '%$search%') ORDER BY F_name");
		while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='USN')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail WHERE S_id='$search'");
		$row = mysqli_fetch_assoc($RESULT);
		echo "<br><h3>Details of Student '$search'&nbsp:&nbsp";
		echo "</h3><br>";$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE S_id='$search' ORDER BY F_name");
		while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='Sem')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail where Sem='$search'");
		$data = mysqli_fetch_assoc($RESULT);
		echo "<br><h3>Students in Semester '$search'&nbsp:&nbsp";
		echo $data['count(*)'];
		echo "</h3><br>";
		$sql = mysqli_query($connect, "SELECT * FROM stu_detail where Sem='$search' ORDER BY F_name");
		while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='Branch')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail where Branch='$search'");
$data = mysqli_fetch_assoc($RESULT);
echo "<br><h3>Students in '$search' Branch&nbsp:&nbsp";
echo $data['count(*)'];
echo "</h3><br>"; 
$sql = mysqli_query($connect, "SELECT * FROM stu_detail where Branch='$search' ORDER BY F_name");
		while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='10')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail where 10th>='$search'");
$data = mysqli_fetch_assoc($RESULT);
echo "<br><h3>Students Scored '$search' and Above in 10<sup>th</sup>&nbsp:&nbsp";
echo $data['count(*)'];
echo "</h3><br>";
$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE 10th>='$search' ORDER BY `10th` DESC");
while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='12')
	{
		
$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail WHERE `12th`>='$search'");
$data = mysqli_fetch_assoc($RESULT);
echo "<br><h3>Students Scored '$search' and Above in 12<sup>th</sup>&nbsp:&nbsp";
echo $data['count(*)'];
echo "</h3><br>";
$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE `12th`>='$search' ORDER BY `12th` DESC");
while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
	elseif ($search_by=='B.Tech')
	{
		$RESULT = mysqli_query($connect, "SELECT count(*) FROM stu_detail WHERE `B.Tech`>='$search'");
$data = mysqli_fetch_assoc($RESULT);
echo "<br><h3>Students Scored '$search' and Above in B.Tech&nbsp:&nbsp";
echo $data['count(*)'];
echo "</h3><br>";
$sql = mysqli_query($connect, "SELECT * FROM stu_detail WHERE `B.Tech`>='$search' ORDER BY `B.Tech` DESC");
while($row = mysqli_fetch_assoc($sql))
		{
	       ?>
            <tr> 
			
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
	
}
?>
     
     </tbody>
              </table>  
			  </div>
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