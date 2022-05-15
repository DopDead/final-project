<?php
require 'function.inc.php';
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    

$startdate=date("Y-m-d", strtotime("first day of this month"));
$enddate=date("Y-m-d", strtotime("last day of this month"));

$sql = "SELECT * FROM booking WHERE date_booking>'$startdate' AND date_booking <'$enddate' AND member_status='1'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$num = mysqli_num_rows($result);
$i = 0;
$x = "[";
while($rs = mysqli_fetch_assoc($result)){
  if($i>0){ $x.= ',';}
  $x .= "{";
  $x .= '"title": "'.$rs['subject_member'].'",';
  $x .= '"start": "'.$rs['date_booking'].'",';
  $x .= '"color": "#485cb8"';
  $x .= "}";
  $i++;
}
$x .= "]";
echo $x;

?>
