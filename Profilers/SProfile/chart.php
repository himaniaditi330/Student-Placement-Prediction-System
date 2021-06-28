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
    	
        $handle1 = $link1->prepare("SELECT c.sub_id,marks,round(marks*100/max_marks) as per FROM `crt_marks` c 
		NATURAL JOIN sub_details sd WHERE S_id='$usn'"); 
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
    
	<div id="chartContainer1" style="width: 75%; height: 500px;display: inline-block;"></div> 
<div id="chartContainer2" style="width: 75%; height: 500px;display: inline-block;"></div><br/>

<div class="page">

            <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM stu_detail WHERE S_id='65402154'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$prediction = round($row['Prediction_rate']);
			?>
            <!-- default -->
            <div class="clearfix">

                <div class="c100 p<?php echo $prediction?> big">
                    <span><?php echo $prediction ?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
				</div>
			</div>

  
	<script type="text/javascript" src="..\canvasjs-2.3.2\Chart 2.3.2 GA - Stable\canvasjs.min.js"></script>  
	   <style type="text/css">

            body{
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
                font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            }

            .page {
                margin: 40px;
            }

            h1{
                margin: 40px 0 60px 0;
            }

            .dark-area {
                background-color: #666;
                padding: 40px;
                margin: 0 -40px 20px -40px;
                clear: both;
            }
			#chartContainer1
			{
				float:left;
			}
			#chartContainer2
			{
				float:right;
			}
			.clearfix
			{
				float:left;
				width:60%;
			}
            .clearfix:before,.clearfix:after {content: " "; display: table;}
            .clearfix:after {clear: both;}
            .clearfix {*zoom: 1;}

        </style>
	  <link rel="stylesheet" href="css/circle.css">
	 
    </body>
    </html>                              