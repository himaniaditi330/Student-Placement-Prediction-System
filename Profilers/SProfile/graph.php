<html>
	<head>

		<?php
			$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "spsp") or die("Cant Connect to database");
			$check = mysqli_query($connect, "SELECT * FROM prediction_table WHERE S_id='65402154'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$quants = $row['Quants'];
			$quants_per = round(($quants*100/15),2);
			$reasoning = $row['Reasoning'];
			$reasoning_per = round(($reasoning*100/10),2);
			$english = $row['English'];
			$english_per = round(($english*100/40),2);
			$pi = $row['PI'];
			$pi_per = round(($pi*100/10),2);
			$gd = $row['GD'];
			$gd_per = round(($gd*100/10),2);
			$programming = $row['Programming'];
			$programming_per = round(($programming*100/10),2);
			$prediction = round($row['Prediction']);
		?>

		<style type = "text/css">

		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap');
		*{
			margin: 0;
			padding:0;
			font-family: 'Roboto', sans-serif;
		}
		body{
			margin-top: 50px;
			font-family: sans-serif;
		}
		.box{
			position: relative;
			width: 300px;
			height: 400px;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			background: #fff;
			box-shadow:0 30px 60px rgba(0,0,0,.2);
		}
		.box .percent
		{
			position: relative;
			width: 150px;
			height: 150px;
		}
		.box .percent svg
		{
			position: relative;
			width: 150px;
			height: 150px;
		}
		.box .percent svg circle
		{
			width: 150px;
			height: 150px;
			fill:none;
			stroke-width:10;
			stroke:#000;
			transform: translate(5px,5px);
			stroke-dasharray: 440;
			stroke-dashoffset: 440;
			stroke-linecap: round;
		}
		.box .percent svg circle:nth-child(1){
			stroke-dashoffset: 0;
			stroke:#f3f3f3;
		}
		.box .percent svg circle:nth-child(2){
			stroke-dashoffset: calc(440 - (440 * <?php echo $prediction ?>) / 100);
			stroke:#03a9f4;
		}
		.box .percent .number
		{
			position: absolute;
			top:0;
			left:0;
			width:100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			color:#999;
		}
		.box .percent .number h2
		{
			font-size: 48px;
		}
		.box .percent .number h2 span
		{
			font-size: 24px;
		}
		.outter{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.box .text
		{
			padding : 10px 0 0;
			color:#111;
			font-weight: 700;
			letter-spacing: 1px;
		}
		.inner{
			height:25px;
			width:<?php echo $quants_per ?>%;
			border-right:solid 1px #000;
			background-color: lightblue;
		}

		.outter1{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.inner1{
			height:25px;
			width:<?php echo $reasoning_per ?>%;
			border-right:solid 1px #000;
			background-color: lightgreen;
		}

		.outter2{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.inner2{
			height:25px;
			width:<?php echo $english_per ?>%;
			border-right:solid 1px #000;
			background-color: lightgray;
		}

		.outter3{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.inner3{
			height:25px;
			width:<?php echo $pi_per ?>%;
			border-right:solid 1px #000;
			background-color: yellow;
		}

		.outter4{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.inner4{
			height:25px;
			width:<?php echo $gd_per ?>%;
			border-right:solid 1px #000;
			background-color: orange;
		}

		.outter5{
			height:25px;
			width:500px;
			border:solid 1px #000;
			margin: auto;
			margin-top : 5px;
			margin-bottom: 30px;
			position: relative;
			top: 0.5%;
			width: 20%; 
		}
		.inner5{
			height:25px;
			width:<?php echo $programming_per ?>%;
			border-right:solid 1px #000;
			background-color: red;
		}
		</style>

	</head>

	<body>
		<center>
			<b>
				<?php
				echo "Quants Marks : ".$quants."/15"
				?>
			</b>
		</center>

		<div class="outter">
			<div class="inner">	
				<center><?php echo $quants_per ?>%</center>
			</div>
		</div>

		<center>
			<b>
				<?php
				echo "Reasoning Marks : ".$reasoning."/10"
				?>
			</b>
		</center>

		<div class="outter1">
			<div class="inner1">	
				<center><?php echo $reasoning_per ?>%</center>
			</div>
		</div>

		<center>
			<b>
			<?php
			echo "English Marks : ".$english."/40"
			?>
			</b>
		</center>

		<div class="outter2">
			<div class="inner2">	
				<center><?php echo $english_per ?>%</center>
			</div>
		</div>

		<center>
			<b>
				<?php
				echo "Personal Interview (PI) Marks : ".$pi."/10"
				?>
			</b>

		</center>
		<div class="outter3">
			<div class="inner3">	
				<center><?php echo $pi_per ?>%</center>
			</div>
		</div>

		<center>
			<b>
				<?php
				echo "Group Discussion (GD) Marks : ".$gd."/10"
				?>
			</b>
		</center>

		<div class="outter4">
			<div class="inner4">	
				<center><?php echo $gd_per ?>%</center>
			</div>
		</div>

		<center>
			<b>
				<?php
				echo "Programming Marks : ".$programming."/10"
				?>
			</b>
		</center>

		<div class="outter5">
			<div class="inner5">	
				<center><?php echo $programming_per ?>%</center>
			</div>
		</div>

		<center>
			<div class="box">
				<div class="percent">
					<svg>
						<circle cx="70" cy="70" r="70"></circle>
						<circle cx="70" cy="70" r="70"></circle>
					</svg>
					<div class="number">
						<h2><?php echo $prediction ?><span>%</span></h2>
					</div>
				</div>
				<h2 class="text">Progress</h2>
			</div>
		</center>
	</body>
</html>