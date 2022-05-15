<?php
include 'function.inc.php';
$monthval = $_POST['monthval'];
$yearval = $_POST['yearval'];
$monthnum = sprintf("%02d", $monthval);

$text = $yearval.'-'.$monthnum .'%';

$sql = "SELECT * FROM booking where date_booking like '$text'";
///print_r($sql);
///die();
$query = mysqli_query($con,$sql);
$resultArray = array();
while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
array_push($resultArray,$result);
}
echo json_encode($resultArray);
?>