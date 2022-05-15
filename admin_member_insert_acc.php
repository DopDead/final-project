<?php include 'function.inc.php';

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

$name_member = $_POST['name_member'];

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
echo "$phone_member<br>";

echo "$company_member<br>";
echo "$fax_member<br>";*/

$query ="INSERT INTO member (type_member,name_member,lastname_member,Username_member,Password_member,email_member,address_member,phone_member) VALUES ('0','$name_member','$lastname_member','$Username_member','$Password_member','$email_member','$address_member','$phone_member')";

///print_r($query);
////die();

	$result = mysqli_query($con,$query);

	
	if($result){
	echo "สมัครเรียบร้อย";
echo "<meta http-equiv='refresh' content='0;url=admin_member.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_member.php?status=failue\">";
}

?>

<body>
</body>
</html>