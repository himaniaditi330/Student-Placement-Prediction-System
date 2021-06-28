    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
           <?php
		  $Welcome = "Welcome";
          echo "<h1>" . $Welcome . "<br>". $_SESSION['priusername']. "</h1>";
		  ?>&nbsp&nbsp&nbsp&nbsp
		   <i class="fa fa-arrow-circle-left fa-fw" style="color:white; font-size:30px" onclick="history.go(-1)"></i>&nbsp&nbsp
		   <i class="fa fa-arrow-circle-right fa-fw" style="color:white; font-size:30px" onclick="history.go(+1)"></i>
        </header>
		<?php

$connect = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
mysqli_select_db($connect, "spsp");
$result=mysqli_query($connect,"SELECT Image FROM admin_detail");
?>
        <div class="profile-photo-container">
		<?php
		  while($row=$result->fetch_assoc())
		  {?>
		  <img src="data:image/jpg:charset=utf8;base64,<?php echo base64_encode($row['Image']);?>" />
		  <?php }?>
          <div class="profile-photo-overlay"></div>
        </div>
        
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
		   <li><br><br></li>
          <li><a href="login.php" ><i class="fa fa-home fa-fw" ></i>Dashboard</a></li>
            <li><a href="Students Eligibility.php"><i class="fa fa-bar-chart fa-fw"></i>Check Students Eligibility</a></li>
            <li><a href="queries.php"><i class="fa fa-database fa-fw"></i>Queries</a></li>
            <li><a href="manage-users.php" ><i class="fa fa-users fa-fw"></i>Student Details</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>