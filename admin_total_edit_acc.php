<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<?php

$price_water =$_POST['price_water'];

$price_critical =$_POST['price_critical'];


/*echo"$display_size<br>";

echo"$display_price<br>";

echo"$display_name<br>";

echo"$display_num<br>";*/


$id = $_POST['id'];

//echo$id_edit;


    $sql = "UPDATE booking SET price_water='$price_water',price_critical='$price_critical' WHERE id_booking='$id'";

 ///print_r($sql);
 ////die();
    $result = mysqli_query($con,$sql);

if($result){
	echo "<h3><center>อัพเดตอื่นสำเร็จ</h3></center>";
echo "<meta http-equiv='refresh' content='0;url=admin_booking.php' />";

	}else{
echo"<h3>ERROR : แก้ไขไม่สำเร็จ</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_booking.php?status=failue\">";
}



?> 
</body>
</html>