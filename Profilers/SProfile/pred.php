 <?php
  session_start();
 if (isset($_SESSION['username'])){
	 $usn=$_SESSION['username']	;
    //echo "$usn";
  }
   else {
	   header("location: index.php");
  }
?>


 <!DOCTYPE HTML>
    <html>
    <head> 
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Last Performance Vs Best</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
	
<!-- Include fusioncharts core library 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>-->
<script type="text/javascript" src="../../js/fusioncharts.js"></script>
<!-- Include fusion theme 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>-->
<script type="text/javascript" src="../../js/themes/fusioncharts.theme.fusion.js"></script>

<script>
const dataSource = {
	
	  <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM stu_detail WHERE S_id='$usn'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$pr = $row['Prediction_rate'];
			$n=100-$pr;
			?>
     chart: {
        
        enableSmartLabels: "0",
        startingAngle: "0",
        showPercentValues: "1",
        decimals: "1",
        useDataPlotColorForLabels: "1",
        theme: "fusion"
    },
  data: [
    
    {
      label: "Positive Prediction rate",
      value: "<?php echo json_encode($pr, JSON_NUMERIC_CHECK); ?>",
		
    },
    
    {
      label: "Negative Prediction rate",
      value: "<?php echo json_encode($n, JSON_NUMERIC_CHECK); ?>"
    }
    
  ]
};

FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "pie3d",
    renderAt: "chart-container",
    width: "50%",
    height: "50%",
    dataFormat: "json",
    dataSource
  }).render();
});

</script>
</head>
<body>
<div class="templatemo-flex-row">
	<!--Include sidebar-->
	  <?php include 'sidebar.php';?>
	  <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <!--Include top nav -->
		
		<?php include 'topnav.php';?>
        <div class="templatemo-content-container">
		
		<center><h3 style="font-weight: bold;color:#263238;font-size:40px">Prediction Percentage</h3></center>
		
<div id="chart-container" style="padding: 2% 15%;display:inline-block;"></div>
<br><br>
<center>
<?php
if($pr>65)
{
	?><h1 style="font-weight:bold;color:#546E7A;">You are likely to be placed.</h1>
	<h2 style="font-weight:bold;color:#607D8B;">Keep going on with improvement and consistency. You are a game changer.</h2><?php
}
else
{
	?><h1 style="font-weight:bold;color:#546E7A;">You are currently under Unplaced Section.</h1>
	<h2 style="font-weight:bold;color:#607D8B;">Improve your weak areas wit consistency to get placed. You can become a game changer.</h2><?php
}
?>
</center>	

</div>

</div>

</div>
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