<?
$connect = mysqli_connect("localhost", "root", "");
			mysqli_select_db($connect, "jhj") or die("Cant Connect to database");
			echo "k";
			$check = mysqli_query($connect, "SELECT * FROM crt_marks WHERE S_id='65402154' and sub_id='quant011'") or die("Check Query");
			$row = mysqli_fetch_assoc($check);
			$best = $row['marks'];
			echo "$best";
			?>