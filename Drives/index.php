<!DOCTYPE html>
<html>
	<head>
		<!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
		<title>United Group Of Institutions</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		
		<!-- bootstarp-css -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!--// bootstarp-css -->
		<!-- css -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<!--// css -->
		<script src="js/jquery-1.11.1.min.js"></script>
		<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600'
		rel='stylesheet' type='text/css'>
		<!--/fonts-->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
	</head>
	<body>
		<!-- banner -->
		<div class="banner">
			<!-- container -->
			<div class="container">
				<div class="header">
					<div class="head-logo"></div>
					<div class="top-nav">
						<span class="menu">
							<img src="images/menu.png" alt="">
						</span>
						<ul class="nav1">
							<li class="hvr-sweep-to-bottom">
								<a href="../Homepage/home.php">UGI - SPSP<i>Goto Placement Homepage</i></a>
							</li>
							<li class="hvr-sweep-to-bottom active">
								<a href="index.php">Home<i>Get the Overview of the Site</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="about.php">About<i>About Us and our Cheif Architects</i></a>
							</li>
							
							<div class="clearfix"></div>
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 500, function() {
								 // Animation complete.
								  });
								 });
						</script>
						<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //container -->
			<div class="container">
				<script src="js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
				</script>
				<div id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="banner-info">
								<br><br>
								<h2>United Group of Institutions
									<span><br><br>Nurturing tomorrow</span>
								</h2>
								<div class="line"></div>
								
							</div>
						</li>
						
						
						
					</ul>
				</div>
			</div>
		</div>
		<!-- //banner -->
		<!-- banner-bottom -->
		<div class="banner-bottom">
			<!-- container -->
			<div class="container">
				<div class="banner-bottom-grids">
					<div class="col-md-7 banner-bottom-grid-text">
						<div class="jumbotron banner-bottom-left wow fadeInLeft animated" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s;	">
							<h2>Latest Drive</h2>
							 <?php
							$conn = mysqli_connect('localhost','root','');
							mysqli_select_db($conn, 'spsp');
							
							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
								}
							$sql = "SELECT com_id,com_name,Date,tagline FROM company_detail order by Date desc limit 1";
							$rs_result = mysqli_query ($conn, $sql); //run the query
							while ($row = mysqli_fetch_array($rs_result)) 
							{ 
								$com=$row['com_id'];
							?>
							<br>            
							
							<p><h4><?php echo $row['com_name']; ?></h4></p>
							<p><span><h4><?php echo $row['Date']; ?> </h4></p> 
							<p><h4><?php echo $row['tagline']; ?> </h4></span></p>
							<?php
							}
							?>	
							
						</div>
					</div>
					<div class="col-md-5 banner-bottom-right wow fadeInRight animated" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s;">
						
						<?php

				$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp");
$result=mysqli_query($connect,"SELECT image FROM images where `id`='$com'");
		  while($row=$result->fetch_assoc())
		  {?>
		  <img src="data:image/jpg:charset=utf8;base64,<?php echo base64_encode($row['image']);?>" />
		  <?php }?>
		
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- testimonials -->
		<div class="testimonials">
			<div class="container">
				<div class="testimonial-nfo wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3>Vision and Mission</h3>
					
				</div>
				<div class="testimonial-grids wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="testimonial-grid">
						<p>
							<span>"</span>We aspire to reassert the significance of high quality education by producing competent professionals who can shape the destiny of our nation into a stronger and developed stature.
							<span>"</span>
							<span>"</span>We at United Group of Institutions, aim at creating a workforce of professionals with analytical skills who can dream a better world and transform the dream into reality. 
							<span>"</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- //testimonials -->
		<!-- news -->
		
				
			</div>
		</div>
		<!-- //news -->
		<!-- footer -->
		<div class="footer">
			<!-- container -->
			<div class="container">
				<div class="col-md-6 footer-left  wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						
						
					</ul>
					<!--<form>
						<input type="text" placeholder="Email" required="">
						<input type="submit" value="Subscribe">
					</form>-->
				</div>
			</div>
		</div>
	</body>

</html>