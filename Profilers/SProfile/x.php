
<html>
<head>
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
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='65402154' and sub_id='quant011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$q = $row['marks'];
			?>
  chart: {
    caption: "Nordstorm's Customer Satisfaction Score for 2017",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "%",
    theme: "fusion",
    showtooltip: "0"
  },
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "5",
        code: "#F2726F"
      },
      {
        minvalue: "5",
        maxvalue: "8",
        code: "#FFC533"
      },
      {
        minvalue: "8",
        maxvalue: "10",
        code: "#62B58F"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($q, JSON_NUMERIC_CHECK); ?>
      }
    ]
  }
};

const dataSource1 = {
	<?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='65402154' and sub_id='reas011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$r = $row['marks'];
			?>
  chart: {
    caption: "Nordstorm's Customer Satisfaction Score for 2017",
    lowerlimit: "0",
    upperlimit: "10",
    showvalue: "1",
    numbersuffix: "%",
    theme: "fusion",
    showtooltip: "0"
  },
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "7",
        code: "#F2726F"
      },
      {
        minvalue: "7",
        maxvalue: "12",
        code: "#FFC533"
      },
      {
        minvalue: "12",
        maxvalue: "1",
        code: "#62B58F"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: <?php echo json_encode($r, JSON_NUMERIC_CHECK); ?>
      }
    ]
  }
};
FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container",
    width: "50%",
    height: "50%",
    dataFormat: "json",
    dataSource
  }).render();
});
FusionCharts.ready(function() {
  var myChart1 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container1",
    width: "50%",
    height: "50%",
    dataFormat: "json",
    dataSource
  }).render();
});
</script>
   
</head>
<body>
<div id="chart-container"></div>
<div id="chart-container1"></div>

</body>
</html>