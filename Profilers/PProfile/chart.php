<?php 

// First array for purchased product 

// Data to draw graph for purchased products 
$dataPoints = array(); 

// Data to draw graph for sold products 
$dataPoints2 = array(); 
$dataPoints3 = array(); 
$dataPoints4 = array(); 
 try{
         // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link = new \PDO(   'mysql:host=localhost;dbname=spsp;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',
                            '', //'',
                            array(
                                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                \PDO::ATTR_PERSISTENT => false
                            )
                        );
    	
        $handle = $link->prepare("SELECT sub_id,min(marks) p FROM `aca_marks` group By sub_id"); 
        $handle->execute(); 
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result as $row){
            array_push($dataPoints, array("label"=> $row->sub_id, "y"=> $row->p));
        }
		
		
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
	try{
         // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link1 = new \PDO(   'mysql:host=localhost;dbname=spsp;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',
                            '', //'',
                            array(
                                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                \PDO::ATTR_PERSISTENT => false
                            )
                        );
    	
        $handle1 = $link1->prepare("SELECT sub_id,max(marks) p FROM `aca_marks`  group By sub_id"); 
        $handle1->execute(); 
        $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result1 as $row1){
            array_push($dataPoints2, array("label"=> $row1->sub_id, "y"=> $row1->p));
        }
		
		
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
			try{
         // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link2 = new \PDO(   'mysql:host=localhost;dbname=spsp;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',
                            '', //'',
                            array(
                                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                \PDO::ATTR_PERSISTENT => false
                            )
                        );
    	
        $handle2 = $link2->prepare("SELECT sub_id,(max(marks)*100/max_marks) p FROM `crt_marks` c NATURAL JOIN sub_details s group by sub_id"); 
        $handle2->execute(); 
        $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result2 as $row2){
            array_push($dataPoints3, array("label"=> $row2->sub_id, "y"=> $row2->p));
        }
		
		
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
	try{
         // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link3 = new \PDO(   'mysql:host=localhost;dbname=spsp;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',
                            '', //'',
                            array(
                                \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                \PDO::ATTR_PERSISTENT => false
                            )
                        );
    	
        $handle3 = $link3->prepare("SELECT sub_id,(min(marks)*100/max_marks) p FROM `crt_marks` c NATURAL JOIN sub_details s group by sub_id"); 
        $handle3->execute(); 
        $result3 = $handle3->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result3 as $row3){
            array_push($dataPoints4, array("label"=> $row3->sub_id, "y"=> $row3->p));
        }
		
		
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
?> 

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
    <link href="css/chart.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script type="text/javascript" src="..\canvasjs-2.3.2\Chart 2.3.2 GA - Stable\canvasjs.min.js"></script>  
	 
	<script> 
		window.onload = function () { 
		
			var chart = new CanvasJS.Chart("chartContainer", { 
				animationEnabled: true, 
				title:{ 
					text: "Academic Marks"
				},	 
				axisY: { 
					title: "Marks", 
					interval: 20,
					minimum: "0",
					maximum: "100"
					
				}, 
				axisX: {
		title: "Subject ID"
	},
				axisY2: { 
				},	 
				toolTip: { 
					shared: true 
				}, 
				legend: { 
					cursor:"pointer", 
					itemclick: toggleDataSeries 
				}, 
				data: [{ 
					type: "column", 
					name: "Minimum Marks", 
					legendText: "Minimum", 
					showInLegend: true, 
					dataPoints:<?php echo json_encode($dataPoints, 
							JSON_NUMERIC_CHECK); ?> 
				}, 
				{ 
					type: "column",	 
					name: "Maximum Marks", 
					legendText: "Maximum", 
					 
					showInLegend: true, 
					dataPoints:<?php echo json_encode($dataPoints2, 
							JSON_NUMERIC_CHECK); ?> 
				}] 
			}); 
			
			var chart1 = new CanvasJS.Chart("chartContainer1", { 
				animationEnabled: true, 
				title:{ 
					text: "CRT Percentage",
					
					
					
				},	 
				axisY: { 
					title: "Percentage", 
					interval: 20,
					minimum: "0",
					maximum: "100"
					
				}, 
				axisX: {
		title: "Subject ID"
	},
				axisY2: { 
				},	 
				toolTip: { 
					shared: true 
				}, 
				legend: { 
					cursor:"pointer", 
					itemclick: toggleDataSeries 
				}, 
				data: [{ 
					type: "column", 
					name: "Minimum Percentage", 
					legendText: "Minimum", 
					showInLegend: true, 
					dataPoints:<?php echo json_encode($dataPoints3, 
							JSON_NUMERIC_CHECK); ?> 
				}, 
				{ 
					type: "column",	 
					name: "Maximum Percentage", 
					legendText: "Maximum", 
					 
					showInLegend: true, 
					dataPoints:<?php echo json_encode($dataPoints4, 
							JSON_NUMERIC_CHECK); ?> 
				}] 
			}); 
			chart.render(); 
			chart1.render(); 
			
			function toggleDataSeries(e) { 
				if (typeof(e.dataSeries.visible) === "undefined"
							|| e.dataSeries.visible) { 
					e.dataSeries.visible = false; 
				} 
				else { 
					e.dataSeries.visible = true; 
				} 
				chart.render(); 
			} 
		
		} 
	</script> 
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
	<div id="chartContainer" ></div> 
</div>
<br>
	<div id="chartContainer1" ></div> 
</div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
</html>