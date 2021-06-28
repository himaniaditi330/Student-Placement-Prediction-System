<!DOCTYPE html>
<html>
	<head>
		<!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
		<title>United Group Of Institutions</title>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />-->
		<!--<script type="application/x-javascript">
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
								<a href="../Homepage/index.php">UGI - SPSP<i>Goto Placement Homepage</i></a>
							</li>
							<li class="hvr-sweep-to-bottom active">
								<a href="index.php">Home<i>Get the Overview of the Site</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="about.php">About<i>About Us and our Cheif Architects</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="404.php">Campus Drives<i>Campus Drives</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="404.php">Mail Us<i>Get in Touch with us Instantly</i></a>
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
								<h2>Do What you Love with
									<span>Passion</span>
								</h2>
								<div class="line"></div>
								<p>Hold back, Our Training and Activities will get Your Script away from Your Laziness. We Dream with You to take You into the
									Reality of it. Just be Interactive and Initiate yourself to the Next Level of Placement Training</p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h2>Enrich your Brain with Sleek efforts like a
									<span>Paradise</span>
								</h2>
								<div class="line"></div>
								<p></p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h2>We have got all the things you need to be a
									<span>World class</span> Human Being</h2>
								<div class="line"></div>
								<p></p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>
		
		</body>

</html>