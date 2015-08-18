<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['datum'])){
$status = $_GET['datum'];
}
//$query="SELECT UserId,Summe,Uhrzeit FROM `userid_ga` WHERE DateEntered = '2015-07-21' AND UserId!='0000000000000000' AND Uhrzeit>20 HAVING Summe > 2000 ORDER BY Summe DESC";
$query="SELECT UserId,Summe,Uhrzeit FROM userid_ga WHERE DateEntered = '$status' AND UserId!='0000000000000000' AND Uhrzeit>20 HAVING Summe > 2000 ORDER BY Summe DESC";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>
