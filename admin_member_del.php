<?php include 'function.inc.php'; ?>
<meta charset="utf-8">
<?php
$query = sprintf('delete from member where id_member="%s" ',s($con,$_GET['id_del']));

$result = mysqli_query($con,$query);

gotopage('admin_member.php'); 
?>