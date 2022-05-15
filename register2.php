<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body>
<?php


////// ประกาศค่าตัวแปร
$name_member = $_POST['name_member'];
//$type_member = $_POST['type_member'];

$lastname_member = $_POST['lastname_member'];
$Username_member = $_POST['Username_member'];
$Password_member = $_POST['Password_member'];
$date_member=date("Y-m-d H:i:s");
$email_member = $_POST['email_member'];
$address_member=$_POST['address_member'];
$phone_member = $_POST['phone_member'];


/*echo "$name_member<br>";
echo "$lastname_member<br>";
echo "$address_member<br>";
echo "$date_member<br>";
echo "$gender_member<br>";
echo "$Username_member<br>";
echo "$Password_member<br>";
echo "$email_member<br>";
echo "$phone_member<br>";*/

$sql = "SELECT * FROM member WHERE Username_member='$Username_member'";// ฟังชั่นเช็ค ว่าสมัครสมาชิกชื่อซำ้กันหรือไม่
 $result = mysqli_query($con,$sql);#ทำการอ่านค่าที่ก็บอยู่ $sql
 if ($result->num_rows > 0) //ห้ามซำ้กันตรงเช็คค่า =0 
 
 {  
echo "<script language='javascript'>alert('Username ซ้ำ');</script>";
echo "<meta http-equiv='refresh' content='0;url=register.php' />";
 } else 
 
  ///////////////// ถ้าไม่ซำ้  ให้ insert บันทึกฐานข้อมูลเลย////////////
 
 {
$sql = "INSERT INTO member (type_member,name_member,lastname_member,Username_member,Password_member,email_member,address_member,phone_member) VALUES ('3','$name_member','$lastname_member','$Username_member','$Password_member','$email_member','$address_member','$phone_member')";
 
print_r($sql);///เช็คerrorค่า
die();


 $result = mysqli_query($con,$sql);
 
	
	if($result){
	echo "สมัครเรียบร้อย";
///echo "<meta http-equiv='refresh' content='0;url=index.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
//echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=index.php?status=failue\">";
}
 }

?>


</body>
</html>