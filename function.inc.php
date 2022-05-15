<?php 
ob_start();
session_start(); 
?>
<?php

/*---------------- Variable ----------------*/
$sys_title = 'ระบบจองห้องพัก';
$date_member=date("Y-m-d H:i:s");
/*---------------- Connect ----------------*/
$con = mysqli_connect('localhost','root','') or die(mysql_error());
mysqli_select_db($con,'apartment_athome_db');
mysqli_query($con,'set names utf8');
date_default_timezone_set("Asia/Bangkok");


/*$con = mysqli_connect('localhost','programm_apart','qgAm1aVfpP') or die(mysql_error());
mysqli_select_db($con,'programm_apart');
mysqli_query($con,'set names utf8');
date_default_timezone_set("Asia/Bangkok");*/




/*----------------------------------------*/
function s($cc,$string) {
	return mysqli_real_escape_string($cc,$string);
}
function thaidate($date) {
	$exdate = explode('-',$date);
	$date = $exdate[2].'/'.$exdate[1].'/'.$exdate[0];
	return $date;
}
function thaimonth($month) {
	switch ($month) {
		case 1:
			$month="มกราคม";
		break;
		case 2:
			$month="กุมภาพันธ์";
		break;
		case 3:
			$month="มีนาคม";
		break;
		case 4:
			$month="เมษายน";
		break;
		case 5:
			$month="พฤษภาคม";
		break;
		case 6:
			$month="มิถุนายน";
		break;
		case 7:
			$month="กรกฏาคม";
		break;
		case 8:
			$month="สิงหาคม";
		break;
		case 9:
			$month="กันยายน";
		break;
		case 10:
			$month="ตุลาคม";
		break;
		case 11:
			$month="พฤศจิกายน";
		break;
		case 12:
			$month="ธันวาคม";
		break;
	}
	return $month;
}
function gotopage($url) {
	echo "<script language='javascript'>"; 
	echo " parent.window.location='".$url."'; ";
	echo "</script>";
}
function msgbox($text,$url) {
	echo "<script language='javascript'>"; 
	echo " alert('".$text."'); ";
	echo " parent.window.location='".$url."'; ";
	echo "</script>";
}
/*----------------------------------------*/

function send_mail($to_address, $subject, $body, $is_html) {

    $mail = new PHPMailer(true);

$smtp_host      = "smtp.gmail.com";
    $smtp_port      = "465";
    $smtp_username  = "korndani999@gmail.com";
    $smtp_password  = "US0955037579:;(:)$%";
    $smtp_sender    = "korndani999@gmail.com";

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_username;
        $mail->Password   = $smtp_password;
        #$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	    $mail->SMTPSecure = 'ssl';
        $mail->Port       = $smtp_port;
    
        //Recipients
        $mail->setFrom($smtp_sender, 'Mailer');
        $mail->addAddress($to_address);
    
        // Content
        $mail->isHTML($is_html);
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        exit;
    }
}
?>