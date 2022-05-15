<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<?php
//$allow = array("jpg", "jpeg", "gif", "png");//แยกประเภทรูป


$display_fulltime_price =$_POST['display_fulltime_price'];


$display_detail =$_POST['display_detail'];

$display_name =$_POST['display_name'];




$id = $_POST['id'];



if ($_FILES["fileToUpload"]["name"]=='') {
    $sql = "UPDATE display SET display_fulltime_price='$display_fulltime_price',display_detail='$display_detail',display_name='$display_name' WHERE display_id='$id'";

 ///print_r($sql);
 ////die();
    $result = mysqli_query($con,$sql);

if($result){
	echo "<h3><center>แก้ไขข้อมูลเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";

	}else{
echo"<h3>ERROR : แก้ไขไม่สำเร็จ</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_display.php?status=failue\">";
}
}
else{



if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"image/Tentrental/".$_FILES["fileToUpload"]["name"]))

$sql = "UPDATE display SET display_fulltime_price='$display_fulltime_price',display_img='".$_FILES["fileToUpload"]["name"]."',display_detail='$display_detail',display_name='$display_name' WHERE display_id='$id'";

 ///print_r($sql);
 ///die();
    $result = mysqli_query($con,$sql);
    if($result){
      echo "<h3><center>แก้ไขข้อมูลเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=admin_display.php' />";
    }else{
      echo"<h3>ERROR : แก้ไขไม่สำเร็จ</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_display.php?status=failue\">";
    }
}
  

?> 
</body>
</html>