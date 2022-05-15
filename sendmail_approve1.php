<?php
include 'function.inc.php';
include 'chk_sess.php';


$status = $_GET['status'];

$id = $_GET['id'];

$query = "UPDATE booking SET status ='$status' WHERE id_booking ='$id'"; 
///print_r($query);
///die;
$result = mysqli_query($con,$query);


	if($result){
	echo "ชำระเงินเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=emp_booking.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=emp_booking.php?status=failue\">";
}
?>
 
