<?php include 'function.inc.php'; ?>
<meta charset="utf-8">


<?php

$lastname_member = $_POST['lastname_member'];
$Password_member = $_POST['Password_member'];
$name_member = $_POST['name_member'];
$email_member = $_POST['email_member'];

$id = $_POST['id'];
$address_member = $_POST['address_member'];
$phone_member = $_POST['phone_member'];

/*echo "$name_member<br>";
echo "$lastname_member<br>";
echo "$address_member<br>";
echo "$date_member<br>";


echo "$Password_member<br>";
echo "$email_member<br>";
echo "$phone_member<br>";*/



$query = "UPDATE member SET type_member ='0',name_member ='$name_member',lastname_member ='$lastname_member',Password_member ='$Password_member',email_member ='$email_member',address_member ='$address_member',phone_member ='$phone_member' WHERE id_member ='$id'"; 
///print_r($query);

$result = mysqli_query($con,$query);

	
	if($result){
	echo "บันทึกข้อมูลเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=admin_member.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_member.php?status=failue\">";
}
?>

