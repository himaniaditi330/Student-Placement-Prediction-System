<?php
header('Content-Type: application/json');

$connect = mysqli_connect("localhost","root","") or die("Couldn't Connect");
		mysqli_select_db($connect,"spsp") or die("Cant find DB");
		

$sqlQuery = "SELECT sub_id,marks FROM aca_marks ";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
	echo "$data";
}

mysqli_close($conn);

echo json_encode($data);
?>

