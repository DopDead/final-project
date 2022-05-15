<?php include 'function.inc.php'; ?>
<meta charset="utf-8">
<?php

$id = $_GET["id"];
$query = "delete from booking where id_booking='$id'";///  ฟังชั่นลบ ข้อมูล booking
///print_r($query);
 //die();
$result = mysqli_query($con,$query);

if($result){
	echo "<h3><center>ลบข้อมูลเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=emp_booking.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=emp_booking.php?status=failue\">";
}

?>