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
	<link rel="stylesheet" href="css/detail.css">
<!-- Include fusioncharts core library 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>-->
<script type="text/javascript" src="../../js/fusioncharts.js"></script>
<!-- Include fusion theme 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>-->
<script type="text/javascript" src="../../js/themes/fusioncharts.theme.fusion.js"></script>

<script>
FusionCharts.ready(function() {
  var myChart = new FusionCharts({
     type: "angulargauge",
    renderAt: 'chart-container',
     width:'23%',
   height:'30%',
    dataFormat: 'json',
    dataSource: {
       chart: {
    caption: "Quantative Analysis",
    lowerlimit: "0",
    upperlimit: "15",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
  <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE S_id='$usn' and sub_id='quant011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			
				$check1 = mysqli_query($connect, "SELECT Test_date,marks FROM crt_marks WHERE Test_date=
				(SELECT max(Test_date) from crt_marks WHERE S_id='$usn') and sub_id='quant011' ") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			
			$q = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "7",
        code: "#E53935"
      },
      {
        minvalue: "7",
        maxvalue: "12",
        code: "#FFC400"
      },
      {
        minvalue: "12",
        maxvalue: "15",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value:<?php echo json_encode($q, JSON_NUMERIC_CHECK); ?>
		
            
      }	  
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
    }
  }).render();
 
  var myChart1 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container1",
   width:'23%',
   height:'30%',
    dataFormat: "json",
  dataSource: {
	
  chart: {
    caption: "Analytical Reasoning",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
   <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='$usn' and sub_id='reas011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			$check1 = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE Test_date=
			(SELECT max(Test_date) from crt_marks WHERE S_id='$usn') and sub_id='reas011'") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			$r = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "4",
        code: "#E53935"
      },
      {
        minvalue: "4",
        maxvalue: "7",
        code: "#FFC400"
      },
      {
        minvalue: "7",
        maxvalue: "10",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($r, JSON_NUMERIC_CHECK); ?>
      }
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
}
  
  }).render();
  var myChart2 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container2",
    width:'23%',
   height:'30%',
    dataFormat: "json",
  dataSource: {
	
  chart: {
    caption: "English",
    lowerlimit: "0",
    upperlimit: "40",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
   <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='$usn' and sub_id='eng011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$check1 = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE Test_date=
			(SELECT max(Test_date) from crt_marks WHERE S_id='$usn') and sub_id='eng011'") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			$eng = $row['marks'];
			$best = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "22",
        code: "#E53935"
      },
      {
        minvalue: "22",
        maxvalue: "32",
        code: "#FFC400"
      },
      {
        minvalue: "32",
        maxvalue: "40",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($eng, JSON_NUMERIC_CHECK); ?>
      }
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
}
  
  }).render();
  
    var myChart3 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container3",
    width:'23%',
   height:'30%',
    dataFormat: "json",
  dataSource: {
	
  chart: {
    caption: "Data Structure and Programming",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
   <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='$usn' and sub_id='prog011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			$check1 = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE Test_date=
			(SELECT max(Test_date) from crt_marks WHERE S_id='$usn') and sub_id='prog011'") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			$pro = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "5",
        code: "#E53935"
      },
      {
        minvalue: "5",
        maxvalue: "7",
        code: "#FFC400"
      },
      {
        minvalue: "7",
        maxvalue: "10",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($pro, JSON_NUMERIC_CHECK); ?>
      }
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best marks was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
}
  
  }).render();
  
    var myChart4 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container4",
    width:'23%',
   height:'30%',
    dataFormat: "json",
  dataSource: {
	
  chart: {
    caption: "Group Discussion",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
   <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='$usn' and sub_id='gd011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			$check1 = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE Test_date=
			(SELECT max(Test_date) from crt_marks WHERE S_id='$usn' and sub_id='gd011')") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			$gd = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "5",
        code: "#E53935"
      },
      {
        minvalue: "5",
        maxvalue: "7",
        code: "#FFC400"
      },
      {
        minvalue: "7",
        maxvalue: "10",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($gd, JSON_NUMERIC_CHECK); ?>
      }
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
}
  
  }).render();
  var myChart5 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container5",
    width:'23%',
   height:'30%',
    dataFormat: "json",
  dataSource: {
	
  chart: {
    caption: "Personal Interview",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "",
    theme: "fusion",
    showtooltip: "0"
  },
   <?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='$usn' and sub_id='pi011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			$check1 = mysqli_query($connect, "SELECT marks FROM crt_marks WHERE Test_date=
			(SELECT max(Test_date) from crt_marks WHERE S_id='$usn') and sub_id='pi011'") or die("Check Query");
			$row1 = mysqli_fetch_assoc($check);
			$pi = $row1['marks'];
			?>
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "5",
        code: "#E53935"
      },
      {
        minvalue: "5",
        maxvalue: "7",
        code: "#FFC400"
      },
      {
        minvalue: "7",
        maxvalue: "10",
        code: "#4CAF50"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($pi, JSON_NUMERIC_CHECK); ?>
      }
    ]
  },
     trendpoints: {
        point: [{
          startValue: <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>,
          useMarker: "1",
          markerColor: "#F1f1f1",
          markerBorderColor: "#666666",
          markerRadius: "10",
          markerTooltext: "Best was <?php echo json_encode($best, JSON_NUMERIC_CHECK); ?>",
          displayValue: "Best",
          color: "#0075c2",
          thickness: "5",
          alpha: "100"
        }]
      }
}
  
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
		<center><h3 style="font-weight: bold;font-size:28px">Last Vs Best Performance</h2></center>
		
<div id="chart-container"></div>
<div id="chart-container1"></div>
<div id="chart-container2"></div>
<div id="chart-container3"></div>
<div id="chart-container4"></div>
<div id="chart-container5"></div>
</div>
</div>
</div>

</body>
</html>
