<?php include 'function.inc.php'; ?>
<meta charset="UTF-8">
<?php



	$query = "select * from member where Username_member='$_POST[user]' and Password_member='$_POST[pass]'";
#   ฟังชั่นในการเช็คข้อมูล  member ให้เช็คว่า Username_member และ  Password_member มีข้อมูลในฐานข้อมลหรือไม่
///print_r($query);
$result = mysqli_query($con,$query);#ทำการอ่านค่าที่เก็บอยู่$query



if (mysqli_num_rows($result)>0)  #เป็นการนับจำนวนแถวที่อยู่ในฐานข้อมูล


 {
	$rs = mysqli_fetch_array($result);

	$_SESSION['sess_id'] = session_id();///ตัวแปรเก็บเป็น session ประกาศ ให้อย่ใน รปแบบไอดี
	$_SESSION['mid'] = $rs['id_member']; //


	$_SESSION['mtype'] = $rs['type_member'];
	$_SESSION['mname'] = $rs['name_member'];
	
	
	$_SESSION['mtype'] = $rs['type_member'];
	$_SESSION['mname'] = $rs['name_member'];
 if ($_SESSION['mtype']==1) { 
 	gotopage('main.php');
 	}
	else {	gotopage('index.php');
 }


} else {
	msgbox('ชื่อเข้าใช้งานหรือรหัสผ่านผิด','index.php');
}
?>