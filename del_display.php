<?php include 'function.inc.php'; ?>
<meta charset="utf-8">
<?php

$id_del = $_GET["id_del"];
$query = "delete from display where display_id='$id_del'";///  ฟังชั่นลบ ข้อมูล booking
///print_r($query);
///die();
$result = mysqli_query($con,$query);

if($result){
	echo "<h3><center>ลบข้อมูลเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_display.php?status=failue\">";
}

?>