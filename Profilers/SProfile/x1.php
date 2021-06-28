<html>
<head>
<!-- Include fusioncharts core library 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>-->
<script type="text/javascript" src="../../js/fusioncharts.js"></script>
<!-- Include fusion theme 
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>-->
<script type="text/javascript" src="../../js/themes/fusioncharts.theme.fusion.js"></script>

<script>
FusionCharts.ready(function() {
  var pieChart = new FusionCharts({
     type: "angulargauge",
    renderAt: 'chart-container',
    width: '400',
    height: '300',
    dataFormat: 'json',
    dataSource: {
       chart: {
    caption: "Nordstorm's Customer Satisfaction Score for 2017",
    lowerlimit: "0",
    upperlimit: "15",
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
        maxvalue: "15",
        code: "#62B58F"
      }
    ]
  },
  dials: {
    dial: [
      {
        value:"5"
      }
    ]
  }
    }
  }).render();
 
  var myChart1 = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container1",
    width: "50%",
    height: "50%",
    dataFormat: "json",
  dataSource: {
	
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
        maxvalue: "7",
        code: "#FFC533"
      },
      {
        minvalue: "7",
        maxvalue: "10",
        code: "#62B58F"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: "4"
      }
    ]
  }
}
  
  }).render();
  });
</script>
</head>
<body>
<div id="chart-container"></div>
<div id="chart-container1"></div>

</body>
</html>