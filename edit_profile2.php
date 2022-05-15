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

///if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"images/member/".$_FILES["fileToUpload"]["name"]))

///$query = "UPDATE member SET img_member='".$_FILES["fileToUpload"]["name"]."' WHERE id_member ='$id'"; 

///print_r($query);
//die();
///$result = mysqli_query($con,$query);


$query = "UPDATE member SET name_member ='$name_member',lastname_member ='$lastname_member',Password_member ='$Password_member',email_member ='$email_member',address_member ='$address_member',phone_member ='$phone_member' WHERE id_member ='$id'"; 


///print_r($query);
//die();
$result = mysqli_query($con,$query);
if($result){
	echo "บันทึกข้อมูลเรียบร้อยแล้ว";
echo "<meta http-equiv='refresh' content='0;url=index.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=edit.php?status=failue\">";
}

	
?>

<body>
</body>
</html>