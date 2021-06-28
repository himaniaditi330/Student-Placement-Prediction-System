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
				<?php
				$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if(isset($_POST['submit']))
{ 
	$branch = $_POST['Branch'];
$s= $_POST['Sem'];

$sql1 = "SELECT COUNT(sub_id) FROM sub_details WHERE sub_id LIKE '___$s%'"; 
$rs_result1 = mysqli_query ($connect, $sql1); //run the query
$sql = "SELECT * FROM sub_details WHERE sub_id LIKE '___$s%'"; 
$rs_result = mysqli_query ($connect, $sql); //run the query
$data = mysqli_fetch_assoc($rs_result1);
$c= $data['COUNT(sub_id)'];
?>
                  <tr>
                    <td rowspan="2"><a   class="white-text templatemo-sort-by"><center>Student ID</center></a></td>
                    <td rowspan="2"><a   class="white-text templatemo-sort-by"><center>Name</center></a></td>
                    <td colspan="<?php echo $data['COUNT(sub_id)']?>"><a   class="white-text templatemo-sort-by"><center>Academic Subjects Name & ID</center></a></td>
					<td colspan="3"><a   class="white-text templatemo-sort-by"><center>CRT Subjects Name & ID</center></a></td>
					<td rowspan="2"><a   class="white-text templatemo-sort-by"><center>GD Marks</center></a></td>
					<td rowspan="2"><a   class="white-text templatemo-sort-by"><center>PI Marks</center></a></td>
				</thead>
				<thead>
				
				
		<tr>
			<td><a   class="white-text templatemo-sort-by"></a></td>
			<td><a   class="white-text templatemo-sort-by"></p></a></td>
<?php
while ($row = mysqli_fetch_assoc($rs_result)) 
{ ?>  
				
					 
                    <td><a class="white-text templatemo-sort-by"><p><?php echo $row['sub_name'] ; ?><br>(
					<?php echo $row['sub_id'] ; ?>)</p></a></td>
                    
				
<?php
}
}		
?>
			<td><a  class="white-text templatemo-sort-by">English <br>(eng011)</td>
   <td><a  class="white-text templatemo-sort-by">Quants<br> (quant011)</a></td>
			      <td><a  class="white-text templatemo-sort-by">Reasoning <br> (reas011)</a></td>
			      <td><a class="white-text templatemo-sort-by"></span></a></td>
				     <td><a   class="white-text templatemo-sort-by"></span></a></td>
</tr>
				</thead>
			   <?php
			
$num_rec_per_page=5;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM sub_details sd NATURAL JOIN marks m
WHERE sd.sub_id=m.sub_id LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connect, $sql); //run the query
while ($row = mysqli_fetch_assoc($rs_result)) 
{ 

           ?><tr> 
			
	<td> <p><?php echo $row['S_id'] ; ?></p> </td>  
 <td><p><?php echo $row['sub_id'] ; ?></p> </td> 
 <td><p><?php echo$row['m.marks']; ?></p> </td>
 <td><p><?php echo$row['gd.marks']; ?></p> </td>
 <td><p><?php echo$row['pi.marks']; ?></p> </td>
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