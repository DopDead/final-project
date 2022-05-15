<?php
require 'function.inc.php';


$id=$_GET['id'];
///ECHO$id;
$query = "delete from booking where id_booking='$_GET[id]'";
///print_r($query);
///die();

$result_delete = mysqli_query($con,$query);

if($result_delete){
	echo "<h3><center>ยกเลิกการจอง</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=index.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=index.php?status=failue\">";
}
 
?>