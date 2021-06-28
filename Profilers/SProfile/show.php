<?php
  session_start();
 if (isset($_SESSION['username'])){
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
    <title>Marks</title>
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
                    <td ><a   class="white-text templatemo-sort-by"><center>Subject ID</center></a></td>
                    <td ><a   class="white-text templatemo-sort-by"><center>Subject Name</center></a></td>
                    <td ><a   class="white-text templatemo-sort-by"><center>Marks</center></a></td>
                    <td ><a   class="white-text templatemo-sort-by"><center>Percentage</center></a></td>
					</thead>
				
			   <?php
			$user=$_SESSION['username'];
			
$num_rec_per_page=10;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT sub_id, sub_name,marks,(marks*100/max_marks) p FROM `sub_details` NATURAL JOIN `aca_marks` WHERE S_id='$user'
 LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connect, $sql); //run the query
while ($row = mysqli_fetch_assoc($rs_result)) 
{ 

           ?><tr> 
			
	<td> <p><?php echo $row['sub_id'] ; ?></p> </td>  
 <td><p><?php echo $row['sub_name'] ; ?></p> </td> 
 <td><p><center><?php echo$row['marks']; ?></center></p> </td>
 
 <td><p><center><?php echo round($row['p']); ?>%</p></center> </td></center>
 
 
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
		
$num_rec_per_page=10;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'spsp');
$sql = "SELECT sub_id, sub_name,marks FROM `sub_details` NATURAL JOIN `aca_marks` WHERE S_id=65402154"; 
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
				echo "<li><a  href='show.php?page=".$prev."'><</a></li>";
				
			}
	
	if($totalpage > 1){
$prev = $currentpage-1;
	for ($i=$prev+1; $i<=$currentpage+2; $i++){
		echo "<li><a href='show.php?page=".$i."'>".$i."</a></li>";
  }
  }
	
	
	if($totalpage > $currentpage  )
	{
		$nxt = $currentpage+1;
		echo "<li><a  href='show.php?page=".$nxt."' >></a></li>";
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