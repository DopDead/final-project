<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php



$lastname_member = $_POST['lastname_member'];

$Password_member = $_POST['Password_member'];
$name_member = $_POST['name_member'];
$email_member = $_POST['email_member'];

$id = $_POST['id_edit'];
$address_member = $_POST['address_member'];
$phone_member = $_POST['phone_member'];
//$calendar_banner = $_POST['calendar_banner'];


$query = "UPDATE member SET name_member ='$name_member',lastname_member ='$lastname_member',Password_member ='$Password_member',email_member ='$email_member',address_member ='$address_member',
phone_member ='$phone_member' WHERE id_member ='$id'"; 

echo$query;

 $result = mysqli_query($con,$query);

if($result){
	echo "<h3><center>บันทึกข้อมูลเรียบร้อย</h3></center>";
///echo "<meta http-equiv='refresh' content='0;url=edit.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
///echo "Error updating record: " . mysqli_error($conn);
}
	
?>

<body>
</body>
</html>