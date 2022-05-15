<?php
require 'function.inc.php';


$id = $_POST["id"];


if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"image/slips_img/".$_FILES["fileToUpload"]["name"]))

	$sql = "UPDATE booking SET slips_img='".$_FILES["fileToUpload"]["name"]."' WHERE id_booking='$id'";
///print_r($sql);
///die();
	
	$result = mysqli_query($con,$sql);

		if($result){
	echo "<h3><center>บันทึกหลักฐานเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=history_order.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=history_order.php?status=failue\">";
}
 

?>