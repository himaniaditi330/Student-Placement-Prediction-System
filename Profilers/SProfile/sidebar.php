<div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
		  <?php
		  $Welcome = "Welcome";
		  $sun=$_SESSION['username'];
          echo "<h1>" . $Welcome . "<br>". $sun. "</h1>";
		  ?>&nbsp&nbsp&nbsp&nbsp
		   <i class="fa fa-arrow-circle-left fa-fw" style="color:white; font-size:30px" onclick="history.go(-1)"></i>&nbsp&nbsp
		   <i class="fa fa-arrow-circle-right fa-fw" style="color:white; font-size:30px" onclick="history.go(+1)"></i>
        </header>
		<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp");
$result=mysqli_query($connect,"SELECT image FROM images WHERE id='$sun'");
?>
        <div class="profile-photo-container">
        
		  <?php
		  while($row=$result->fetch_assoc())
		  {?>
		  <img src="data:image/jpg:charset=utf8;base64,<?php echo base64_encode($row['image']);?>" />
		  <?php }?>
          <div class="profile-photo-overlay"></div>
        </div>
        <!-- Search box -->
        <br><br>
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li>
              <a href="login.php" ><i class="fa fa-home fa-fw"></i>Dashboard</a>
            </li>
            <li>
              <a href="drive.php"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
            </li>
			<li>
              <a href="show.php"><i class="fa fa-bar-chart fa-fw"></i>Show Marks</a>
            </li>
			
            <li>
              <a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Details</a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a>
            </li>
          </ul>
        </nav>
      </div>