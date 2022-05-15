<?php
require 'function.inc.php';
include 'chk_sess.php';
$id = $_GET["id"];
          $sql21 = "SELECT * FROM booking WHERE  id_booking='$id' ";

          $result23 = mysqli_query($con,$sql21);
          $rspro2 = mysqli_fetch_array($result23); 


        
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
<table width="56%" height="334" border="0" align="center" class="table table-hover">
  <thead>
  </thead>
  <tbody>
    <tr>
      <th height="39" colspan="3" scope="row">ใบเสร็จรับเงิน</th>
    </tr>
    <tr>
      <th width="79%" height="33" scope="row"><div align="left"><img src="images/Logo.jpeg" width="133" height="133"></div></th>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th height="33" colspan="3" scope="row"><div align="left">
      125 หมู่ 4 ตำบลพญาเย็น อำเภอปากช่อง จังหวัดนครราชสีมา 32320
          โทร 087-7580-539
      </div></th>
    </tr>
    <tr>
      
 
      <th height="40" scope="row"><div align="left">ชื่อ:
    
    <?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM member WHERE id_member='$rspro2[id_member]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs10 = mysqli_fetch_array($result1);  
    echo $rs10['name_member']; ?></div></th>
      <td colspan="2">วันที่ :<?php echo $rspro2['date_booking']; 
    ?> </td>
    </tr>
    <tr>
      <th height="33" scope="row"><div align="left">เบอร์โทร:
    
    <?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM member WHERE id_member='$rspro2[id_member]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs10 = mysqli_fetch_array($result1);  
    echo $rs10['phone_member']; ?></div></th>
      <td colspan="2"><span class="col-md-1">เลขที่:</span><?php echo $rspro2['id_booking']; ?>
      
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th height="33" colspan="3" scope="row">มีรายการดังต่อไปนี้</th>
    </tr>
  </tbody>
<tbody>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1207" border="1" align="center" class="table table-hover">
  <thead>
    <tr>
      <th width="610" class='col-md-7'>ห้อง</th>
      <th width="581" class='col-md-1'>รวมเงิน</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>ห้อง:
      <?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM display WHERE display_id='$rspro2[display_id]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs10 = mysqli_fetch_array($result1);  
    echo $rs10['display_name']; ?></td>
      <td class='text-right'><div align="right">
       <?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM display WHERE display_id='$rspro2[display_id]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs10 = mysqli_fetch_array($result1);  
    echo $rs10['display_fulltime_price']; ?>
      
      </div></td>
    </tr>
    <tr>
      <td colspan='2' class='text-right'><div align="right">รวม 
        :<?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM display WHERE display_id='$rspro2[display_id]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs10 = mysqli_fetch_array($result1);  
    echo $rs10['display_fulltime_price']; ?>บาท</div></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p align="center"><input type="button" name="Button" value="ปริ้นออกใบเสร็จ" onClick="javascript:this.style.display='none';window.print();">&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
