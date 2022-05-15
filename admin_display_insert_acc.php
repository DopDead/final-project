<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

$display_fulltime_price = $_POST['display_fulltime_price'];
$display_detail = $_POST['display_detail'];
$display_name = $_POST['display_name'];




$sql = "SELECT * FROM display WHERE display_name='$display_name'";// ฟังชั่นเช็ค ว่าสมัครสมาชิกชื่อซำ้กันหรือไม่
 $result = mysqli_query($con,$sql);#ทำการอ่านค่าที่ก็บอยู่ $sql
 if ($result->num_rows > 0) //ห้ามซำ้กันตรงเช็คค่า =0 
 
 {  
echo "<script language='javascript'>alert('ข้อมูลซ้ำ');</script>";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";
 }











if ($_FILES["filUpload"]["tmp_name"]=='') ///อัพโหลดรูปค่าว่าง
{
	
	 /////////////////   ให้ insert ข้อมูลห้องประชุม บันทึกฐานข้อมูลเลย////////////
$query="INSERT INTO `display`(`display_fulltime_price`, `display_img`, `display_detail`, `display_name`) VALUES  ('$display_fulltime_price','','$display_detail','$display_name')";
//print_r($query);
//die();
	$result = mysqli_query($con,$query);
if($result){
	echo "บันทึกข้อมูลเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_display.php?status=failue\">";
}

}

else{

if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"image/Tentrental/".$_FILES["filUpload"]["name"]))
/////  โค้ดอัพโหลดรปภาพ ชื่อโฟลเดอร์เก็บรป img  ////

$query="INSERT INTO `display`(`display_fulltime_price`,`display_img`, `display_detail`,display_name) 
VALUES ('$display_fulltime_price','".$_FILES["filUpload"]["name"]."','$display_detail','$display_name')";
////print_r($query);
////die();
$result = mysqli_query($con,$query);
if($result){
	echo "บันทึกข้อมูลเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_display.php?status=failue\">";
}
}

?>

<body>
</body>
</html>