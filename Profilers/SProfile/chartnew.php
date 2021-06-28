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

	<?php
     
    $dataPoints = array();
    $dataPoints1 = array();
    $dataPoints2 = array();
    //Best practice is to create a separate file for handling connection to database
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
    	
        $handle = $link->prepare("select sub_id,marks FROM aca_marks WHERE S_id='$usn'"); 
        $handle->execute(); 
        $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result as $row){
            array_push($dataPoints, array("label"=> $row->sub_id, "y"=> $row->marks));
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
    	
        $handle1 = $link1->prepare("SELECT c.sub_id,sum(round(marks*100/max_marks))/COUNT(*) as per FROM
		`crt_marks` c NATURAL JOIN sub_details sd WHERE S_id='65402154' group by sub_id "); 
        $handle1->execute(); 
        $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
    		
        foreach($result1 as $row1){
            array_push($dataPoints1, array("label"=> $row1->sub_id, "y"=> $row1->per));
        }
		
		
    }
    catch(\PDOException $ex){
        print($ex->getMessage());
    }
		
    ?>
    <!DOCTYPE HTML>
    <html>
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
	<link rel="stylesheet" href="css/circle.css">
	  <link rel="stylesheet" href="css/chart.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
	<script type="text/javascript" src="..\canvasjs-2.3.2\Chart 2.3.2 GA - Stable\canvasjs.min.js"></script>  
    <script>
    window.onload = function () {
     
    var chart1 = new CanvasJS.Chart("chartContainer1", {
    	animationEnabled: true,
    	exportEnabled: true,
    	theme: "light1", // "light1", "light2", "dark1", "dark2"
    		title:{
		text: "Percentage of Academic Marks"
	},
	axisY: {
		title: "Marks"
	},
	axisX: {
		title: "Subject ID"
	},
    	data: [{
    		type: "column", //change type to bar, line, area, pie, etc  
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
	var chart2 = new CanvasJS.Chart("chartContainer2", {
    	animationEnabled: true,
    	exportEnabled: true,
    	theme: "light1", // "light1", "light2", "dark1", "dark2"
    		title:{
		text: "Percentage of CRT Marks"
	},
	axisY: {
		title: "Percentage"
	},
	axisX: {
		title: "Subject ID"
	},
    	data: [{
    		type: "column", //change type to bar, line, area, pie, etc  
    		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    	}]
    });
	var chart3 = new CanvasJS.Chart("chartContainer3", {
    	animationEnabled: true,
    	exportEnabled: true,
    	theme: "light1", // "light1", "light2", "dark1", "dark2"
    		title:{
		text: "Percentage of Marks"
	},
	axisY: {
		title: "Percentage"
	},
	axisX: {
		title: "Student ID"
	},
    	data: [{
    		type: "pie", //change type to bar, line, area, pie, etc  
    		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    	}]
    });
   chart1.render();
    chart2.render();
    chart3.render();
     
	 
    }
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
		<div class="templatemo-flex-row flex-content-row">		
			<div id="chartContainer1" ></div> 
		</div><br>
		<div class="templatemo-flex-row flex-content-row">
			<div class="col-1" >    
				<a class="btn btn-success" role="button" href="detail.php" style="display:inline-block;padding:20px 20px;border-radius:10px;margin:60% 15%">
				Detailed Marks Analysis</a>
			</div>
			<div id="chartContainer2" ></div>
		</div><br/>

<!--<div class="page">
            <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM stu_detail WHERE S_id='65402154'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$prediction = round($row['Prediction_rate']);
			?>
            <!-- default --
            <div class="clearfix">

                <div class="c100 p<?php echo $prediction?> big">
                    <span><?php echo $prediction ?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
				</div>
			</div>-->
			</div>
			</div>
			</div>

  
	
	  
    </body>
    </html>                              