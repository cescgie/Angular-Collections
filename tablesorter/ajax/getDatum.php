<?php
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
if(isset($_GET['datum'])){
$status = $_GET['datum'];
}
$query="SELECT DateEntered,id as ID FROM userid_ga group by DateEntered having count(*) >= 1";
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
