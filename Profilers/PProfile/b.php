<?php
// connect to the database
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'dummy');

$cnt = count($_POST['sub']);
$cnt2 = count($_POST['name']);

if ($cnt > 0 && $cnt == $cnt2) {
    $insertArr = array();
    for ($i=0; $i<$cnt; $i++) {
        $insertArr[] = "('" . mysql_real_escape_string($_POST['sub'][$i]) . "', '" . mysql_real_escape_string($_POST['name'][$i]) . "')";
}

 $query = "INSERT INTO first (sub,name) VALUES " . implode(", ", $insertArr);
 mysql_query($query) or trigger_error("Insert failed: " . mysql_error());
}

echo("<pre>\n");
print_r($_POST);
echo("</pre>\n");




mysql_close($connection);
?>