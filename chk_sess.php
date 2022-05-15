<?php
if (isset($_SESSION['sess_id'])!="") {
	if ($_SESSION['sess_id']!=session_id()) {
		msgbox('กรุณาเข้าสู่ระบบ!!','index.php');	
	}
} else {
	msgbox('กรุณาเข้าสู่ระบบ!!','index.php');
}
?>
<meta charset="UTF-8">