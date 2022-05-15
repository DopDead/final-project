<?php include 'function.inc.php'; ?>
<meta charset="utf-8">
<?php
$query = sprintf('delete from booking where id_booking="%s" ',s($con,$_GET['id_del']));

$result = mysqli_query($con,$query);



if($result){
	echo "ลบเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=admin_booking.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_booking.php?status=failue\">";
}


?>