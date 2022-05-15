<?php
require 'function.inc.php';
include 'chk_sess.php';
$id = $_GET["id"];
          $sql21 = "SELECT * FROM booking WHERE  id_booking='$id' ";

          $result23 = mysqli_query($con,$sql21);
          $rs123 = mysqli_fetch_array($result23); 


        
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $sys_title ?></title><meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<SCRIPT LANGUAGE="JavaScript">
function printPage() {
if (window.print)
window.print()
else
alert("Sorry, your browser doesn't support this feature.");
}
</SCRIPT>

<style type="text/css">
<!--
.style1 {font-size: 16px}
-->
</style>
</head>
<body class="blog col-2">

<table width="80%" border="0" align="center" class="table table-hover">
  <thead>
    <tr>
      <th colspan="4" scope="col">apartment</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th height="39" colspan="4" scope="row">ใบจอง</th>
    </tr>
    <tr>
      <th width="25%" height="33" scope="row">&nbsp;</th>
      <td width="20%">:</td>
      <td width="55%" colspan="2">No.Quotation :..........<?php echo $_GET['id']; ?>............</td>
    </tr>
    <tr>

      <th height="35" colspan="2" scope="row">ชื่อลูกค้า:.........<?php 
        $sqlpro2 = "SELECT * FROM member WHERE id_member='$rs123[id_member]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['name_member']; 
    ?>...............</th>
      <td colspan="2">Date Booking :............<?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['date_booking']; 
    ?>.............</td>
    </tr>
    <tr>
      <th height="33" colspan="2" scope="row">เบอร์โทร:.......<?php 
        $sqlpro2 = "SELECT * FROM member WHERE id_member='$rs123[id_member]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['phone_member']; 
    ?>..........................</th>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th height="36" colspan="2" scope="row">อีเมล:.........
        <?php 
        $sqlpro2 = "SELECT * FROM member WHERE id_member='$rs123[id_member]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['email_member']; 
    ?>
      ..................</th>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th height="36" colspan="2" scope="row">&nbsp;</th>
      <td colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="79%" border="1" align="center" class="table table-hover">
  <tbody>
    <tr>
      <th width="16%" height="53" scope="row"><span class="style1">ห้อง: </span></th>
      <td width="20%" scope="row"><span class="style1">
        <?php 
        $sqlpro2 = "SELECT * FROM display WHERE display_id='$rs123[display_id]'";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['display_name']; 
    ?>
      </span></td>
      <td width="25%" scope="row">ราคา</td>
      <td width="39%"><?php 
          echo number_format($rs123['book_type_time'],2);
    ?></td>
    </tr>
    <tr>
      <th height="73" scope="row"><span class="style1">จองวันที่</span></th>
      <td scope="row"><span class="style1"></span>
          <?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['date_booking']; 
    ?></td>
      <td scope="row"><span class="style1">เวลา</span></td>
      <td><span class="style1">
        <?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['time_booking']; 
    ?>
      </span></td>
    <tr>
      <th height="73" scope="row"><span class="style1">วันที่ออก</span></th>
      <td scope="row"><span class="style1">
        <?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['check_out']; 
    ?>
      </span></td>
      <td scope="row"><span class="style1">เวลา</span></td>
      <td><span class="style1">
        <?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['time_checkout']; 
    ?>
      </span></td>
    <tr>
      <th height="73" scope="row"><span class="style1"></span></th>
      <td scope="row"><span class="style1"></span></td>
      <td scope="row"><span class="style1">รวมทั้งหมด</span></td>
      <td><span class="style1">
        <?php 
        $sqlb = "SELECT * FROM booking WHERE id_member='$rs123[id_member]' ";
          $resultb = mysqli_query($con,$sqlb);
          $rsb = mysqli_fetch_array($resultb); 
          echo $rsb['book_type_time']; 
    ?>
      </span></td>
    </tr>
  </tbody>
</table>
<p align="center">
  <input type="button" name="Button" value="ปริ้นออกใบเสร็จ" onClick="javascript:this.style.display='none';window.print();">
</p>
</body>
</html>
