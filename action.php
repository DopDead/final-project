<?php include 'function.inc.php';
$querr = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);

$resulr = mysqli_query($con,$querr);
$rs = mysqli_fetch_array($resulr);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>

<?php

$id = $_POST['id_edit'];//
$status = $_POST['equipment_type'];
$display_name = $_POST['firstname'];
$display = $_POST['score'];


/*$query = "select * from score";
$result = mysqli_query($con,$query);



if (mysqli_num_rows($result)>0) {

    msgbox('no','seefield.php');
  
	exit();
	
	
}*/

//////////เพิ่มคะแนนซ้อมยิงปืน
  $query = "INSERT INTO score (booking_id,score_item,type_train,score_train,name_member) 
 VALUES ('$id','$display_name','$status','$display','$rs[id_member]')";

if (mysqli_query($con,$query)) {
	msgbox('บันทึกข้อมูลเรียบร้อย','seefield.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	


?>


</body>
</html>